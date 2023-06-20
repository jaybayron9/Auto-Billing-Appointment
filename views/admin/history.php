<?php include view('admin', 'navbars') ?>
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
                                <th class="whitespace-nowrap text-xs uppercase text-center">EMPLOYEE ID</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">FULLNAME</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">EMAIL</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">MOBILE NO.</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">GENDER</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">DOB</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">AGE</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">POB</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">DATE STARTED</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">POSITION</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ( DBConn::select('employees') as $emp ) { ?>
                            <tr>
                                <td class="text-sm">EMP0<?= $emp['id'] ?></td>
                                <td class="text-sm"><?= $emp['name'] ?></td>
                                <td class="text-sm"><?= $emp['email'] ?></td>
                                <td class="text-sm"><?= $emp['mobile_no'] ?></td>
                                <td class="text-sm"><?= $emp['gender'] ?></td>
                                <td class="text-sm whitespace-nowrap"><?= date('M d Y', strtotime($emp['dateofbirth'])) ?></td>
                                <td class="text-sm"><?= $emp['age'] ?></td>
                                <td class="text-sm"><?= $emp['placeofbirth'] ?></td>
                                <td class="text-sm"><?= $emp['datestarted'] ?></td>
                                <td class="text-sm"><?= $emp['position'] ?></td>
                                <td class="text-sm">
                                    <center>
                                        <a href="print/coe.php?emp=<?= $emp['name'] ?>" target="_blank" class="coe-btn bg-sky-500 hover:bg-sky-700 text-white px-2">
                                            PRINT
                                        </a>
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

<script type="text/javascript">
    $(function() {
        let table = new DataTable('#table');
    });
</script>