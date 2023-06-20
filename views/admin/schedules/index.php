<?php include view('admin', 'navbars') ?>
<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Client Pending Appointments</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap uppercase text-xs text-center">Plate no.</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">pms</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">repair</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">Date</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">Time</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">date created</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = "SELECT ap.id as app_id, ap.*, cs.* FROM appointments ap JOIN cars cs ON ap.car_id = cs.id WHERE status = 'pending'";
                            
                            foreach(DBConn::DBQuery($query) as $appointment) { 
                            ?>
                            <tr>
                                <td class="text-sm"><?= $appointment['plate_no'] ?></td>
                                <td class="text-sm"><?= $appointment['pms'] ?></td>
                                <td class="text-sm"><?= $appointment['repair'] ?></td>
                                <td class="text-sm"><?= date('F d, Y', strtotime($appointment['schedule'])) ?></td>
                                <td class="text-sm"><?= date('h:i a', strtotime($appointment['schedule'])) ?></td>
                                <td class="text-sm"><?= date('m/d/Y', strtotime($appointment['created_at'])) ?></td>
                                <td class="flex text-sm">
                                    <center>
                                        <button data-row-data="<?= $appointment['app_id'] ?>" data-toggle="modal" data-target="#message-" class="text-xs uppercase bg-sky-700 hover:bg-sky-500 text-white px-2 py-1">
                                            MSG
                                        </button>
                                        <button data-row-data="<?= $appointment['app_id'] ?>" data-toggle="modal" data-target="#archive-" class="accept-btn text-xs uppercase bg-green-700 hover:bg-green-500 text-white px-2 py-1">
                                            ACCEPT
                                        </button>
                                        <button data-row-data="<?= $appointment['app_id'] ?>" data-toggle="modal" class="cancel-btn text-xs uppercase bg-red-700 hover:bg-red-500 text-white px-2 py-1">
                                            CANCEl
                                        </button>
                                    </center>
                                </td>
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

<div id="message-" class="modal fade" role="dialog">
    <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Message</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="archive-id" value="">
                    <div class="row">
                        <div class="form-group col-12">
                            <textarea id="w3review" name="message" rows="4" cols="82" placeholder="Message to Customer..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn green radius-xl outline" name="send" value="Send Messages">

                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        var table = new DataTable('#table');

        $('.accept-btn').click(function() {
            var id = $(this).data('row-data');

            $.ajax({
                url: '?rq=accept_appointment',
                type: 'POST',
                data: {
                    id: id,
                },
                success: function(resp) {
                    alert(resp);
                    window.location.reload(true);
                }
            });
        });

        $('.cancel-btn').click(function() {
            var id = $(this).data('row-data');

            if (confirm('Are you sure you want to cancel?')) {
                $.ajax({
                    url: '?rq=cancel_appointment',
                    type: 'POST',
                    data: {
                        id: id,
                    },
                    success: function(resp) {
                        alert(resp);
                        window.location.reload(true);
                    }
                });
            }
        });
    });
</script>