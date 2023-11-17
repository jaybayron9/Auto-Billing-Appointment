<?php include view('accts/user/unlock', 'head.auth') ?> 
<?php include view('accts/user/unlock/navbars', 'topbar') ?>
<?php include view('accts/user/unlock/navbars', 'sidebar');
use DBConn\DBConn;
?>

<script src='assets/js/fullcallendar.min.js'></script>
<script type="text/javascript"> 
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth', 
            height: 'auto',  
            eventOrder: 'start', 
            eventSources: [
                {
                    url: '?user_rq=my_appointments',
                    type: 'POST',
                    data: { app_id: <?= $_SESSION['user_id'] ?> },
                    success: function(resp) { 
                        var events = [];
                        for (var i = 0; i < resp.length; i++) {
                            events.push({
                                title: resp[i].category,
                                start: resp[i].schedule_date, 
                            });
                        } 
                        calendar.setOption('events', events); 
                    }
                },
            ], 
        });
        calendar.render();
    }); 
</script>

<main id="main-content" class="relative overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 my-[80px]">
        <div class="p-5 mt-6 lg:mt-0 rounded shadow bg-white">
            <h1 class="font-bold text-3xl font-sans text-center">Welcome to CJCE Autoparts</h1>
            <section id="services" class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:px-6">
                    <div class="mx-auto mb-8 max-w-screen-sm">
                        <h2 class="text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Services</h2>
                    </div>
                    <div class="mx-auto mb-8 max-w-screen-md"> 
                        <button data-target="all" class="filter-btn border border-gray-200 rounded-md px-6 py-2 hover:bg-blue-500 hover:text-white bg-blue-500 text-white">All</button>
                        <button data-target="pms" class="filter-btn border border-gray-200 rounded-md px-6 py-2 hover:bg-blue-500 hover:text-white">PMS</button>
                        <button data-target="ps" class="filter-btn border border-gray-200 rounded-md px-6 py-2 hover:bg-blue-500 hover:text-white">Periodic</button>
                        <button data-target="ac" class="filter-btn border border-gray-200 rounded-md px-6 py-2 hover:bg-blue-500 hover:text-white">AC Services & Repair</button>
                        <button data-target="twc" class="filter-btn border border-gray-200 rounded-md px-6 py-2 hover:bg-blue-500 hover:text-white">Tires & Wheels care</button>
                    </div>
                    <div class="grid gap-8 grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-6">
                        <?php foreach(DBConn::select('estimator') as $item) {  ?>
                            <?php if ($item['service'] == '1') { ?>
                                <button type="button" data-row-data="<?= $item['id'] ?>" data-modal-target="package-form" data-modal-toggle="package-form" class="pms filter-element service-btn hover:bg-gray-200 border border-gray-300 rounded-md shadow text-center text-gray-500 dark:text-gray-400 p-2">
                                    <img class="mx-auto mb-4 w-20 h-20 rounded-md" src="assets/storage/pms/Oil-change.png" alt="pms">
                                    <h3 class="mb-1 text-base font-bold tracking-tight text-gray-900 dark:text-white">
                                        <?= $item['name'] ?>
                                    </h3>
                                </button>
                            <?php } else if ($item['service'] == '2') { ?>
                                <button type="button" data-row-data="<?= $item['id'] ?>" data-modal-target="package-form" data-modal-toggle="package-form" class="ps filter-element service-btn hover:bg-gray-200 border border-gray-300 rounded-md shadow text-center text-gray-500 dark:text-gray-400 p-2">
                                    <img class="mx-auto mb-4 w-20 h-20 rounded-md" src="assets/storage/pms/Oil-change.png" alt="pms">
                                    <h3 class="mb-1 text-base font-bold tracking-tight text-gray-900 dark:text-white">
                                        <?= $item['name'] ?>
                                    </h3>
                                </button>
                            <?php } else if ($item['service'] == '3') { ?> 
                                <button type="button" data-row-data="<?= $item['id'] ?>" data-modal-target="package-form" data-modal-toggle="package-form" class="ac filter-element service-btn hover:bg-gray-200 border border-gray-300 rounded-md shadow text-center text-gray-500 dark:text-gray-400 p-2">
                                    <img class="mx-auto mb-4 w-20 h-20 rounded-md" src="assets/storage/pms/Oil-change.png" alt="pms">
                                    <h3 class="mb-1 text-base font-bold tracking-tight text-gray-900 dark:text-white">
                                        <?= $item['name'] ?>
                                    </h3>
                                </button>
                                <?php } else if ($item['service'] == '4') { ?> 
                                <button type="button" data-row-data="<?= $item['id'] ?>" data-modal-target="package-form" data-modal-toggle="package-form" class="twc filter-element service-btn hover:bg-gray-200 border border-gray-300 rounded-md shadow text-center text-gray-500 dark:text-gray-400 p-2">
                                    <img class="mx-auto mb-4 w-20 h-20 rounded-md" src="assets/storage/pms/Oil-change.png" alt="pms">
                                    <h3 class="mb-1 text-base font-bold tracking-tight text-gray-900 dark:text-white">
                                        <?= $item['name'] ?>
                                    </h3>
                                </button>
                            <?php } ?> 
                        <?php } ?>
                    </div>
                </div>
            </section>
            <div id="calendar"></div>
        </div>
    </div>
</main> 

<div id="package-form" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full"> 
        <div class="relative bg-white rounded-lg shadow"> 
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Package
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="package-form">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div> 
            <div class="p-4 md:p-5 space-y-4"> 
                <div id="inclusions-container" class="grid grid-cols-3 gap-y-2 mb-4">  
                </div> 
                <div class="flex gap-5">
                    <p>Price: ₱<span id="price" class="font-semibold"></span></p>
                    <p>Quantity: <span id="quantity" class="font-semibold"></span></p>
                    <p>Recommended: <span id="mileage" class="font-semibold"></span></p>
                </div>
            </div> 
        </div>
    </div>
</div> 

<script type="text/javascript">
    $('.filter-btn').click(function() {
        const target = $(this).data('target');
        if (target === 'all') {
            $('.filter-element').show();
        } else {
            $('.filter-element').hide();
            $(`.${target}`).show();
        }  

        $('.filter-btn').removeClass('bg-blue-500 text-white'); 
        $(this).addClass('bg-blue-500 text-white');
    });

    $('.service-btn').click(function() {
        const id = $(this).data('row-data');
        $.get(`?user_rq=show_service_package&id=${id}`, (res) => {
            console.log(res);
            const container =  $('#inclusions-container');
            container.empty();
            for (let i = 0; i < res.inclusions.length; i++) {
                const package = res.inclusions[i]; 
                const packages = $('<p>').html(`
                        <span class="bg-green-100 rounded-full text-sm px-[0.5px] py-[1px]">✔</span>
                        <label class="text-sm">${package}</label>
                    `);

                    container.append(packages);
            }

            $('#price').text(res.estimator[0].price);
            $('#quantity').text(res.estimator[0].quantity)
            $('#mileage').text(res.estimator[0].mileage)
        });
    });
</script>