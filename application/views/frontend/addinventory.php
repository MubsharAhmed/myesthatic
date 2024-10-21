 <style>
     .lock {
         position: absolute;
         right: 30px;
         top: 63%;
         cursor: pointer;
     }

     .loader {
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background: rgba(255, 255, 255, 0.8);
         z-index: 9999;

         display: flex;
         justify-content: center;
         align-items: center;
     }

     .spinner-border {
         width: 3rem;
         height: 3rem;
         border-width: 0.4em;
     }
 </style>
 <!--start main wrapper-->
 <main class="main-wrapper">

     <!-- QR Code Modal -->
     <div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="qrModalLabel">QR Code Generated</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 </div>
                 <div class="modal-body text-center">
                     <img id="qrImage" src="" alt="QR Code" style="width: 150px; height: 150px;" />
                 </div>
                 <div class="modal-footer">
                     <a id="downloadQr" class="btn btn-primary" href="#" download>Download QR Code</a>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                 </div>
             </div>
         </div>
     </div>


     <div class="main-content">
         <h3 class="fmon">Add Inventory</h3>
         <form method="POST" action="<?= base_url('inventory/addInventoryData') ?>" enctype="multipart/form-data">
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

                     </select>
                 </div>
                 <div class="col-md-6 my-2">
                     <label class="slabel">Name</label>
                     <select class="form-select fsele" name="product_id" id="product_id" required>
                         <option value="">Select Product</option>
                         <!-- Products will be populated based on the selected brand -->
                     </select>
                 </div>
                 <div class="col-md-6 my-2 position-relative">
                     <label class="slabel">Units/Bottles</label>
                     <input type="text" class="form-control fsele" name="units_bottles" id="units_bottles" placeholder="Select Product" required readonly><i class="fa-solid fa-lock lock"></i>
                 </div>
                 <div class="col-md-6 my-2 position-relative">
                     <label class="slabel">Vile/Syringe</label>
                     <input type="text" class="form-control fsele" name="vile_syringe" placeholder="Select Product" id="vile_syringe" required readonly>
                     <i class="fa-solid fa-lock lock"></i>
                 </div>
                 <div class="col-md-6 my-2">
                     <label class="slabel">Quantity</label>
                     <input type="number" class="form-control fsele" name="quantity" id="quantity" placeholder="Write Here" required min="1">
                 </div>
                 <div class="col-md-6 my-2 position-relative">
                     <label class="slabel">Cost</label>
                     <input type="text" class="form-control fsele" name="cost" placeholder="Cost" required readonly>
                     <i class="fa-solid fa-lock lock"></i>
                 </div>
                 <div class="col-md-6 my-2 position-relative">
                     <label class="slabel">Today Date</label>
                     <input type="date" class="form-control fsele" name="today_date" required id="today-date" readonly>
                     <i class="fa-solid fa-lock lock"></i>
                 </div>
                 <div class="col-md-6 my-2">
                     <label class="slabel">Location</label>
                     <select class="form-select fsele" name="location_id" id="locationSelect" required>
                         <option value="" selected>Select Location</option>
                         <!-- Dynamic options will be populated here -->
                     </select>
                 </div>
                 <div class="col-md-6 my-2">
                     <label class="slabel">Date of Expiry</label>
                     <input type="date" class="form-control fsele" name="date_of_expiry" required>
                 </div>
                 <div class="col-md-6 my-2">
                     <label class="slabel">Lot Number</label>
                     <input type="text" class="form-control fsele" name="lot_number" required>
                 </div>
                 <!-- <div class="col-md-6 my-2">
                     <label class="slabel">Generate QR</label>
                     <img id="qrPreview" src="" alt="QR Code Preview" style="display:none; margin-top: 10px;" />
                     <button type="button" class="btn btnTap" onclick="generateQRCode()">Tap to Generate QR</button>

                 </div> -->
                 <div class="col-md-6 my-2">
                     <label class="slabel">Image</label>
                     <input type="file" class="d-none" id="imageUp" name="image" onchange="previewImage(event)" required>
                     <img id="imagePreview" src="#" alt="Image Preview" style="display: none; width: 150px; margin-top: 10px;" />
                     <label for="imageUp" class="btn btnTap">Tap to Upload Image</label>

                 </div>
                 <div class="col-md-12 my-2">
                     <div class="d-flex justify-content-center align-items-center w-100">
                         <button type="submit" class="btn btnAdd w-25">Add Inventory</button>
                     </div>
                 </div>
             </div>
         </form>
         <div id="loader" class="loader" style="display: none;">
             <div class="spinner-border" role="status">
                 <span class="visually-hidden">Loading...</span>
             </div>
         </div>



 </main>
 <!--end main wrapper-->

 <script>
     const today = new Date().toISOString().split('T')[0];
     document.getElementById('today-date').value = today;
 </script>


 <!--start overlay-->
 <div class="overlay btn-toggle"></div>
 <!--end overlay-->


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <script>
     $(document).ready(function() {
         $('#category_id').change(function() {
             var categoryId = $(this).val();
             $.ajax({
                 url: '<?= base_url('Inventory/getBrandsByCategory/') ?>' + categoryId,
                 method: 'GET',
                 dataType: 'json',
                 success: function(data) {
                     var brandSelect = $('#brand_id');
                     brandSelect.empty().append('<option value="">Select Brand</option>');

                     $.each(data.brands, function(index, brand) {
                         brandSelect.append('<option value="' + brand.id + '">' + brand.name + '</option>');
                     });
                     $('#product_id').empty().append('<option value="">Select Product</option>');
                 }
             });
         });

         $('#brand_id').change(function() {
             var brandId = $(this).val();

             $.ajax({
                 url: '<?= base_url('Inventory/getProductsByBrand/') ?>' + brandId,
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

         $('#quantity').on('input', function() {
             var quantity = $(this).val();
             var productId = $('#product_id').val();
             var categoryId = $('#category_id').val();
             var brandId = $('#brand_id').val();

             if (productId && categoryId && brandId) {
                 $.ajax({
                     url: '<?= base_url('Inventory/getProductPrice/') ?>' + productId + '?category_id=' + categoryId + '&brand_id=' + brandId,
                     method: 'GET',
                     dataType: 'json',
                     success: function(data) {
                         if (data.price !== null) {
                             var totalCost = data.price * quantity;
                             var formattedCost = '$' + totalCost.toLocaleString('en-US', {
                                 minimumFractionDigits: 2,
                                 maximumFractionDigits: 2
                             });
                             $('input[name="cost"]').val(formattedCost);
                         } else {
                             $('input[name="cost"]').val('$0.00');
                         }
                     }
                 });
             }
         });



         $('#product_id').change(function() {
             var productId = $(this).val();

             if (productId) {
                 $.ajax({
                     url: '<?= base_url('inventory/getProductDetails/') ?>' + productId,
                     method: 'GET',
                     dataType: 'json',
                     success: function(data) {
                         if (data) {

                             var units = data.units_bottle;
                             $('#units_bottles').val(units);
                             if (units.includes('ml')) {
                                 $('#vile_syringe').val('Syringe');
                             } else if (units.toLowerCase().includes('units')) {
                                 $('#vile_syringe').val('Vile');
                             }
                         }
                     },
                     error: function() {
                         console.error('Failed to fetch product details.');
                     }
                 });
             } else {
                 $('#units_bottles').val('');
                 $('#vile_syringe').val('');
             }
         });


         function fetchLocations() {
             $.ajax({
                 url: '<?php echo base_url("Location/getLocations"); ?>',
                 type: 'GET',
                 success: function(response) {
                     response = JSON.parse(response);

                     var options = '<option value="" selected>Select Location</option>';
                     if (response.data.length > 0) {
                         $.each(response.data, function(index, location) {
                             options += `<option value="${location.id}">${location.name}</option>`;
                         });
                     } else {
                         options += '<option value="" disabled>No locations available</option>';
                     }

                     $('#locationSelect').html(options);
                 }
             });
         }
         fetchLocations();


         $('form').on('submit', function(e) {
             $('#loader').show();
             return true;
         });
     });

     $(document).ready(function() {
         $('form').on('submit', function(event) {
             event.preventDefault(); 

             $('#loader').show(); 

             $.ajax({
                 url: $(this).attr('action'),
                 type: 'POST',
                 data: new FormData(this),
                 contentType: false,
                 processData: false,
                 dataType: 'json',
                 success: function(response) {
                     $('#loader').hide();

                     if (response.success) {
                         $('#qrModal .modal-body img').attr('src', response.qr_image);

                         $('#downloadQr').attr('href', "<?= base_url('download.php?file=') ?>" + encodeURIComponent(response.qr_image));

                         // Show the modal
                         $('#qrModal').modal('show');
                     } else {
                         alert(response.error); // Show error if any
                     }
                 },
                 error: function() {
                     $('#loader').hide(); // Hide the loader on error
                     alert('An error occurred while processing the form.');
                 }
             });
         });

         // Show loader during download and redirect after download is initiated
         $('#downloadQr').on('click', function() {
             $('#loader').show(); // Show the loader when download button is clicked

             setTimeout(function() {
                 $('#loader').hide(); // Hide the loader after a short delay
                 window.location.href = "<?= base_url('inventory') ?>"; // Redirect to inventory page after download starts
             }, 2000); // Delay to ensure download starts before hiding loader and redirecting
         });

         // Redirect to inventory page after modal is closed
         $('#qrModal').on('hidden.bs.modal', function() {
             window.location.href = "<?= base_url('inventory') ?>"; // Redirect to inventory page when modal is closed
         });
     });

     function previewImage(event) {
         var imagePreview = document.getElementById('imagePreview');
         imagePreview.src = URL.createObjectURL(event.target.files[0]);
         imagePreview.style.display = 'block';
     }
 </script>

 <script>
     function generateQRCode() {
         const categoryId = document.querySelector('[name="category_id"]').value;
         const brandId = document.querySelector('[name="brand_id"]').value;
         const productId = document.querySelector('[name="product_id"]').value;
         const unitsBottles = document.querySelector('[name="units_bottles"]').value;
         const vileSyringe = document.querySelector('[name="vile_syringe"]').value;
         const quantity = document.querySelector('[name="quantity"]').value;
         const cost = document.querySelector('[name="cost"]').value;
         const todayDate = document.querySelector('[name="today_date"]').value;
         const locationId = document.querySelector('[name="location_id"]').value;
         const dateOfExpiry = document.querySelector('[name="date_of_expiry"]').value;
         const lotNumber = document.querySelector('[name="lot_number"]').value;

         // Debugging to see which field is empty
         console.log({
             categoryId,
             brandId,
             productId,
             unitsBottles,
             vileSyringe,
             quantity,
             cost,
             todayDate,
             locationId,
             dateOfExpiry,
             lotNumber
         });

         if (!categoryId || !brandId || !productId || !unitsBottles || !vileSyringe || !quantity || !cost || !todayDate || !locationId || !dateOfExpiry || !lotNumber) {
             alert('Please fill the form completely before generating the QR code.');
             return;
         }

         const qrData = `
        Category ID: ${categoryId}, 
        Brand ID: ${brandId}, 
        Product ID: ${productId}, 
        Units/Bottles: ${unitsBottles}, 
        Vile/Syringe: ${vileSyringe}, 
        Quantity: ${quantity}, 
        Cost: ${cost}, 
        Today Date: ${todayDate}, 
        Location ID: ${locationId}, 
        Date of Expiry: ${dateOfExpiry}, 
        Lot Number: ${lotNumber}
    `;
         const qrCodeUrl = `https://api.qrserver.com/v1/create-qr-code/?data=${encodeURIComponent(qrData)}&size=150x150`;

         const qrPreview = document.getElementById('qrPreview');
         qrPreview.src = qrCodeUrl;
         qrPreview.style.display = 'block';
     }
 </script>