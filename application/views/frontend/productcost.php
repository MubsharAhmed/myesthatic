<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">

        <div class="row align-items-end">
            <div class="col-md-4 my-2">
                <h3 class="fmon">Product Cost</h3>
            </div>
            <div class="col-md-8 my-2">
                <div class="row align-items-end justify-content-end">
                    <div class="col-md-4">
                        <a href="<?php echo base_url(); ?>Cost/ProductCost" class="btn btnAdd w-100">Add Cost</a>
                    </div>
                    <div class="col-md-3 py-0">
                        <!-- Filter Form -->
                        <form id="filter-form" class="">
                            <div>
                                <small>Filter</small>
                                <select id="dateFilter" class="form-select">
                                    <option value="all" selected>All</option>
                                    <option value="today">Today</option>
                                    <option value="this_week">This Week</option>
                                    <option value="last_week">Last Week</option>
                                    <option value="this_month">This Month</option>
                                    <option value="last_month">Last Month</option>
                                    <option value="calendar">Custom</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5" id="calendarPickerContainer" style="display: none;">
                        <div class="d-flex align-items-center gap-1">
                            <div>
                                <small class="text-muted">From</small>
                                <input type="date" id="calendarDate" class="form-control" placeholder="From Date">
                            </div>
                            <div>
                                <small class="text-muted">To</small>
                                <input type="date" id="end_date" class="form-control" placeholder="To Date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="mCard">
                    <ul class="nav nav-tabs mb-0" id="myTab" role="tablist">
                        <?php
                        $brands = $this->db->get('brands')->result_array();

                        foreach ($brands as $index => $brand) {
                            $activeClass = $index === 0 ? 'active' : '';
                            $ariaSelected = $index === 0 ? 'true' : 'false';
                            $dataBsTarget = strtolower(str_replace(' ', '-', $brand['name']));
                        ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fss1 <?= $activeClass ?>" id="<?= $dataBsTarget ?>-tab" data-bs-toggle="tab"
                                    data-bs-target="#<?= $dataBsTarget ?>" type="button" role="tab" aria-controls="<?= $dataBsTarget ?>"
                                    aria-selected="<?= $ariaSelected ?>" data-brand-id="<?= $brand['id'] ?>">
                                    <?= $brand['name'] ?>
                                </button>
                            </li>
                        <?php } ?>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <?php foreach ($brands as $index => $brand) {
                            $activeClass = $index === 0 ? 'show active' : '';
                            $dataBsTarget = strtolower(str_replace(' ', '-', $brand['name']));
                        ?>
                            <div class="tab-pane fade <?= $activeClass ?>" id="<?= $dataBsTarget ?>" role="tabpanel"
                                aria-labelledby="<?= $dataBsTarget ?>-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Brand</th>
                                                <th>Product Type</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="product-table-body" id="product-table-body-<?= $brand['id'] ?>">
                                            <!-- AJAX-loaded content will go here -->
                                        </tbody>
                                    </table>
                                    <div class="pagination-controls" id="pagination-controls-<?= $brand['id'] ?>">
                                        <!-- Pagination buttons will be inserted here -->
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</main>
<!--end main wrapper-->


<!--start overlay-->
<div class="overlay btn-toggle"></div>
<!--end overlay-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    // $(document).ready(function() {
    //     $('.nav-link').on('click', function() {
    //         var brandId = $(this).data('brand-id');
    //         loadProducts(brandId, 1);
    //     });

    //     function loadProducts(brandId, page) {
    //         $.ajax({
    //             url: '<?= base_url("Cost/getProductsByBrandAjax") ?>',
    //             type: 'POST',
    //             data: {
    //                 brand_id: brandId,
    //                 page: page
    //             },
    //             success: function(response) {
    //                 console.log('AJAX Response:', response);
    //                 try {
    //                     var data = JSON.parse(response);
    //                     var products = data.products;
    //                     var totalPages = data.totalPages;

    //                     var productTableBody = $('#product-table-body-' + brandId);
    //                     productTableBody.empty();
    //                     $.each(products, function(index, product) {
    //                         productTableBody.append(
    //                             '<tr>' +
    //                             '<td>' + product.category_name + '</td>' +
    //                             '<td>' + product.brand_name + '</td>' +
    //                             '<td>' + product.product_name + '</td>' +
    //                             '<td>' + product.quantity + '</td>' +
    //                             '<td>$' + parseFloat(product.cost).toFixed(2) + '</td>' +
    //                             '<td><div class="elep p-2"><img src="<?= base_url(); ?>assets/images/ellep.png" alt=""></div></td>' +
    //                             '</tr>'
    //                         );
    //                     });
    //                     if (totalPages > 1) {
    //                         let paginationHtml = '';
    //                         for (let i = 1; i <= totalPages; i++) {
    //                             paginationHtml += `
    //                             <li class="page-item ${i == page ? 'active' : ''}">
    //                                 <a class="page-link" href="#" data-page="${i}">${i}</a>
    //                             </li>
    //                         `;
    //                         }
    //                         $('#pagination-controls-' + brandId).html('<ul class="pagination">' + paginationHtml + '</ul>');
    //                         $('.page-link').on('click', function(e) {
    //                             e.preventDefault();
    //                             var page = $(this).data('page');
    //                             loadProducts(brandId, page);
    //                         });
    //                     } else {
    //                         $('#pagination-controls-' + brandId).empty();
    //                     }
    //                 } catch (e) {
    //                     console.error('Error parsing JSON:', e);
    //                 }
    //             }
    //         });
    //     }
    //     var firstBrandId = $('.nav-link').first().data('brand-id');
    //     if (firstBrandId) {
    //         loadProducts(firstBrandId, 1);
    //     }
    // });
    $(document).ready(function() {
        $('#dateFilter').change(function() {
            const filter = $(this).val();
            console.log('Selected Filter:', filter); // Add this line to check the filter
            if (filter === 'calendar') {
                $('#calendarPickerContainer').show();
            } else {
                $('#calendarPickerContainer').hide();
                var brandId = $('.nav-link.active').data('brand-id');
                loadProducts(brandId, 1);
            }
        });


        $('#calendarDate, #end_date').change(function() {
            const filter = $('#dateFilter').val();
            if (filter === 'calendar') {
                var brandId = $('.nav-link.active').data('brand-id');
                loadProducts(brandId, 1);
            }
        });

        $('.nav-link').on('click', function() {
            var brandId = $(this).data('brand-id');
            loadProducts(brandId, 1);
        });

        function loadProducts(brandId, page) {
            const filter = $('#dateFilter').val();
            let startDate = '';
            let endDate = '';

            if (filter === 'calendar') {
                startDate = $('#calendarDate').val();
                endDate = $('#end_date').val();
            }

            $.ajax({
                url: '<?= base_url("Cost/getProductsByBrandAjax") ?>',
                type: 'POST',
                data: {
                    brand_id: brandId,
                    page: page,
                    filter: filter,
                    start_date: startDate,
                    end_date: endDate
                },
                success: function(response) {
                    console.log('AJAX Response:', response);
                    try {
                        var data = JSON.parse(response);
                        var products = data.products;
                        var totalPages = data.totalPages;

                        var productTableBody = $('#product-table-body-' + brandId);
                        productTableBody.empty();
                        $.each(products, function(index, product) {
                            productTableBody.append(
                                '<tr>' +
                                '<td>' + product.category_name + '</td>' +
                                '<td>' + product.brand_name + '</td>' +
                                '<td>' + product.product_name + '</td>' +
                                '<td>' + product.quantity + '</td>' +
                                '<td>$' + parseFloat(product.cost).toFixed(2) + '</td>' +
                                '<td><div class="elep p-2"><img src="<?= base_url(); ?>assets/images/ellep.png" alt=""></div></td>' +
                                '</tr>'
                            );
                        });
                        if (totalPages > 1) {
                            let paginationHtml = '';
                            for (let i = 1; i <= totalPages; i++) {
                                paginationHtml += `
                            <li class="page-item ${i == page ? 'active' : ''}">
                                <a class="page-link" href="#" data-page="${i}">${i}</a>
                            </li>
                        `;
                            }
                            $('#pagination-controls-' + brandId).html('<ul class="pagination">' + paginationHtml + '</ul>');
                            $('.page-link').on('click', function(e) {
                                e.preventDefault();
                                var page = $(this).data('page');
                                loadProducts(brandId, page);
                            });
                        } else {
                            $('#pagination-controls-' + brandId).empty();
                        }
                    } catch (e) {
                        console.error('Error parsing JSON:', e);
                    }
                }
            });
        }
        var firstBrandId = $('.nav-link').first().data('brand-id');
        if (firstBrandId) {
            loadProducts(firstBrandId, 1);
        }
    });
</script>