<?php include view('accts/support/unlock', 'head.auth'); ?>
<?php include view('accts/support/unlock/navbars', 'topbar') ?>
<?php include view('accts/support/unlock/navbars', 'sidebar') ?>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <div class="grid grid-cols-1 md:grid-cols-5 space-x-5 pb-10">
            <div class="relative col-span-3 bg-white rounded-md shadow-lg">
                <div class="fixed sticky top-0 mb-4 border-b border-gray-200 dark:border-gray-700">
                    <ul class="flex flex-nowrap lg:flex-nowrap sm:flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                        <li role="pms" class="mr-2">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="pms-tab" data-tabs-target="#pms" type="button" role="tab" aria-controls="pms" aria-selected="false">PMS PACKAGE</button>
                        </li>
                        <li role="services" class="mr-2">
                            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false">PERIODIC SERVICES</button>
                        </li>
                        <li role="services_repair" class="mr-2">
                            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="services_repair-tab" data-tabs-target="#services_repair" type="button" role="tab" aria-controls="services_repair" aria-selected="false">AC SERVICES & REPAIR</button>
                        </li>
                        <li role="tires_wheel">
                            <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="tires_wheel-tab" data-tabs-target="#tires_wheel" type="button" role="tab" aria-controls="tires_wheel" aria-selected="false">TIRES & WHEELS REPAIR</button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
                    <div id="pms" role="tabpanel" aria-labelledby="pms-tab" class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                        <p class="text-sm text-gray-500 dark:text-gray-400">pms</p>
                    </div>
                    <div id="services" role="tabpanel" aria-labelledby="services-tab" class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                        <p class="text-sm text-gray-500 dark:text-gray-400">services</p>
                    </div>
                    <div id="services_repair" role="tabpanel" aria-labelledby="services_repair-tab" class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                        <p class="text-sm text-gray-500 dark:text-gray-400">services_repair</p>
                    </div>
                    <div id="tires_wheel" role="tabpanel" aria-labelledby="tires_wheel-tab" class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800">
                        <p class="text-sm text-gray-500 dark:text-gray-400">tires_wheel</p>
                    </div>
                </div>
            </div>
            <div class="col-span-2 bg-white shadow-lg rounded-md p-2">
                <table class="w-full">
                    <thead>
                        <tr>
                            <th class="text-left">SERVICE</th>
                            <th>PRICE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>PMS GAS REGULAR EXPRESS</td>
                            <td>123123123</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>