<?php include view('client', 'navbars') ?>
<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Repair Status</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Services</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                             $query = "SELECT * FROM appointments ap JOIN cars cs ON ap.car_id = cs.id WHERE client_id = '{$_SESSION['client_auth']}' AND (status = 'in progress' OR status = 'done')";

                            foreach (DBConn::DBQuery($query) as $progress) {
                            ?>
                            <tr>
                                <td class="capitalize text-center"><?= $progress['repair'] ?></td>
                                <td class="capitalize text-center">
                                    <span class="text-white rounded-md px-2 <?= $progress['status'] == 'in progress' ? 'bg-sky-500' : 'bg-green-500';  ?>">
                                        <?= $progress['status'] ?>
                                    </span>
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