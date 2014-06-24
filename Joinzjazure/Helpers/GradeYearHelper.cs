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
            if (DateTime.Now.Month < 7)
            {
                //term 2
                return DateTime.Now.Year - grade;
            }
            else
            {
                //trem 1
                return DateTime.Now.Year - grade + 1;
            }
        }
    }
}