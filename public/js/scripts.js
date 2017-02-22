$(function () {
    if ($('#form').length) {
        $('#form').parsley().on('field:validated', function () {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        });
    }

    $('#currencyList').DataTable();
    
    $(document).on('click','#refresh-list', function(e){
        
        e.preventDefault
        
        var url = $(this).attr('href');
        console.log(url);
        
        $(this).attr('disabled', true);
        
        $.ajax({
           url: $(this).attr('href'),
           method: 'GET'
        }).done(function( json ) {
            $('.container').load('/currencies');
            $(this).attr('disabled', false);
            $('#progress').hide();
        });
        return false;
    });
});