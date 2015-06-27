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