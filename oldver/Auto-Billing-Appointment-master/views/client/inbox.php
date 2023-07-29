<?php include view('client', 'navbars') ?>
<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div id="chatDisplay" class="w-full border border-gray-300 rounded-md p-5 shadow-xl mb-4 h-96 overflow-y-auto" style="max-height: 400px;"></div>

        <form id="sm-form" class="flex">
            <input type="hidden" name="client_id" id="client-id" value="<?= $_SESSION['client_auth'] ?>">
            <textarea id="message" name="message" cols="30" rows="1" maxlength="200" placeholder="Enter message here..." class="w-full border border-gray-400 shadow rounded-l-full px-3 focus:outline-none py-2"></textarea>
            <button type="submit" class="ml-auto bg-blue-500 hover:bg-blue-600 rounded-r-full pl-3 px-2 font-medium text-white pr-5">Send</button>
        </form>
    </div>
</main>

<script type="text/javascript">
    $(function() {
        setInterval(function() {
            $.ajax({
                url: '?rq=show_messages',
                type: 'POST',
                data: {
                    from_user: $('#client-id').val(),
                },
                success: function(resp) {
                    $("#chatDisplay").html(resp);
                }
            });
        }, 1000);

        $('#sm-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '?rq=client_send',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $('#message').val('');
                }
            });
        });

        function adjustTextareaHeight() {
            var textarea = $('#message');
            textarea.height(0);
            var newHeight = textarea.prop('scrollHeight');
            textarea.height(newHeight);
        }

        $('#message').on('input change', adjustTextareaHeight);
    })
</script>