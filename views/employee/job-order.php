<?php include view('employee', 'navbars') ?>
<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Your Job Order</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Name</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Plate no.</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Repair</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Description</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Schedule</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Status (Action)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = "
                                SELECT ap.id as app_id, ap.*, cl.*, cs.*
                                FROM appointments ap
                                JOIN clients cl 
                                    ON cl.id = ap.client_id
                                JOIN cars cs 
                                    ON cs.id = ap.car_id
                                WHERE ap.status != 'pending' OR ap.status != 'accepted'
                            ";

                            foreach (DBConn::DBQuery($query) as $app) {
                                $emp = explode(', ', $app['emp_id']);

                                for ($i = 0; $i < count($emp); $i++) {
                                    if ($emp[$i] == $_SESSION['employee_auth']) {
                                ?>
                                <tr>
                                    <td class="text-sm"><?= $app['name'] ?></td>
                                    <td class="text-sm"><?= $app['plate_no'] ?></td>
                                    <td class="text-sm"><?= $app['repair'] ?></td>
                                    <td class="text-sm"><?= $app['description'] ?></td>
                                    <td class="text-sm"><?= $app['schedule'] ?></td>
                                    <td class="whitespace-nowrap flex gap-x-3">
                                        <select name="status" data-row-data="<?= $app['app_id'] ?>" class="status">
                                            <option value="" selected hidden><?= $app['status'] ?></option>
                                            <option value="in progress">In progess...</option>
                                            <option value="done">Done</option>
                                            <option value="cancelled">Cancel</option>
                                        </select>
                                    </td>
                                </tr>
                            <?php }}} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    $(function() {
        var table = new DataTable('#table');

        $('.status').change(function() {
            var id = $(this).data('row-data');
            $.ajax({
                url: '?rq=employee_update_status',
                type: 'POST',
                data: {
                    id: id,
                    status: $(this).val(),
                },
                success: function(resp) {
                    alert(resp);
                    window.location.reload(true);
                }
            });
        });
    });
</script>