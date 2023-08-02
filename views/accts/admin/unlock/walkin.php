<?php include view('accts/admin/unlock', 'head.auth'); ?>
<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="assets/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/table.css"> 

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <div class="col-span-2 mx-0 md:ml-auto flex mt-3 sm:mt-0 mb-2">
                <div class="ml-auto">
                    <button type="button" data-modal-target="create-modal" data-modal-toggle="create-modal" class="btn inline-flex items-center px-3 py-[6px] mr-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                        </svg>
                        <span class="ml-2">Add Walk-in</span>
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto overflow-y-auto p-1" style="max-height: 700px;">
                <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1" class="whitespace-nowrap text-xs text-center uppercase text-white">NAME</th>
                            <th data-priority="3" class="whitespace-nowrap text-xs text-center uppercase text-white">EMAIL</th>
                            <th data-priority="4" class="whitespace-nowrap text-xs text-center uppercase text-white">PHONE</th>
                            <th data-priority="5" class="whitespace-nowrap text-xs text-center uppercase text-white">ADDRESS</th>
                            <th data-priority="6" class="whitespace-nowrap text-xs text-center uppercase text-white">REPAIR</th>
                            <th data-priority="7" class="whitespace-nowrap text-xs text-center uppercase text-white">BRAND</th>
                            <th data-priority="8" class="whitespace-nowrap text-xs text-center uppercas text-white">MODEL</th>
                            <th data-priority="9" class="whitespace-nowrap text-xs text-center uppercase text-white">SCHEDULE</th>
                            <th data-priority="10" class="whitespace-nowrap text-xs text-center uppercase text-white">TIME</th>
                            <th data-priority="11" class="whitespace-nowrap text-xs text-center uppercase text-white">Payment Status</th>
                            <th data-priority="2" data-orderable="false" class="whitespace-nowrap text-xs text-center uppercase text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php 
                        $query = "SELECT wk.id as app_id, wk.*, sv.*, bh.*
                                    FROM walkin wk 
                                    JOIN services sv ON sv.id = wk.service_id
                                    JOIN bussiness_hours bh ON bh.id = wk.service_time_id";
                        foreach ($conn::DBQuery($query) as $walkin) { 
                        ?>
                            <tr data-row-id="<?= $walkin['app_id'] ?>">
                                <td class="text-sm whitespace-nowrap"><?= $walkin['name'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= $walkin['email'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= $walkin['phone'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= $walkin['address'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= $walkin['category'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= $walkin['brand'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= $walkin['model'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= date('M d, Y', strtotime($walkin['schedule_date'])) ?></td>
                                <td class="text-sm whitespace-nowrap"><?= $walkin['available_time'] ?></td>
                                <td class="text-sm text-center">
                                    <span class="text-white rounded-md px-2 <?= $walkin['payment_status'] == 'Unpaid' ? 'bg-gray-500' : 'bg-green-500';  ?>">
                                        <?= $walkin['payment_status'] ?>
                                    </span> 
                                </td>
                                <td class="flex text-sm">
                                    <button data-row-data="<?= $walkin['app_id'] ?>" class="cancel-btn bg-red-500 hover:bg-red-700 text-white px-2 rounded shadow-md">
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
 
<div id="create-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full"> 
        <form id="create-form" class="relative bg-white rounded-lg shadow dark:bg-gray-700"> 
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add Walk-in
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="create-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div> 
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5">
                    <div class="sm:cols-span-1 flex flex-col">
                        <div class="mb-3">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div class="mb-3">
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="text" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div class="mb-3">
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                            <input type="text" name="phone" maxlength="11" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div class="mb-2">
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                            <input type="text" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div class="mb-2">
                            <label for="plate_no" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Plate Number</label>
                            <input type="text" name="plate_no" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                    </div>
                    <div class="sm:cols-span-1 flex flex-col">
                        <div class="mb-3">
                            <label for="service" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service</label>
                            <select name="service" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                <option value="" hidden></option>
                                <option value="" disabled>-- Select a service --</option>
                                <?php foreach ($conn::select('services') as $item) { ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['category'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                            <input type="text" name="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                            <input type="text" name="model" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Schedule</label>
                            <input type="date" name="schedule" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div class="mb-3">
                            <label for="service_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Time</label>
                            <select name="time" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                <option value="" hidden></option>
                                <option value="" disabled>-- Select a time --</option>
                                <?php
                                foreach ($conn::select('bussiness_hours') as $buss) {
                                    echo "<option value='{$buss['id']}'>{$buss['available_time']}</option>";
                                }
                                ?>
                            </select>
                        </div> 
                    </div>
                </div>
            </div> 
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="create-modal" type="button" class="ml-auto text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
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
                }) .then((cancel) => {
                    if (cancel) {
                        $.ajax({
                            url: "?admin_rq=cancel_walkin",
                            type: "POST",
                            data: {
                                id: id,
                                status: "Cancelled"
                            },
                            success: function(resp) { 
                                var tableRow = $('tr[data-row-id="'+ id +'"]'); 
                                table.row(tableRow).remove().draw();
                                dialog('border-green-600 text-green-700', 'Appointment status successfully updated.');
                            }
                        });
                    }
                }) 
            });
        }
    }).columns.adjust().responsive.recalc();

    $('#create-form').submit(function(e) {
        e.preventDefault(); 
        $.ajax({
            url: "?admin_rq=create_walkin",
            type: "POST",
            data: $(this).serialize(),
            success: function(resp) { 
                window.location.reload(true);
            }
        });
    })
</script>