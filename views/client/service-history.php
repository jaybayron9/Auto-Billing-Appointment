<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Service History</li>
            </ul>
        </div>





        <div class="row">
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%">
                        <thead>
                            <tr>
                                <!-- <th width="150"><center>Action</center></th> -->
                                <th>Car ID</th>
                                <th>Model</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>


                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>

                            <div id="archive-<?php echo $row['id']; ?>" class="modal fade" role="dialog">
                                <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Cancel Appointment</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="archive-id" value="<?php echo $row['id']; ?>">

                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn red outline radius-xl" href="appointments.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to cancel?')">Cancel</a>

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


            </div>






        </div>
    </div>
</main>