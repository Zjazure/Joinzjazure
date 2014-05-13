using System.Collections.Generic;

namespace Joinzjazure.Data
{
    public class GroupEntity
    {
        public string Id { get; set; }

        public List<string> Lines { get; set; }

        public string Name { get; set; }

        public int Value { get; set; }
    }
}