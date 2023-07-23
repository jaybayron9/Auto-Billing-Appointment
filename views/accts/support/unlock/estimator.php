<?php include view('accts/support/unlock', 'head.auth'); ?>
<?php include view('accts/support/unlock/navbars', 'topbar')
?>
<?php include view('accts/support/unlock/navbars', 'sidebar') ?>

<main id="main-content" class="relative h-screen overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-0 sm:px-4 my-[80px]">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-5">
            <div class="relative col-span-3">
                <div class="sticky top-14 z-10 bg-white border-b border-gray-200 mb-3 rounded-md">
                    <ul data-tabs-toggle="#myTabContent" role="tablist" class="grid grid-cols-4 text-center">
                        <li class="border border-slate-300 hover:cursor-pointer flex align-text-bottom rounded-l-md">
                            <button id="pms-tab" data-tabs-target="#pms" type="button" role="tab" aria-controls="pms" aria-selected="false" class="inline-block px-4 font-semibold leading-4 py-2 break-words">PMS PACKAGE</button>
                        </li>
                        <li class="border border-slate-300 hover:cursor-pointer flex align-text-bottom">
                            <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="false" class="inline-block px-4 font-semibold leading-4 py-2 break-words">PERIODIC SERVICES</button>
                        </li>
                        <li class="border border-slate-300 hover:cursor-pointer flex align-text-bottom">
                            <button id="services_repair-tab" data-tabs-target="#services_repair" type="button" role="tab" aria-controls="services_repair" aria-selected="false" class="inline-block px-4 font-semibold leading-4 py-2 break-words">AC SERVICES & REPAIR</button>
                        </li>
                        <li id="" class="border border-slate-300 hover:cursor-pointer flex align-text-bottom rounded-r-md">
                            <button id="tires_wheel-tab" data-tabs-target="#tires_wheel" type="button" role="tab" aria-controls="tires_wheel" aria-selected="false" class="inline-block px-4 font-semibold leading-4 py-2 break-words">
                                TIRES & WHEELS CARE
                            </button>
                        </li>
                    </ul>
                </div>
                <div id="myTabContent">
                    <div id="pms" role="tabpanel" aria-labelledby="pms-tab" class="hidden">
                        <?php
                        foreach ($conn::select('estimator', '*', ['car_type' => 1, 'service' => 1]) as $serv) { ?>
                            <div class="shadow bg-white rounded-md p-3 mb-3">
                                <div class="grid grid-cols-3 justify-between">
                                    <div class="col-span-2">
                                        <h2 class="text-2xl font-bold mb-4"><?= $serv['name'] ?></h2>
                                        <?php $inc = array_filter(explode(',', $serv['inclusions'])); ?>
                                        <div class="grid grid-cols-2 gap-y-2 mb-4">
                                            <?php for ($i = 0; $i < count($inc); $i++) { ?>
                                                <p>
                                                    <span class="bg-green-100 rounded-full text-sm px-[0.5px] py-[1px]">✔</span>
                                                    <label class="text-sm"><?= $inc[$i] ?></label>
                                                </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-span-1 relative">
                                        <p class="absolute top-0 right-0 font-semibold text-xl">₱ <?= number_format($serv['price'], 2) ?></p>
                                        <button class="absolute bottom-0 right-0 bg-red-700 text-white px-2 py-1 font-semibold rounded shadow-md whitespace-nowrap text-1xl hover:text-yellow-300">ADD TO CART</button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="services" role="tabpanel" aria-labelledby="services-tab" class="hidden">
                        <?php
                        foreach ($conn::select('estimator', '*', ['service' => 2]) as $serv) { ?>
                            <div class="shadow bg-white rounded-md p-3 mb-3">
                                <div class="grid grid-cols-3 justify-between">
                                    <div class="col-span-2">
                                        <h2 class="text-2xl font-bold"><?= $serv['name'] ?></h2>
                                        <p class="mb-4 text-sm">
                                            <?= $serv['inclusions'] ?>
                                        </p>
                                    </div>
                                    <div class="col-span-1 relative h-36">
                                        <p class="absolute top-0 right-0 font-semibold text-xl">₱ <?= number_format($serv['price'], 2) ?></p>
                                        <button class="absolute bottom-0 right-0 bg-red-700 text-white px-2 py-1 font-semibold rounded shadow-md whitespace-nowrap text-1xl hover:text-yellow-300">ADD TO CART</button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="services_repair" role="tabpanel" aria-labelledby="services_repair-tab" class="hidden">
                        <?php
                        foreach ($conn::select('estimator', '*', ['service' => 3]) as $serv) { ?>
                            <div class="shadow bg-white rounded-md p-3 mb-3">
                                <div class="grid grid-cols-3 justify-between">
                                    <div class="col-span-2">
                                        <h2 class="text-2xl font-bold"><?= $serv['name'] ?></h2>
                                        <p class="mb-4 text-sm">
                                            <?= $serv['inclusions'] ?>
                                        </p>
                                    </div>
                                    <div class="col-span-1 relative h-36">
                                        <p class="absolute top-0 right-0 font-semibold text-xl">₱ <?= number_format($serv['price'], 2) ?></p>
                                        <button class="absolute bottom-0 right-0 bg-red-700 text-white px-2 py-1 font-semibold rounded shadow-md whitespace-nowrap text-1xl hover:text-yellow-300">ADD TO CART</button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div id="tires_wheel" role="tabpanel" aria-labelledby="tires_wheel-tab" class="hidden">
                        <?php
                        foreach ($conn::select('estimator', '*', ['service' => 4]) as $serv) { ?>
                            <div class="shadow bg-white rounded-md p-3 mb-3">
                                <div class="grid grid-cols-3 justify-between">
                                    <div class="col-span-2">
                                        <h2 class="text-2xl font-bold"><?= $serv['name'] ?></h2>
                                        <p class="mb-4 text-sm">
                                            <?= $serv['inclusions'] ?>
                                        </p>
                                    </div>
                                    <div class="col-span-1 relative h-36">
                                        <p class="absolute top-0 right-0 font-semibold text-xl">₱ <?= number_format($serv['price'], 2) ?></p>
                                        <button class="absolute bottom-0 right-0 bg-red-700 text-white px-2 py-1 font-semibold rounded shadow-md whitespace-nowrap text-1xl hover:text-yellow-300">ADD TO CART</button>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-span-3 md:col-span-2 ">
                <div class="bg-sky-300 rounded-md flex justify-between p-2 mb-4">
                    <div>
                        <p class="text-2xl font-bold uppercase">asd-1234 <span class="font-semibold">: GAS</span></p>
                    </div>
                    <div>
                        <button type="button" class="font-semibold hover:scale-125 ease-in-out duration-150 delay-300">
                            BACK
                        </button>
                    </div>
                </div>
                <div class="sticky top-14 z-14  bg-white shadow-lg rounded-md px-3 py-2">
                    <table class="w-full">
                        <thead class="border-b-2 border-slate-400">
                            <tr>
                                <th class="text-gray-500">PRODUCT</th>
                                <th class="text-gray-500">PRICE</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-slate-400">
                                <td class="font-semibold text-lg">PMS GAS SEMI-SYNTHETIC PREMIUM</td>
                                <td class="font-semibold text-lg whitespace-nowrap text-gray-700">₱ 1,500.00</td>
                                <td>
                                    <button class="mt-2 px-2 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr class="border-b border-slate-400">
                                <td class="font-semibold text-lg">PMS GAS REGULAR PREMIUM</td>
                                <td class="font-semibold text-lg whitespace-nowrap text-gray-700">₱ 3,650.00</td>
                                <td>
                                    <button class="mt-2 px-2 text-gray-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-between mt-3">
                        <div class="font-semibold text-2xl">
                            Subtotal ( 2 Items )
                        </div>
                        <div class="font-semibold text-2xl whitespace-nowrap">
                            ₱ 5,450.00
                        </div>
                    </div>
                    <div class="flex justify-between bg-red-600 mt-5 p-3 text-xl font-bold text-white hover:text-yellow-300 hover:cursor-pointer mb-2">
                        <div>
                            ₱ 5,450.00
                        </div>
                        <div>
                            CHECKOUT
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>