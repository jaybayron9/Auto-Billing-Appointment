<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="mb-3 flex">
            <div class="flex">
                <label for="sendto" class="ml-2 mr-1">To: </label>
                <select name="to" id="to" placeholder="To User #" class="mr-4 placeholder:text-gray-500 placeholder:px-2 border-b-2 border-gray-500 focus:outline-none text-center capitalize">
                    <?php foreach (DBConn::select('clients') as $client) { ?>
                        <option value="<?= $client['id'] ?>"><?= $client['name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div id="chatDisplay" class="w-full border border-gray-300 rounded-md p-5 shadow-xl mb-4 h-96 overflow-y-auto" style="max-height: 400px;"></div>

        <form id="sm-form" class="flex">
            <input type="hidden" name="admin_id" id="admin-id" value="admin1">
            <textarea id="message" name="message" cols="30" rows="2" placeholder="Enter message here..." class="w-full border border-gray-400 shadow rounded-l-full px-3 focus:outline-none pt-3"></textarea>
            <button type="submit" class="ml-auto bg-blue-500 hover:bg-blue-600 rounded-r-full pl-3 px-2 font-medium text-white pr-5">Send</button>
        </form>
    </div>
</main>

<script type="text/javascript">
    $(function() {
        $('#to').change(function() {
            alert($('#to').val());
            $.ajax({
                url: '?rq=show_to_admin',
                type: 'POST',
                data: {
                    from: $('#admin-id').val(),
                    to: $('#to').val(),
                    message: $('#message').val(),
                },
                success: function(resp) {
                    $("#chatDisplay").html(resp);
                }
            });
        });

        setInterval(function() {
            $.ajax({
                url: '?rq=admin_show_convo',
                type: 'POST',
                data: {
                    from: $('#admin-id').val(),
                    to: $('#to').val(),
                    message: $('#message').val(),
                },
                success: function(resp) {
                    $("#chatDisplay").html(resp);
                }
            });
        }, 1000);

        $('#sm-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '?rq=admin_send',
                method: 'POST',
                data: {
                    from: $('#admin-id').val(),
                    to: $('#to').val(),
                    message: $('#message').val(),
                },
                success: function(response) {
                    $('#message').val('');
                }
            });
        });
    })
</script>