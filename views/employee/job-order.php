<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Your Job Order</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Name</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Plate no.</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Repair</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Description</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Schedule</th>
                                <th class="whitespace-nowrap text-xs text-center uppercase">Status (Action)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-sm"></td>
                                <td class="text-sm"></td>
                                <td class="text-sm"></td>
                                <td class="text-sm"></td>
                                <td class="text-sm"></td>
                                <td class="whitespace-nowrap flex gap-x-3">
                                    <select name="status" id="status">
                                        <option value="in progress">In progess...</option>
                                        <option value="done">Done</option>
                                        <option value="pending">Pending</option>
                                        <option value="cancelled">Cancel</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    $(function() {
        var table = new DataTable('#table');
    });
</script>