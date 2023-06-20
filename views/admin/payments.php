<?php include view('admin', 'navbars') ?>
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
                                <th class="whitespace-nowrap text-xs uppercase text-center">CLIENT NAME</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">EMAIL</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">PHONE</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">Description</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">TOTAL DUE</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">DATE CREATED</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach (DBConn::select('payments') as $data) {
                            ?>
                            <tr>
                                <td class="text-sm"><?= $data['name'] ?></td>
                                <td class="text-sm"><?= $data['email'] ?></td>
                                <td class="text-sm"><?= $data['phone'] ?></td>
                                <td class="text-sm"><?= $data['description'] ?></td>
                                <td class="text-sm"><?= $data['total_due'] ?></td>
                                <td class="text-sm"><?= $data['created_at'] ?></td>
                                <td class="flex gap-x-2 text-center text-sm">
                                    <button data-row-data="<?= $data['id'] ?>" class="delete-btn px-2 py-1 bg-red-500 hover:bg-red-700 text-white uppercase">
                                        DELETE
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<div id="add" class="modal fade" role="dialog">
    <div  class="edit-profile m-b30">
        <div class="modal-dialog modal-lg">
            <form id="payment-form" class="modal-content">
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
                            <input class="form-control" type="email" name="email" style="background-color: white;">

                            <label class="col-form-label">Phone</label>
                            <input class="form-control number" type="text" name="phone" style="background-color: white;">
                            
                            <label class="col-form-label">Amount</label>
                            <input class="form-control number" type="text" name="amount" style="background-color: white;">

                            <label class="col-form-label">Description</label>
                            <textarea class="form-control" type="text" name="description" style="background-color: white;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green radius-xl outline">SAVE</button>
                    <button type="button" class="btn red outline radius-xl" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        let table = new DataTable('#table');

        $('#payment-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: '?rq=add_payment',
                type: 'POST',
                data: $(this).serialize(),
                success: function(resp) {
                    alert(resp);
                    window.location.reload(true);
                }
            });
        })

        $('.delete-btn').click(function() {
            var id = $(this).data('row-data');

            if (confirm('Are you sure you want to delete this payment?')) {
                $.ajax({
                    url: '?rq=delete_payment',
                    type: 'POST',
                    data: {id: id},
                    success: function(resp) { window.location.reload(true); }
                });
            }
        })
    });
</script>