<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Client Pending Appointments</li>
            </ul>
        </div> 
        
        



        <div class="row">
        <div class="col-lg-12 m-b30">
                        <div class="table-responsive">
                            <table id="table" class="table hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="200"><center>Action</center></th>
                                        <th>Car ID</th>
                                        <th>Brand</th>
                                        <th>Model</th>
                                        <th>Plate Number</th>
                                        <th>Services</th>
                                        <th>Schedule</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                    <tr>
                                        <td>
                                            <center>

                                            <button data-toggle="modal" data-target="#message-"  class="btn red" style="width: 50px; height: 37px;">
                                                    <div data-toggle="tooltip" title="Deactivate">
                                                        <i class="ti-book" style="font-size: 12px;"></i>
                                                    </div>
                                                </button>
                                            
                                                
                                                <button data-toggle="modal" data-target="#archive-"  class="btn red" style="width: 50px; height: 37px;">
                                                    <div data-toggle="tooltip" title="Deactivate">
                                                        <i class="ti-archive" style="font-size: 12px;"></i>
                                                    </div>
                                                </button>

                                                <button data-toggle="modal" data-target="#approve-" class="btn blue" style="width: 50px; height: 37px;">
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
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                    <div id="message-" class="modal fade" role="dialog">
                                        <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Message</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="archive-id" value="">
                                                        <div class="row">
                                                            <div class="form-group col-12">

                                                                
                                                                <textarea id="w3review" name="message" rows="4" cols="82" placeholder="Message to Customer..."></textarea>

                                                            
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <input type="submit" class="btn green radius-xl outline" name="send" value="Send Messages">
                                                        
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
                                                        <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Cancel Appointment</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="archive-id" value="">
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a class="btn red outline radius-xl" href="appointments.php?id=<&del=delete" onClick="return confirm('Are you sure you want to cancel?')">Cancel</a>
                                                        
                                                        <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>


                                    <div id="approve-" class="modal fade" role="dialog">
                                        <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Approve Appointment</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="hidden" name="archive-id" value="">
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                    <a class="btn green outline radius-xl" href="appointments.php?id=&app=delete" onClick="return confirm('Are you sure you want to approve this appointment?')">Approve</a>
                                                        
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