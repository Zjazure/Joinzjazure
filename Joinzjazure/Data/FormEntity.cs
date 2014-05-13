using Joinzjazure.Models;
using Microsoft.WindowsAzure.Storage.Table;

namespace Joinzjazure.Data
{
    public class FormEntity : TableEntity
    {
        public FormEntity()
        {
        }

        public FormEntity(ApplicationForm form)
        {
            RowKey = form.Name;
            PartitionKey = (form.Grade * 100 + form.Class).ToString();

            Gender = form.Gender;
            Email = form.Email;
            Phone = form.Phone;
            QQ = form.QQ;
            Weibo = form.Weibo;
            Groups = form.Groups;
            Description = form.Description;
        }

        public string Description { get; set; }

        public string Email { get; set; }

        public bool Gender { get; set; }
        public int Groups { get; set; }

        public string Phone { get; set; }

        public string QQ { get; set; }

        public string Weibo { get; set; }
    }
}