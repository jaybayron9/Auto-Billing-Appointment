<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Client Approved Appointments</li>
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
                                <th class="whitespace-nowrap uppercase text-xs text-center">Mechanic</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">Electrician</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">date created</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = "SELECT ap.id as app_id, ap.*, cl.*, cs.*
                            FROM appointments ap
                            JOIN clients cl ON cl.id = ap.client_id
                            JOIN cars cs ON cs.id = ap.car_id
                            WHERE ap.status = 'accepted'";

                            foreach(DBConn::DBQuery($query) as $appointment) {
                            ?>
                            <tr>
                                <td><?= $appointment['plate_no'] ?></td>
                                <td><?= $appointment['pms'] ?></td>
                                <td><?= $appointment['repair'] ?></td>
                                <td><?= date('F d, Y', strtotime($appointment['schedule'])) ?></td>
                                <td><?= date('h:i a', strtotime($appointment['schedule'])) ?></td>
                                <td>
                                    <?php
                                    foreach(DBConn::select('employees', '*', ['position' => 'Mechanic']) as $mechanic) {
                                        echo $mechanic == $appointment['emp_id'] ? $mechanic['name'] : 'None'; break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    foreach(DBConn::select('employees', '*', ['position' => 'Electrician']) as $electrician) {
                                        echo $electrician == $appointment['emp_id'] ? $electrician['name'] : 'None'; break;
                                    }
                                    ?>
                                </td>
                                <td><?= date('m/d/Y', strtotime($appointment['created_at'])) ?></td>
                                <td class="flex gap-x-2">
                                    <button data-row-data="<?= $appointment['app_id'] ?>" data-toggle="modal" data-target="#assign" class="text-xs uppercase bg-sky-700 hover:bg-sky-500 text-white px-2 py-1">
                                        ASSIGN
                                    </button>
                                    <button data-row-data="<?= $appointment['app_id'] ?>" data-toggle="modal" class="cancel-btn text-xs uppercase bg-red-700 hover:bg-red-500 text-white px-2 py-1">
                                        CANCEl
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

<div id="assign" class="modal fade" role="dialog">
    <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Assign Employee</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="edit-id" value="">
                    <div class="row">
                        <div class="form-group col-12">

                            <label class="col-form-label">Description</label>
                            <textarea class="form-control" name="description" style="background-color: white;"></textarea>

                            <label class="col-form-label">Mechanic</label>
                            <select class="form-control" name="mechanic" id="mechanic" required style="color: black!important;">
                                <option value="" selected hidden>-- Please select --</option>
                                <?php foreach(DBConn::select('employees', '*', ['position' => 'Mechanic']) as $mechanic) { ?>
                                <option value="<?= $mechanic['id'] ?>"><?= $mechanic['name'] ?></option>
                                <?php } ?>
                            </select>

                            <label class="col-form-label">Electrician</label>
                            <select class="form-control" name="electrician" id="electrician" required style="color: black!important;">
                                <option value="" selected hidden>-- Please select --</option>
                                <?php foreach(DBConn::select('employees', '*', ['position' => 'Electrician']) as $electrician) { ?>
                                <option value="<?= $electrician['id'] ?>"><?= $electrician['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn green radius-xl outline" name="assign" value="Assign Employee">
                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        var table = new DataTable('#table');

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