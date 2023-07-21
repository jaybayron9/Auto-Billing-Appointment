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
            <div class="overflow-x-auto overflow-y-auto p-1" style=" max-height: 700px;">
                <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1" class="whitespace-nowrap uppercase text-xs text-center text-white">Plate no.</th>
                            <th data-priority="2" class="whitespace-nowrap uppercase text-xs text-center text-white">pms</th>
                            <th data-priority="3" class="whitespace-nowrap uppercase text-xs text-center text-white">repair</th>
                            <th data-priority="4" class="whitespace-nowrap uppercase text-xs text-center text-white">date</th>
                            <th data-priority="5" class="whitespace-nowrap uppercase text-xs text-center text-white">Time</th>
                            <th data-priority="6" class="whitespace-nowrap uppercase text-xs text-center text-white">status</th>
                            <th data-priority="7" data-priority="1" class="whitespace-nowrap uppercase text-xs text-center text-white">date created</th>
                            <th data-priority="2" data-orderable="false" class="whitespace-nowrap uppercase text-xs text-white text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $query = "SELECT ap.id as app_id, ap.*, cs.* FROM appointments ap JOIN cars cs ON ap.car_id = cs.id WHERE client_id = '{$_SESSION['user_id']}' AND (status = 'pending' OR status = 'cancelled' OR status = 'accepted')";

                        foreach ($conn::DBQuery($query) as $appointment) {
                        ?>
                            <tr data-row-id="<?= $appointment['app_id'] ?>">
                                <td class="text-sm"><?= $appointment['plate_no'] ?></td>
                                <td class="text-sm"><?= $appointment['pms'] ?></td>
                                <td class="text-sm"><?= $appointment['repair'] ?></td>
                                <td class="text-sm"><?= date('F d, Y', strtotime($appointment['schedule'])) ?></td>
                                <td class="text-sm"><?= date('h:i a', strtotime($appointment['schedule'])) ?></td>
                                <td class="text-sm status"><?= $appointment['status'] ?></td>
                                <td class="text-sm"><?= date('F d, Y', strtotime($appointment['created_at'])) ?></td>
                                <td class="flex gap-x-2 text-center text-sm"> 
                                    <button class="cancel-btn bg-red-500 hover:bg-red-700 text-white px-2 rounded shadow-md" data-row-data="<?= $appointment['app_id'] ?>">
                                        CANCEL
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
                            tableRow.find('.status').text('cancelled');
                            tableRow.find('.cancel-btn').hide();

                            $('#div-alert').show().addClass('border-green-600 text-green-700');
                            $('#alert-msg').text('Appointment successfully cancelled.'); 
                            setTimeout(() => {
                                $('#div-alert').hide(); 
                                $.ajax({
                                    url: '?rq=unset_alert_session'
                                });  
                            }, 3000);   
                        }
                    });
                }
            }); 
        }
    }).columns.adjust().responsive.recalc(); 
</script>