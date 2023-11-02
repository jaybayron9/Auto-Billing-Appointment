<?php include view('accts/admin/unlock', 'head.auth'); ?> 
<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="assets/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/table.css">

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <div class="overflow-x-auto overflow-y-auto p-1" style="max-height: 700px;">
                <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1" class="whitespace-nowrap uppercase text-xs text-center text-white">Plate no.</th>
                            <th data-priority="3" class="whitespace-nowrap uppercase text-xs text-center text-white">Service</th> 
                            <th data-priority="4" class="whitespace-nowrap uppercase text-xs text-center text-white">Date Scheduled</th>
                            <th data-priority="5" class="whitespace-nowrap uppercase text-xs text-center text-white">Service Time</th>
                            <th data-priority="6" class="whitespace-nowrap uppercase text-xs text-center text-white">Mechanic</th>
                            <th data-priority="7" class="whitespace-nowrap uppercase text-xs text-center text-white">Electrician</th>
                            <th data-priority="8" class="whitespace-nowrap uppercase text-xs text-center text-white">Date Created</th>
                            <th data-priority="2" data-orderable="false" class="whitespace-nowrap uppercase text-xs text-center text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $query = "SELECT ap.id as app_id, ap.*, cs.*, sv.*, bh.*
                                FROM appointments ap 
                                    JOIN cars cs ON ap.car_id = cs.id
                                    JOIN services sv ON sv.id = ap.service_type_id
                                    JOIN bussiness_hours bh ON bh.id = ap.service_time_id
                                WHERE ap.appointment_status = 'Confirmed'";  
                        foreach ($conn::DBQuery($query) as $appointment) {
                        ?>
                            <tr data-row-id="<?= $appointment['app_id'] ?>">
                                <td class="text-sm"><?= $appointment['plate_no'] ?></td>
                                <td class="text-sm"><?= $appointment['category'] ?></td> 
                                <td class="whitespace-nowrap text-sm"><?= date('F d, Y', strtotime($appointment['schedule_date'])) ?></td>
                                <td class="whitespace-nowrap text-sm"><?=$appointment['available_time'] ?></td>
                                <td class="text-sm">
                                    <?php
                                    $emp = explode(', ', $appointment['assigned_employee_id']);
                                    foreach ($conn::select('supports', '*', ['position' => 'Mechanic']) as $mechanic) {
                                        for ($i = 0; $i < count($emp); $i++) {
                                            echo $emp[$i] == $mechanic['id'] ? $mechanic['name'] :''; 
                                        }
                                    }
                                    ?>
                                </td>
                                <td class="text-sm">
                                    <?php
                                    foreach ($conn::select('supports', '*', ['position' => 'Electrician']) as $electrician) {
                                        for ($i = 0; $i < count($emp); $i++) {
                                            echo $emp[$i] == $electrician['id'] ? $electrician['name'] :''; 
                                        }
                                    }
                                    ?>
                                </td> 
                                <td class="text-sm"><?= date('m/d/Y', strtotime($appointment['created_at'])) ?></td>
                                <td class="flex gap-x-2 text-sm">
                                    <?php 
                                    $scheduleDate = strtotime(date('F d, Y', strtotime($appointment['schedule_date'])));
                                    $currentDate = time();
                                    $timeDifference = $scheduleDate - $currentDate; 
                                    $daysDifference = $timeDifference / (60 * 60 * 24);
                                    
                                    if ($daysDifference <= 1) {
                                        ?> 
                                        <button data-modal-target="assign-modal" data-modal-toggle="assign-modal" data-row-data="<?= $appointment['app_id'] ?>" data-toggle="modal" data-target="#assign" class="assign-btn bg-blue-500 hover:bg-blue-700 text-white px-2 rounded shadow-md font-semibold">
                                            Assign
                                        </button>
                                        <?php
                                    } ?>  
                                    <button data-row-data="<?= $appointment['app_id'] ?>" class="cancel-btn bg-red-500 hover:bg-red-700 text-white px-2 rounded shadow-md font-semibold">
                                        Cancel
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
 
<div id="assign-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full"> 
        <form id="assign-form" class="relative bg-white rounded-lg shadow dark:bg-gray-700"> 
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Assign Employee
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="assign-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div> 
            <div class="p-6">
                <input type="hidden" name="app_id" id="app_id">
                <div class="mb-5">
                    <label for="mechanic" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mechanic</label>
                    <select name="mechanic" id="mechanic" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <option value="" selected hidden>-- SELECT --</option>
                        <?php foreach ($conn::select('supports', '*', ['position' => 'Mechanic', 'status' => 'Employed']) as $mechanic) { ?>
                            <option value="<?= $mechanic['id'] ?>"><?= $mechanic['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <label for="electrician" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Electrician</label>
                    <select name="electrician" id="electrician" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        <option value="" selected hidden>-- SELECT --</option>
                        <?php foreach ($conn::select('supports', '*', ['position' => 'Electrician', 'status' => 'Employed']) as $electrician) { ?>
                            <option value="<?= $electrician['id'] ?>"><?= $electrician['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div> 
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="assign-modal" type="button" class="ml-auto text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Assign</button>
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
                swal({
                    text: "Are you sure you want to cancel this appointment?",
                    icon: "warning",
                    buttons: ["No", "Yes"],
                    dangerMode: true,
                }).then((cancel) => {
                    if (cancel) {
                        $.ajax({
                            url: "?admin_rq=appointment_status",
                            type: "POST",
                            data: {
                                id: id,
                                status: "Cancelled"
                            }, 
                            success: function(resp) {
                                var tableRow = $('tr[data-row-id="'+ id +'"]'); 
                                table.row(tableRow).remove().draw(); 
                                dialog('border-green-600 text-green-700', 'Appointment successfully cancelled.');
                            }
                        }); 
                    }
                });
            });

            $('.assign-btn').click(function() {
                let app_id = $(this).data('row-data');
                $('#app_id').val(app_id);
            }) 
        }
    }).columns.adjust().responsive.recalc();


    $('#assign-form').submit(function(e) {
        e.preventDefault(); 
        $.ajax({
            url: "?admin_rq=assign_employee",
            type: "POST",
            data: $(this).serialize(), 
            success: function(resp) { 
                window.location.reload(true);
            }
        });
    });
</script>