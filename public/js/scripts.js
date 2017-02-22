$(function () {
    if ($('#form').length) {
        $('#form').parsley().on('field:validated', function () {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        });
    }

    $('#currencyList').DataTable();
    
    $('#refresh-list').on('click', function(e){
        
        e.preventDefault
        
        var url = $(this).attr('href');
        console.log(url);
        
        $.ajax({
           url: $(this).attr('href'),
           method: 'GET',
           success: function() {
               //reload list
           }
        });
        return false;
    });
});