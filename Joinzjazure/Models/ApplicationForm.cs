using System.ComponentModel.DataAnnotations;
using System.Web.Mvc;

namespace Joinzjazure.Models
{
    public class ApplicationForm//(string name, bool gender, int grade, int classNum, string email)
    {
        public ApplicationForm()
        {
        }

        [Required(ErrorMessage = "填写班级，福利送上门哦")]
        [Range(1, 42, ErrorMessage = "同学你走错班了")]
        [Display(Name = "班级")]
        public int Class { get; set; }/* = classNum;*/

        [MaxLength(1000, ErrorMessage = "同学，这不是写作文，500字已经很多了好不好")]
        [Display(Name = "其他信息")]
        public string Description { get; set; }

        [Required(ErrorMessage = "填个邮箱，方便联系")]
        [EmailAddress(ErrorMessage = "你确定你填的是邮箱地址？")]
        [Display(Name = "邮箱")]
        public string Email { get; set; } /*= email;*/

        [Required]
        [Display(Name = "性别")]
        public bool Gender { get; set; }/* = gender;*/

        [Required]
        [Range(1, 2, ErrorMessage = "同学你来错学校了")]
        [Display(Name = "年级")]
        public int Grade { get; set; }/* = grade;*/

        [Required(ErrorMessage = "请至少选择一个小组")]
        [Display(Name = "小组")]
        public int Groups { get; set; }

        [Required(ErrorMessage = "什么？你是无名氏？")]
        [MaxLength(10, ErrorMessage = "你名字这么屌，家里知道吗")]
        [Display(Name = "姓名")]
        public string Name { get; set; } /*= name;*/

        [Phone]
        [Display(Name = "手机")]
        public string Phone { get; set; }

        [MaxLength(30, ErrorMessage = "呃，我第一次见过这么长的QQ号")]
        [Display(Name = "QQ")]
        public string QQ { get; set; }

        [MaxLength(50, ErrorMessage = "你在微博这么屌，家里知道吗")]
        [Display(Name = "微博")]
        public string Weibo { get; set; }

        [Required]
        public int VerificationCodeId { get; set; }

        [Required(ErrorMessage = "怎么可以不填验证码呢")]
        [Remote("VerificationCodeCheck", "Home", AdditionalFields = "VerificationCodeId", ErrorMessage = "验证码错误")]
        public string VerificationCodeAnswer { get; set; }
    }
}