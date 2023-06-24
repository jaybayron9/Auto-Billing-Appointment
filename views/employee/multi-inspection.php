<?php include view('employee', 'navbars') ?>
<main class="ttr-wrapper" style="background-color: #F3F3F3;">
    <div class="container-fluid mb-10">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">WELCOME TO CJCE AUTO PARTS</h4>
            <ul class="db-breadcrumb-list">
                <li><i class="fa fa-home"></i>Multi-inspection</li>
            </ul>
        </div>
        <div class="flex gap-x-5 mb-4">
            <a href="" class="border-2 border-gray-600 rounded px-3 shadow-md hover:shadow-none font-bold bg-gray-500 ">GAS</a>
            <a href="" class="border-2 border-gray-600 rounded px-3 shadow-md hover:shadow-none font-bold">DIESEL</a>
        </div>
        <div class="mb-8 rounded-md shadow-md bg-gray-50" data-drawer-hide="drawer-backdrop" aria-controls="drawer-backdrop">
            <ul class="grid grid-cols-5 gap-5 p-3">
                <?php foreach(DBConn::select('services') as $service) { ?>
                <li class="">
                    <div class="bg-cover bg-center bg-no-repeat rounded-md shadow-md bg-sky-400">
                        <div class="flex text-white" style="font-size: 23px; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);">
                            <a data-row-data="<?= $service['id'] . ',' . $service['service'] . ',' . $service['price'] ?>" class="add-button h-36 w-full hover:cursor-pointer rounded-lg inline-flex justify-center items-center font-bold capitalize">
                                <?= $service['service'] ?> <br>
                                ₱  <?= number_format($service['price'], 2) ?>
                            </a>
                        </div>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="bg-gray-50 p-2 rounded-md shadow-md">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 ">
                    <tr class="border-b-2 border-gray-500">
                        <th class="px-4 py-2">SERVICE/ITEM</th>
                        <th class="px-4 py-2 text-center">QTY</th>
                        <th class="text-center">PRICE</th>
                        <th class="text-center">REMOVE</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Service Goes Here -->
                </tbody>
            </table>
            <div class="grid lg:grid-cols-3 w-full mb-2">
                <p class="col-span-2 font-semibold text-sm text-right mr-20">TOTAL</p>
                <p class="font-semibold text-medium">
                    ₱ 
                    <span id="total" class="text-gray-900">
                        1000
                    </span>
                </p>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    $(function() {
        $('.add-button').click(function () {
            var str = $(this).data('row-data');
            var values = str.split(',');

            var id = values[0];
            var name = values[1];
            var price = parseFloat(values[2]);
            var exist = false;
            var $quantityCell, $priceCell;
            var quantity = 1;

            $('tbody tr td:first-child').each(function () {
                if ($(this).text() === name) {
                    exist = true;
                    $quantityCell = $(this).closest('tr').find('td:nth-child(2)');
                    $priceCell = $(this).closest('tr').find('td:nth-child(3)');
                    return false;
                }
            });

            if (isNaN(price)) {
                alert('Invalid price value');
                return;
            }

            if (exist) {
                // var quantity = parseFloat($quantityCell.text()) + 1;
                // var total_price = parseFloat($priceCell.text()) + price;
                // $quantityCell.text(quantity);
                // $('tr.product-row').removeClass('bg-gray-200'); 
                // $quantityCell.closest('.product-row').addClass('bg-gray-200'); 
                // $priceCell.text(total_price);
            } else {
                var row = '<tr class="text-center order-rows hover:bg-green-100 border-b border-gray-200">';
                        row += '<td class="text-left text-gray-900 pl-2 py-2 capitalize text-sm">' + name + '</td>';
                        row += '<td class="text-center text-gray-900 text-sm">1</td>'; 
                        row += '<td class="text-center text-gray-900 pl-2 py-2 capitalize text-sm">' + price.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + '</td>';
                        row += '<td class="delcol text-gray-900"><button class="delete-button"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-1 text-red-500"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg></button></td>';
                    row += '</tr>';

                $('tbody').append(row);
                $('tr.product-row').removeClass('bg-gray-200'); 
                $('tr.product-row:first-child').addClass('bg-gray-200'); 
            }

            updateTotal();
        });

        $(document).on('click', '.delete-button', function () {
            $(this).closest('tr').remove();
            updateTotal();
        });

        function updateTotal() {
            var total = 0;
            var $tbody = $('tbody');

            $('tbody tr td:nth-child(3)').each(function () {
                total += parseFloat($(this).text());
            });

            $('#total').text(total.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}));
        }
        updateTotal();
    });
</script>