<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>User Settings</li>
            </ul>
        </div>
        <div class="search-container">
            <div class="row">
                <div class="col-lg-12 m-b30">
                    <div class="table-responsive">
                        <table id="table" class="table hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap text-xs">NAME</th>
                                    <th class="whitespace-nowrap text-xs">EMAIL</th>
                                    <th class="whitespace-nowrap text-xs">PHONE</th>
                                    <th class="whitespace-nowrap text-xs">ADDRESS</th>
                                    <th class="whitespace-nowrap text-xs">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( DBConn::select('client_info') as $client ) { ?>
                                <tr>
                                    <td><?= $client['name'] ?></td>
                                    <td><?= $client['email'] ?></td>
                                    <td><?= $client['phone'] ?></td>
                                    <td><?= $client['address'] ?></td>
                                    <td>
                                        <center>
                                            <button data-toggle="modal" data-target="#archive-" class="btn red" style="width: 50px; height: 37px;">
                                                <div data-toggle="tooltip" title="Deactivate">
                                                    <i class="ti-archive" style="font-size: 12px;"></i>
                                                </div>
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

<div id="archive-" class="modal fade" role="dialog">
    <form class="edit-profile m-b30" method="POST" enctype="multipart/form-data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><img src="../assets/images/1.png" style="width: 30px; height: 30px;">&nbsp;Deletion of Account</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="archive-id" value="">

                </div>
                <div class="modal-footer">
                    <a class="btn red outline radius-xl" href="appointments.php?id=&del=delete" onClick="return confirm('Are you sure you want to delete this account?')">Delete</a>

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