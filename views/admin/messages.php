<?php include view('admin', 'navbars') ?>
<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <input type="hidden" id="user-id">
        <div class="mb-3 max-w-min">
            <ul class="client-list overflow-x-auto flex py-2">
                <input type="search" id="search" placeholder="Search Client" class="mb-2 px-2 py-2 mr-4 rounded-r-md outline-none sticky left-0 absolute placeholder:text-sm">
                <?php foreach (DBConn::select('clients') as $client) { ?>
                    <li class="client mr-2">
                        <button data-row-data="<?= $client['id'] ?>" class="to capitalize inline-block p-2 text-white bg-yellow-600 rounded-t-full rounded-br-full font-light text-sm" aria-current="page">
                            <?= $client['name'] ?>
                        </button>
                    </li>
                <?php } ?>
            </ul>
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
        $('.to').click(function() {
            var user_id = $(this).data('row-data');

            $('#user-id').val(user_id);
            $.ajax({
                url: '?rq=show_to_admin',
                type: 'POST',
                data: {
                    from: $('#admin-id').val(),
                    to: user_id,
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
                    to: $('#user-id').val(),
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
                    to: $('#user-id').val(),
                    message: $('#message').val(),
                },
                success: function(response) {
                    $('#message').val('');
                }
            });
        });

        $('#search').on('keyup input', function () {
            const searchValue = $(this).val().toLowerCase();
            const listItems = $('.client-list .client');

            let visibleItems = 0;
            listItems.each(function () {
                const userName = $(this).text().toLowerCase();

                if (userName.indexOf(searchValue) > -1) {
                    $(this).css('display', 'block');
                    visibleItems++;
                } else {
                    $(this).css('display', 'none');
                }
            });

            if (visibleItems === 0 && !noResultsAdded) {
                $('.client-list').html('<li class="no-results font-medium text-gray-400 text-center mt-32 mb-32">No results</li>');
                noResultsAdded = true;
            } else if (visibleItems > 0 && noResultsAdded) {
                $('.no-results').remove();
                noResultsAdded = false;
            }
        });
    })
</script>