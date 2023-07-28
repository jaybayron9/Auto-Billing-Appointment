<?php include view('accts/user/unlock', 'head.auth'); ?>

<?php include view('accts/user/unlock/navbars', 'topbar') ?>
<?php include view('accts/user/unlock/navbars', 'sidebar') ?>

<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="assets/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/table.css">  

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <div class="overflow-x-auto overflow-y-auto p-1" style=" max-height: 700px;">
                <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1" class="whitespace-nowrap uppercase text-xs text-center text-white">Plate no.</th> 
                            <th data-priority="3" class="whitespace-nowrap uppercase text-xs text-center text-white">Service</th>
                            <th data-priority="4" class="whitespace-nowrap uppercase text-xs text-center text-white">Date Scheduled</th>
                            <th data-priority="5" class="whitespace-nowrap uppercase text-xs text-center text-white">Service Time</th>
                            <th data-priority="6" class="whitespace-nowrap uppercase text-xs text-center text-white">Status</th>
                            <th data-priority="7" data-priority="1" class="whitespace-nowrap uppercase text-xs text-center text-white">Date created</th>
                            <th data-priority="2" class="whitespace-nowrap uppercase text-xs text-white text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $query = "SELECT ap.id as app_id, ap.*, cs.*, sv.*, bh.*
                                FROM appointments ap 
                                    JOIN cars cs ON ap.car_id = cs.id
                                    JOIN services sv ON sv.id = ap.service_type_id
                                    JOIN bussiness_hours bh ON bh.id = ap.service_time_id
                                WHERE 
                                    ap.user_id = '{$_SESSION['user_id']}' AND 
                                    (appointment_status = 'Pending' OR 
                                    appointment_status = 'Cancelled' OR 
                                    appointment_status = 'Confirmed')
                                ORDER BY ap.created_at DESC";

                        foreach ($conn::DBQuery($query) as $appointment) {
                        ?>
                            <tr data-row-id="<?= $appointment['app_id'] ?>">
                                <td class="text-sm"><?= $appointment['plate_no'] ?></td>
                                <td class="text-sm text-center"><?= $appointment['category'] ?></td>
                                <td class="text-sm"><?= date('F d, Y', strtotime($appointment['schedule_date'])) ?></td>
                                <td class="text-sm"><?= $appointment['available_time'] ?></td>
                                <td class="text-sm status flex justify-center">
                                    <span class="text-white rounded-md px-2 font-semibold <?= $appointment['appointment_status'] == 'Pending' || 'Confirmed' ? 'bg-green-500' : 'bg-red-500';  ?>">
                                        <?= $appointment['appointment_status'] ?>
                                    </span>
                                </td>
                                <td class="text-sm"><?= date('F d, Y', strtotime($appointment['created_at'])) ?></td>
                                <td class="flex gap-x-2 justify-center text-sm"> 
                                    <?php if ($appointment['appointment_status'] !== 'Cancelled') { ?>
                                    <button data-row-data="<?= $appointment['app_id'] ?>" class="cancel-btn font-semibold bg-red-500 hover:bg-red-700 text-white px-2 rounded shadow-md">
                                        Cancel
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
        ordering: false,
        responsive: true,
        "lengthMenu": [10, 25, 50, 100, 1000], 
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
                            var tableRow = $('tr[data-row-id="' + id + '"]'); 
                            tableRow.find('.status').html('<span class="text-white rounded-md px-2 bg-red-500 bg-red-500">Cancelled</span>');
                            tableRow.find('.cancel-btn').hide();

                            dialog('border-green-600 text-green-700', 'Appointment successfully cancelled.');
                        }
                    });
                }
            }); 
        }
    }).columns.adjust().responsive.recalc(); 
</script>