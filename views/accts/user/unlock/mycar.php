<?php include view('accts/user/unlock', 'head.auth'); ?>

<?php include view('accts/user/unlock/navbars', 'topbar') ?>
<?php include view('accts/user/unlock/navbars', 'sidebar') ?>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:px-6">
                <div class="mx-auto max-w-screen-md text-center mb-2">
                    <h2 class="text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Your Car(s)</h2>
                </div>
                <div class="space-y-8 grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-5">  
                    <?php foreach ($conn::select('cars', '*', ['user_id' => $_SESSION['user_id']]) as $car) { ?>
                        <div class="flex flex-col p-6 mx-auto max-w-lg text-center text-gray-900 bg-white rounded-md border border-gray-200 shadow-lg mt-8">
                            <div class="relative">
                                <div data-row-data="<?= $car['id'] ?>" data-modal-target="editModal" data-modal-toggle="editModal" class="edit-modal absolute right-3 -top-4 text-green-500 hover:text-green-600 hover:cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </div>
                                <a href="?user_rq=delete_mycar&car_id=<?= $car['id']  ?>" onclick="return confirm('Are you sure you want to remove this car?')" class="edit-modal absolute -right-4 -top-4 text-red-500 hover:text-red-600 hover:cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg> 
                                </a> 
                            </div>
                            <h3 class="text-2xl font-bold font-mono"><?= $car['car_brand'] ?></h3>
                            <div class="flex justify-center items-baseline mb-8 mt-5">
                                <span class="mr-2 text-5xl font-extrabold font-mono uppercase"><?= $car['plate_no'] ?></span>
                            </div> 
                            <ul role="list" class="space-y-1 text-left">
                                <li class="flex items-center space-x-3">
                                    <span class="text-gray-500">Model: <span class="font-semibold text-gray-900"><?= $car['car_model'] ?></span></span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <span class="text-gray-500">Type: <span class="font-semibold text-gray-900"><?= $car['car_type'] ?></span></span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <span class="text-gray-500">Fuel Type: <span class="font-semibold text-gray-900"><?= $car['fuel_type'] ?></span></span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <span class="text-gray-500">Color: <span class="font-semibold text-gray-900"><?= $car['color'] ?></span></span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <span class="text-gray-500">Transmission: <span class="font-semibold text-gray-900"><?= $car['trans_type'] ?></span></span>
                                </li>
                                <li class="flex items-center space-x-3">
                                    <span class="text-gray-500">Created: <span class="font-semibold text-gray-900"><?= date('Y/m/d', strtotime($car['created_at'])) ?></span></span>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                    <button id="add-car-btn" data-modal-target="add-car-modal" data-modal-toggle="add-car-modal" class="flex flex-col p-6 max-w-xs text-center text-gray-900 bg-white rounded-md border border-gray-200 shadow-lg mt-8">
                        <div class="flex justify-center items-center mt-20">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-44 w-44">
                                <path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </div>
            </div>
        </section>
    </div>
</main>

<div id="add-car-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form id="add-car-form" class="form-modal relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add Car
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="add-car-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
                    <div>
                        <label for="plateNumber" class="block mb-2 text-sm font-medium text-gray-900">Plate Number</label>
                        <input type="text" name="plateNumber" maxlength="8" placeholder="Plate Number" required class="plateNumber bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"> 
                        <span id="plate-no-alert" class="text-red-500 text-xs"></span>
                    </div>

                    <div>
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Brand</label>
                        <input type="text" name="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter Car Brand" required>
                    </div>

                    <div>
                        <label for="carmodel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Model</label>
                        <input type="text" name="carModel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Enter Car Model" required>
                    </div> 
                    <div>
                        <label for="cartype" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Car Type</label>
                        <select type="text" name="carType" class="select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type of car" required>
                            <option value="" selected disabled>-- Select car type --</option>
                            <option value="Automatic">Automatic</option>
                            <option value="Manual">Manual</option>
                        </select>
                    </div> 
                    <div>
                        <label for="fueltype" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fuel Type</label>
                        <select type="text" name="fuelType" class="select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Fuel type" required>
                            <option value="" selected disabled>-- Select fuel type --</option>
                            <option value="Gas">Gas</option>
                            <option value="Diesel">Diesel</option>
                        </select>
                    </div>

                    <div>
                        <label for="carcolor" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color</label>
                        <input type="text" name="carColor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Color of vehicle" required>
                    </div>

                    <div>
                        <label for="transtype" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Transmission Type</label>
                        <input type="text" name="transType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Transmission Type" required>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="add-car-modal" type="button" class="btn ml-auto text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancel</button>
                <button type="submit" type="button" class="btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save</button>
            </div>
        </form>
    </div>
</div>

<div id="editModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form id="edit-car-form" class="form-modal relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Update Car
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <input type="hidden" name="car_id" id="car_id">
                    <input type="hidden" name="user_id" id="user-id" value="<?= $_SESSION['user_id'] ?>">
                    <div class="">
                        <label for="plateNumber" class="block mb-2 text-sm font-medium text-gray-900">Plate Number</label>
                        <input type="text" name="plateNumber" id="plateNumber" maxlength="8" placeholder="Plate Number" class="hover:cursor-not-allowed plateNumber bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <span class="msgPlateNumber text-red-500 text-xs -mt-2">You can not change this field.</span>
                    </div>

                    <div class="mb-1">
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Brand</label>
                        <input type="text" name="brand" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Car Brand" required>
                    </div>

                    <div class="mb-1">
                        <label for="Model" class="block mb-2 text-sm font-medium text-gray-900">Model</label>
                        <input type="text" name="carModel" id="carmodel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Enter Car Model" required>
                    </div>

                    <div class="mb-1">
                        <label for="Fuel Type" class="block mb-2 text-sm font-medium text-gray-900">Car Type</label>
                        <select type="text" name="carType" id="cartype" class="select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type of car" required>
                            <option value="" selected hidden>-- Select car type --</option>
                            <option value="Automatic">Automatic</option>
                            <option value="Manual">Manual</option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <label for="Fuel Type" class="block mb-2 text-sm font-medium text-gray-900">Fuel Type</label>
                        <select type="text" name="fuelType" id="fueltype" class="select bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Fuel type" required>
                            <option value="" selected hidden>-- Select fuel type --</option>
                            <option value="Gas">Gas</option>
                            <option value="Diesel">Diesel</option>
                        </select>
                    </div>

                    <div class="mb-1">
                        <label for="Color" class="block mb-2 text-sm font-medium text-gray-900">Color</label>
                        <input type="text" name="carColor" id="carcolor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Color of vehicle" required>
                    </div>

                    <div class="mb-4">
                        <label for="Transmission" class="block mb-2 text-sm font-medium text-gray-900">Transmission Type</label>
                        <input type="text" name="transType" id="transtype" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Transmission Type" required>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button data-modal-hide="editModal" type="button" class="btn ml-auto text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
                <button type="submit" type="button" class="btn text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
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
                    window.location.reload(true);
                } else {
                    $('#plate-no-alert').text(resp.msg) 
                }
            }
        });
    });

    $('.edit-modal').click(function() {
        $.ajax({
            type: "POST",
            url: "?user_rq=show_mycar",
            data: {
                id: $(this).data('row-data')
            },
            dataType: "json",
            success: function(resp) {
                $('#car_id').val(resp[0].id);
                $('#user-id').val(resp[0].user_id);
                $('#plateNumber').val(resp[0].plate_no);
                $('#brand').val(resp[0].car_brand);
                $('#carmodel').val(resp[0].car_model);
                $('#cartype').val(resp[0].car_type);
                $('#fueltype').val(resp[0].fuel_type);
                $('#carcolor').val(resp[0].color);
                $('#transtype').val(resp[0].trans_type);
            }
        });
    });

    $('#edit-car-form').submit(function(e) {
        e.preventDefault(); 
        $.ajax({
            url: '?user_rq=update_mycar',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(resp) { 
                if (resp.status == 200) {
                    window.location.reload(true);
                } else {
                    alert(resp.msg);
                }
            }
        });
    });
</script>