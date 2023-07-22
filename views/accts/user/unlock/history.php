<?php include view('accts/user/unlock', 'head.auth'); ?>

<?php include view('accts/user/unlock/navbars', 'topbar') ?>
<?php include view('accts/user/unlock/navbars', 'sidebar') ?>

<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="assets/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/table.css">

<div id="div-alert" hidden class="fixed z-30 top-3 right-4 bg-white border rounded py-2 px-5 shadow text-[14.5px] animate__animated">
    <p id="alert-msg"></p>
</div>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <div class="overflow-x-auto overflow-y-auto" style=" max-height: 700px;">
                <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap text-center text-xs uppercase text-white">Plate no.</th>
                            <th class="whitespace-nowrap text-center text-xs uppercase text-white">repair</th>
                            <th class="whitespace-nowrap text-center text-xs uppercase text-white">Description</th>
                            <th class="whitespace-nowrap text-center text-xs uppercase text-white">SCHEDULE</th>
                            <th class="whitespace-nowrap text-center text-xs uppercase text-white">Amount</th>
                            <th data-orderable="false" class="whitespace-nowrap text-center text-xs uppercase text-white"></th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $query = "SELECT * FROM appointments ap JOIN cars cs ON ap.car_id = cs.id WHERE client_id = '{$_SESSION['user_id']}' AND status != 'Pending' AND status != 'Cancelled'";

                        foreach ($conn::DBQuery($query) as $appointment) {
                        ?>
                            <tr>
                                <td class="text-sm"><?= $appointment['plate_no'] ?></td>
                                <td class="text-sm"><?= $appointment['repair'] ?></td>
                                <td class="text-sm"><?= $appointment['description'] ?></td>
                                <td class="text-sm"><?= date('F d, Y h:i a', strtotime($appointment['schedule'])) ?></td>
                                <td class="text-sm"><?= $appointment['price'] ?></td>
                                <td class="text-sm">
                                    <button data-modal-target="large-modal" data-modal-toggle="large-modal" class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Large Modal -->
<div id="large-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white italic">
                        Booking summary
                    </h3>
                    <div class="text-center">
                        <span class="text-sm font-base">Customer Details</span>
                    </div>
                </div>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="large-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-3 text-center border-b-2 border-gray-400 pb-2">
                    <h1 class="text-xl font-semibold">Customer details</h1>
                    <h1 class="text-xl font-semibold">Vehicle detail </h1>
                    <h1 class="text-xl font-semibold">Schedule</h1>
                </div>
                <div class="grid grid-cols-3 border-b-2 border-gray-400 pb-2">
                    <div class="-mt-4 ml-6">
                        <p class="whitespace-nowrap font-semibold">Name : <span class="font-normal">Sean Singco</span></p>
                        <p class="whitespace-nowrap font-semibold">Email : <span class="font-normal">Singco.SeanBrad@gmail.com</span></p>
                        <p class="whitespace-nowrap font-semibold">Contact : <span class="font-normal">0900 000 0000</span></p>
                    </div>
                    <div class="-mt-4 ml-6">
                        <p class="whitespace-nowrap font-semibold">Brand : <span class="font-normal">Toyota</span></p>
                        <p class="whitespace-nowrap font-semibold">Model : <span class="font-normal">Version 1</span></p>
                        <p class="whitespace-nowrap font-semibold">PMS : <span class="font-normal">10,000KM</span></p>
                    </div>
                    <div class="-mt-4 text-center">
                        <p> November 6, 2022, 2:00pm</p>
                    </div>
                </div>
                <div class="flex flex-col px-20">
                    <table class="w-full -mt-4">
                        <thead class="bg-white">
                            <tr>
                                <th class="text-xl font-semibold text-left">Service/s</th>
                                <th class="text-xl font-semibold text-center">Quantity</th>
                                <th class="text-xl font-semibold text-center">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b-2 border-gray-300">
                                <td>Timing belt replacement</td>
                                <td class="text-center">1</td>
                                <td class="text-right">1,900</td>
                            </tr>
                            <tr class="border-b-2 border-gray-300">
                                <td>Timing belt replacement</td>
                                <td class="text-center">1</td>
                                <td class="text-right">1,900</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>TOTAL</td>
                                <td></td>
                                <td class="text-center">Php 28,000</td>
                            </tr>
                        </tfoot>
                    </table>
                </div> 
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="large-modal" type="button" class="ml-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Print</button>
                <button data-modal-hide="large-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div id="del-accts-modal" hidden class="mt-10 md:mt-0">
    <div class="fixed inset-0 overflow-y-hidden px-4 py-6 sm:px-0 z-50 sm:max-w-2xl mx-auto">
        <div class="background fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <form id="deletes-form" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900">
                    Delete Account
                </div>
                <div class="mt-4 text-sm text-gray-600">
                    Are you sure you want to delete this account(s)? Once this account(s) is deleted, all of its resources and data will be permanently deleted. Please confirm you would like to permanently delete your account.
                </div>
            </div>
            <div class="md:mt-0 md:col-span-2">
                <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                    <button type="button" class="del-hide-modal btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Cancel
                    </button>
                    <button type="submit" class="btn ml-3 rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs font-semibold uppercase text-white transition duration-150 ease-in-out hover:bg-red-500 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        Delete Account(s)
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
    var table = $('#table').DataTable({
        responsive: true,
        "lengthMenu": [10, 25, 50, 100, 1000],
    }).columns.adjust().responsive.recalc();
</script>