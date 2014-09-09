using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
using System.Xml.Linq;

namespace Joinzjazure.Data
{
    public class VerificationCodeXmlStore
    {
        public static List<VerificationCode> GetAll()
        {
            string path = Path.Combine(HttpContext.Current.Server.MapPath("~/App_Data"), "VerificationCodes.xml");
            var xml = File.ReadAllText(path);

            var doc = XElement.Parse(xml);
            var query = doc.Elements("verificationCode").Select(v => new VerificationCode
            {
                Id = int.Parse(v.Attribute("id").Value),
                Question = v.Attribute("question").Value,
                Answer = v.Attribute("answer").Value,
            });
            return query.ToList();
        }
    }
}