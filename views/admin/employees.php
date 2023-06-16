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
                <a href="" class="btn green radius-xl" style="background-color: #016064;" data-toggle="modal" data-target="#add-employee"><span>ADD EMPLOYEE</span></a>&nbsp;
            </div>
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%; margin-top: 50px;">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap text-sm">EMPLOYEE ID</th>
                                <th class="whitespace-nowrap text-sm">FULLNAME</th>
                                <th class="whitespace-nowrap text-sm">EMAIL</th>
                                <th class="whitespace-nowrap text-sm">MOBILE NO.</th>
                                <th class="whitespace-nowrap text-sm">GENDER</th>
                                <th class="whitespace-nowrap text-sm">DOB</th>
                                <th class="whitespace-nowrap text-sm">POB</th>
                                <th class="whitespace-nowrap text-sm">DATE STARTED</th>
                                <th class="whitespace-nowrap text-sm">POSITION</th>
                                <th class="whitespace-nowrap text-sm">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach(DBConn::select('employee_info', '*', ['status' => 'employed']) as $row) { ?>
                            <tr>
                                <td><?= $row['employee_no'] ?></td>
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['mobile_no'] ?></td>
                                <td><?= $row['gender'] ?></td>
                                <td><?= $row['dateofbirth'] ?></td>
                                <td><?= $row['placeofbirth'] ?></td>
                                <td><?= $row['datestarted'] ?></td>
                                <td><?= $row['position'] ?></td>
                                <td class="flex gap-x-2">
                                    <button class="btn red resign" data-row-data="<?= $row['id'] ?>">
                                        RESIGN
                                    </button>
                                    <button data-toggle="modal" data-target="#edit" data-row-data="<?= $row['id'] ?>" class="edit-btn btn blue">
                                        EDIT
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div id="edit" class="modal fade" role="dialog">
                    <div class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
                        <div class="modal-dialog modal-lg">
                            <form id="edit-form" class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Update Employee</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <input type="hidden" name="emp_id" id="emp-id">

                                            <label class="col-form-label">Employee No.</label>
                                            <input class="form-control" type="text" name="new_emp_no" id="new-emp-no" value="" style="background-color: white;">

                                            <label class="col-form-label">Full Name</label>
                                            <input class="form-control" type="text" name="new_name" id="new-name" value="" readonly style="background-color: white;">

                                            <label class="col-form-label">Email Address</label>
                                            <input class="form-control" type="text" name="new_email" id="new-email" value="" readonly style="background-color: white;">

                                            <label class="col-form-label">Permanent Address</label>
                                            <input class="form-control" type="text" name="new_address" id="new-address" value="" style="background-color: white;">

                                            <label class="col-form-label">Passsword</label>
                                            <input class="form-control" type="password" name="new_password" id="new-password" value="">

                                            <label class="col-form-label">Mobile Number</label>
                                            <input class="form-control" type="number" name="new_number" id="new-number" value="" min="1" max="999" style="background-color: white;">

                                            <label class="col-form-label">Gender</label>
                                            <input class="form-control" type="text" name="new_gender" id="new-gender" value="">

                                            <label class="col-form-label">Position</label>
                                            <input class="form-control" type="text" name="new_position" id="new-position" value="">

                                            <label class="col-form-label">Age</label>
                                            <input class="form-control" type="text" name="new_age" id="new-age" value="">

                                            <label class="col-form-label">Place of Birth</label>
                                            <input class="form-control" type="text" name="new_birth" id="new-birth" value="">

                                            <label class="col-form-label">Date Started</label>
                                            <input class="form-control" type="text" name="new_started" id="new-started" value="">
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
                                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;ADD EMPLOYEE</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-12">

                                            <label class="col-form-label">Employee No.</label>
                                            <input class="form-control" type="text" name="emp_no" required>

                                            <label class="col-form-label">Full Name</label>
                                            <input class="form-control" type="text" name="fullname" required>

                                            <label class="col-form-label">Home Address</label>
                                            <input class="form-control" type="text" name="address" required>

                                            <label class="col-form-label">Password</label>
                                            <input class="form-control" type="text" name="password" required>

                                            <label class="col-form-label">Email Address</label>
                                            <input class="form-control" type="email" name="email" required>

                                            <label class="col-form-label">Gender</label>
                                            <input class="form-control" type="text" name="gender" required>

                                            <label class="col-form-label">Date of Birth</label>
                                            <input class="form-control" type="date" name="datebirth" required>

                                            <label class="col-form-label">Position</label>
                                            <select class="form-control" name="position" id="position" required style="color: black!important;">
                                                <option value="">-- Please select --</option>
                                                <option value="Mechanic">Mechanic</option>
                                                <option value="Electrician">Electrician</option>
                                            </select>

                                            <label class="col-form-label">Age</label>
                                            <input class="form-control" type="number" name="age" required>

                                            <label class="col-form-label">Place of Birth</label>
                                            <input class="form-control" type="text" name="placebirth" required>

                                            <label class="col-form-label">Date Started</label>
                                            <input class="form-control" type="date" name="datestarted" required>

                                            <label class="col-form-label">Mobile Number</label>
                                            <input class="form-control" type="text" name="number" required>
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
            </div>
        </div>
    </div>
</main>

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
                    $('#new-emp-no').val(data.employee_no);
                    $('#new-name').val(data.name);
                    $('#new-email').val(data.email);
                    $('#new-address').val(data.address);
                    $('#new-password').val(data.password);
                    $('#new-number').val(data.mobile_no);
                    $('#new-gender').val(data.gender);
                    $('#new-position').val(data.position);
                    $('#new-age').val(data.age);
                    $('#new-birth').val(data.dateofbirth);
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
                    if(resp.status == 'success') {
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