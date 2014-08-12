using Joinzjazure.Data;
using Joinzjazure.Models;
using Microsoft.WindowsAzure;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Web.Http;

namespace Joinzjazure.Controllers
{
    [RoutePrefix("api/Admin")]
    public class AdminController : ApiController
    {
        [Route("{key}")]
        public List<ApplicationFormViewModel> Get(string key)
        {
            var result = VerifyAndGetData(key);
            return (from e in result select new ApplicationFormViewModel(e)).ToList();
        }

        private static IEnumerable<FormEntity> VerifyAndGetData(string key)
        {
            var correctKey = CloudConfigurationManager.GetSetting("AdminKey")
                            + DateTime.Now.ToString("yyyyMMdd");

            if (key != correctKey)
            {
                throw new HttpResponseException(HttpStatusCode.NotFound);
            }

            var store = new ApplicationFormStore();
            var result = store.GetAll();
            return result;
        }

        [Route("Excel/{key}")]
        public List<ExcelViewModel> GetExcel(string key)
        {
            var result = VerifyAndGetData(key);
            return (from e in result select new ExcelViewModel(e)).ToList();
        }
    }
}