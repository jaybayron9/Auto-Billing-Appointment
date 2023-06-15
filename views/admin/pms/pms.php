<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>15KM MILEAGE</li>
            </ul>
        </div>



        <div class="row">
            <div class="col-lg-6">

            </div>
            <div class="col-lg-6" align="right">
                <a href="" class="btn green radius-xl" style="background-color: #016064;" data-toggle="modal" data-target="#add-equipment"><span>ADD</span></a>&nbsp;
            </div>
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%; margin-top: 20px;">
                        <thead>
                            <tr>
                                <th width="150">ACTION</th>
                                <th>PACKAGE SUMMARY</th>
                                <th>QTY</th>
                                <th>PRICE</th>
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
                                <td>Engine Oil</td>
                                <td>3</td>
                                <td>Php 2,300.00</td>
                            </tr>
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
                                <td>Oil Filter</td>
                                <td>1</td>
                                <td>Php 900.00</td>
                            </tr>
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
                                <td>Brake Pad</td>
                                <td>4</td>
                                <td>Php 3,000.00</td>
                            </tr>
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
                                <td>Air Filter</td>
                                <td>1</td>
                                <td>Php 900.00</td>
                            </tr>
                            <div id="edit-" class="modal fade" role="dialog">
                                <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Update PMS</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="edit-id" value="">
                                                <div class="row">
                                                    <div class="form-group col-12">

                                                        <label class="col-form-label">Product Title</label>
                                                        <input class="form-control" type="text" name="new_ps" value="" style="background-color: white;">

                                                        <label class="col-form-label">Quantity</label>
                                                        <input class="form-control" type="text" name="new_qty" value="" style="background-color: white;">

                                                        <label class="col-form-label">Price</label>
                                                        <input class="form-control" type="text" name="new_price" value="" style="background-color: white;">


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
                                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;ADD PMS</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="form-group col-12">

                                            <label class="col-form-label">Product Title</label>
                                            <input class="form-control" type="text" name="title" required>

                                            <label class="col-form-label">Price</label>
                                            <input class="form-control" type="text" name="price" required>

                                            <label class="col-form-label">Quantity</label>
                                            <input class="form-control" type="text" name="qty" required>



                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn green radius-xl outline" name="add_user" value="Add">
                                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
</main>