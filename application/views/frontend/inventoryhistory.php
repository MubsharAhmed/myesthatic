 <style>
    #pagination {
    margin-top: 20px;
    text-align: center;
}

.page-button {
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    color: #333;
    padding: 5px 10px;
    margin: 0 5px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
}

.page-button:hover {
    background-color: #ddd;
}

.page-button.active {
    background-color: #007bff;
    color: #fff;
    border-color: #007bff;
}
 </style>
 <main class="main-wrapper">
     <div class="main-content">
         <div class="row">
             <div class="row">
                 <div class="col-md-3">
                     <small>&nbsp;</small>
                     <h3 class="fmon">Inventory History</h3>
                 </div>
                 <div class="col-md-9">
                     <div class="row justify-content-end">
                         <div class="col-md-4 my-1">
                             <small>Filter</small>
                             <select name="" id="dateRangeFilter" class="form-select fsele">
                                 <option value="all" selected>All</option>
                                 <option value="today">Today</option>
                                 <option value="this_week">This Week</option>
                                 <option value="last_week">Last Week</option>
                                 <option value="this_month">This Month</option>
                                 <option value="last_month">Last Month</option>
                                 <option value="custom">Custom Range</option> <!-- Option for custom date range -->
                             </select>
                         </div>
                         <div class="col-md-4 my-1">
                             <label for="fromDate">From:</label>
                             <input type="date" id="fromDate" class="form-control fsele" />
                         </div>
                         <div class="col-md-4 my-1">
                             <label for="toDate">To:</label>
                             <input type="date" id="toDate" class="form-control fsele" />
                         </div>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-12">
                     <p>Report Filter:</p>
                     <div class="my-2 d-flex justify-content-between gap-2 flex-wrap">
                         <div class="filtr">
                             <label for="brandFilter">Brand</label>
                             <select name="brandFilter" id="brandFilter" class="form-select fsele">
                                 <option value="">Select Brand</option>
                                 <?php foreach ($brands as $brand): ?>
                                     <option value="<?php echo $brand['id']; ?>"><?php echo $brand['name']; ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>

                         <div class="filtr">
                             <label for="productTypeFilter">Product Type</label>
                             <select name="productTypeFilter" id="productTypeFilter" class="form-select fsele">
                                 <option value="">Select Product Type</option>
                                 <?php foreach ($productTypes as $productType): ?>
                                     <option value="<?php echo $productType['id']; ?>"><?php echo $productType['product_name']; ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>

                         <div class="filtr">
                             <label for="assignedFilter">Assigned To</label>
                             <select name="assignedFilter" id="assignedFilter" class="form-select fsele">
                                 <option value="">Select User</option>
                                 <?php foreach ($users as $user): ?>
                                     <option value="<?php echo $user['id']; ?>">
                                         <?php
                                            // Check if name is empty and use first_name and last_name if so
                                            echo !empty($user['name']) ? $user['name'] : $user['first_name'] . ' ' . $user['last_name'];
                                            ?>
                                     </option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                         <div class="filtr">
                             <label for="locationFilter">Location</label>
                             <select name="locationFilter" id="locationFilter" class="form-select fsele">
                                 <option value="">Select Location</option>
                                 <?php foreach ($locations as $location): ?>
                                     <option value="<?php echo $location['id']; ?>"><?php echo $location['name']; ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                     </div>
                     <div class="mCard">
                         <div class="table-responsive">
                             <table class="table">
                                 <thead>
                                     <tr>
                                         <th>Brand</th>
                                         <th>Category</th>
                                         <th>Assigned to</th>
                                         <th>Date</th>
                                         <th>Location</th>
                                         <th>Units</th>
                                         <th>Units Left</th>
                                         <th>Price</th>
                                         <th>QR Code</th>
                                         <th>Actions</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <!-- Data will be populated dynamically via AJAX -->
                                 </tbody>
                             </table>
                         </div>
                         <!-- <div class="pagination">
                             <button id="prev-page" class="btn btn-secondary">Previous</button>
                             <button id="next-page" class="btn btn-secondary">Next</button>
                         </div> -->
                         <div id="pagination"></div>
                     </div>
                 </div>
             </div>
         </div>
 </main>
 <!--start overlay-->
 <div class="overlay btn-toggle"></div>
 <!--end overlay-->

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
    $(document).ready(function() {
    $('#fromDate, #toDate').parent().hide();

    $('#dateRangeFilter').change(function() {
        if ($(this).val() === 'custom') {
            $('#fromDate, #toDate').parent().show();
        } else {
            $('#fromDate, #toDate').parent().hide();
            $('#fromDate').val('');
            $('#toDate').val('');
        }
    });

    function getDateRange(option) {
        let fromDate = null, toDate = null;
        const today = new Date();

        switch (option) {
            case 'all':
                fromDate = toDate = null;
                break;
            case 'today':
                fromDate = toDate = today;
                break;
            case 'this_week':
                fromDate = new Date(today);
                fromDate.setDate(today.getDate() - today.getDay());
                toDate = new Date(fromDate);
                toDate.setDate(fromDate.getDate() + 6);
                break;
            case 'last_week':
                fromDate = new Date(today);
                fromDate.setDate(today.getDate() - today.getDay() - 7);
                toDate = new Date(fromDate);
                toDate.setDate(fromDate.getDate() + 6);
                break;
            case 'this_month':
                fromDate = new Date(today.getFullYear(), today.getMonth(), 1);
                toDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                break;
            case 'last_month':
                fromDate = new Date(today.getFullYear(), today.getMonth() - 1, 1);
                toDate = new Date(today.getFullYear(), today.getMonth(), 0);
                break;
            case 'custom':
                const fromDateString = $('#fromDate').val();
                const toDateString = $('#toDate').val();
                if (fromDateString && toDateString) {
                    fromDate = new Date(fromDateString);
                    toDate = new Date(toDateString);
                } else {
 return {
                        fromDate: null,
                        toDate: null
                    };
                }
                break;
        }

        return {
            fromDate,
            toDate
        };
    }

    let currentPage = 0;
    const limit = 7;

    function loadFilteredData(offset) {
        const brand_id = $('#brandFilter').val();
        const product_id = $('#productTypeFilter').val();
        const date_range = $('#dateRangeFilter').val();
        const assigned_uid = $('#assignedFilter').val();
        const location_id = $('#locationFilter').val();
        const {
            fromDate,
            toDate
        } = getDateRange(date_range);
        $.ajax({
            url: "<?= base_url('inventory/filter_inventory') ?>",
            method: "POST",
            dataType: "json",
            data: {
                brand_id: brand_id,
                product_id: product_id,
                from_date: fromDate ? fromDate.toISOString().split('T')[0] : null,
                to_date: toDate ? toDate.toISOString().split('T')[0] : null,
                assigned_uid: assigned_uid,
                location_id: location_id,
                limit: limit,
                offset: offset
            },
            success: function(data) {
                $('tbody').html('');
                $.each(data.data, function(index, item) {
                    $('tbody').append(`
                    <tr>
                        <td>${item.brand_name}</td>
                        <td>${item.product_type}</td>
                        <td>${item.assigned_to}</td>
                        <td>${new Date(item.today_date).toLocaleDateString()}</td>
                        <td>${item.location_name}</td>
                        <td>${item.quantity}</td>
                        <td>${item.units_left}</td>
                        <td>${item.cost}</td>
                        <td><img src="${item.qr_image}" alt="QR Code" width="20" height="20"></td>
                        <td><div class="elep p-2"><img src="<?= base_url(); ?>assets/images/ellep.png" alt="Action"></div></td>
                    </tr>
                `);
                });

                const totalPages = Math.ceil(data.total / limit);
                const paginationHtml = [];
                for (let i = 0; i < totalPages; i++) {
                    const isActive = i === currentPage;
                    paginationHtml.push(`<button class="page-button ${isActive ? 'active' : ''}" data-page="${i}">${i + 1}</button>`);
                }
                $('#pagination').html(paginationHtml.join(''));

                $('.page-button').click(function() {
                    const page = $(this).data('page');
                    currentPage = page;
                    loadFilteredData(page * limit);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    $('#brandFilter, #productTypeFilter, #dateRangeFilter, #assignedFilter, #locationFilter, #fromDate, #toDate').change(function() {
        currentPage = 0;
        loadFilteredData(0);
    });

    loadFilteredData(0);
});
 </script>