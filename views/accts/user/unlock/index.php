<?php include view('accts/user/unlock', 'head.auth') ?>

<?php include view('accts/user/unlock/navbars', 'topbar') ?>
<?php include view('accts/user/unlock/navbars', 'sidebar') ?>
<?php //include view('accts/user/unlock/components', 'chat-support') ?>

<main id="main-content" class="relative h-full overflow-y-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 my-[80px]">
        <div class="flex justify-center align-center  h-screen">
            <h1 class="mb-3 text-2xl font-bold leading-tight text-gray-900 sm:text-4xl lg:text-5xl dark:text-white">
                Welcome CJCE <span class="text-rose-500"><?= $user_info[0]['name'] ?></span>
            </h1>
        </div>
    </div>
</main>