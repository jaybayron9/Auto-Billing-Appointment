<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i> Reports</li>
            </ul>
        </div>
        <form action="reports.php" method="post">
            <center>
                <strong>
                    From : <input type="date" style="width: 223px; padding:14px;" name="d1" class="tcal" />
                    To: <input type="date" style="width: 223px; padding:14px;" name="d2" class="tcal" />
                    <button class="btn bg-yellow-500" style="width: 123px; height:35px; margin-top:-8px;margin-left:8px;" name="sub" type="submit">
                        <i class="icon icon-search icon-large"></i> Search</button>
                </strong>
            </center>
        </form>

        <table id="table" class="table table-bordered" data-responsive="table" style="text-align: left;">
            <thead>
                <tr>
                    <th class="whitespace-nowrap text-xs">CLIENT ID</th>
                    <th class="whitespace-nowrap text-xs">TRANSACTION DATE</th>
                    <th class="whitespace-nowrap text-xs">NAME</th>
                    <th class="whitespace-nowrap text-xs">AMOUNT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( DBConn::select('payment') as $payment) { ?>
                <tr>
                    <td><?= $payment['id'] ?></td>
                    <td><?= $payment['date'] ?></td>
                    <td><?= $payment['name'] ?></td>
                    <td><?= $payment['payment'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>

<script type="text/javascript">
    $(function() {
        let table = new DataTable('#table');
    });
</script>