using Joinzjazure.Models;
using Microsoft.WindowsAzure;
using Microsoft.WindowsAzure.Storage;
using Microsoft.WindowsAzure.Storage.Table;
using System.Collections.Generic;

namespace Joinzjazure.Data
{
    public class ApplicationFormStore
    {
        private readonly string connectionString;
        private readonly string tableName;

        public ApplicationFormStore()
        {
            connectionString = CloudConfigurationManager.GetSetting("StorageConnectionString");
            tableName = CloudConfigurationManager.GetSetting("AzureTableName");
        }

        public IEnumerable<FormEntity> GetAll()
        {
            var table = GetTable();
            TableQuery<FormEntity> query = new TableQuery<FormEntity>().Where(TableQuery.GenerateFilterCondition("PartitionKey", QueryComparisons.LessThan, "999"));
            return table.ExecuteQuery(query);
        }

        public void Save(ApplicationForm form)
        {
            var table = GetTable();

            var entity = new FormEntity(form);
            var operation = TableOperation.InsertOrReplace(entity);
            table.Execute(operation);
        }

        private CloudTable GetTable()
        {
#if DEBUG
            var account = CloudStorageAccount.DevelopmentStorageAccount;
#else
            var account = CloudStorageAccount.Parse(connectionString);
#endif
            var client = account.CreateCloudTableClient();
            var table = client.GetTableReference(tableName);
            return table;
        }
    }
}