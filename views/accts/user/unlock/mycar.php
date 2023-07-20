<?php include view('accts/user/unlock', 'head.auth'); ?>

<?php include view('accts/user/unlock/navbars', 'topbar') ?>
<?php include view('accts/user/unlock/navbars', 'sidebar') ?>

<div id="div-alert" hidden class="fixed z-30 top-3 right-4 bg-white border rounded py-2 px-5 shadow text-[14.5px] animate__animated">
    <p id="alert-msg"></p>
</div>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-md text-center mb-8 lg:mb-12">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Your Car(s)</h2>
                </div>
                <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
                    <button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="flex flex-col p-6 mx-auto max-w-lg text-gray-900 bg-white rounded-lg border border-gray-100 shadow-md hover:shadow-none">
                        <div class="flex justify-center items-center mt-16 text-gray-900 hover:animate-pulse">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-60 h-full">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                    <?php foreach ($conn::select('cars', '*', ['user_id' => $_SESSION['user_id']]) as $car) { ?>
                        <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-lg border border-gray-100 shadow dark:border-gray-600 xl:p-8 dark:bg-gray-800 dark:text-white">
                            <div class="relative">
                                <div class="absolute -right-6 -top-6 text-gray-500 hover:text-gray-600 hover:cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </div>
                            </div>
                            <h3 class="text-2xl font-semibold"><?= $car['car_brand'] ?></h3>
                            <div class="flex justify-center items-baseline mb-8 mt-5">
                                <span class="mr-2 text-5xl font-extrabold"><?= $car['plate_no'] ?></span>
                            </div>
                            <!-- List -->
                            <ul role="list" class="mb-8 space-y-4 text-left">
                                <li class="flex items-center space-x-3">
                                    <span>Model: <span class="font-semibold"><?= $car['car_model'] ?></span></span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <span>Type: <span class="font-semibold"><?= $car['car_type'] ?></span></span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <span>Fuel Type: <span class="font-semibold"><?= $car['fuel_type'] ?></span></span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <span>Color: <span class="font-semibold"><?= $car['color'] ?></span></span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <span>Transmission: <span class="font-semibold"><?= $car['trans_type'] ?></span></span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <span>Created: <span class="font-semibold"><?= date('Y/m/d', strtotime($car['created_at'])) ?></span></span>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
</main>

<!-- Main modal -->
<div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form id="add-car-form" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add Car
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <input type="hidden" name="user_id" id="user-id" value="<?= $_SESSION['user_id'] ?>">
                    <div class="mb-1">
                        <label for="plateNumber"><span class="text-danger"></span></label>
                        <input type="text" name="plateNumber" id="plateNumber" maxlength="8" placeholder="Plate Number" required class="plateNumber bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <span class="msgPlateNumber" style="color: red;"></span>
                    </div>

                    <div class="mb-1">
                        <label for="brand"><span class="text-danger"></span></label>
                        <input type="text" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Car Brand" required>
                    </div>

                    <div class="mb-1">
                        <label for="carmodel"><span class="text-danger"></span></label>
                        <input type="text" name="carModel" id="carmodel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Car Model" required>
                    </div>

                    <div class="mb-1">
                        <label for="cartype"><span class="text-danger"></span></label>
                        <select type="text" name="carType" id="cartype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type of car" required>
                            <option value="" selected hidden>-- Select car type --</option>
                            <option value="Automatic">Automatic</option>
                            <option value="Manual">Manual</option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <label for="fueltype"><span class="text-danger"></span></label>
                        <select type="text" name="fuelType" id="fueltype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Fuel type" required>
                            <option value="" selected hidden>-- Select fuel type --</option>
                            <option value="Gas">Gas</option>
                            <option value="Diesel">Diesel</option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <label for="carcolor"><span class="text-danger"></span></label>
                        <input type="text" name="carColor" id="carcolor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Color of vehicle" required>
                    </div>

                    <div class="mb-4">
                        <label for="transtype"><span class="text-danger"></span></label>
                        <input type="text" name="transType" id="transtype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Transmission Type" required>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit" type="button" class="ml-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SAVE</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $('#add-car-form').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '?user_rq=add_car',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(resp) {
                if (resp.status == 200) {
                    alert(resp.msg);
                    window.location.reload(true);
                } else {
                    alert(resp.msg);
                }
            }
        });
    });
</script>