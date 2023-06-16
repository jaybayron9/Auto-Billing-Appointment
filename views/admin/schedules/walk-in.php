<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6" align="right" style="margin-bottom: 20px;">
                <a href="" class="btn green radius-xl" style="background-color: #016064;" data-toggle="modal" data-target="#add"><span>ADD WALK-IN APPOINTMENTS</span></a>&nbsp;
            </div>
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%; margin-top: 20px;">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap text-sm">NAME</th>
                                <th class="whitespace-nowrap text-sm">EMAIL</th>
                                <th class="whitespace-nowrap text-sm">PHONE</th>
                                <th class="whitespace-nowrap text-sm">ADDRESS</th>
                                <th class="whitespace-nowrap text-sm">REPAIR</th>
                                <th class="whitespace-nowrap text-sm">BRAND</th>
                                <th class="whitespace-nowrap text-sm">MODEL</th>
                                <th class="whitespace-nowrap text-sm">SCHEDULE</th>
                                <th class="whitespace-nowrap text-sm">TIME</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach( DBConn::select('walkin') as $client ) { ?>
                            <tr>
                                <td><?= $client['name'] ?></td>
                                <td><?= $client['email'] ?></td>
                                <td><?= $client['phone'] ?></td>
                                <td><?= $client['address'] ?></td>
                                <td><?= $client['repair'] ?></td>
                                <td><?= $client['brand'] ?></td>
                                <td><?= $client['model'] ?></td>
                                <td><?= $client['schedule'] ?></td>
                                <td>
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
                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Delete Walk-In Appointment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="archive-id" value="">
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="col-form-label">Name</label>
                            <input class="form-control" type="text" name="new_studentid" value="" style="background-color: white;">
                            <label class="col-form-label">Email</label>
                            <input class="form-control" type="text" name="new_firstname" value="" style="background-color: white;">
                            <label class="col-form-label">Address</label>
                            <input class="form-control" type="text" name="new_lastname" value="" style="background-color: white;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn red outline radius-xl" href="walkin.php?id=&del=delete" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div id="add" class="modal fade" role="dialog">
    <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Add Walk-In Appointment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="col-form-label">Name</label>
                            <input class="form-control" type="text" name="name" style="background-color: white;">

                            <label class="col-form-label">Email</label>
                            <input class="form-control" type="text" name="email" style="background-color: white;">

                            <label class="col-form-label">Address</label>
                            <input class="form-control" type="text" name="address" style="background-color: white;" required>

                            <label class="col-form-label">Repair</label>
                            <select class="form-control" name="repair" required style="color: black!important;" required>
                                <option value="" selected hidden>-- Please select --</option>
                                <?php foreach( DBConn::select('repair') as $item) { ?>
                                    <option value="<?= $item['ps'] ?>"><?= $item['ps'] ?></option>
                                <?php } ?>
                            </select>

                            <label class="col-form-label">Brand</label>
                            <input class="form-control" type="text" name="brand" style="background-color: white;" required>

                            <label class="col-form-label">Model</label>
                            <input class="form-control" type="text" name="model" style="background-color: white;" required>

                            <label class="col-form-label">Schedule</label>
                            <input class="form-control" type="datetime-local" name="schedule" style="background-color: white;" required>

                            <label class="col-form-label">Phone</label>
                            <input class="form-control number" type="text" name="num" maxlength="11" style="background-color: white;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn green radius-xl outline" name="add_user" value="Save Changes">
                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        var table = new DataTable('#table');

        $('.number').on('keydown keyup', function(event) {
            var input = $(this);
            var value = input.val();
            var msgphone = $('.msgphone');

            value = value.replace(/[^0-9\.]/g, '');

            var decimalCount = (value.match(/\./g) || []).length;
            if (decimalCount > 1) {
                value = value.replace(/\.+$/, '');
            }

            input.val(value);
        });
    });
</script>