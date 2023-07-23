<?php include view('accts/user/unlock', 'head.auth'); ?>

<?php include view('accts/user/unlock/navbars', 'topbar') ?>
<?php include view('accts/user/unlock/navbars', 'sidebar') ?>

<link rel="stylesheet" href="assets/css/table.css">

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <div class="overflow-x-auto overflow-y-auto" style=" max-height: 700px;">
                <table id="table" class="stripe hover w-full">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap text-xs text-center uppercase py-2 text-white">Services</th>
                            <th class="whitespace-nowrap text-xs text-center uppercase py-2 text-white">Status</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        $query = "SELECT * FROM appointments ap JOIN cars cs ON ap.car_id = cs.id WHERE client_id = '{$_SESSION['user_id']}' AND (status = 'Underway' OR status = 'Done')";

                        foreach ($conn::DBQuery($query) as $progress) {
                        ?>
                            <tr class="border-b border-gray-300 hover:bg-blue-100">
                                <td class="capitalize text-center text-sm py-2"><?= $progress['repair'] ?></td>
                                <td class="capitalize text-center text-sm">
                                    <span class="text-white rounded-md px-2 <?= $progress['status'] == 'Underway' ? 'bg-sky-500' : 'bg-green-500';  ?>">
                                        <?= $progress['status'] ?>
                                    </span>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>