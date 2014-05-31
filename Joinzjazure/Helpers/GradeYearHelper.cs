using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Joinzjazure.Helpers
{
    public static class GradeYearHelper
    {
        public static int GetYear(int grade)
        {
            var fix = DateTime.Now.Month < 7 ? -2 : -1;
            return DateTime.Now.Year + fix + grade;
        }
    }
}