using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Web;
using System.Xml.Linq;

namespace Joinzjazure.Data
{
    public class GroupXmlStore
    {
        public static List<GroupEntity> GetAll()
        {
            string path = Path.Combine(HttpContext.Current.Server.MapPath("~/App_Data"), "Groups.xml");
            var xml = File.ReadAllText(path);

            var doc = XElement.Parse(xml);
            var query = from g in doc.Elements("group")
                        select new GroupEntity
                        {
                            Id = g.Attribute("id").Value,
                            Name = g.Attribute("name").Value,
                            Value = int.Parse(g.Attribute("value").Value),
                            Lines = g.Elements("line").Select(l => l.Attribute("text").Value).ToList()
                        };
            return query.ToList();
        }
    }
}