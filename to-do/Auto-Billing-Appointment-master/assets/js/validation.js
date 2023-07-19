$(function() {
    $('.number').on('keydown keyup', function(event) {
        var input = $(this);
        var value = input.val();
        var msgphone = $('.msgphone');

        value = value.replace(/[^0-9\.]/g, '');

        var decimalCount = (value.match(/\./g) || []).length;
        if (decimalCount > 1) {
            value = value.replace(/\.+$/, '');
        }

        input.val(value);
    });

    $('#plateNumber').on('input', function() {
        var inputValue = $(this).val();
        var pattern = /^[A-Za-z]{3}[-\s]?\d{4}$/;
        var msg = $('.msgPlateNumber');

        if (!pattern.test(inputValue)) {
            msg.text('Invalid format');
        } else {
            msg.text('');
        }
    });
});