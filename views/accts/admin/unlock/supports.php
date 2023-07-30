<?php include view('accts/admin/unlock', 'head.auth'); ?> 
<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="assets/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/table.css">

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <div class="flex flex-row mb-2">
                <div>
                    <a href="?vs=_admin/resigned" class="text-red-500 hover:underline text-sm">Resigned Employee</a>
                </div>
                <div class="ml-auto">
                    <button type="button" id="open-add-modal" class="btn inline-flex items-center px-3 py-[6px] bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 ">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                        </svg>
                        <span class="ml-2">Add</span>
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto overflow-y-auto p-1" style=" max-height: 700px;">
                <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th data-priority="1" class="text-xs uppercase whitespace-nowrap text-white">Name</th>
                            <th data-priority="3" class="text-xs uppercase whitespace-nowrap text-white">Mobile no.</th>
                            <th data-priority="4" class="text-xs uppercase whitespace-nowrap text-white">Email</th>
                            <th data-priority="5" class="text-xs uppercase whitespace-nowrap text-white">Created At</th>
                            <th data-priority="1" data-orderable="false" class="text-xs uppercase whitespace-nowrap text-white"></th>
                            <th data-priority="2" data-orderable="false" class="text-xs uppercase whitespace-nowrap text-white">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php foreach ($conn::DBQuery("SELECT * FROM supports WHERE status != 'Resigned'") as $support) { ?>
                            <tr data-row-id="<?= $support['id'] ?>">
                                <td class="text-sm capitalize name"><?= $support['name'] ?></td>
                                <td class="text-sm phone"><?= $support['mobile_no'] ?></td>
                                <td class="text-sm email"><?= $support['email'] ?></td>
                                <td class="text-sm date"><?= date('Y-m-d', strtotime($support['created_at'])) ?></td>
                                <td class="text-sm capitalize text-center">
                                    <input type="checkbox" data-row-data="<?= $support['id'] ?>" id="" class="select rounded-md" value="<?= $support['id'] ?>">
                                </td>
                                <td class="text-sm text-center">
                                    <button type="button" data-row-data="<?= $support['id'] ?>" title="Delete account" class="resign-btn btn text-red-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <button type="button" data-row-data="<?= $support['id'] ?>" title="Edit account" class="edit-btn text-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                            <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                            <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                        </svg>
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

<div id="add-acct-modal" hidden class="mt-10 md:mt-0">
    <div class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50 sm:max-w-5xl mx-auto">
        <div class="background fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <form id="add-form" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900 mb-2">
                    Add Employee
                </div>
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="flex flex-col space-y-3">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="new-name" placeholder="Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                            <select name="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                                <option value="" selected hidden>-- Please select --</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                            <input type="date" name="dateofbirth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Place of Birth</label>
                            <input type="text" name="placebirth" maxlength="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="nationality" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Place of Birth</label>
                            <input type="text" name="nationality" maxlength="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Home Address</label>
                            <input type="text" name="address" maxlength="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                            <select name="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required style="color: black!important;">
                                <option value="" selected hidden>-- Please select --</option>
                                <option value="Mechanic">Mechanic</option>
                                <option value="Electrician">Electrician</option>
                            </select>
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Started</label>
                            <input type="date" name="datestarted" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                            <input type="text" name="mobile_no" id="new-phone" placeholder="Phone number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="new-email" placeholder="Email address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="new-password" placeholder="Enter password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
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

<div id="edit-acct-modal" hidden class="mt-10 md:mt-0">
    <div class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50 sm:max-w-5xl mx-auto">
        <div class="background fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <form id="edit-form" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto">
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
            <input type="hidden" name="emp_id" id="emp_id">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900 mb-2">
                    Add Employee
                </div>
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                    <div class="flex flex-col space-y-3">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" placeholder="Name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                            <select name="gender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                                <option value="" selected hidden>-- Please select --</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of Birth</label>
                            <input type="date" name="dateofbirth" id="dateofbirth" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Place of Birth</label>
                            <input type="text" name="placebirth" id="placebirth" maxlength="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="nationality" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Place of Birth</label>
                            <input type="text" name="nationality" id="nationality" maxlength="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Home Address</label>
                            <input type="text" name="address" id="address" maxlength="50" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Position</label>
                            <select name="position" id="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required style="color: black!important;">
                                <option value="" selected hidden>-- Please select --</option>
                                <option value="Mechanic">Mechanic</option>
                                <option value="Electrician">Electrician</option>
                            </select>
                        </div>
                        <div>
                            <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Started</label>
                            <input type="date" name="datestarted" id="datestarted" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" required>
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                            <input type="text" name="mobile_no" id="mobile_no" placeholder="Phone number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                        </div>
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

<div id="resign-acct-modal" hidden class="mt-10 md:mt-0">
    <div class="fixed inset-0 overflow-y-hidden px-4 py-6 sm:px-0 z-50 sm:max-w-2xl mx-auto">
        <div class="background fixed inset-0 transform transition-all">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <form id="resign-form" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-auto">
            <input type="hidden" name="id" id="acct-id">
            <div class="px-6 py-4">
                <div class="text-lg font-medium text-gray-900">
                    Delete Account
                </div>
                <div class="mt-4 text-sm text-gray-600">
                    Are you sure you want to resign this employee?
                </div>
            </div>
            <div class="md:mt-0 md:col-span-2">
                <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right">
                    <button type="button" class="del-hide-modal btn inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                        Cancel
                    </button>
                    <button type="submit" class="btn ml-3 rounded-md border border-transparent bg-red-600 px-4 py-2 text-xs font-semibold uppercase text-white transition duration-150 ease-in-out hover:bg-red-500 focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                        Resign Employee
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
                    Delete Account(s)
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
            $('.edit-btn').click(function() {
                $('#edit-acct-modal').show();
                var id = $(this).data('row-data')
                $('#support-id').val(id);
                $.ajax({
                    url: '?rq=show_support',
                    type: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#emp_id').val(data.id);
                        $('#name').val(data.name);
                        $('#gender').val(data.gender);
                        $('#dateofbirth').val(data.dateofbirth);
                        $('#placebirth').val(data.placeofbirth);
                        $('#nationality').val(data.nationality);
                        $('#position').val(data.position);
                        $('#datestarted').val(data.datestarted);
                        $('#address').val(data.address);
                        $('#mobile_no').val(data.mobile_no);
                        $('#email').val(data.email);
                    }
                })
            });

            $('#edit-form').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '?rq=update_support',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(resp) {
                        window.location.reload(true)
                        // var tableRow = $('tr[data-row-id="' + resp.id + '"]');

                        // tableRow.find('.name').text(resp.name);
                        // tableRow.find('.phone').text(resp.phone);
                        // tableRow.find('.email').text(resp.email);

                        // setTimeout(() => {
                        //     $('#edit-acct-modal').hide();
                        //     dialog('border-green-600 text-green-700', 'Updated Successfully');
                        // }, 200);
                    }
                });
            });

            $('.resign-btn').click(function() {
                var id = $(this).data('row-data');
                $('#resign-acct-modal').show();
                $('#acct-id').val(id);
            });

            $('#resign-form').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '?rq=resign_support_acct',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(resp) {
                        if (resp.status == 200) {
                            var tableRow = $('tr[data-row-id="' + resp.id + '"]');
                            table.row(tableRow).remove().draw();
                        }

                        setTimeout(() => {
                            $('#resign-acct-modal').hide();
                            dialog('border-green-600 text-green-700', 'Employee Resigned');
                        }, 200);
                    }
                });
            });
        }
    }).columns.adjust().responsive.recalc();

    $('#open-add-modal').click(() => {
        $('#add-acct-modal').show();
    });

    $('#add-form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '?rq=add_support',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(data) {
                setTimeout(() => {
                    window.location.reload(true);
                }, 200)
            }
        });
    });

    $('.del-hide-modal').click(() => {
        setTimeout(() => {
            $('#resign-acct-modal').hide();
            $('#edit-acct-modal').hide();
            $('#add-acct-modal').hide();
            $('#del-accts-modal').hide();
        }, 200)
    });

    $('.background').on('keydown click', (e) => {
        $('#resign-acct-modal').hide();
        $('#edit-acct-modal').hide();
        $('#add-acct-modal').hide();
        $('#del-accts-modal').hide();
    });

    $('#selectAll').click(function() {
        $('.select').not(this).prop('checked', this.checked);
    });

    $('#open-dels-modal').click(() => {
        $('#del-accts-modal').show();
    });

    <?php
    if (isset($_SESSION['alert'])) {
        echo "dialog('border-green-600 text-green-700', '" . $_SESSION['alert'] . "')";
    }
    ?>
</script>