<?php include view('employee', 'navbars') ?>
<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Multi-inspection</li>
            </ul>
        </div>
        <div class="flex gap-x-5 mb-4">
            <a href="#" class="border-2 border-gray-600 rounded px-3 shadow-md hover:shadow-none">GAS</a>
            <a href="" class="border-2 border-gray-600 rounded px-3 shadow-md hover:shadow-none">DIESEL</a>
        </div>
        <div class="mb-8 rounded-md shadow-md bg-gray-50" data-drawer-hide="drawer-backdrop" aria-controls="drawer-backdrop">
            <ul class="grid grid-cols-5 gap-5 p-3">
                <li class="">
                    <div class="bg-cover bg-center bg-no-repeat rounded-md shadow-md bg-yellow-200">
                        <div class="flex" style="font-size: 23px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
                            <a data-row-data="" class="h-36 w-full hover:cursor-pointer rounded-lg inline-flex justify-center items-center font-bold">
                                WHEEL
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="bg-gray-50 p-2 rounded-md shadow-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 ">
                    <tr class="border-b-2 border-gray-500">
                        <th class="px-4 py-2">SERVICE</th>
                        <th class="text-center">PRICE</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center order-rows hover:bg-green-100 border-b border-gray-200">
                        <td class="text-left text-gray-900 pl-2 py-2 capitalize text-sm">WHEEL</td>
                        <td class="text-gray-900 text-sm">₱ 1,000.00</td>
                        <td class="delcol text-gray-900"><button class="delete-button"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-1 text-red-500"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>