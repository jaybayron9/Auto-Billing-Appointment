<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Payment</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6" align="right" style="margin-bottom: 20px;">
                <a href="" class="btn green radius-xl" style="background-color: #016064;" data-toggle="modal" data-target="#add"><span>ADD PAYMENT</span></a>&nbsp;
            </div>
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%; margin-top: 20px;">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap text-xs">CLIENT NAME</th>
                                <th class="whitespace-nowrap text-xs">EMAIL</th>
                                <th class="whitespace-nowrap text-xs">PAYMENT</th>
                                <th class="whitespace-nowrap text-xs">DATE CREATED</th>
                                <th class="whitespace-nowrap text-xs">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button data-toggle="modal" data-target="#archive-" class="btn red" style="width: 50px; height: 37px;">
                                        <div data-toggle="tooltip" title="Deactivate">
                                            <i class="ti-archive" style="font-size: 12px;"></i>
                                        </div>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<div id="archive-" class="modal fade" role="dialog">
    <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Delete Payment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="archive-id" value="">

                </div>
                <div class="modal-footer">
                    <a class="btn red outline radius-xl" href="payment.php?id=&del=delete" onClick="return confirm('Are you sure you want to delete?')">Delete</a>

                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div id="add" class="modal fade" role="dialog">
    <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Add Payment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="col-form-label">Client Name</label>
                            <input class="form-control" type="text" name="name" style="background-color: white;">

                            <label class="col-form-label">Email</label>
                            <input class="form-control" type="text" name="email" style="background-color: white;">

                            <label class="col-form-label">Payment</label>
                            <input class="form-control" type="text" name="payment" style="background-color: white;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn green radius-xl outline" name="add_user" value="Save Changes">
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