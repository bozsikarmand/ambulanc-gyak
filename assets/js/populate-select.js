$(document).ready(function()
{
    $('select[class~="selectpicker"][data-url]').each(function(index, value)
    {
        var select = $(this);
        var url    = $(this).attr('data-url');
        var id     = $(this).attr('data-id');
        var label  = $(this).attr('data-label');

        $.getJSON(url, function(data)
        {
            select.html('');

            $.each(data, function(key, val)
            {
                select.append('<option data-tokens="' + val[id] + '">' + val[label] + '</option>');
            });

            select.selectpicker('refresh');
        });
    });
});