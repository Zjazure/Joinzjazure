<div class="panel-group">
@{
    var groups = Joinzjazure.Data.GroupXmlStore.GetAll();
    var colIndex = new Random().Next(0, groups.Count);
}
@foreach (var g in groups)
{
<div class="panel panel-primary">
<div class="panel-heading">
<h4 class="panel-title">
<input type="checkbox" id="@g.Id" name="@g.Id" value="@g.Value" onclick="handleCheck('#@g.Id',@g.Value)" />
<a data-toggle="collapse" class="info" data-parent="#accordion" href="@string.Format("#collapse{0}", @g.Id)">@g.Name</a>
</h4>
</div>
                    @{
    var styleClass = "panel-collapse collapse";
    if (groups.IndexOf(g) == colIndex)
    {
        styleClass = "panel-collapse collapse in";
    }
}
<div id="@string.Format("collapse{0}", @g.Id)" class="@styleClass">
<div class="panel-body">
                            @foreach (var line in g.Lines)
    {
    <p>@line</p>
    }
</div>
</div>
</div>
