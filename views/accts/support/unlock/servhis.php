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
                            <th data-priority="5" class="whitespace-nowrap text-xs text-center uppercase text-white">Description</th>
                            <th data-priority="6" class="whitespace-nowrap text-xs text-center uppercase text-white">Date</th>
                            <th data-priority="7" class="whitespace-nowrap text-xs text-center uppercase text-white">Time</th>
                            <th data-priority="2" data-orderable="false" class="whitespace-nowrap text-xs text-center uppercase text-white"></th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $query = "SELECT ap.id AS app_id, ap.*, cl.*, cs.*
                        FROM appointments ap
                        JOIN users cl ON cl.id = ap.client_id
                        JOIN cars cs ON cs.id = ap.car_id
                        WHERE ap.status = 'Done'";

                        foreach ($conn::DBQuery($query) as $app) {
                            $emp = explode(', ', $app['emp_id']);

                            for ($i = 0; $i < count($emp); $i++) {
                                if ($emp[$i] == $_SESSION['support_id']) {
                        ?>
                                    <tr>
                                        <td class="text-sm capitalize"><?= $app['name'] ?></td>
                                        <td class="text-sm"><?= $app['plate_no'] ?></td>
                                        <td class="text-sm capitalize"><?= $app['repair'] ?></td>
                                        <td class="text-sm capitalize"><?= $app['description'] ?></td>
                                        <td class="text-sm"><?= date('F d, Y', strtotime($app['schedule'])) ?></td>
                                        <td class="text-sm"><?= date('h:i a', strtotime($app['schedule'])) ?></td>
                                        <td class="whitespace-nowrap flex justify-center gap-x-3">
                                            <button type="button" class="shadow-inner shadow-zinc-400 hover:shadow-none transition duration-500 rounded-full p-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
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

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<script type="text/javascript">
    var table = $('#table').DataTable({
        responsive: true,
        "lengthMenu": [10, 25, 50, 100, 1000],
        "drawCallback": () => {

        }
    }).columns.adjust().responsive.recalc();
</script>