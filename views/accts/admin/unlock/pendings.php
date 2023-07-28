<?php include view('accts/admin/unlock', 'head.auth'); ?>

<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="assets/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/table.css">

<div id="div-alert" hidden class="fixed z-30 top-3 right-4 bg-white border rounded py-2 px-5 shadow text-[14.5px] animate animate__animated">
    <p id="alert-msg"></p>
</div>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <div class="overflow-x-auto overflow-y-auto p-1" style="max-height: 700px;">
                <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1" class="whitespace-nowrap uppercase text-xs text-center text-white">Plate no.</th> 
                            <th data-priority="4" class="whitespace-nowrap uppercase text-xs text-center text-white">Service</th>
                            <th data-priority="5" class="whitespace-nowrap uppercase text-xs text-center text-white">Date Schedule</th>
                            <th data-priority="6" class="whitespace-nowrap uppercase text-xs text-center text-white">Service Time</th>
                            <th data-priority="7" class="whitespace-nowrap uppercase text-xs text-center text-white">Date created</th>
                            <th data-priority="3" data-orderable="false" class="whitespace-nowrap uppercase text-xs text-center text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $query = "SELECT ap.id as app_id, ap.*, cs.*, sv.*, bh.*
                                FROM appointments ap 
                                    JOIN cars cs ON ap.car_id = cs.id
                                    JOIN services sv ON sv.id = ap.service_type_id
                                    JOIN bussiness_hours bh ON bh.id = ap.service_time_id
                                WHERE appointment_status = 'Pending'";

                        foreach ($conn::DBQuery($query) as $appointment) {
                        ?>
                            <tr data-row-id="<?= $support['id'] ?>">
                                <td class="text-sm"><?= $appointment['plate_no'] ?></td>
                                <td class="text-sm"><?= $appointment['category'] ?></td> 
                                <td class="text-sm"><?= date('F d, Y', strtotime($appointment['schedule_date'])) ?></td>
                                <td class="text-sm"><?= $appointment['available_time'] ?></td>
                                <td class="text-sm"><?= date('m/d/Y', strtotime($appointment['created_at'])) ?></td>
                                <td class="flex text-sm justify-center items-center gap-x-3">
                                    <button data-row-data="<?= $appointment['user_id'] ?>" data-modal-target="msg-modal" data-modal-toggle="msg-modal" class="msg-btn btn bg-white rounded-full p-1 shadow-md hover:shadow-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                        </svg>
                                    </button>
                                    <select data-row-data="<?= $appointment['app_id'] ?>" class="status-col px-2">
                                        <option value="Pending"><?= $appointment['appointment_status'] ?></option>
                                        <option value="Confirmed">Confirmed</option>
                                        <option value="Decline">Decline</option>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Main modal -->
<div id="msg-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form id="msg-form" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Message
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="msg-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-b-6">
                <input type="hidden" name="user_id" id="user_id">
                <textarea name="message" id="message" cols="40" rows="10" placeholder="Enter message here ... " class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"></textarea> 
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="msg-modal" type="button" class="ml-auto text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send</button>
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
            $('.status-col').change(function() {
                let status = $(this).val();
                let id = $(this).data('row-data');
                $.ajax({
                    url: '?admin_rq=appointment_status',
                    type: 'POST',
                    data: {
                        id: id,
                        status: status
                    },
                    dataType: 'json'
                });
            });

            $('.msg-btn').click(function() { 
                $('#user_id').val($(this).data('row-data'));
            });
        }
    }).columns.adjust().responsive.recalc(); 

    $('#msg-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: '?admin_rq=send_msg',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(resp) {
                console.log(resp)
            }
        })
    });
</script>