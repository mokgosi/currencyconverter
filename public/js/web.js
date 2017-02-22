$(function () {
    $('#currencyConvertionForm').on('submit',function(e) {

        e.preventDefault();


        $(this).attr('disabled', true);

        if($('#amount').val() == '') {
            alert('Please enter amount');
            return;
        }

        if($('#convertFrom').val() == $('#convertTo').val()) {
            alert('Please select different currency to convert to.');
            return;
        }

        $.ajax({
            method: 'GET',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'JSON'
        }).done(function( json ) {
            $('.convertedAmount').html('').html($('#convertTo').val()+' '+json.conversion);
            $(this).attr('disabled', false);
        }).fail(function( xhr, status, errorThrown ) {
            alert( "Sorry, there was a problem - try again later!" );
            $(this).attr('disabled', false);
        });

        return false;
        
    });
});