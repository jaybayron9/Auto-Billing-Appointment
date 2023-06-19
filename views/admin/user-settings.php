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
                                    <th class="whitespace-nowrap text-xs text-center uppercase">NAME</th>
                                    <th class="whitespace-nowrap text-xs text-center uppercase">EMAIL</th>
                                    <th class="whitespace-nowrap text-xs text-center uppercase">PHONE</th>
                                    <th class="whitespace-nowrap text-xs text-center uppercase">ADDRESS</th>
                                    <th class="whitespace-nowrap text-xs text-center uppercase">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( DBConn::select('clients') as $client ) { ?>
                                <tr>
                                    <td class="text-sm"><?= $client['name'] ?></td>
                                    <td class="text-sm"><?= $client['email'] ?></td>
                                    <td class="text-sm"><?= $client['phone'] ?></td>
                                    <td class="text-sm"><?= $client['address'] ?></td>
                                    <td class="flex text-sm">
                                        <button data-row-data="<?= $client['id'] ?>" class="delete-btn px-2 bg-red-500 hover:bg-red-700 text-white">
                                            DELETE
                                        </button>
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

        $('.delete-btn').click(function() {
            var id = $(this).data('row-data');

            if (confirm('Are you sure you want to delete this user?')) {
                $.ajax({
                    url: '?rq=delete_user',
                    type: 'POST',
                    data: {id: id},
                    success: function(resp) { window.location.reload(true); }
                });
            }
        })
    });
</script>