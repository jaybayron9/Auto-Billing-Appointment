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
                                <th class="whitespace-nowrap uppercase text-xs text-center">description</th>
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
                                <td class="text-sm"><?= $appointment['plate_no'] ?></td>
                                <td class="text-sm"><?= $appointment['pms'] ?></td>
                                <td class="text-sm"><?= $appointment['repair'] ?></td>
                                <td class="whitespace-nowrap text-sm"><?= date('F d, Y', strtotime($appointment['schedule'])) ?></td>
                                <td class="whitespace-nowrap text-sm"><?= date('h:i a', strtotime($appointment['schedule'])) ?></td>
                                <?php 
                                $emp = explode(', ', $appointment['emp_id']);
                                ?>
                                <td class="text-sm">
                                    <?php
                                    foreach(DBConn::select('employees', '*', ['position' => 'Mechanic']) as $mechanic) {
                                        for ($i = 0; $i < count($emp); $i++) {
                                            if ($emp[$i] == $mechanic['id']) {
                                                echo $mechanic['name'];
                                            }                                        }
                                        break;
                                    }
                                    ?>
                                </td>
                                <td class="text-sm">
                                    <?php
                                    foreach(DBConn::select('employees', '*', ['position' => 'Electrician']) as $electrician) {
                                        for ($i = 0; $i < count($emp); $i++) {
                                            if ($emp[$i] == $electrician['id']) {
                                                echo $electrician['name'];
                                            }
                                        }
                                    }
                                    ?>
                                </td>
                                <td class="text-sm"><?= $appointment['description'] ?></td>
                                <td class="text-sm"><?= date('m/d/Y', strtotime($appointment['created_at'])) ?></td>
                                <td class="flex gap-x-2 text-sm">
                                    <button data-row-data="<?= $appointment['app_id'] ?>" data-toggle="modal" data-target="#assign" class="assign-btn text-xs uppercase bg-sky-700 hover:bg-sky-500 text-white px-2 py-1">
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
    <form id="assign-form" class="edit-profile m-b30">
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
                            <input type="hidden" name="app_id" id="app-id">

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

                            <label class="col-form-label">Description</label>
                            <textarea class="form-control" name="description" style="background-color: white;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green radius-xl outline">SUBMIT</button>
                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        var table = new DataTable('#table');

        $('.assign-btn').click(function() {
            var id = $(this).data('row-data');  
            $('#app-id').val(id);
        });

        $('#assign-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '?rq=assign_appointment',
                type: 'POST',
                data: $(this).serialize(),
                success: function(resp) {
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