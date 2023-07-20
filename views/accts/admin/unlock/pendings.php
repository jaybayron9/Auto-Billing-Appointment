<?php include view('accts/admin/unlock', 'head.auth'); ?>

<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="assets/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/table.css">

<div id="div-alert" hidden class="fixed z-30 top-3 right-4 bg-white border rounded py-2 px-5 shadow text-[14.5px] animate__animated">
    <p id="alert-msg"></p>
</div>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <div class="grid grid-cols-2 mb-5 sm:grid-cols-6">
                <div class="col-span-6 flex w-full">
                    <button type="button" id="open-dels-modal" class="ml-auto btn inline-flex items-center px-3 py-[6px] bg-red-600 border border-red-300 rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm  focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150 ">
                        <span class="ml-2">Decline</span>
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto overflow-y-auto" style="max-height: 700px;">
                <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap uppercase text-xs text-center text-white">Plate no.</th>
                            <th class="whitespace-nowrap uppercase text-xs text-center text-white">pms</th>
                            <th class="whitespace-nowrap uppercase text-xs text-center text-white">repair</th>
                            <th class="whitespace-nowrap uppercase text-xs text-center text-white">Date</th>
                            <th class="whitespace-nowrap uppercase text-xs text-center text-white">Time</th>
                            <th class="whitespace-nowrap uppercase text-xs text-center text-white">date created</th>
                            <th class="whitespace-nowrap uppercase text-xs text-center text-white">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $query = "SELECT ap.id as app_id, ap.*, cs.* FROM appointments ap JOIN cars cs ON ap.car_id = cs.id WHERE status = 'Pending'";

                        foreach ($conn::DBQuery($query) as $appointment) {
                        ?>
                            <tr data-row-id="<?= $support['id'] ?>">
                                <td class="text-sm"><?= $appointment['plate_no'] ?></td>
                                <td class="text-sm"><?= $appointment['pms'] ?></td>
                                <td class="text-sm"><?= $appointment['repair'] ?></td>
                                <td class="text-sm"><?= date('F d, Y', strtotime($appointment['schedule'])) ?></td>
                                <td class="text-sm"><?= date('h:i a', strtotime($appointment['schedule'])) ?></td>
                                <td class="text-sm"><?= date('m/d/Y', strtotime($appointment['created_at'])) ?></td>
                                <td class="flex text-sm justify-center items-center gap-x-3">
                                    <button data-row-data="<?= $appointment['client_id'] ?>" data-toggle="modal" data-target="#message-" class="msg text-xs uppercase bg-sky-700 hover:bg-sky-500 text-white px-2 py-1">
                                        MSG
                                    </button>
                                    <select name="" id="" data-row-data="<?= $appointment['app_id'] ?>" class="px-2 py-1">
                                        <option value="Pending"><?= $appointment['status'] ?></option>
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

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
    var table = $('#table').DataTable({
        responsive: true,
        "lengthMenu": [10, 25, 50, 100, 1000],
        columns: [{
                title: 'Plate no.'
            },
            {
                title: 'pms'
            },
            {
                title: 'Service'
            },
            {
                title: 'Date'
            },
            {
                title: 'Time'
            },
            {
                title: 'date created'
            },
            {
                title: 'Actions'
            },
        ],
        "drawCallback": () => {

        }
    }).columns.adjust().responsive.recalc();

    $('#selectAll').click(function() {
        $('.select').not(this).prop('checked', this.checked);
    });
</script>