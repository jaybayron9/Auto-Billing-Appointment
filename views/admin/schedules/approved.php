<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Client Approved Appointments</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Assign</th>
                                <th>Car ID</th>
                                <th>Brand</th>
                                <th>Model</th>
                                <th>Plate Number</th>
                                <th>Services</th>
                                <th>Schedule</th>
                                <th>Time</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <center>
                                        <button data-toggle="modal" data-target="#approve-" class="btn blue" style="width: 50px; height: 37px;">
                                            <div data-toggle="tooltip" title="Edit">
                                                <i class="ti-marker-alt" style="font-size: 12px;"></i>
                                            </div>
                                        </button>&nbsp;
                                    </center>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<div id="approve-" class="modal fade" role="dialog">
    <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Assign Employee</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="edit-id" value="">
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="col-form-label">Assigned Task No.</label>
                            <input class="form-control" type="text" value="1" name="number" style="background-color: white;">

                            <label class="col-form-label">Client ID</label>
                            <input class="form-control" value="202300012" type="text" value="1" name="client" style="background-color: white;">

                            <label class="col-form-label">Date</label>
                            <input class="form-control" type="date" name="date" value="" style="background-color: white;">

                            <label class="col-form-label">Type Of Service</label>
                            <input class="form-control" type="text" value="Preventive Maintenance Service" name="service" style="background-color: white;">

                            <label class="col-form-label">Mechanic</label>
                            <select class="form-control" name="mechanic" id="mechanic" required style="color: black!important;">
                                <option value="">-- Please select --</option>
                                <option value="">Mechanic 1</option>
                                <option value="">Mechanic 2</option>
                            </select>

                            <label class="col-form-label">Electrician</label>
                            <select class="form-control" name="electrician" id="electrician" required style="color: black!important;">
                                <option value="">-- Please select --</option>
                                <option value="">Electrician 1</option>
                                <option value="">Electrician 2</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn green radius-xl outline" name="assign" value="Assign Employee">
                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        var table = new DataTable('#table');
    });
</script>