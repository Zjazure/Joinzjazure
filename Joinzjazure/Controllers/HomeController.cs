using Joinzjazure.Data;
using Joinzjazure.Models;
using System;
using System.Linq;
using System.Threading.Tasks;
using System.Web;
using System.Web.Mvc;

namespace Joinzjazure.Controllers
{
    public class HomeController : Controller
    {
        public ActionResult BrowserIncompatible()
        {
            return View();
        }

        public VerificationCode GetVerificationCode()
        {
            var verificationCodes = Joinzjazure.Data.VerificationCodeXmlStore.GetAll();
            var random = new Random();
            var index = random.Next(0, verificationCodes.Count);
            var code = verificationCodes[index];
            return code;
        }

        [HttpGet]
        public ActionResult GetVerificationCodeAjax()
        {
            HttpContext.Response.Cache.SetCacheability(HttpCacheability.NoCache);
            return Json(GetVerificationCode(), JsonRequestBehavior.AllowGet);
        }

        public ActionResult Index()
        {
            if (Request.Browser.Browser == "IE" && Request.Browser.MajorVersion <= 8)
            {
                return RedirectToAction("BrowserIncompatible");
            }
            return View();
        }

        [HttpPost]
        public ActionResult Index(ApplicationForm model)
        {
            bool verCorrect = true;
            if (!(verCorrect = CheckVerificationCode(model.VerificationCodeId, model.VerificationCodeAnswer))
                || !ModelState.IsValid)
            {
                if (!verCorrect)
                {
                    ModelState.AddModelError("VerificationCodeAnswer", "验证码错误");
                }
                return View(model);
            }
            Task.Run(() =>
                {
                    var store = new ApplicationFormStore();
                    store.Save(model);
                });
            return View("Succeed");
        }

        [HttpGet]
        public ActionResult VerificationCodeCheck(string verificationCodeAnswer, int verificationCodeId)
        {
            return Json(CheckVerificationCode(verificationCodeId, verificationCodeAnswer), JsonRequestBehavior.AllowGet);
        }

        private bool CheckVerificationCode(int verificationCodeId, string verificationCodeAnswer)
        {
            var query = from q in VerificationCodeXmlStore.GetAll()
                        where q.Id == verificationCodeId && q.Answer == verificationCodeAnswer
                        select q;
            return query.ToList().Count > 0;
        }
    }
}