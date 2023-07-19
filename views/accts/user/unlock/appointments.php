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
                            <th class="whitespace-nowrap uppercase text-xs text-center">Plate no.</th>
                            <th class="whitespace-nowrap uppercase text-xs text-center">pms</th>
                            <th class="whitespace-nowrap uppercase text-xs text-center">repair</th>
                            <th class="whitespace-nowrap uppercase text-xs text-center">date</th>
                            <th class="whitespace-nowrap uppercase text-xs text-center">Time</th>
                            <th class="whitespace-nowrap uppercase text-xs text-center">status</th>
                            <th class="whitespace-nowrap uppercase text-xs text-center">date created</th>
                            <th data-orderable="false" class="whitespace-nowrap uppercase text-xs text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $query = "SELECT ap.id as app_id, ap.*, cs.* FROM appointments ap JOIN cars cs ON ap.car_id = cs.id WHERE client_id = '{$_SESSION['user_id']}' AND (status = 'pending' OR status = 'cancelled' OR status = 'accepted')";

                        foreach ($conn::DBQuery($query) as $appointment) {
                        ?>
                            <tr>
                                <td class="text-sm"><?= $appointment['plate_no'] ?></td>
                                <td class="text-sm"><?= $appointment['pms'] ?></td>
                                <td class="text-sm"><?= $appointment['repair'] ?></td>
                                <td class="text-sm"><?= date('F d, Y', strtotime($appointment['schedule'])) ?></td>
                                <td class="text-sm"><?= date('h:i a', strtotime($appointment['schedule'])) ?></td>
                                <td class="text-sm"><?= $appointment['status'] ?></td>
                                <td class="text-sm"><?= date('F d, Y', strtotime($appointment['created_at'])) ?></td>
                                <td class="flex gap-x-2 text-center text-sm">
                                    <?php if ($appointment['status'] == 'pending' || $appointment['status'] == 'accepted') { ?>
                                        <button class="cancel-btn bg-red-500 hover:bg-red-700 text-white px-2 rounded shadow-md" data-row-data="<?= $appointment['app_id'] ?>">
                                            CANCEL
                                        </button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<div id="edit-acct-modal" hidden class="mt-10 md:mt-0">
    <div class="fixed inset-0 overflow-y-hidden px-4 py-6 sm:px-0 z-50 sm:max-w-2xl mx-auto">
        <div class="background fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <form id="edit-form" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <input type="hidden" name="id" id="support-id">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900 mb-2">
                    Edit Account
                </div>
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="created" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Created</label>
                        <input type="datetime-local" name="created" id="created" disabled class="bg-gray-50 border border-gray-100 text-gray-900 text-sm rounded-lg  block w-full p-2.5">
                    </div>
                    <div>
                        <label for="access" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Access</label>
                        <select name="access" id="access" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                            <option value="1">Granted</option>
                            <option value="0">Denied</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="md:mt-0 md:col-span-2">
                <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                    <button type="button" class="del-hide-modal btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
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

<div id="del-acct-modal" hidden class="mt-10 md:mt-0">
    <div class="fixed inset-0 overflow-y-hidden px-4 py-6 sm:px-0 z-50 sm:max-w-2xl mx-auto">
        <div class="background fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <form id="delete-form" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto">
            <input type="hidden" name="id" id="acct-id">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900">
                    Delete Account
                </div>
                <div class="mt-4 text-sm text-gray-600">
                    Are you sure you want to delete this account? Once this account is deleted, all of its resources and data will be permanently deleted. Please confirm you would like to permanently delete your account.
                </div>
            </div>
            <div class="md:mt-0 md:col-span-2">
                <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                    <button type="button" class="del-hide-modal btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Cancel
                    </button>
                    <button type="submit" class="btn ml-3 rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs font-semibold uppercase text-white transition duration-150 ease-in-out hover:bg-red-500 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        Delete Account
                    </button>
                </div>
            </div>
        </form>
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
        columns: [
            { title: 'Plate No.' },
            { title: 'pms' },
            { title: 'service' },
            { title: 'date' },
            { title: 'time' },
            { title: 'status' },
            { title: 'created' },
            {  title: 'actions' },
        ],
        "drawCallback": () => {
            $('.cancel-btn').click(function() {
                var id = $(this).data('row-data');

                if (confirm('Are you sure you want to cancel?')) {
                    $.ajax({
                        url: '?user_rq=user_cancel_appointment',
                        type: 'POST',
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(resp) { 
                            window.location.reload(true);
                        }
                    });
                }
            }); 
        }
    }).columns.adjust().responsive.recalc(); 
</script>