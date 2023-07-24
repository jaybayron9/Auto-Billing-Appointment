<?php 
$html = '

<link rel="stylesheet" href="../assets/tailwind/output.css"> 
<div class="p-6 space-y-6">
    <div class="grid grid-cols-3 text-center border-b-2 border-gray-400 pb-2">
        <h1 class="text-xl font-semibold">Customer details</h1>
        <h1 class="text-xl font-semibold">Vehicle detail </h1>
        <h1 class="text-xl font-semibold">Schedule</h1>
    </div>
    <div class="grid grid-cols-3 border-b-2 border-gray-400 pb-2">
        <div class="-mt-4 ml-6">
            <p class="whitespace-nowrap font-semibold">Name : <span class="font-normal"></span></p>
            <p class="whitespace-nowrap font-semibold">Email : <span class="font-normal"></span></p>
            <p class="whitespace-nowrap font-semibold">Contact : <span class="font-normal"></span></p>
        </div>
        <div class="-mt-4 ml-6">
            <p class="whitespace-nowrap font-semibold">Brand : <span class="font-normal"></span></p>
            <p class="whitespace-nowrap font-semibold">Model : <span class="font-normal"></span></p>
        </div>
        <div class="-mt-4 text-center">
            <p></p>
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
</div>';
echo $html;