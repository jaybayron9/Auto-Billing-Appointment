<?php include view('accts/support/unlock', 'head.auth'); ?>

<?php include view('accts/support/unlock/navbars', 'topbar') ?>
<?php include view('accts/support/unlock/navbars', 'sidebar') ?>

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
                            <th data-priority="1" class="whitespace-nowrap text-xs text-center uppercase text-white">Name</th>
                            <th data-priority="3" class="whitespace-nowrap text-xs text-center uppercase text-white">Plate no.</th>
                            <th data-priority="4" class="whitespace-nowrap text-xs text-center uppercase text-white">Service</th> 
                            <th data-priority="5" class="whitespace-nowrap text-xs text-center uppercase text-white">Scheduled Date</th>
                            <th data-priority="6" class="whitespace-nowrap text-xs text-center uppercase text-white">Time</th>
                            <th data-priority="2" data-orderable="false" class="whitespace-nowrap text-xs text-center uppercase text-white"></th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $query = "SELECT ap.id AS app_id, ap.*, cl.*, cs.*, sv.*, bh.*
                        FROM appointments ap
                        JOIN users cl ON cl.id = ap.user_id
                        JOIN cars cs ON cs.id = ap.car_id
                        JOIN services sv ON sv.id = ap.service_type_id
                        JOIN bussiness_hours bh ON bh.id = ap.service_time_id
                        WHERE ap.appointment_status = 'Done' OR ap.appointment_status = 'Underway'";

                        foreach ($conn::DBQuery($query) as $app) {
                            $emp = explode(', ', $app['assigned_employee_id']);

                            for ($i = 0; $i < count($emp); $i++) {
                                if ($emp[$i] == $_SESSION['support_id']) {
                        ?>
                                    <tr>
                                        <td class="text-sm capitalize"><?= $app['name'] ?></td>
                                        <td class="text-sm"><?= $app['plate_no'] ?></td>
                                        <td class="text-sm capitalize"><?= $app['category'] ?></td> 
                                        <td class="text-sm"><?= date('F d, Y', strtotime($app['schedule_date'])) ?></td>
                                        <td class="text-sm"><?= $app['available_time'] ?></td>
                                        <td class="flex justify-center">
                                            <button data-row-data="<?= $app['app_id'] ?>" data-modal-target="view-summary" data-modal-toggle="view-summary" class="book-summary-btn btn shadow-inner shadow-zinc-400 rounded-full p-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                        <?php }
                            }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<div id="view-summary" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white italic">
                        Booking summary
                    </h3>
                    <div class="text-center">
                        <span class="text-sm font-base">Customer Details</span>
                    </div>
                </div>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="view-summary">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div id="preview-pdf"></div>
            <div class="p-6 space-y-6" id="book-summary">
                <div class="grid grid-cols-3 text-center border-b-2 border-gray-400 pb-2">
                    <h1 class="text-xl font-semibold">Customer details</h1>
                    <h1 class="text-xl font-semibold">Vehicle detail </h1>
                    <h1 class="text-xl font-semibold">Schedule</h1>
                </div>
                <div class="grid grid-cols-3 border-b-2 border-gray-400 pb-2">
                    <div class="-mt-4 ml-6">
                        <p class="whitespace-nowrap font-semibold">Name : <span class="font-normal" id="name"></span></p>
                        <p class="whitespace-nowrap font-semibold">Email : <span class="font-normal" id="email"></span></p>
                        <p class="whitespace-nowrap font-semibold">Contact : <span class="font-normal" id="contact-no"></span></p>
                    </div>
                    <div class="-mt-4 ml-6">
                        <p class="whitespace-nowrap font-semibold">Brand : <span class="font-normal" id="brand"></span></p>
                        <p class="whitespace-nowrap font-semibold">Model : <span class="font-normal" id="model"></span></p> 
                    </div>
                    <div class="-mt-4 text-center">
                        <p id="schedule-date"> November 6, 2022, 2:00pm</p>
                        <p id="service-time"> November 6, 2022, 2:00pm</p>
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
                        <tbody id="products"></tbody>
                        <tfoot>
                            <tr>
                                <td>TOTAL</td>
                                <td  class="text-center" id="quantity"></td>
                                <td class="text-center" id="total"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div> 
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="view-summary" type="button" class="ml-auto text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                <button type="button" id="preview-print-btn" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Preview Print</button>
            </div>
        </div>
    </div>
</div>  

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
    var table = $('#table').DataTable({
        responsive: true,
        "lengthMenu": [10, 25, 50, 100, 1000],
        "drawCallback": () => {
            $('.book-summary-btn').click(function() {
                $('#preview-pdf').html(''); 
                $('#book-summary').show();
                $('#preview-print-btn').show();
                var appointment_id = $(this).data('row-data'); 
                $.ajax({
                    type: "POST",
                    url: "?support_rq=show_book_summary",
                    data: {appointment_id: appointment_id},
                    dataType: "json",
                    success: function (resp) {  
                        var name = $('#name').text(resp[0].name);
                        var email = $('#email').text(resp[0].email);
                        var phone = $('#contact-no').text(resp[0].phone);
                        var brand = $('#brand').text(resp[0].car_brand);
                        var model = $('#model').text(resp[0].car_model);
                        var date = $('#schedule-date').text(resp[0].schedule_date);
                        var time = $('#service-time').text(resp[0].available_time);
                        var quantity = $('#quantity').text(resp[0].quantity);
                        var total = $('#total').text(resp[0].total); 
                        var products = resp[0].products.split('~');
                        var price = resp[0].price.split('~');
                        $('#products').html(''); 
                        var data = [];
                        for (var i = 0; i < products.length - 1; i++) {
                            var html = `<tr class="border-b-2 border-gray-300">`;
                                html += `<td>${products[i]}</td>`;
                                html += `<td class="text-center">1</td>`;
                            html += `<td class="text-right">${price[i]}</td>`; 
                            $('#products').append(html);   
                            data.push({
                                product: products[i],
                                price: price[i]
                            })
                        }   
                        $.ajax({ type: "POST", url: "?support_rq=set_session_print", data: { 
                                app_id: resp[0].app_id,
                                user_id: resp[0].user_id,
                                car_id: resp[0].car_id,
                                data: data,
                                total_items: resp[0].quantity,
                                total: resp[0].total,
                            }
                        }); 
                    }
                });
            });

            $('#preview-print-btn').click(function() {
                $('#preview-pdf').html('<object data="?support_rq=receipt" type="application/pdf" async defer class="w-full h-96">');
                $(this).hide();
                $('#book-summary').hide();
            });
        }
    }).columns.adjust().responsive.recalc();
</script>