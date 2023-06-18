<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>In-Active Employees</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%; margin-top: 20px;">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap text-xs text-center">EMPLOYEE ID</th>
                                <th class="whitespace-nowrap text-xs text-center">FULLNAME</th>
                                <th class="whitespace-nowrap text-xs text-center">EMAIL</th>
                                <th class="whitespace-nowrap text-xs text-center">MOBILE NO.</th>
                                <th class="whitespace-nowrap text-xs text-center">GENDER</th>
                                <th class="whitespace-nowrap text-xs text-center">DOB</th>
                                <th class="whitespace-nowrap text-xs text-center">AGE</th>
                                <th class="whitespace-nowrap text-xs text-center">POB</th>
                                <th class="whitespace-nowrap text-xs text-center">DATE STARTED</th>
                                <th class="whitespace-nowrap text-xs text-center">POSITION</th>
                                <th class="whitespace-nowrap text-xs text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( DBConn::select('employees') as $emp ) { ?>
                            <tr>
                                <td><?= $emp['employee_no'] ?></td>
                                <td><?= $emp['name'] ?></td>
                                <td><?= $emp['email'] ?></td>
                                <td><?= $emp['mobile_no'] ?></td>
                                <td><?= $emp['gender'] ?></td>
                                <td><?= $emp['dateofbirth'] ?></td>
                                <td><?= $emp['age'] ?></td>
                                <td><?= $emp['placeofbirth'] ?></td>
                                <td><?= $emp['datestarted'] ?></td>
                                <td><?= $emp['position'] ?></td>
                                <td>
                                    <center>
                                        <button class="btn blue">
                                            PRINT
                                        </button>
                                    </center>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <hr>
            </div>
        </div>
    </div>
</main>

<div id="edit-" class="modal fade" role="dialog">
    <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;COE</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="edit-id" value="">
                    <div class="row">
                        <div class="form-group col-12">
                            <h4>
                                <center>CERTIFICATE OF EMPLOYMENT </center>
                            </h4>
                            <br>
                            <p>
                                <center>
                                    This is to certify that was an employee of CJCE Auto parts from up to as .
                                </center>
                            </p>
                            <p>
                                <center>
                                    This certification is being issued by Mr./Ms. for whatever legal purpose it may serve.
                                </center>
                            </p>
                            <p>
                                <center>
                                    Given this th day of , 20 at 5 General Avenue Corner Road 20, Bahay Toro, Proj 8, Quezon City, 1106 Metro Manila
                                </center>
                            </p>
                            <p style="margin-left: 580px;">Admin</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn blue outline radius-xl">Print</button>
                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        let table = new DataTable('#table');
    });
</script>