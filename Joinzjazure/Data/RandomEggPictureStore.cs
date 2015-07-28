using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Web;

namespace Joinzjazure.Data
{
    public class RandomEggPictureStore
    {
        public static List<String> GetAll()
        {
            string path = HttpContext.Current.Server.MapPath("~/Content/Pictures");
            return Directory.GetFiles(path, "*.*").Select(s => Path.GetFileName(s)).ToList();
        }
    }
}
