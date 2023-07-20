<?php include view('accts/support/unlock', 'head.auth') ?>

<?php include view('accts/support/unlock/navbars', 'topbar') ?>
<?php include view('accts/support/unlock/navbars', 'sidebar') ?>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 my-[80px]">
        <div class="flex justify-center align-center  h-screen">
            <h1 class="mb-3 text-2xl font-bold leading-tight text-gray-900 sm:text-4xl lg:text-5xl dark:text-white">
                Welcome CJCE <span class="text-rose-500"><?= $support_info[0]['name'] ?></span>
            </h1>
        </div>
    </div>
</main>