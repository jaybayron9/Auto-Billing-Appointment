<span id="pass-msg" class="text-xs text-red-700"></span>
<ul id="password-format" class="list-disc grid grid-cols-2 ml-4 mt-1">
    <li id="min" class="text-xs text-red-600">8 Characters</li>
    <li id="small_letters" class="text-xs text-red-600">Small Letter</li>
    <li id="big_letters" class="text-xs text-red-600">Big Letter</li>
    <li id="_number" class="text-xs text-red-600">Number</li>
    <li id="special_char" class="text-xs text-red-600">Special Characters</li>
</ul>
<script type="text/javascript">
    $('#password-format').hide();
    $('#password').focusout(() => {
        $('#password-format').hide();
        $('#password_msg').show();
    })
    $('#password').focus(() => {
        $('#password_msg').hide();
        $('#password-format').show();
        $('#password').keyup(function() {
            $('#preloader').remove();
            $.ajax({
                type: "POST",
                url: "?rq=password_validation",
                data: {
                    password: $(this).val()
                },
                dataType: "json",
                success: function(resp) {
                    resp.lenght == '' ? $('#min').hide() : $('#min').show();
                    resp.small == '' ? $('#small_letters').hide() : $('#small_letters').show();
                    resp.number == '' ? $('#_number').hide() : $('#_number').show();
                    resp.big == '' ? $('#big_letters').hide() : $('#big_letters').show();
                    resp.symbol == '' ? $('#special_char').hide() : $('#special_char').show();
                }
            });
        })
    })
</script>