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

    $('.plate_no').on('input', function() {
        var inputValue = $(this).val();
        var pattern = /^[A-Za-z]{3}[-\s]?\d{4}$/;
        var msg = $('#plateno-msg');

        if (!pattern.test(inputValue)) {
            msg.text('Invalid plate number format.');
        } else {
            msg.text('');
        }
    });
});