using Joinzjazure.Data;
using Joinzjazure.Models;
using Microsoft.WindowsAzure;
using System;
using System.Collections.Generic;
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
            var correctKey = CloudConfigurationManager.GetSetting("AdminKey")
                + DateTime.Now.ToString("yyyyMMdd");

            if (key != correctKey)
            {
                throw new HttpResponseException(HttpStatusCode.NotFound);
            }

            var store = new ApplicationFormStore();
            var result = store.GetAll();
            var list = new List<ApplicationFormViewModel>();
            foreach (var entity in result)
            {
                list.Add(new ApplicationFormViewModel(entity));
            }
            return list;
        }
    }
}