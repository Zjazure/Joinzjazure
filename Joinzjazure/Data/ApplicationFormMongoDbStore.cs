using System.Collections.Generic;
using System.Linq;
using Joinzjazure.Models;
using MongoDB.Driver;
using System.Threading.Tasks;

namespace Joinzjazure.Data
{
    public class ApplicationFormMongoDbStore : IApplicationFormStore
    {
        public async Task<IEnumerable<FormEntity>> GetAllAsync()
        {
            var collection = GetCollection();
            var result = await collection.FindAsync(d => true);
            var list = await result.ToListAsync();
            return list.Select(me => new FormEntity(me));
        }

        private static IMongoCollection<FormMongoEntity> GetCollection()
        {
            var client = new MongoClient();
            var db = client.GetDatabase("joinzjazure");
            var collection = db.GetCollection<FormMongoEntity>("Forms");
            return collection;
        }

        public async void Save(ApplicationForm form)
        {
            var fme = new FormMongoEntity(form);
            var collectiuon = GetCollection();
            await collectiuon.FindOneAndReplaceAsync<FormMongoEntity>(f => f.Name == form.Name && f.Class == fme.Class,
                fme, new FindOneAndReplaceOptions<FormMongoEntity, FormMongoEntity>
                {
                    IsUpsert = true,
                });
        }
    }
}