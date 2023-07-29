<?php include view('accts/support/unlock', 'head.auth') ?>
<?php include view('accts/support/unlock/navbars', 'topbar') ?>
<?php include view('accts/support/unlock/navbars', 'sidebar') ?>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 my-[80px]">
        <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
            <div class="md:col-span-3 flex flex-col justify-center items-center px-6 mx-auto xl:px-0 dark:bg-gray-900">
                <div class="block mb-5 md:max-w-md">
                    <img src="assets/storage/system/home.png" alt="cjce">
                </div>
                <div class="text-center xl:max-w-4xl">
                    <h1 class="mb-3 text-2xl font-bold leading-tight text-gray-900 sm:text-4xl lg:text-5xl dark:text-white">
                        Welcome Back! <span class="text-rose-500"><?= $support_info[0]['name'] ?></span>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</main>