<?php

use DBConn\DBConn;

$user_info = DBConn::select('users', '*', [
    'id' => $_SESSION['user_id']
], null, 1);
?>

<div id="div-alert" hidden class="fixed z-40 top-3 right-4 bg-white border rounded py-2 px-5 shadow text-[14.5px]">
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
                <a href="?vs=_/" class="flex ml-2 md:mr-24">
                    <img src="assets/Storage/system/home.png" class="h-8 mr-3" alt="FlowBite Logo" />
                    <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">CJCE</span>
                </a>
                <ul class="flex flex-row overflow-x-auto font-medium mt-0 gap-x-8 text-sm">
                    <li>
                        <a href="./#home" class="text-gray-900 hover:underline" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="./#aboutus" class="text-gray-900 hover:underline whitespace-nowrap">About Us</a>
                    </li>
                    <li>
                        <a href="./#pms" class="text-gray-900 hover:underline">PMS</a>
                    </li>
                    <li>
                        <a href="./#repair" class="text-gray-900 hover:underline">Repair</a>
                    </li>
                    <li>
                        <a href="./#contact" class="text-gray-900 hover:underline">Contact</a>
                    </li>
                    <li>
                        <a href="./#developers" class="text-gray-900 hover:underline">Developer</a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center">
                <button id="create-appointment" class="btn inline-flex items-center mr-2 px-4 py-1 shadow bg-blue-600 border border-transparent rounded font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    Book
                </button>
                <!-- Search mobile -->
                <button id="toggleSidebarMobileSearch" type="button" class="p-2 text-gray-500 rounded-lg lg:hidden hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                </button>
                <!-- Notifications -->
                <button type="button" data-dropdown-toggle="notification-dropdown" class="p-2 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700">
                    <span class="sr-only">View notifications</span>
                    <!-- Bell icon -->
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path>
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div class="z-20 z-50 hidden max-w-sm my-4 overflow-hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg dark:divide-gray-600 dark:bg-gray-700" id="notification-dropdown">
                    <div class="block px-4 py-2 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Notifications
                    </div>
                    <div>
                        <a href="#" class="flex px-4 py-3 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                            <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11" src="assets/storage/defaults/logo.ico" alt="example image">
                                <div class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-gray-900 border border-white rounded-full dark:border-gray-700">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-full pl-3">
                                <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Jay Bayron</span> Say hello to you</div>
                                <div class="text-xs font-medium text-primary-700 dark:text-primary-400">10 minutes ago</div>
                            </div>
                        </a>
                    </div>
                    <a href="#" class="block py-2 text-base font-normal text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:hover:underline">
                        <div class="inline-flex items-center ">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                            </svg>
                            View all
                        </div>
                    </a>
                </div>
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

<div id="appointment-modal" hidden class="mt-10 md:mt-0">
    <div class="fixed inset-0 overflow-y-hidden px-4 py-6 sm:px-0 z-50 sm:max-w-2xl mx-auto">
        <div class="background fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <form id="appointment-form" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900 mb-2">
                    Create Appointment
                </div>
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your car(s)</label>
                        <select name="car_id" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            <option value="" selected hidden>-- Select Car --</option>
                            <?php foreach (DBConn::select('cars', '*', ['user_id' => $_SESSION['user_id']]) as $item) { ?>
                                <option value="<?= $item['id'] ?>"><?= $item['plate_no'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <label for="pms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PMS</label>
                        <select name="pms" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            <option value="" selected hidden>-- Select PMS --</option>
                            <?php foreach (DBConn::select('pms', '*') as $item) { ?>
                                <option value="<?= $item['ps'] ?>"><?= $item['ps'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <label for="repair" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service</label>
                        <select name="repair" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            <option value="" selected hidden>-- Select Service --</option>
                            <?php foreach (DBConn::select('services') as $item) { ?>
                                <option value="<?= $item['service'] ?>"><?= $item['service'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <label for="schedule" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Schedule</label>
                        <input type="datetime-local" name="schedule" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                </div>
            </div>
            <div class="md:mt-0 md:col-span-2">
                <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                    <button type="button" class="cancel-appointment btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Cancel
                    </button>
                    <button type="submit" class="btn ml-3 rounded-md border border-transparent bg-blue-600 px-4 py-2 text-xs font-semibold uppercase text-white transition duration-150 ease-in-out hover:bg-blue-500 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $('#appointment-form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '?user_rq=user_add_appointment',
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data) {
                setTimeout(() => {
                    window.location.reload(true);
                }, 200)
            }
        });
    });

    <?php
    if (isset($_SESSION['alert'])) {
        echo "dialog('border-green-600 text-green-700', '" . $_SESSION['alert'] . "')";
    }
    ?>
</script>

<script type="text/javascript">
    $('title').text('CJCE | <?= $user_info[0]['name'] ?>');

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
</script>