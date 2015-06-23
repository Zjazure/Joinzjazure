using System.Collections.Generic;
using Joinzjazure.Models;
using System.Threading.Tasks;

namespace Joinzjazure.Data
{
    public interface IApplicationFormStore
    {
        Task<IEnumerable<FormEntity>> GetAllAsync();
        void Save(ApplicationForm form);
    }
}