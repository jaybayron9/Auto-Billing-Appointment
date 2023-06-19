<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Your Appointments</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="myTable" class="table hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap uppercase text-xs text-center">Plate no.</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">pms</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">repair</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">date</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">Time</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">status</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">date created</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = "SELECT ap.id as app_id, ap.*, cs.* FROM appointments ap JOIN cars cs ON ap.car_id = cs.id WHERE client_id = '{$_SESSION['client_auth']}' AND (status = 'pending' OR status = 'cancelled')";
                            
                            foreach(DBConn::DBQuery($query) as $appointment) { 
                            ?>
                            <tr>
                                <td><?= $appointment['plate_no'] ?></td>
                                <td><?= $appointment['pms'] ?></td>
                                <td><?= $appointment['repair'] ?></td>
                                <td><?= date('F d, Y', strtotime($appointment['schedule'])) ?></td>
                                <td><?= date('h:i a', strtotime($appointment['schedule'])) ?></td>
                                <td><?= $appointment['status'] ?></td>
                                <td><?= $appointment['created_at'] ?></td>
                                <td class="flex gap-x-2 text-center">
                                    <button class="cancel-btn btn red" data-row-data="<?= $appointment['app_id'] ?>" style="width: 50px; height: 37px;">
                                        <i class="ti-archive" style="font-size: 12px;"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    $(function() {
        let table = new DataTable('#myTable');

        $('.cancel-btn').click(function() {
            var id = $(this).data('row-data');

            if (confirm('Are you sure you want to cancel?')) {
                $.ajax({
                    url: '?rq=client_cancel_appointment',
                    type: 'POST',
                    data: {id: id},
                    success: function(resp) {
                        alert(resp);
                        window.location.reload(true);
                    }
                });
            }
        });
    });
</script>