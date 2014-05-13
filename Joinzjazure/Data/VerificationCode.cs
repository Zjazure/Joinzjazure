using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Joinzjazure.Data
{
    public class VerificationCode
    {
        public int Id { get; set; }

        public string Question { get; set; }

        public string Answer { get; set; }
    }
}