<?php include view('accts/admin/unlock', 'head.auth') ?>
<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64">
    <div class="px-4 h-full my-[80px]">
        <div class="rounded shadow bg-white">
            <div data-popover id="package" role="tooltip" class="absolute z-40 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-96 dark:text-gray-400 dark:bg-gray-800 dark:border-gray-600">
                <div class="p-3">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-4 py-3 rounded-l-lg">
                                        Product Summary
                                    </th>
                                    <th scope="col" class="px-4 py-3">
                                        Unit Price
                                    </th>
                                    <th scope="col" class="px-4 py-3 rounded-r-lg">
                                        SubTotal
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white">
                                        Air Cleaner Filter
                                    </th>
                                    <td class="px-4 py-4">
                                        3
                                    </td>
                                    <td class="px-4 py-4">
                                        1,200.00
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white">
                                        Air Cleaner Filter
                                    </th>
                                    <td class="px-6 py-4">
                                        3
                                    </td>
                                    <td class="px-6 py-4">
                                        500.00
                                    </td>
                                </tr>
                                <tr class="bg-white dark:bg-gray-800">
                                    <th scope="row" class="px-4 py-4 font-medium text-gray-900 dark:text-white">
                                        Engine Oil and Oil Filter
                                    </th>
                                    <td class="px-6 py-4">
                                        3
                                    </td>
                                    <td class="px-6 py-4">
                                        2200.00
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="font-semibold text-gray-900 dark:text-white">
                                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                                    <td class="px-6 py-3"></td>
                                    <td class="px-6 py-3">3,900.00</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div data-popper-arrow></div>
            </div>
            <div class="px-4 mx-auto max-w-screen-xl text-center py-6 lg:px-6">
                <div class="mx-auto mb-8 max-w-screen-sm">
                    <h2 class="text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Preventive Repair Maintenance</h2>
                </div>
                <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    <?php
                    $pmsData = ['5KM', '10KM', '30KM', '40KM', '80KM', '90KM', '100KM', '120KM'];
                    for ($i = 0; $i < count($pmsData); $i++) {
                    ?>
                        <div data-popover-target="package" data-popover-trigger="click" class="hover:cursor-pointer hover:bg-gray-200 border border-gray-300 rounded-md shadow text-center text-gray-500 dark:text-gray-400 p-2">
                            <img class="mx-auto mb-4 w-36 h-36 rounded-md" src="assets/storage/pms/tool-box.png" alt="pms">
                            <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                <?= $pmsData[$i] ?>
                            </h3>
                        </div>
                    <?php } ?>
                </div>
            </div> 
        </div>
    </div>
</main>