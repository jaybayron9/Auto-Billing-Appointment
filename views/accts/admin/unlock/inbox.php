<?php include view('accts/admin/unlock', 'head.auth'); ?> 
<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64">
    <div class="px-4 h-full my-[80px]">
        <div class="grid grid-cols-6 gap-x-4 bg-gray-50 p-5 rounded-md shadow-md border border-gray-200">
            <div class="col-span-2">
                <input type="search" id="search" placeholder="Search User" class="w-full mb-2 px-2 py-2 mr-4 rounded-full outline-none sticky left-0 placeholder:text-sm">
                <ul class="client-list overflow-y-auto overflow-x-hidden py-2 pr-2" style="max-height: 430px;">
                    <?php
                    function convo($msg, $order = "ORDER BY `created_at` DESC LIMIT 1") {
                        return "SELECT * FROM `convo` WHERE `from_user` = '{$msg}' $order";
                    }
                    $uid = isset($_GET['uid']) ? $_GET['uid'] : '';
                    $users = "SELECT * FROM users ";  
                    foreach ($conn::DBQuery($users) as $user) {
                    ?>
                        <li class="<?= $uid == $user['id'] ? 'bg-blue-100' : 'hover:bg-gray-200' ?> client p-2 rounded-lg mb-0 hover:cursor-pointer min-w-[100px] relative">
                            <div class="grid grid-cols-1 md:grid-cols-5 gap-x-2">
                                <div class="col-span-1 flex flex-row">
                                    <img src="assets/storage/<?= $user['profile_photo_path'] ?>" alt="Profile picture" class="h-13 w-14 rounded-full"> 
                                </div>
                                <a href="?vs=_admin/inbox&uid=<?= $user['id'] ?>" class="col-span-4 sm:flex hidden flex-col">
                                    <h1 class="font-semibold text-[15px]"><?= $user['name'] ?></h1>
                                    <div class="flex flex-row">
                                        <?php 
                                        foreach ($conn::DBQuery(convo($user['id'])) as $last) { ?>
                                        <p class="text-sm truncate overflow-hidden"><?= $last['message'] ?></p>
                                        <span class="text-sm mt-1">.<?= time_ago($last['created_at']) ?></span>
                                        <?php } ?>
                                    </div>
                                </a>
                            </div>
                        </li>
                    <?php  } ?>
                </ul>
            </div>
            <?php   
            $convoUser = $users . "WHERE id = '{$uid}'";
            foreach($conn::DBQuery($convoUser) as $user) {  
            ?>
            <div class="col-span-4">
                <div class="ml-3 flex flex-row gap-2 mb-3">
                    <div class="flex flex-row ">
                        <img src="assets/storage/<?= $user['profile_photo_path'] ?>" alt="Profile picture" class="overflow-x-auto h-12 w-12 min-w-[49px] rounded-full"> 
                    </div>
                    <div class="flex flex-col">
                        <h1 class="font-semibold text-[18px] whitespace-nowrap mt-2"><?= $user['name'] ?></h1> 
                    </div> 
                </div>
                <div id="chatDisplay" class="border border-gray-300 shadow-inner bg-gray-50 rounded-md p-5 mb-4 overflow-y-auto h-[350px]">
                <?php  
                // foreach($conn::DBQuery(convo($user['id'], '')) as $msg) {  
                //     echo $msg['message'] . '<br />';    
                // }
                ?>
                </div>
                <form id="sm-form" class="flex gap-x-1">  
                    <input type="hidden" name="from_id" id="from_id" value="<?= $admin_info[0]['account_role'] ?>">
                    <input type="hidden" name="to_id" id="to_id" value="<?= $uid ?>">
                    <textarea id="message" name="message" rows="1" placeholder="Aa" required class="w-full resize-none max-h-40 p-2 rounded-xl overflow-auto"></textarea> 
                    <div class="">
                        <button type="submit" class="btn text-blue-600 hover:bg-gray-300 hover:text-sky-500 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-7 h-7">
                                <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            <?php } ?>
        </div>
    </div>
</main>

<script type="text/javascript"> 
    $(window).on('load', function(){
        $('#chatDisplay').scrollTop($('#chatDisplay')[0].scrollHeight);
    })

    setInterval(function() {
        $('#preloader').remove();
        $.ajax({
            url: '?convo_rq=display_chat',
            type: 'POST',
            data: {
                from_id: $('#from_id').val(),
                to_id: $('#to_id').val(),
            },
            success: function(resp) {
                $("#chatDisplay").html(resp);
            }
        });
    }, 1000);

    $('#sm-form').submit(function(e) {
        e.preventDefault();
        $('#chatDisplay').scrollTop($('#chatDisplay')[0].scrollHeight);
        $.ajax({
            url: '?convo_rq=send_message',
            method: 'POST',
            data: {
                from_id: $('#from_id').val(),
                to_id: $('#to_id').val(),
                msg: $('#message').val(),
            },
            success: function(resp) {
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
</script>