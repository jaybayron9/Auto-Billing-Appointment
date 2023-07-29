<?php include view('admin', 'navbars') ?>
<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Employees</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6" align="right" style="margin-bottom: 20px;">
                <a href="" class="btn rounded-full shadow-md" style="background-color: #016064;" data-toggle="modal" data-target="#add-employee"><span>ADD NEW EMPLOYEE</span></a>&nbsp;
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%; margin-top: 50px;">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap uppercase text-xs text-center">EMPLOYEE ID</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">FULLNAME</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">EMAIL</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">MOBILE NO.</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">GENDER</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">DOB</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">AGE</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">POB</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">DATE STARTED</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">POSITION</th>
                                <th class="whitespace-nowrap uppercase text-xs text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (DBConn::select('employees', '*', ['status' => 'employed']) as $row) { ?>
                                <tr>
                                    <td class="text-sm">EMP0<?= $row['id'] ?></td>
                                    <td class="text-sm"><?= $row['name'] ?></td>
                                    <td class="text-sm"><?= $row['email'] ?></td>
                                    <td class="text-sm"><?= $row['mobile_no'] ?></td>
                                    <td class="text-sm"><?= $row['gender'] ?></td>
                                    <td class="text-sm whitespace-nowrap"><?= date('M d Y', strtotime($row['dateofbirth'])) ?></td>
                                    <td class="text-sm"><?= $row['age'] ?></td>
                                    <td class="text-sm"><?= $row['placeofbirth'] ?></td>
                                    <td class="text-sm"><?= $row['datestarted'] ?></td>
                                    <td class="text-sm"><?= $row['position'] ?></td>
                                    <td class="flex gap-x-2">
                                        <button data-row-data="<?= $row['id'] ?>" class="resign bg-red-500 hover:bg-red-700 text-white px-2 text-sm">
                                            RESIGN
                                        </button>
                                        <button data-toggle="modal" data-target="#edit" data-row-data="<?= $row['id'] ?>" class="edit-btn bg-green-500 hover:bg-green-700 text-white px-2 text-sm">
                                            EDIT
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

<div id="edit" class="modal fade" role="dialog">
    <div class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <form id="edit-form" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-bold text-white uppercase">&nbsp;Update Employee</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <input type="hidden" name="emp_id" id="emp-id">

                            <label class="col-form-label">Full Name</label>
                            <input class="form-control" type="text" name="new_name" id="new-name" value="" readonly style="background-color: white;">

                            <label class="col-form-label">Email Address</label>
                            <input class="form-control" type="email" name="new_email" id="new-email" value="" readonly style="background-color: white;">

                            <label class="col-form-label">Permanent Address</label>
                            <input class="form-control" type="text" name="new_address" id="new-address" value="" style="background-color: white;">

                            <label class="col-form-label">Passsword</label>
                            <input class="form-control" type="password" name="new_password" id="new-password" value="">

                            <label class="col-form-label">Mobile Number</label>
                            <input class="form-control number" type="text" name="new_number" id="new-number" value="" maxlength="11" style="background-color: white;">

                            <label class="col-form-label">Gender</label>
                            <select class="form-control" type="text" name="new_gender" id="new-gender">
                                <option value="" selected hidden>-- Please select --</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                            <label class="col-form-label">Position</label>
                            <select class="form-control" type="text" name="new_position" id="new-position" value="">
                                <option value="" selected hidden>-- Please select --</option>
                                <option value="Mechanic">Mechanic</option>
                                <option value="Electrician">Electrician</option>
                            </select>

                            <label class="col-form-label">Age</label>
                            <input class="form-control number" type="text" maxlength="3" name="new_age" id="new-age" value="">

                            <label class="col-form-label">Date of Birth</label>
                            <input class="form-control" type="date" name="new_birth" id="new-birth" value="">

                            <label class="col-form-label">Place of Birth</label>
                            <input class="form-control" type="text" name="place_birth" id="place-birth" value="">

                            <label class="col-form-label">Date Started</label>
                            <input class="form-control" type="date" name="new_started" id="new-started" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green radius-xl outline">Save Changes</button>
                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="add-employee" class="modal fade" role="dialog">
    <div class="m-b30" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <form id="add-employee-form" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-bold text-white">&nbsp;ADD EMPLOYEE</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="col-form-label">Full Name</label>
                            <input class="form-control" type="text" name="fullname" maxlength="50" required>

                            <label class="col-form-label">Age</label>
                            <input class="form-control number" type="number" name="age" maxlength="50" required>
                            
                            <label class="col-form-label">Date of Birth</label>
                            <input class="form-control" type="date" name="datebirth" required>

                            <label class="col-form-label">Place of Birth</label>
                            <input class="form-control" type="text" name="placebirth" maxlength="50" required>

                            <label class="col-form-label">Gender</label>
                            <select class="form-control" name="gender" required>
                                <option value="" selected hidden>-- Please select --</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>

                            <label class="col-form-label">Home Address</label>
                            <input class="form-control" type="text" name="address" maxlength="50" required>
                            
                            <label class="col-form-label">Position</label>
                            <select class="form-control" name="position" id="position" required style="color: black!important;">
                                <option value="" selected hidden>-- Please select --</option>
                                <option value="Mechanic">Mechanic</option>
                                <option value="Electrician">Electrician</option>
                            </select>
                            
                            <label class="col-form-label">Mobile Number</label>
                            <input class="form-control number" type="text" name="number" maxlength="11" required>
                            
                            <label class="col-form-label">Email Address</label>
                            <input class="form-control" type="email" name="email" maxlength="50" required>

                            <label class="col-form-label">Password</label>
                            <input class="form-control" type="password" name="password" maxlength="50" required>
                            
                            <label class="col-form-label">Date Started</label>
                            <input class="form-control" type="date" name="datestarted" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green radius-xl outline">Add Employee</button>
                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        let table = new DataTable('#table');

        $('#add-employee-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '?rq=add_employee',
                type: 'POST',
                data: $(this).serialize(),
                success: function(resp) {
                    alert(resp);
                    window.location.reload(true);
                }
            });
        });

        $('.edit-btn').click(function() {
            var id = $(this).data('row-data');

            $.ajax({
                url: '?rq=get_employee',
                type: 'POST',
                data: {
                    id: id,
                },
                dataType: 'json',
                success: function(data) {
                    $('#emp-id').val(id);
                    $('#new-name').val(data.name);
                    $('#new-email').val(data.email);
                    $('#new-address').val(data.address);
                    $('#new-password').val(data.password);
                    $('#new-number').val(data.mobile_no);
                    $('#new-gender').val(data.gender);
                    $('#new-position').val(data.position);
                    $('#new-age').val(data.age);
                    $('#new-birth').val(data.dateofbirth);
                    $('#place-birth').val(data.placeofbirth);
                    $('#new-started').val(data.datestarted);
                }
            });
        });

        $('#edit-form').submit(function(e) {
            e.preventDefault();
            
            $.ajax({
                url: '?rq=update_employee',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(resp) {
                    if (resp.status == 'success') {
                        alert(resp.msg);
                        window.location.reload(true);
                    } else {
                        alert(resp.msg);
                    }
                }
            });
        });

        $('.resign').click(function() {
            var id = $(this).data('row-data');

            if (confirm('Are you sure this employee really wants to resign?')) {
                $.ajax({
                    url: '?rq=resign_employee',
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