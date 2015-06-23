using Joinzjazure.Data;
using Joinzjazure.Models;
using Microsoft.WindowsAzure;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Threading.Tasks;
using System.Web.Http;

namespace Joinzjazure.Controllers
{
    [RoutePrefix("api/Admin")]
    public class AdminController : ApiController
    {
        [Route("{key}")]
        public async Task<List<ApplicationFormViewModel>> Get(string key)
        {
            var result = await VerifyAndGetDataAsync(key);
            return (from e in result select new ApplicationFormViewModel(e)).ToList();
        }

        private static async Task<IEnumerable<FormEntity>> VerifyAndGetDataAsync(string key)
        {
            var correctKey = CloudConfigurationManager.GetSetting("AdminKey")
                            + DateTime.Now.ToString("yyyyMMdd");

            if (key != correctKey)
            {
                throw new HttpResponseException(HttpStatusCode.NotFound);
            }

            var store = StoreFactory.GetStore();
            var result = await store.GetAllAsync();
            return result;
        }

        [Route("Excel/{key}")]
        public async Task<List<ExcelViewModel>> GetExcel(string key)
        {
            var result = await VerifyAndGetDataAsync(key);
            return (from e in result select new ExcelViewModel(e)).ToList();
        }
    }
}