$('#Groups').val(0)

function handleCheck(id, value) {
    var g = '#Groups';
    if ($(id).is(':checked') == true) {
        var val = Number($(g).val()) | Number(value);
        $(g).val(val);
    }
    else {
        var val = Number($(g).val()) & (!Number(value));
        $(g).val(val);
    }
}