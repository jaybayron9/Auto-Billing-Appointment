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
                             $query = "SELECT * FROM appointments ap JOIN cars cs ON ap.client_id = cs.user_id WHERE client_id = '{$_SESSION['client_auth']}' AND (status = 'pending' OR status = 'cancelled')";
                            
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
                                    <center>
                                        <button data-toggle="modal" data-target="#archive-" class="btn red" style="width: 50px; height: 37px;">
                                            <div data-toggle="tooltip" title="Deactivate">
                                                <i class="ti-archive" style="font-size: 12px;"></i>
                                            </div>
                                        </button>
                                    </center>
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

<div id="archive-" class="modal fade" role="dialog">
    <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Cancel Appointment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="archive-id" value="">
                    <p style="text-align: center;">Cancel the appointment?</p>
                </div>
                <div class="modal-footer">
                    <a class="btn red outline radius-xl" href="appointments.php?id=&del=delete" onClick="return confirm('Are you sure you want to cancel?')">Cancel</a>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        let table = new DataTable('#myTable');
    });
</script>