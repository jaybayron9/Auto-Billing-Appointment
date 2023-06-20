<?php include view('admin', 'navbars') ?>
<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i> Reports</li>
            </ul>
        </div>
        <center>
            <strong>
                From : <input type="date" style="width: 223px; padding:14px;" id="start-date" class="tcal" />
                To: <input type="date" style="width: 223px; padding:14px;" id="end-date" class="tcal" />
                <button class="btn bg-yellow-500" id="search-button" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;">
                    <i class="icon icon-search icon-large"></i> Search</button>
            </strong>
        </center>
        <table id="table" class="table table-bordered" data-responsive="table" style="text-align: left;">
            <thead>
                <tr>
                    <th data-priority="1" class="whitespace-nowrap text-xs text-center uppercase">CLIENT ID</th>
                    <th data-priority="2" class="whitespace-nowrap text-xs text-center uppercase">TRANSACTION DATE</th>
                    <th data-priority="3" class="whitespace-nowrap text-xs text-center uppercase">Description</th>
                    <th data-priority="4" class="whitespace-nowrap text-xs text-center uppercase">AMOUNT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( DBConn::select('payments') as $payment) { ?>
                <tr>
                    <td class="text-sm"><?= $payment['id'] ?></td>
                    <td class="text-sm"><?= date('Y-m-d', strtotime($payment['created_at'])) ?></td>
                    <td class="text-sm"><?= $payment['description'] ?></td>
                    <td class="text-sm"><?= $payment['total_due'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<script type="text/javascript">
    $(function() {
        var table = $('#table').DataTable({
                columns: [
                    { title: 'CLIENT ID' },
                    { title: 'TRANSACTION DATE' },
                    { title: 'Description' },
                    { title: 'AMOUNT' },
                ],
            })

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var minDate = $('#start-date').val();
                var maxDate = $('#end-date').val();
                var date = data[1];
                if (minDate === '' || maxDate === '') {
                    return true;
                }
                if (date >= minDate && date <= maxDate) {
                    return true;
                }
                return false;
            }
        );

        $('#search-button').click(function() {
            table.draw();
        });
    });
</script>