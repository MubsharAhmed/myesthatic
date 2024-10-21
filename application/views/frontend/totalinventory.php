  <!--start main wrapper-->
  <main class="main-wrapper">
      <div class="main-content">

          <div class="row align-items-end">
              <div class="col-md-4 my-2">
                  <h3 class="fmon">Total Inventory</h3>
              </div>
              <div class="col-md-8 my-2">
                  <div class="row align-items-end justify-content-end">
                      <div class="col-md-4">
                          <a href="<?php echo base_url(); ?>inventory/addInventory" class="btn  btnAdd w-100">Add
                              Inventory</a>
                      </div>
                      <div class="col-md-3  py-0">
                          <!-- Filter Form -->
                          <form id="filter-form" class="">
                              <div>
                                  <small>Filter</small>
                                  <select name="filter" class="form-select" id="filter">
                                      <option value="">Select filter</option>
                                      <option value="today">Today</option>
                                      <option value="this_week">This Week</option>
                                      <option value="last_week">Last Week</option>
                                      <option value="this_month">This Month</option>
                                      <option value="last_month">Last Month</option>
                                      <option value="custom">Custom</option>
                                  </select>
                              </div>

                          </form>

                      </div>
                      <div class="col-md-5" id="custom-date-fields" style="display: none;">
                          <div class="d-flex align-items-center gap-1 ">
                              <div>
                                  <small class="text-muted">From</small>
                                  <input class="form-control" type="date" name="start_date" id="start_date" placeholder="From Date">
                              </div>
                              <div>
                                  <small class="text-muted">To</small>
                                  <input class="form-control" type="date" name="end_date" id="end_date" placeholder="To Date">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
          
          <div class="row">
              <div class="col-md-12">
                  <div class="mCard">
                      <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                          <li class="nav-item" role="presentation">
                              <button class="nav-link active fss1" id="inventory-tab" data-bs-toggle="tab" data-bs-target="#inventory" type="button" role="tab" aria-controls="inventory" aria-selected="true">Inventory</button>
                          </li>
                          <li class="nav-item" role="presentation">
                              <button class="nav-link fss1" id="assigned-inventory-tab" data-bs-toggle="tab" data-bs-target="#assigned-inventory" type="button" role="tab" aria-controls="assigned-inventory" aria-selected="false">Assigned Inventory</button>
                          </li>
                          <li class="nav-item" role="presentation">
                              <button class="nav-link fss1" id="low-inventory-tab" data-bs-toggle="tab" data-bs-target="#low-inventory" type="button" role="tab" aria-controls="low-inventory" aria-selected="false">Low Inventory</button>
                          </li>
                          <li class="nav-item" role="presentation">
                              <button class="nav-link fss1" id="expiring-soon-tab" data-bs-toggle="tab" data-bs-target="#expiring-soon" type="button" role="tab" aria-controls="expiring-soon" aria-selected="false">Expiring Soon</button>
                          </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                          <!-- Inventory Section -->
                          <div class="tab-pane fade show active" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">
                              <div class="table-responsive">
                                  <table class="table" id="inventory-table">
                                      <thead>
                                          <tr>
                                              <th>Category</th>
                                              <th>Brand</th>
                                              <th>Product Type</th>
                                              <th>Location</th>
                                              <th>Date Checked In</th>
                                              <th>Date Of Expiry</th>
                                              <th>Quantity</th>
                                              <th>Lot No.</th>
                                              <th>Cost</th>
                                              <th>QR Code</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <!-- Inventory data will be populated here -->
                                      </tbody>
                                  </table>
                                  <!-- Pagination -->
                                  <nav aria-label="Page navigation">
                                      <ul class="pagination justify-content-center" id="pagination">
                                          <!-- Pagination links will be populated here -->
                                      </ul>
                                  </nav>
                              </div>
                          </div>
                          <!-- Assignied Inventoyry -->
                          <div class="tab-pane fade" id="assigned-inventory" role="tabpanel"
                              aria-labelledby="assigned-inventory-tab">
                              <!-- Assigned Inventory Content -->
                              <div class="table-responsive">
                                  <table class="table">
                                      <thead>
                                          <tr>
                                              <th>Category</th>
                                              <th>Brand</th>
                                              <th>Assigned To</th>
                                              <th>Date Checked Out</th>
                                              <th>Assigned Units</th>
                                              <th>Units Left</th>

                                              <th>QR Code</th>
                                              <th>Actions</th>
                                          </tr>

                                      </thead>
                                      <tbody>
                                          <!-- Sample data -->
                                          <tr>
                                              <td>Neurotoxins </td>
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Sculputra
                                              </td>

                                              <td class="fw-bold">Messi</td>
                                              <td>2024-04-17</td>
                                              <td>20</td>
                                              <td class="fw-bold">1</td>

                                              <td>
                                                  <div class="elep p-1">
                                                      <img src="<?php echo base_url(); ?>assets/images/qrp.png" alt="">
                                                  </div>
                                              </td>
                                              <td>
                                                  <div class="elep p-2 ">
                                                      <img src="<?php echo base_url(); ?>assets/images/ellep.png"
                                                          alt="">
                                                  </div>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>Allergn </td>
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Merz
                                              </td>

                                              <td class="fw-bold">Messi</td>
                                              <td>2024-04-17</td>
                                              <td>20</td>
                                              <td class="fw-bold">1</td>

                                              <td>
                                                  <div class="elep p-1">
                                                      <img src="<?php echo base_url(); ?>assets/images/qrp.png" alt="">
                                                  </div>
                                              </td>
                                              <td>
                                                  <div class="elep p-2 ">
                                                      <img src="<?php echo base_url(); ?>assets/images/ellep.png"
                                                          alt="">
                                                  </div>
                                              </td>
                                          </tr>



                                          <!-- More rows here -->
                                      </tbody>
                                  </table>
                              </div>

                          </div>
                          <!-- Low Inventory Content -->
                          <div class="tab-pane fade" id="low-inventory" role="tabpanel" aria-labelledby="low-inventory-tab">
                              <div class="table-responsive">
                                  <table class="table" id="low-inventory-table">
                                      <thead>
                                          <tr>
                                              <th>Category</th>
                                              <th>Brand</th>
                                              <th>Product Type</th>
                                              <th>Location</th>
                                              <th>Date Checked In</th>
                                              <th>Date Of Expiry</th>
                                              <th>Quantity</th>
                                              <th>Cost</th>
                                              <th>QR Code</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody id="low-inventory-tbody">
                                          <!-- AJAX content will be injected here -->
                                      </tbody>
                                  </table>
                                  <nav aria-label="Page navigation">
                                      <ul class="pagination justify-content-center" id="low-inventory-pagination">
                                          <!-- AJAX pagination will be injected here -->
                                      </ul>
                                  </nav>
                              </div>
                          </div>
                          <!-- Expiring Soon Content -->
                          <div class="tab-pane fade" id="expiring-soon" role="tabpanel" aria-labelledby="expiring-soon-tab">

                              <!-- Expiring Items Table -->
                              <!-- Expiring Items Table -->
                              <div class="table-responsive">
                                  <table id="expiring-items-table" class=" table">
                                      <thead>
                                          <tr>
                                              <th>Category</th>
                                              <th>Brand</th>
                                              <th>Product Type</th>
                                              <th>Location</th>
                                              <th>Date Checked In</th>
                                              <th>Date Of Expiry</th>
                                              <th>Quantity</th>
                                              <th>Price</th>
                                              <th>QR Code</th>
                                              <!-- <th>QR Code</th> -->
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody id="expiring-items-tbody">
                                          <!-- Data will be populated here -->
                                      </tbody>
                                  </table>

                                  <!-- Pagination Links -->
                                  <div id="pagination-links" class="d-flex justify-content-center">
                                      <!-- Pagination links will be generated here -->
                                  </div>
                              </div>

                              <!-- Expiring Items Count -->
                              <div class="my-3 d-flex gap-3 justify-content-center">
                                  <button id="syringes-expiring" class="btn btn-danger">Syringes Expiring: 0</button>
                                  <button id="amount-of-syringes-expiring" class="btn btn-danger">Amount of Units Expiring: 0</button>
                                  <button id="units-expiring" class="btn btn-danger">Units Expiring: 0</button>
                                  <button id="amount-of-units-expiring" class="btn btn-danger">Amount of Units Expiring: 0</button>
                              </div>
                          </div>

                      </div>

                  </div>


              </div>
          </div>
      </div>


  </main>
  <!--end main wrapper-->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
      $(document).ready(function() {
          function fetchInventory(page = 1) {
              const filter = $('#filter').val();
              const startDate = $('#start_date').val();
              const endDate = $('#end_date').val();

              $.ajax({
                  url: '<?= base_url('Inventory/fetch_inventory') ?>',
                  method: 'GET',
                  data: {
                      page: page,
                      filter: filter,
                      start_date: startDate,
                      end_date: endDate // Include end_date
                  },
                  success: function(response) {
                      const data = JSON.parse(response);
                      const inventory = data.inventory;
                      const totalPages = data.total_pages;
                      const currentPage = data.current_page;

                      // Populate inventory table
                      $('#inventory-table tbody').empty();
                      $.each(inventory, function(index, item) {
                          const row = `
                        <tr>
                            <td class="text-center">${item.category_name ?? ''}</td>
                            <td class="d-flex gap-1 align-items-center fw-bold">${item.brand_name}</td>
                            <td class="text-center">${item.product_name ?? ''}</td>
                            <td class="text-center">${item.location_name ?? ''}</td>
                            <td class="text-center">${item.today_date ?? ''}</td>
                            <td class="text-center">${item.date_of_expiry ?? ''}</td>
                            <td class="fw-bold text-center">${item.quantity ?? ''}</td>
                            <td class="text-center">${item.lot_number ?? ''}</td>
                            <td class="text-center">${item.cost ?? ''}</td>
                            <td class="text-center">
                                <div class="elep p-1" data-bs-toggle="modal" data-bs-target="#lowInventoryModal${item.id}">
                                    <img src="${item.qr_image}" width="20" height="20" alt="">
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="lowInventoryModal${item.id}" tabindex="-1" aria-labelledby="lowInventoryModalLabel${item.id}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <img src="${item.qr_image}" alt="" style="object-fit: contain;" height="500" width="100%">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="<?= base_url('download.php?file=') ?>${encodeURIComponent(item.qr_image)}" class="btn btn-primary">Download</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown text-center">
                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="" style="cursor: pointer;" data-bs-toggle="dropdown" aria-expanded="false">
                                </div>
                            </td>
                        </tr>
                    `;
                          $('#inventory-table tbody').append(row);
                      });

                      // Populate pagination
                      $('#pagination').empty();
                      for (let i = 1; i <= totalPages; i++) {
                          const link = `
                        <li class="page-item ${i == currentPage ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>
                    `;
                          $('#pagination').append(link);
                      }
                  }
              });
          }

          // Fetch inventory data on page load
          fetchInventory();

          // Show/hide custom date fields based on filter selection
          $('#filter').on('change', function() {
              const customDateFields = $('#custom-date-fields');
              if (this.value === 'custom') {
                  customDateFields.show();
              } else {
                  customDateFields.hide();
              }
              fetchInventory();
          });

          // Fetch data on date change
          $('#start_date, #end_date').on('change', function() {
              fetchInventory();
          });

          // Handle pagination link click using event delegation
          $('#pagination').on('click', '.page-link', function(e) {
              e.preventDefault();
              const page = $(this).data('page');
              fetchInventory(page);
          });
      });

      //for low inventory
      $(document).ready(function() {
          function loadLowInventory(page = 1) {
              const filter = $('#filter').val();
              const startDate = $('#start_date').val();
              const endDate = $('#end_date').val();

              $.ajax({
                  url: "<?= base_url('Inventory/getLowInventoryAjax') ?>",
                  type: "GET",
                  data: {
                      page_low: page,
                      filter: filter,
                      start_date: startDate,
                      end_date: endDate
                  },
                  dataType: "json",
                  success: function(response) {
                      let tbodyHtml = '';
                      if (response.low_inventory.length > 0) {
                          $.each(response.low_inventory, function(index, item) {
                              tbodyHtml += `
                            <tr>
                                <td class="text-center">${item.category_name}</td>
                                <td class="d-flex gap-1 align-items-center fw-bold">${item.brand_name}</td>
                                <td class="text-center">${item.product_name}</td>
                                <td class="text-center">${item.location_name}</td>
                                <td class="text-center">${new Date(item.created_at).toISOString().split('T')[0]}</td>
                                <td class="text-center">${item.date_of_expiry}</td>
                                <td class="fw-bold text-center text-danger">${item.quantity}</td>
                                <td class="text-center">${item.cost}</td>
                                       <td class="text-center">
                                    <div class="elep p-1" data-bs-toggle="modal" data-bs-target="#expiringModal${item.id}">
                                        <img src="${item.qr_image}" width="20" height="20" alt="">
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="expiringModal${item.id}" tabindex="-1" aria-labelledby="expiringModalLabel${item.id}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img src="${item.qr_image}" alt="" style="object-fit: contain;" height="500" width="100%">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="<?= base_url('download.php?file=') ?>${encodeURIComponent(item.qr_image)}" class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="elep p-2 text-center">
                                        <img src="<?= base_url('assets/images/ellep.png') ?>" alt="">
                                    </div>
                                </td>
                            </tr>
                        `;
                          });
                      } else {
                          tbodyHtml = '<tr><td colspan="10" class="text-center">No low inventory items found.</td></tr>';
                      }
                      $('#low-inventory-tbody').html(tbodyHtml);

                      // Pagination
                      let paginationHtml = '';
                      for (let i = 1; i <= response.total_pages_low; i++) {
                          paginationHtml += `
                        <li class="page-item ${i == response.page_low ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>
                    `;
                      }
                      $('#low-inventory-pagination').html(paginationHtml);
                  }
              });
          }

          // Load initial data
          loadLowInventory();

          // Handle pagination link click using event delegation
          $('#low-inventory-pagination').on('click', '.page-link', function(e) {
              e.preventDefault();
              const page = $(this).data('page');
              loadLowInventory(page);
          });

          // Handle filter change
          //   $('#filter').on('change', function() {
          //       loadLowInventory();
          //   });
          //   // Fetch data on date change
          //   $('#start_date').on('change', function() {
          //       loadLowInventory();
          //   });
          //   // Show/hide custom date fields based on filter selection
          $('#filter').on('change', function() {
              const customDateFields = $('#custom-date-fields');
              if (this.value === 'custom') {
                  customDateFields.show();
              } else {
                  customDateFields.hide();
              }
              loadLowInventory();
          });

          // Fetch data on date change
          $('#start_date, #end_date').on('change', function() {
              loadLowInventory();
          });
      });

      // for expiring items
      $(document).ready(function() {
          function loadExpiringItems(page = 1) {
              const filter = $('#filter').val();
              const startDate = $('#start_date').val();
              const endDate = $('#end_date').val();

              $.ajax({
                  url: "<?= base_url('Inventory/getExpiringItemsAjax') ?>",
                  type: "GET",
                  data: {
                      page_expiring: page,
                      filter: filter,
                      start_date: startDate,
                      end_date: endDate
                  },
                  dataType: "json",
                  success: function(response) {
                      let tbodyHtml = '';
                      if (response.expiring_items.length > 0) {
                          $.each(response.expiring_items, function(index, item) {
                              tbodyHtml += `
                            <tr>
                                <td class="text-center">${item.category_name}</td>
                                <td class="d-flex gap-1 align-items-center fw-bold">${item.brand_name}</td>
                                <td class="text-center">${item.product_name}</td>
                                <td class="text-center">${item.location_name}</td>
                                <td class="text-center">${new Date(item.created_at).toISOString().split('T')[0]}</td>
                                <td class="fw-bold text-center text-danger">${item.date_of_expiry}</td>
                                <td class="text-center">${item.quantity}</td>
                                <td class="text-center">${item.cost}</td>
                                <td class="text-center">
                                    <div class="elep p-1" data-bs-toggle="modal" data-bs-target="#expiringModal${item.id}">
                                        <img src="${item.qr_image}" width="20" height="20" alt="">
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="expiringModal${item.id}" tabindex="-1" aria-labelledby="expiringModalLabel${item.id}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <img src="${item.qr_image}" alt="" style="object-fit: contain;" height="500" width="100%">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="<?= base_url('download.php?file=') ?>${encodeURIComponent(item.qr_image)}" class="btn btn-primary">Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="elep p-2 text-center">
                                        <img src="<?= base_url('assets/images/ellep.png') ?>" alt="">
                                    </div>
                                </td>
                            </tr>
                        `;
                          });
                      } else {
                          tbodyHtml = '<tr><td colspan="10" class="text-center">No expiring items found.</td></tr>';
                      }
                      $('#expiring-items-tbody').html(tbodyHtml);

                      // Update expiring items count
                      $('#syringes-expiring').text('Syringes Expiring: ' + response.syringes_expiring);
                      $('#amount-of-syringes-expiring').text('Amount of Syringes Expiring: ' + response.amount_of_syringes_expiring);
                      $('#units-expiring').text('Units Expiring: ' + response.units_expiring);
                      $('#amount-of-units-expiring').text('Amount of Units Expiring: ' + response.amount_of_units_expiring);

                      // Pagination
                      let paginationHtml = '';
                      for (let i = 1; i <= response.total_pages_expiring; i++) {
                          paginationHtml += `
                        <li class="page-item ${i == response.page_expiring ? 'active' : ''}">
                            <a class="page-link" href="#" data-page="${i}">${i}</a>
                        </li>
                    `;
                      }
                      $('#pagination-links').html('<ul class="pagination">' + paginationHtml + '</ul>');
                  }
              });
          }

          // Load initial data
          loadExpiringItems();

          // Handle pagination link click using event delegation
          $('#pagination-links').on('click', '.page-link', function(e) {
              e.preventDefault();
              const page = $(this).data('page');
              loadExpiringItems(page);
          });

          //   // Handle filter change
          //   $('#filter').on('change', function() {
          //       loadExpiringItems();
          //   });
          //   // Fetch data on date change
          //   $('#start_date').on('change', function() {
          //       loadExpiringItems();
          //   });
          // Show/hide custom date fields based on filter selection
          $('#filter').on('change', function() {
              const customDateFields = $('#custom-date-fields');
              if (this.value === 'custom') {
                  customDateFields.show();
              } else {
                  customDateFields.hide();
              }
              loadExpiringItems();
          });

          // Fetch data on date change
          $('#start_date, #end_date').on('change', function() {
              loadExpiringItems();
          });
      });
  </script>



  <!--start overlay-->
  <div class="overlay btn-toggle"></div>
  <!--end overlay-->