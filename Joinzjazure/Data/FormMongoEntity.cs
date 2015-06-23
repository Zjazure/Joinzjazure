using Joinzjazure.Models;
using MongoDB.Bson;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace Joinzjazure.Data
{
    public class FormMongoEntity
    {
        public FormMongoEntity()
        {
        }

        public FormMongoEntity(ApplicationForm form)
        {
            Name = form.Name;
            Class = (form.Grade * 100 + form.Class);

            Gender = form.Gender;
            Email = form.Email;
            Phone = form.Phone;
            QQ = form.QQ;
            Weibo = form.Weibo;
            Groups = form.Groups;
            Description = form.Description;
        }

        public ObjectId Id { get; set; }

        public string Name { get; private set;}

        public int Class { get; private set; }

        public string Description { get; set; }

        public string Email { get; set; }

        public bool Gender { get; set; }
        public int Groups { get; set; }

        public string Phone { get; set; }

        public string QQ { get; set; }

        public string Weibo { get; set; }
    }
}