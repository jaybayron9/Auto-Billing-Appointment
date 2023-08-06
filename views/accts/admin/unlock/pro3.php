<?php include view('accts/admin/unlock', 'head.auth'); ?>
<?php include view('accts/admin/unlock/navbars', 'topbar') ?>
<?php include view('accts/admin/unlock/navbars', 'sidebar') ?>

<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="assets/css/responsive.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/table.css">

<main id="main-content" class="relative h-full overflow-auto lg:ml-64 dark:bg-gray-900">
    <div class="px-4 h-full my-[80px]">
        <div class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">
            <div class="mb-5 flex gap-x-5">
                <div class="flex flex-row shadow-md p-2 border border-gray-200">
                    <label for="category" class="font-semibold font-mono">CATEGORY:</label>
                    <select name="" id="category" class="py-0 rounded">
                        <option value="1">PMS Package</option>
                        <option value="2">Periodic Services</option>
                        <option value="3" <?= urlIs('vs=_admin/pro3') ? 'selected' : '' ?>>AC Services & Repair</option>
                        <option value="4">Tires & Wheels Care</option>
                    </select>
                </div>
                <div class="ml-auto">
                    <div class="p-1">
                        <button id="add-product-btn" data-modal-target="product-modal" data-modal-toggle="product-modal" class="btn inline-flex items-center px-3 py-[6px] bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                            Add
                        </button>
                    </div>
                </div>
            </div>
            <table id="table" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1" class="whitespace-nowrap text-xs uppercase text-center text-white">name</th>
                        <th data-priority="3" class="whitespace-nowrap text-xs uppercase text-center text-white">inclusions</th>
                        <th data-priority="4" class="whitespace-nowrap text-xs uppercase text-center text-white">price</th>
                        <th data-priority="5" class="whitespace-nowrap text-xs uppercase text-center text-white">created_at</th>
                        <th data-priority="2" data-orderable="false" class="whitespace-nowrap text-xs uppercase text-center text-white" style="max-width: 40px;">ACTION</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php foreach ($conn::select('estimator', '*', ['service' => 3]) as $item) { ?>
                        <tr data-row-id="<?= $item['id'] ?>">
                            <td class="text-sm whitespace-nowrap"><?= $item['name'] ?></td>
                            <td class="text-sm whitespace-nowrap">
                                <p class="flex gap-2">
                                    <?php
                                    $inclusions = array_filter(explode(", ", $item['inclusions']));
                                    for ($i = 0; $i < count($inclusions); $i++) {
                                        echo "<span class='mx-0 px-2 rounded bg-lime-200 font-semibold shadow-md'>"
                                            . $inclusions[$i] .
                                            "</span>";
                                    }
                                    ?>
                                </p>
                            </td>
                            <td class="text-sm whitespace-nowrap">&#8369; <?= number_format($item['price'], 2) ?></td>
                            <td class="text-sm whitespace-nowrap"><?= date('F m, Y', strtotime($item['created_at'])) ?></td>
                            <td class="text-sm text-center flex gap-x-2">
                                <button type="button" data-row-data="<?= $item['id'] ?>" title="Delete product" class="delete-btn btn text-red-500 border border-gray-300 rounded p-1 shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 013.878.512.75.75 0 11-.256 1.478l-.209-.035-1.005 13.07a3 3 0 01-2.991 2.77H8.084a3 3 0 01-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 01-.256-1.478A48.567 48.567 0 017.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 013.369 0c1.603.051 2.815 1.387 2.815 2.951zm-6.136-1.452a51.196 51.196 0 013.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 00-6 0v-.113c0-.794.609-1.428 1.364-1.452zm-.355 5.945a.75.75 0 10-1.5.058l.347 9a.75.75 0 101.499-.058l-.346-9zm5.48.058a.75.75 0 10-1.498-.058l-.347 9a.75.75 0 001.5.058l.345-9z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button type="button" data-modal-target="product-modal" data-modal-toggle="product-modal" data-row-data="<?= $item['id'] ?>" title="Edit product" class="edit-btn btn text-green-500 border border-gray-300 rounded p-1 shadow-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.responsive.min.js"></script>
<?php include view('templates', 'product_forms') ?>