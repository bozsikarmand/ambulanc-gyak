$(document).ready(function()
{
    $('select[class~="selectpicker"][data-url]').each(function(index, value)
    {
        var select = $(this);
        var url    = $(this).attr('data-url');
        var list   = [];

        $.getJSON(url, function(data)
        {
            $.each(data, function(val)
            {
                list.push('<option data-tokens="' + val.value + '">' + val.value + '</option>');
            });

            select.html(list.join(''));
            select.selectpicker('refresh');
        });
    });
});