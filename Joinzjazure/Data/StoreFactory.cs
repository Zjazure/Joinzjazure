using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Joinzjazure.Data
{
    public static class StoreFactory
    {
        public static IApplicationFormStore GetStore()
        {
            return new ApplicationFormMongoDbStore();
        }
    }
}