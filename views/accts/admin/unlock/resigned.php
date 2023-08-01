<?php include view('accts/admin/unlock', 'head.auth'); ?>
<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="assets/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/table.css">

<main id="main-content" class="relative h-full overflow-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <div class="grid grid-cols-2 mb-5 sm:grid-cols-6">
                <div class="col-span-4 gap-x-3 block md:flex">
                    <div class="flex items-center -ml-2 sm:ml-0">
                        <span class="mx-1 text-gray-500">Resigned from</span>
                        <div class="relative">
                            <input name="start" type="date" id="start" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" placeholder="Select date start">
                        </div>
                        <span class="mx-1 text-gray-500">to</span>
                        <div class="relative">
                            <input name="end" type="date" id="end" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" placeholder="Select date end">
                        </div>
                    </div>
                    <div class="flex gap-x-3 justify-left mt-3 sm:mt-0">
                        <div>
                            <button type="button" id="clear" class="btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                Clear
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-span-2 mx-0 md:ml-auto flex mt-3 sm:mt-0">   
                    <a href="?vs=_admin/supports" class="text-blue-500 hover:underline text-sm">
                        Back
                    </a> 
                </div> 
            </div>
            <div class="overflow-x-auto overflow-y-auto p-1" style=" max-height: 700px;">
                <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1" class="whitespace-nowrap text-xs uppercase text-center text-white">EMPLOYEE ID</th>
                            <th data-priority="3" class="whitespace-nowrap text-xs uppercase text-center text-white">FULLNAME</th>
                            <th data-priority="4" class="whitespace-nowrap text-xs uppercase text-center text-white">EMAIL</th>
                            <th data-priority="5" class="whitespace-nowrap text-xs uppercase text-center text-white">MOBILE NO.</th>
                            <th data-priority="6" class="whitespace-nowrap text-xs uppercase text-center text-white">GENDER</th>
                            <th data-priority="7" class="whitespace-nowrap text-xs uppercase text-center text-white">DOB</th>
                            <th data-priority="8" class="whitespace-nowrap text-xs uppercase text-center text-white">AGE</th>
                            <th data-priority="9" class="whitespace-nowrap text-xs uppercase text-center text-white">POB</th>
                            <th data-priority="12" class="whitespace-nowrap text-xs uppercase text-center text-white">POSITION</th>
                            <th data-priority="10" class="whitespace-nowrap text-xs uppercase text-center text-white">DATE STARTED</th>
                            <th data-priority="11" class="whitespace-nowrap text-xs uppercase text-center text-white">DATE RESIGNED</th>
                            <th data-priority="2" data-orderable="false" class="whitespace-nowrap text-xs uppercase text-center text-white">ACTION</th> 
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php foreach ($conn::select('supports', '*', ['status' => 'Resigned']) as $emp) { ?>
                            <tr data-row-id="<?= $emp['id'] ?>">
                                <td class="text-sm">EMP0<?= $emp['id'] ?></td>
                                <td class="text-sm whitespace-nowrap capitalize"><?= $emp['name'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= $emp['email'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= $emp['mobile_no'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= $emp['gender'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= date('M d Y', strtotime($emp['dateofbirth'])) ?></td>
                                <td class="text-sm"><?= $emp['age'] ?></td>
                                <td class="text-sm whitespace-nowrap capitalize"><?= $emp['placeofbirth'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= $emp['position'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= $emp['datestarted'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= date('Y-m-d', strtotime($emp['lastday'])) ?></td>
                                <td class="flex justify-center">
                                    <button type="button" data-row-data="<?= $emp['id'] ?>" title="Edit account" class="edit-btn btn inline-flex items-center px-2 py-[3px] mr-2 bg-white border border-gray-300 rounded-md font-bold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        COE
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

<div id="coe-acct-modal" hidden class="mt-10 md:mt-0">
    <div class="fixed inset-0 overflow-y-hidden px-4 py-6 sm:px-0 z-50 sm:max-w-5xl mx-auto">
        <div class="background fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto"> 
            <div>
                <div class="px-6 py-4 text-lg font-medium text-gray-900 mb-2">
                    Certificate of Employment
                </div>
                <div id="coe-field"></div>
            </div>
            <div class="md:mt-0 md:col-span-2">
                <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                    <button type="button" class="del-hide-modal btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Close
                    </button> 
                </div>
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
            $('.edit-btn').click(function() {
                $('#coe-acct-modal').show();   
                $.ajax({
                    url: '?admin_rq=set_employee_coe',
                    type: 'POST',
                    data: { id: $(this).data('row-data') }, 
                    success: function(resp) {  
                        $('#coe-field').html('<object data="?admin_rq=coe" type="application/pdf" async defer class="w-full" style="height: 450px;">');
                    }
                })
            });
        }
    }).columns.adjust().responsive.recalc();

    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var minDate = $('#start').val();
            var maxDate = $('#end').val();
            var date = data[10];
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

    $('#clear').click(() => {
        $('#start').val('');
        $('#end').val('');
        table.draw();
    });

    $('.del-hide-modal').click(() => {
        setTimeout(() => { 
            $('#coe-acct-modal').hide(); 
        }, 200)
    });

    $('.background').on('keydown click', (e) => { 
        $('#coe-acct-modal').hide(); 
    });
</script>