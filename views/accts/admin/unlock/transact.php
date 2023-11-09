<?php include view('accts/admin/unlock', 'head.auth'); ?>
<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="assets/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/table.css">

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <div class="grid grid-cols-2 mb-5 sm:grid-cols-6">
                <div class="col-span-4 gap-x-3 block md:flex">
                    <div class="flex items-center -ml-2 sm:ml-0">
                        <span class="mx-1 text-gray-500">From</span>
                        <div class="relative">
                            <input name="start" type="date" id="start" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" placeholder="Select date start">
                        </div>
                        <span class="mx-1 text-gray-500">To</span>
                        <div class="relative">
                            <input name="end" type="date" id="end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" placeholder="Select date end">
                        </div>
                    </div>
                    <div class="flex gap-x-3 justify-left mt-3 sm:mt-0">
                        <div>
                            <button type="button" id="today" class="btn -mr-1 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                Today
                            </button>
                        </div>
                        <div>
                            <button type="button" id="clear" class="btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                Clear
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto overflow-y-auto p-1" style=" max-height: 700px;">
                <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1" class="whitespace-nowrap text-xs uppercase text-center text-white">transaction id</th>
                            <th data-priority="1" class="whitespace-nowrap text-xs uppercase text-center text-white">CLIENT NAME</th>
                            <th data-priority="3" class="whitespace-nowrap text-xs uppercase text-center text-white">EMAIL</th>
                            <th data-priority="4" class="whitespace-nowrap text-xs uppercase text-center text-white">PHONE</th>
                            <th data-priority="5" class="whitespace-nowrap text-xs uppercase text-center text-white">Note</th>
                            <th data-priority="6" class="whitespace-nowrap text-xs uppercase text-center text-white">TOTAL DUE</th>
                            <th data-priority="7" class="whitespace-nowrap text-xs uppercase text-center text-white">DATE CREATED</th>
                            <th data-priority="7" class="whitespace-nowrap text-xs uppercase text-center text-white">STATUS</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                            $query = "SELECT 
                                        c.plate_no,
                                        u.name,
                                        u.email,
                                        u.phone,
                                        a.id,
                                        a.note,
                                        b.total as total_due,
                                        a.created_at,
                                        a.payment_status
                                    FROM booking_summary b
                                    LEFT JOIN cars c ON b.car_id = c.id
                                    LEFT JOIN appointments a ON b.appointment_id = a.id
                                    LEFT JOIN users u ON c.user_id = u.id
                                    WHERE a.payment_status = 'Unpaid'
                                    ORDER BY a.created_at DESC";

                        foreach ($conn::DBQuery($query) as $data) {
                        ?>
                            <tr data-row-id="<?= $data['id'] ?>">
                                <td class="text-sm"><?= $data['plate_no'] ?></td>
                                <td class="text-sm"><?= $data['name'] ?></td>
                                <td class="text-sm"><?= $data['email'] ?></td>
                                <td class="text-sm"><?= $data['phone'] ?></td>
                                <td class="text-sm"><?= $data['description'] ?></td>
                                <td class="text-sm">&#8369; <?= number_format($data['total_due'],2) ?></td>
                                <td class="text-sm"><?= date('Y-m-d', strtotime($data['created_at'])) ?></td> 
                                <td class="text-sm">
                                    <span hidden><?= $data['id'] ?></span>
                                    <select data-row-data="<?= $data['id'] ?>" class="payment-stats">
                                        <option value="" selected hidden><?= $data['payment_status'] ?></option>
                                        <option value="Paid">Paid</option>
                                        <option value="Unpaid">Unpaid</option>
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


<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
    var table = $('#table').DataTable({
        responsive: true,
        "lengthMenu": [10, 25, 50, 100, 1000],
        ordering: false
        // "order": [[7, "desc"]]
    }).columns.adjust().responsive.recalc();

    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var minDate = $('#start').val();
            var maxDate = $('#end').val();
            var date = data[6];
            if (minDate === '' || maxDate === '') { return true; }
            if (date >= minDate && date <= maxDate) { return true; }
            return false;
        }
    );

    $('#start, #end').on('change', () => { table.draw(); });

    var today = new Date().toISOString().substr(0, 10);
    $('#today').click(() => {
        $('#start').val(today);
        $('#end').val(today);
        table.draw();
    });

    $('#clear').click(() => {
        $('#start').val('');
        $('#end').val('');
        table.draw();
    }); 

    $('.payment-stats').change(function() {
        var id = $(this).data('row-data');
        var status = $(this).val();

        $.ajax({
            url: '?admin_rq=payment_status',
            method: 'POST',
            data: {
                id: id,
                status: status
            },
            dataType: 'json',
            success: (res) => {
                if (status === 'Paid') {
                    var tableRow = $('tr[data-row-id="' + id + '"]');
                    table.row(tableRow).remove().draw();
                }
                dialog('border-green-600 text-green-700', res.msg); 
            }
        });
    });
</script>