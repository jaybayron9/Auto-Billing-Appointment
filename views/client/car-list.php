<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">

            </div>
            <div class="col-lg-6" align="right">
                <a href="" class="btn green radius-xl" style="background-color: #016064;" data-toggle="modal" data-target="#add-equipment"><span>ADD CAR</span></a>&nbsp;
            </div>
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%; margin-top: 20px;">
                        <thead>
                            <tr>
                                <!-- <th width="150">ACTIONS</th> -->
                                <th>Car ID</th>
                                <!-- <th>FULLNAME</th>
												<th>EMAIL</th> -->
                                <th>Car Name</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Plate Number</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <!-- <td>
													<center>
														<button data-toggle="modal" data-target="#edit-<?php echo $row['id']; ?>" class="btn blue" style="width: 50px; height: 37px;">
															<div data-toggle="tooltip" title="Edit">
																<i class="ti-marker-alt" style="font-size: 12px;"></i>
															</div>
														</button>&nbsp;
														
														<button data-toggle="modal" data-target="#archive-<?php echo $row['id']; ?>" class="btn red" style="width: 50px; height: 37px;">
															<div data-toggle="tooltip" title="Deactivate">
																<i class="ti-archive" style="font-size: 12px;"></i>
															</div>
														</button>
														
														
														
														
													</center>
												</td> -->
                                <td>201409767</td>
                                <td>Wiggy</td>
                                <td>Toyota</td>
                                <td>Hilux</td>
                                <td>ABO 3434</td>
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
                                                        <input class="form-control" type="text" name="new_number" value="" min="1" max="999" style="background-color: white;">

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
                            <div id="archive-" class="modal fade" role="dialog">
                                <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Delete Employee</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="archive-id" value="">
                                                <div class="row">
                                                    <div class="form-group col-12">

                                                        <label class="col-form-label">Student ID</label>
                                                        <input class="form-control" type="text" name="new_studentid" value="" style="background-color: white;">

                                                        <label class="col-form-label">FirstName</label>
                                                        <input class="form-control" type="text" name="new_firstname" value="" style="background-color: white;">

                                                        <label class="col-form-label">LastName</label>
                                                        <input class="form-control" type="text" name="new_lastname" value="" style="background-color: white;">

                                                        <label class="col-form-label">Email</label>
                                                        <input class="form-control" type="text" name="new_email" value="">

                                                        <label class="col-form-label">Position</label>
                                                        <input class="form-control" type="text" name="new_number" value="" min="1" max="999" style="background-color: white;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn red outline radius-xl" href="employees.php?id=&del=delete" onClick="return confirm('Are you sure you want to delete?')">Delete</a>

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
                                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;ADD CAR</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-12">



                                            <label class="col-form-label">Car Name</label>
                                            <input class="form-control" type="text" name="car" required>

                                            <label class="col-form-label">Brand</label>
                                            <input class="form-control" type="text" name="plate" required>

                                            <label class="col-form-label">Model</label>
                                            <input class="form-control" type="text" name="plate" required>

                                            <label class="col-form-label">Plate Number</label>
                                            <input class="form-control" type="text" name="plate" required>

                                            <label class="col-form-label">Type of Vehicle</label>
                                            <select class="form-control" name="pms" id="pms" required style="color: black!important;">
                                                <option value="">-- Please select --</option>

                                                <option value="5KM">SEDAN</option>
                                                <option value="10KM">SUV</option>
                                                <option value="30KM">AUV</option>
                                                <option value="40KM">PICK UP</option>


                                            </select>

                                            <label class="col-form-label">Vehicle Color</label>
                                            <input class="form-control" type="text" name="plate" required>

                                            <label class="col-form-label">Type of Fuel</label>
                                            <select class="form-control" name="pms" id="pms" required style="color: black!important;">
                                                <option value="">-- Please select --</option>

                                                <option value="5KM">Gas</option>
                                                <option value="10KM">Diesel</option>


                                            </select>



                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn green radius-xl outline" name="add_car" value="Add Car">
                                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <?php

                if (isset($_POST['add_car'])) {

                    $car = $_POST['car'];
                    $plate = $_POST['plate'];


                    $model->addCar($car, $plate);
                    echo "<script>window.open('list.php', '_self');</script>";
                }
                ?>

            </div>
        </div>
    </div>
</main>