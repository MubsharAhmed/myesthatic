<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <h3 class="fmon">Add Product Cost</h3>
        <form method="POST" action="<?= base_url('cost/addProductCost') ?>">
            <div class="row my-2">
                <div class="col-md-6 my-2">
                    <label class="slabel">Category</label>
                    <select class="form-select fsele" name="category_id" id="category_id" required>
                        <option value="" disabled selected>Select Category</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 my-2">
                    <label class="slabel">Brand</label>
                    <select class="form-select fsele" name="brand_id" id="brand_id" required>
                        <option value="">Select Brand</option>
                        <!-- Brands will be populated based on the selected category -->
                    </select>
                </div>
                <div class="col-md-6 my-2">
                    <label class="slabel">Name</label>
                    <select class="form-select fsele" name="product_id" id="product_id" required>
                        <option value="">Select Product</option>
                        <!-- Products will be populated based on the selected brand -->
                    </select>
                </div>

                <div class="col-md-6 my-2">
                    <label class="slabel">Units/Bottle</label>
                    <select class="form-select fsele" name="units_per_bottle" id="units_per_bottle" required>
                        <option value="">Select Units/Bottle</option>
                        <!-- Dynamic options will be populated here -->
                    </select>
                </div>

                <div class="col-md-6 my-2">
                    <label class="slabel">Quantity</label>
                    <input type="number" class="form-control fsele" name="quantity" id="" placeholder="Write Here" required value="1" min="1">
                </div>

                <div class="col-md-6 my-2">
                    <label class="slabel">Cost</label>
                    <input type="number" class="form-control fsele" name="cost" id="" placeholder="Write Here" required>
                </div>



                <div class="col-md-12 my-2">
                    <div class="d-flex justify-content-center align-items-center w-100">
                        <button type="submit" class="btn btnAdd w-25">Add Cost</button>
                    </div>
                </div>
            </div>
        </form>




    </div>
</main>
<!--end main wrapper-->


<!--start overlay-->
<div class="overlay btn-toggle"></div>
<!--end overlay-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category_id').change(function() {
            var categoryId = $(this).val();
            $.ajax({
                url: '<?= base_url('cost/getBrandsByCategory/') ?>' + categoryId,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var brandSelect = $('#brand_id');
                    brandSelect.empty().append('<option value="">Select Brand</option>');

                    $.each(data.brands, function(index, brand) {
                        brandSelect.append('<option value="' + brand.id + '">' + brand.name + '</option>');
                    });

                    // Reset product select
                    $('#product_id').empty().append('<option value="">Select Product</option>');
                }
            });
        });

        $('#brand_id').change(function() {
            var brandId = $(this).val();


            $.ajax({
                url: '<?= base_url('cost/getProductsByBrand/') ?>' + brandId,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var productSelect = $('#product_id');
                    productSelect.empty().append('<option value="">Select Product</option>');

                    $.each(data.products, function(index, product) {
                        productSelect.append('<option value="' + product.id + '">' + product.product_name + '</option>');
                    });
                }
            });
        });


        $(document).ready(function() {
            // Fetching price and units when product changes
            $('#product_id').change(function() {
                var productId = $(this).val();

                // Fetch product price
                $.ajax({
                    url: '<?= base_url('cost/getPriceByProduct/') ?>' + productId,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data && data.price) {
                            $('#cost').data('price', data.price); 
                            $('#quantity').val(1);
                            updateTotalCost(); // Update total cost with the new price
                        }
                    },
                    error: function() {
                        console.error('Failed to fetch price.');
                    }
                });

                // Fetch units bottle 
                $.ajax({
                    url: '<?= base_url('cost/getUnitsByProduct/') ?>' + productId,
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var unitsBottleSelect = $('#units_per_bottle');
                        unitsBottleSelect.empty().append('<option value="' + data.units_bottle + '">' + data.units_bottle + '</option>');
                        // Call to update division or any additional calculations if needed
                        updateDivision(); // Update division on product change
                    },
                    error: function() {
                        console.error('Failed to fetch units bottle.');
                    }
                });
            });

            // Update cost based on quantity and price
            $('#quantity').on('input', function() {
                updateTotalCost();
            });

            // Update division based on cost and units
            $('#cost').on('input', function() {
                updateDivision();
            });

            // Update total cost based on quantity and product price
            function updateTotalCost() {
                var price = $('#cost').data('price');
                var quantity = $('#quantity').val();

                // Ensure price and quantity are valid numbers
                if (!isNaN(price) && price > 0 && !isNaN(quantity) && quantity >= 0) {
                    var totalCost = price * quantity; // Calculate total cost
                    $('#cost').val(totalCost); // Update the cost input field
                    updateDivision(); // Update division based on the new cost
                } else {
                    $('#cost').val(''); // Clear the cost if inputs are invalid
                }
            }

            // Update division based on the cost and selected units
            function updateDivision() {
                var cost = $('#cost').val();
                var units = $('#units_per_bottle').val();

                // Calculate division only if both values are valid numbers
                if (!isNaN(cost) && cost > 0 && !isNaN(units) && units > 0) {
                    var divisionCost = cost / units; // Calculate division
                    $('#dividing_cost_product').val(divisionCost.toFixed(2)); // Update the division input field with two decimal places
                } else {
                    $('#dividing_cost_product').val(''); // Clear the division if inputs are invalid
                }
            }
        });





    });
</script>