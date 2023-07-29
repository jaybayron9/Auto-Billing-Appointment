<?php include view('admin', 'navbars') ?>
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
                                <th class="whitespace-nowrap text-xs text-center uppercase">NAME</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">EMAIL</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">PHONE</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">ADDRESS</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">REPAIR</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">BRAND</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">MODEL</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">SCHEDULE</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">TIME</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach( DBConn::select('walkin') as $client ) { ?>
                            <tr>
                                <td class="text-sm"><?= $client['name'] ?></td>
                                <td class="text-sm"><?= $client['email'] ?></td>
                                <td class="text-sm"><?= $client['phone'] ?></td>
                                <td class="text-sm"><?= $client['address'] ?></td>
                                <td class="text-sm"><?= $client['repair'] ?></td>
                                <td class="text-sm"><?= $client['brand'] ?></td>
                                <td class="text-sm"><?= $client['model'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= date('F d, Y h:i a', strtotime($client['schedule'])) ?></td>
                                <td class="flex text-sm">
                                    <button data-row-data="<?= $client['id'] ?>" class="delete-btn px-2 bg-red-500 hover:bg-red-700 text-white">
                                        DELETE
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
    <div class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <form id="walkin-form" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-bold text-white uppercase">&nbsp;Add Walk-In Appointment</h4>
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
                            <input class="form-control number" type="text" name="phone" maxlength="11" style="background-color: white;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green radius-xl outline">SUBMIT</button>
                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        var table = new DataTable('#table');

        $('#walkin-form').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '?rq=add_walkin',
                type: 'POST',
                data: $(this).serialize(),
                success: function(resp) {
                    alert(resp);
                    window.location.reload(true);
                }
            });
        });

        $('.delete-btn').click(function() {
            var id = $(this).data('row-data');

            if (confirm('Are you sure you want to delete this user?')) {
                $.ajax({
                    url: '?rq=delete_walkin',
                    type: 'POST',
                    data: {id: id},
                    success: function(resp) { window.location.reload(true); }
                });
            }
        })
    });
</script>