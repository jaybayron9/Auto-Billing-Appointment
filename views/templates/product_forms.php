<div id="product-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <form class="product-form relative bg-white rounded-lg shadow">
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    <span id="modal-title"></span>    
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="product-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-6"> 
                <input type="hidden" name="category" value="<?= $category($_GET['vs']) ?>">
                <input type="hidden" name="type" value="<?= $type($_GET['vs']) ?>">
                <input type="hidden" name="product_id" id="product_id">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="text" name="price" id="price" class="number bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600">
                    </div>
                    <div class="md:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea name="description" id="description" rows="5" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"></textarea>
                    </div>
                </div>
            </div>
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                <button data-modal-hide="product-modal" type="button" class="ml-auto text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Cancel</button>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    var table = $('#table').DataTable({
        responsive: true,
        "lengthMenu": [10, 25, 50, 100, 1000],
        "drawCallback": () => {
            $('.delete-btn').click(function() {
                var id = $(this).data('row-data'); 
                swal({
                    text: "Are you sure you want to remove this product?",
                    icon: "warning",
                    buttons: ["No", "Yes"],
                    dangerMode: true,
                }) .then((cancel) => {
                    if (cancel) {
                        $.post("?admin_rq=remove_product", {id:id},
                            function (resp, textStatus, jqXHR) {
                                var tableRow = $('tr[data-row-id="' + id + '"]');
                                table.row(tableRow).remove().draw();
                                dialog('border-green-600 text-green-700', 'Product succesfully deleted');
                            }
                        );
                    }
                });
            });

            $('.edit-btn').click(function() {
                $('#modal-title').text('Update Product')
                $('.product-form').removeAttr('id');
                $('.product-form').attr('id', 'update-form');

                var id = $(this).data('row-data');
                $.post("?admin_rq=get_product", {id: id},
                    function (data, textStatus, jqXHR) {
                        if (textStatus === 'success') {
                            $('#product_id').val(id);
                            $('#name').val(data[0].name);
                            $('#price').val(data[0].price);
                            $('#description').val(data[0].inclusions);
                        }
                    },
                    "json"
                );
            });
        }
    });

    $(document).on('submit', '#add-form', function(e) {
        e.preventDefault();
        $.post("?admin_rq=add_product", $(this).serialize(),
            function (resp, textStatus, jqXHR) {
                if (textStatus === 'success') {
                    window.location.reload();
                }
            }
        );
    });

    $(document).on('submit', '#update-form', function(e) {
        e.preventDefault();
        $.post("?admin_rq=update_product", $(this).serialize(),
            function (resp, textStatus, jqXHR) {
                if (textStatus === 'success') {  window.location.reload(true); }
            },
        );
    });

    $('#add-product-btn').click(() => {
        $('.product-form').removeAttr('id');
        $('.product-form').attr('id', 'add-form');
        $('#modal-title').text('Add Product');
        $('#name').val('');
        $('#price').val('');
        $('#description').val('');
        $('#product_id').val('');
    })

    $('#type').change(function() {
        var val = $(this).val();

        switch (val) {
            case '1': window.location.replace('?vs=_admin/pro1diesel')
                break;
            default: window.location.replace('?vs=_admin/pro1gas')
                break;
        }
    });

    $('#category').change(function() {
        var val = $(this).val();

        switch (val) {
            case '1': window.location.replace('?vs=_admin/pro1diesel')
                break;
            case '2': window.location.replace('?vs=_admin/pro2')
                break;
            case '3': window.location.replace('?vs=_admin/pro3')
                break;
            default: window.location.replace('?vs=_admin/pro4')
                break;
        }
    })
</script>