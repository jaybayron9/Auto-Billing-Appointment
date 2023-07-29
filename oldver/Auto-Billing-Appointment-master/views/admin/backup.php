<?php include view('admin', 'navbars') ?>
<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Back Up</li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12 m-b30">
                <div class="table-responsive">
                    <table id="table" class="table hover" style="width:100%">
                        <h4>Back Up Database</h4>
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap text-xs uppercase text-center">Action</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">Location</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">Date</th>
                                <th class="whitespace-nowrap text-xs uppercase text-center">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-sm text-center">
                                    <a href="?rq=backup" class="bg-yellow-500 hover:bg-yellow-600 hover:text-white text-white px-3 py-2 rounded-md shadow-md">Backup Database</a>
                                </td>
                                <td class="text-sm text-center">cjce</td>
                                <td class="text-sm text-center">July 12, 2021</td>
                                <td class="text-sm text-center">1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>