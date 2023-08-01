<?php 
use DBConn\DBConn; 
$user_info = DBConn::select('users', '*', [
    'id' => $_SESSION['user_id']
], null, 1);
?>
<?php include view('accts/user/unlock/components', 'chat-support') ?>

<div id="div-alert" hidden class="fixed animate__animated z-40 top-3 right-4 bg-white border rounded py-2 px-5 shadow text-[14.5px]">
    <p id="alert-msg"></p>
</div>

<nav class="fixed z-30 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start">
                <button id="toggleSidebarMobile" aria-expanded="true" aria-controls="sidebar" class="p-2 text-gray-600 rounded cursor-pointer lg:hidden hover:text-gray-900 hover:bg-gray-100 focus:bg-gray-100 dark:focus:bg-gray-700 focus:ring-2 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg id="toggleSidebarMobileHamburger" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <svg id="toggleSidebarMobileClose" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="./" class="flex ml-2 md:mr-24">
                    <img src="assets/Storage/system/home.png" class="h-8 mr-3" alt="FlowBite Logo" />
                    <span class="self-center text-xl font-bold font-mono sm:text-2xl whitespace-nowrap dark:text-white">CJCE</span>
                </a>
            </div>
            <div class="flex items-center py-1">
                <button data-modal-target="create-appointment" data-modal-toggle="create-appointment" class="btn inline-flex items-center px-3 py-[3px] mr-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                    </svg> 
                    Book
                </button>
                <!-- Search mobile -->
                <button id="toggleSidebarMobileSearch" type="button" class="p-2 text-gray-500 rounded-lg lg:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                </button>
                <!-- Profile -->
                <div class="flex items-center ml-3">
                    <div>
                        <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="assets/storage/<?= $user_info[0]['profile_photo_path'] ?>" alt="user photo">
                        </button>
                    </div>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-2">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900 dark:text-white capitalize" role="none">
                                <?= $user_info[0]['name'] ?>
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                <?= $user_info[0]['email'] ?>
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="?vs=_/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Profile</a>
                            </li>
                            <li>
                                <a href="?rq=user_sign_out" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<div id="create-appointment" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <form id="appointment-form" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Appointment Form
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-appointment">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div> 
            <div>
                <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                <div class="px-6 py-4">
                    <div class="grid gap-4 mb-4">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your car(s)</label>
                            <select name="car_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                <?php foreach (DBConn::select('cars', '*', ['user_id' => $_SESSION['user_id']]) as $item) { ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['plate_no'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div>
                            <label for="service" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service</label>
                            <select name="service" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                <option value="" hidden></option>
                                <option value="" disabled>-- Select a service --</option>
                                <?php foreach (DBConn::select('services') as $item) { ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['category'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div>
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Schedule Date</label>
                            <input type="date" name="schedule_date" id="date" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div>
                            <label for="service_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Time</label>
                            <select name="time" id="time" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                <option value="" hidden></option>
                                <option value="" disabled>-- Select a time --</option>
                                <?php
                                foreach (DBConn::select('bussiness_hours') as $buss) {
                                    echo "<option value='{$buss['id']}'>{$buss['available_time']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="create-appointment" type="button" class="btn ml-auto text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                <button type="submit" class="btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $('#appointment-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '?user_rq=book_appointment',
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            success: function(resp) {
                window.location.replace('?vs=appointments');
            }
        });
    }); 

    $('#create-appointment').click(() => {
        $('#appointment-modal').show();
    });

    $('.cancel-appointment').click(() => {
        setTimeout(() => {
            $('#appointment-modal').hide();
        }, 200)
    });

    $('.background').click(() => {
        $('#appointment-modal').hide();
    });

    var currentDate = new Date().toISOString().split('T')[0];
    $('#date').attr('min', currentDate);
</script>