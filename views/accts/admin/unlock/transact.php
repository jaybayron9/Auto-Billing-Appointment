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
                <div class="col-span-2 mx-0 md:ml-auto flex mt-3 sm:mt-0">
                    <div>
                        <button type="button" data-modal-target="payment-modal" data-modal-toggle="payment-modal" class="btn inline-flex items-center px-3 py-[3px] mr-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="ml-2">Add</span>
                        </button>
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
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach ($conn::select('payments') as $data) {
                        ?>
                            <tr>
                                <td class="text-sm">TRA0<?= $data['id'] ?></td>
                                <td class="text-sm"><?= $data['name'] ?></td>
                                <td class="text-sm"><?= $data['email'] ?></td>
                                <td class="text-sm"><?= $data['phone'] ?></td>
                                <td class="text-sm"><?= $data['description'] ?></td>
                                <td class="text-sm"><?= $data['total_due'] ?></td>
                                <td class="text-sm"><?= date('Y-m-d', strtotime($data['created_at'])) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- Main modal -->
<div id="payment-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form id="payment-form" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Payment Slip
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="payment-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="px-6 pt-4 pb-6 space-y-3">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your car(s)</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your car(s)</label>
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                </div>
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your car(s)</label>
                    <textarea type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"></textarea>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="payment-modal" type="button" class="ml-auto text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
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
        columns: [{
                title: 'transact id'
            },
            {
                title: 'NAME'
            },
            {
                title: 'EMAIL'
            },
            {
                title: 'PHONE'
            },
            {
                title: 'Note'
            },
            {
                title: 'TOTAL DUE'
            },
            {
                title: 'DATE CREATED'
            },
        ],
        "drawCallback": () => {
            $('.edit-btn').click(function() {
                $('#edit-acct-modal').show();
                var id = $(this).data('row-data')
                $('#support-id').val(id);
                $.ajax({
                    url: '?rq=show_user',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#name').val(data.name);
                        $('#phone').val(data.phone);
                        $('#email').val(data.email);
                        $('#created').val(data.created);
                        $('#access').val(data.access);
                    }
                })
            });
        }
    }).columns.adjust().responsive.recalc();

    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var minDate = $('#start').val();
            var maxDate = $('#end').val();
            var date = data[6];
            if (minDate === '' || maxDate === '') {
                return true;
            }
            if (date >= minDate && date <= maxDate) {
                return true;
            }
            return false;
        }
    );

    $('#start, #end').on('change', () => {
        table.draw();
    });

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

    $('.del-hide-modal').click(() => {
        setTimeout(() => {
            $('#del-acct-modal').hide();
            $('#edit-acct-modal').hide();
            $('#add-acct-modal').hide();
            $('#del-accts-modal').hide();
        }, 200)
    });

    $('.background').on('keydown click', (e) => {
        $('#del-acct-modal').hide();
        $('#edit-acct-modal').hide();
        $('#add-acct-modal').hide();
        $('#del-accts-modal').hide();
    });
</script>

<script>

</script>