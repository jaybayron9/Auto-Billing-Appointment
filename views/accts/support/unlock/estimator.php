<?php include view('accts/support/unlock', 'head.auth'); ?>
<?php include view('accts/support/unlock/navbars', 'topbar'); ?>
<?php include view('accts/support/unlock/navbars', 'sidebar'); ?> 

<main class="relative h-screen overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-0 sm:px-4 my-[80px]">
        <div id="estimator-page" class="animate__animated grid grid-cols-1 md:grid-cols-5 gap-5">
            <div class="relative col-span-3">
                <div class="sticky top-14 z-10 bg-white border-b border-gray-200 mb-3 rounded-md">
                    <ul data-tabs-toggle="#myTabContent" role="tablist" class="grid grid-cols-4 text-center">
                        <li class="border border-slate-300 hover:cursor-pointer flex align-text-bottom rounded-l-md">
                            <button id="pms-tab" data-tabs-target="#pms" type="button" role="tab" aria-controls="pms" aria-selected="<?= selectTab('pmg') ?>" class="inline-block px-4 font-semibold leading-4 py-2 break-words">PMS PACKAGE</button>
                        </li>
                        <li class="border border-slate-300 hover:cursor-pointer flex align-text-bottom">
                            <button id="services-tab" data-tabs-target="#services" type="button" role="tab" aria-controls="services" aria-selected="<?= selectTab('multi-inspection') ?>" class="inline-block px-4 font-semibold leading-4 py-2 break-words">PERIODIC SERVICES</button>
                        </li>
                        <li class="border border-slate-300 hover:cursor-pointer flex align-text-bottom">
                            <button id="services_repair-tab" data-tabs-target="#services_repair" type="button" role="tab" aria-controls="services_repair" aria-selected="<?= selectTab('repair') ?>" class="inline-block px-4 font-semibold leading-4 py-2 break-words">AC SERVICES & REPAIR</button>
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
                        $car_type = appData('fuel_type') !== "Gas" ? 2 : 1;
                        foreach ($conn::select('estimator', '*', ['car_type' => $car_type, 'service' => 1]) as $serv) { ?>
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
                                        <button id="product_<?= $serv['id'] ?>" data-row-data="<?= "{$serv['id']}~{$serv['name']}~{$serv['price']}~{$serv['img']}" ?>" class="add-cart-btn animate__animated animate__bounce animate__faster absolute bottom-0 right-0 bg-red-700 text-white px-2 py-1 font-semibold rounded shadow-md whitespace-nowrap text-1xl hover:text-yellow-300">
                                            ADD TO CART
                                        </button>
                                        <div id="after-add<?= $serv['id'] ?>" hidden class="px-2 py-1 ">
                                            <p class="absolute bottom-0 right-0 text-gray-500 text-sm">
                                                <span class="rounded-full text-sm px-[0.5px] py-[1px]">✔</span>
                                                Added to Cart
                                            </p>
                                        </div>
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
                                        <button id="product_<?= $serv['id'] ?>" data-row-data="<?= "{$serv['id']}~{$serv['name']}~{$serv['price']}~{$serv['img']}" ?>" class="add-cart-btn animate__animated animate__bounce animate__faster absolute bottom-0 right-0 bg-red-700 text-white px-2 py-1 font-semibold rounded shadow-md whitespace-nowrap text-1xl hover:text-yellow-300">
                                            ADD TO CART
                                        </button>
                                        <div id="after-add<?= $serv['id'] ?>" hidden class="px-2 py-1 ">
                                            <p class="absolute bottom-0 right-0 text-gray-500 text-sm">
                                                <span class="rounded-full text-sm px-[0.5px] py-[1px]">✔</span>
                                                Added to Cart
                                            </p>
                                        </div>
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
                                        <button id="product_<?= $serv['id'] ?>" data-row-data="<?= "{$serv['id']}~{$serv['name']}~{$serv['price']}~{$serv['img']}" ?>" class="add-cart-btn animate__animated animate__bounce animate__faster absolute bottom-0 right-0 bg-red-700 text-white px-2 py-1 font-semibold rounded shadow-md whitespace-nowrap text-1xl hover:text-yellow-300">
                                            ADD TO CART
                                        </button>
                                        <div id="after-add<?= $serv['id'] ?>" hidden class="px-2 py-1 ">
                                            <p class="absolute bottom-0 right-0 text-gray-500 text-sm">
                                                <span class="rounded-full text-sm px-[0.5px] py-[1px]">✔</span>
                                                Added to Cart
                                            </p>
                                        </div>
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
                                        <button id="product_<?= $serv['id'] ?>" data-row-data="<?= "{$serv['id']}~{$serv['name']}~{$serv['price']}~{$serv['img']}" ?>" class="add-cart-btn animate__animated animate__bounce animate__faster absolute bottom-0 right-0 bg-red-700 text-white px-2 py-1 font-semibold rounded shadow-md whitespace-nowrap text-1xl hover:text-yellow-300">
                                            ADD TO CART
                                        </button>
                                        <div id="after-add<?= $serv['id'] ?>" hidden class="px-2 py-1 ">
                                            <p class="absolute bottom-0 right-0 text-gray-500 text-sm">
                                                <span class="rounded-full text-sm px-[0.5px] py-[1px]">✔</span>
                                                Added to Cart
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-span-3 md:col-span-2 ">
                <div class="sticky top-14 z-14">
                    <div class="bg-white flex justify-between border-b-2 border-gray-500 pb-2 pt-4 px-3">
                        <div class="px-2 border-l-4 border-gray-400">
                            <p class="text-xl font-bold capitalize text-red-600">
                                <?= appData('car_model') ?>
                                <span class="font-semibold text-gray-700 capitalize">
                                    <?= appData('fuel_type') ?>
                                </span>
                            </p>
                        </div>
                        <div class="mt-1">
                            <button type="button" onclick="window.location.replace('?vs=_sup/job_order')" class="font-ligt text-red-600 hover:scale-125 ease-in-out duration-150">
                                BACK
                            </button>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg px-3 py-2">
                        <table class="w-full">
                            <thead class="border-b-2 border-slate-400">
                            </thead>
                            <tbody id="added-list"></tbody>
                        </table>
                        <div class="flex justify-between mt-3">
                            <div class="font-semibold text-2xl text-slate-800 whitespace-nowrap">
                                Subtotal ( <span id="total-items">0 Item(s)</span> )
                            </div>
                            <div class="font-semibold text-2xl whitespace-nowrap text-slate-800">
                                <span id="total-price">₱ 0.00</span>
                            </div>
                        </div>
                        <div id="checkout-btn" hidden class="flex justify-between bg-red-600 mt-5 p-3 text-xl font-bold text-white hover:text-yellow-300 hover:cursor-pointer mb-2">
                            <div class="total-price">
                                ₱ 0.00
                            </div>
                            <div>
                                CHECKOUT
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="checkout-page" class="hidden animate__animated animate__bounceInRight bg-white rounded-md">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-gray-600">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white italic">
                            Booking summary
                        </h3>
                        <div class="text-center">
                            <span class="text-sm font-base">Customer Details</span>
                        </div>
                    </div>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-3 text-center border-b-2 border-gray-400 pb-2">
                        <h1 class="text-xl font-semibold">Customer details</h1>
                        <h1 class="text-xl font-semibold">Vehicle detail </h1>
                        <h1 class="text-xl font-semibold">Schedule</h1>
                    </div>
                    <div class="grid grid-cols-3 border-b-2 border-gray-400 pb-2">
                        <div class="-mt-4 ml-6">
                            <p class="whitespace-nowrap font-semibold">Name : <span class="font-normal"><?= appData('name') ?></span></p>
                            <p class="whitespace-nowrap font-semibold">Email : <span class="font-normal"><?= appData('email') ?></span></p>
                            <p class="whitespace-nowrap font-semibold">Contact : <span class="font-normal"><?= appData('phone') ?></span></p>
                        </div>
                        <div class="-mt-4 ml-6">
                            <p class="whitespace-nowrap font-semibold">Brand : <span class="font-normal"><?= appData('car_brand') ?></span></p>
                            <p class="whitespace-nowrap font-semibold">Model : <span class="font-normal"><?= appData('car_model') ?></span></p>
                        </div>
                        <div class="-mt-4 text-center">
                            <p><?= date('F Y, d', strtotime(appData('schedule_date'))) ?></p>
                            <p><?= appData('available_time') ?></p>
                        </div>
                    </div>
                    <div class="flex flex-col px-20">
                        <table class="w-full -mt-4">
                            <thead class="bg-white">
                                <tr>
                                    <th class="text-xl font-semibold text-left">Service/s</th>
                                    <th class="text-xl font-semibold text-center">Quantity</th>
                                    <th class="text-xl font-semibold text-center">Price</th>
                                </tr>
                            </thead>
                            <tbody id="checkout-summary"></tbody>
                            <tfoot>
                                <tr>
                                    <td class="text-center">TOTAL</td>
                                    <td id="quantity-summary" class="text-center"></td>
                                    <td id="total-summary" class="text-center"></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="button" id="back-btn" class="btn ml-auto text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Back
                    </button>
                    <input type="hidden" id="app_id" value="<?= appData('app_id') ?>">
                    <input type="hidden" id="user_id" value="<?= appData('user_id') ?>">
                    <input type="hidden" id="car_id" value="<?= appData('car_id') ?>">
                    <button id="confirm-booking-btn" type="button" class="btn text-white font-semibold hover:text-yellow-300 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5 text-center">
                        Print
                    </button>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="assets/js/estimator.js"></script>
<script type="text/javascript">
    $('#confirm-booking-btn').click(function() {
        $('#checkout-summary').html('');
        var data = tableData();

        $.ajax({
            url: "?support_rq=save_booking_summary",
            type: "POST",
            data: {
                app_id: $('#app_id').val(),
                user_id: $('#user_id').val(),
                car_id: $('#car_id').val(),
                data: data,
                total_items: $('#total-items').text(),
                total: $('#total-price').text(),
            }, 
            dataType: "json",
            success: function(resp) {  
                dialog('border-green-600 text-green-700', 'Booking summary saved.');
                $('#checkout-page').html('<object data="?support_rq=receipt" type="application/pdf" async defer class="w-full h-screen">');
            }
        });
    });
</script>