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
            <div class="col-lg-6" align="right">
                <a href="" class="btn green radius-xl" style="background-color: #016064;" data-toggle="modal" data-target="#add-equipment"><span>ADD EMPLOYEE</span></a>&nbsp;
            </div>
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%; margin-top: 20px;">
                        <thead>
                            <tr>
                                <th width="150">ACTIONS</th>
                                <th>Employee ID</th>
                                <th>FULLNAME</th>
                                <th>EMAIL</th>
                                <th>POSITION</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>
                                    <center>
                                        <button data-toggle="modal" data-target="#edit-" class="btn blue" style="width: 50px; height: 37px;">
                                            <div data-toggle="tooltip" title="Edit">
                                                <i class="ti-marker-alt" style="font-size: 12px;"></i>
                                            </div>
                                        </button>&nbsp;


                                    </center>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                            <div id="edit-" class="modal fade" role="dialog">
                                <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Update Employee</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="edit-id" value="">
                                                <div class="row">
                                                    <div class="form-group col-12">

                                                        <label class="col-form-label">Employee No.</label>
                                                        <input class="form-control" type="text" name="new_emp" value="" style="background-color: white;">

                                                        <label class="col-form-label">Full Name</label>
                                                        <input class="form-control" type="text" name="new_name" value="" readonly style="background-color: white;">

                                                        <label class="col-form-label">Email Address</label>
                                                        <input class="form-control" type="text" name="new_email" value="" readonly style="background-color: white;">

                                                        <label class="col-form-label">Permanent Address</label>
                                                        <input class="form-control" type="text" name="new_address" value="" style="background-color: white;">

                                                        <label class="col-form-label">Passsword</label>
                                                        <input class="form-control" type="text" name="new_password" value="">

                                                        <label class="col-form-label">Mobile Number</label>
                                                        <input class="form-control" type="number" name="new_number" value="" min="1" max="999" style="background-color: white;">



                                                        <label class="col-form-label">Gender</label>
                                                        <input class="form-control" type="text" name="new_gender" value="">

                                                        <label class="col-form-label">Position</label>
                                                        <input class="form-control" type="text" name="new_position" value="">

                                                        <!-- <label class="col-form-label">Position</label>
																		<select class="form-control" name="new_position"  id="new_position" required style="color: black!important;">
																			<option  value="" ><?php echo $row['position']; ?></option>

																			<option value="Mechanic">Mechanic</option>
																			<option value="Electrician">Electrician</option>


																		</select> -->



                                                        <label class="col-form-label">Age</label>
                                                        <input class="form-control" type="text" name="new_age" value="">

                                                        <label class="col-form-label">Place of Birth</label>
                                                        <input class="form-control" type="text" name="new_birth" value="">

                                                        <label class="col-form-label">Date Started</label>
                                                        <input class="form-control" type="text" name="new_started" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" class="btn green radius-xl outline" name="edit" value="Save Changes">
                                                <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>




                        </tbody>
                    </table>
                </div>
                <hr>


                <div id="add-equipment" class="modal fade" role="dialog">
                    <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
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

                                            <label class="col-form-label">Permanent Address</label>
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
                                    <input type="submit" class="btn green radius-xl outline" name="add_user" value="Add Employee">
                                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <?php

                if (isset($_POST['add_user'])) {

                    $emp_no = $_POST['emp_no'];
                    $fullname = $_POST['fullname'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $nationality = $_POST['nationality'];
                    $gender = $_POST['gender'];
                    $datebirth = $_POST['datebirth'];
                    $position = $_POST['position'];
                    $age = $_POST['age'];
                    $placebirth = $_POST['placebirth'];
                    $datestarted = $_POST['datestarted'];
                    $number = $_POST['number'];
                    $access = 3;

                    $model->addEmployee($emp_no, $fullname, $email, $address, $password, $access, $number, $nationality, $gender, $position, $age, $placebirth, $datestarted);
                    echo "<script>window.open('employees.php', '_self');</script>";
                }
                ?>

            </div>
        </div>
    </div>
</main>
<div class="ttr-overlay"></div>