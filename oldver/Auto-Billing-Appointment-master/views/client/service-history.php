<?php include view('client', 'navbars') ?>
<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Service History</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap text-center text-xs uppercase">Plate no.</th>
                                <th class="whitespace-nowrap text-center text-xs uppercase">repair</th>
                                <th class="whitespace-nowrap text-center text-xs uppercase">Description</th>
                                <th class="whitespace-nowrap text-center text-xs uppercase">SCHEDULE</th>
                                <th class="whitespace-nowrap text-center text-xs uppercase">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM appointments ap JOIN cars cs ON ap.car_id = cs.id WHERE client_id = '{$_SESSION['client_auth']}' AND status != 'pending' AND status != 'cancelled'";

                            foreach(DBConn::DBQuery($query) as $appointment) { 
                            ?>
                            <tr>
                                <td class="text-sm"><?= $appointment['plate_no'] ?></td>
                                <td class="text-sm"><?= $appointment['repair'] ?></td>
                                <td class="text-sm"><?= $appointment['description'] ?></td>
                                <td class="text-sm"><?= date('F d, Y h:i a', strtotime($appointment['schedule'])) ?></td>
                                <td class="text-sm"><?= $appointment['price'] ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <hr>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    $(function() {
        var table = new DataTable('#table');
    });
</script>