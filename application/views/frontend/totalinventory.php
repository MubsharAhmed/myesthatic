  <!--start main wrapper-->
  <main class="main-wrapper">
      <div class="main-content">

          <div class="row">
              <div class="col-md-6 my-2">
                  <h3 class="fmon">Total Inventory</h3>
              </div>
              <div class="col-md-6 my-2">
                  <div class="row">
                      <div class="col-md-4">
                          <a href="<?php echo base_url(); ?>general/addInventory" class="btn  btnAdd w-100">Add
                              Inventory</a>
                      </div>
                      <div class="col-md-4 my-1">
                          <select name="" id="" class="form-select fsele">
                              <option value="" selected>Today</option>
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">2</option>
                          </select>
                      </div>
                      <div class="col-md-4 my-1">
                          <select name="" id="" class="form-select fsele ">
                              <option value="" selected>Filter</option>
                              <option value="">1</option>
                              <option value="">2</option>
                              <option value="">2</option>
                          </select>
                      </div>
                  </div>


              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="mCard">
                      <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                          <li class="nav-item" role="presentation">
                              <button class="nav-link active fss1" id="inventory-tab" data-bs-toggle="tab"
                                  data-bs-target="#inventory" type="button" role="tab" aria-controls="inventory"
                                  aria-selected="true">Inventory</button>
                          </li>
                          <li class="nav-item" role="presentation">
                              <button class="nav-link fss1" id="assigned-inventory-tab" data-bs-toggle="tab"
                                  data-bs-target="#assigned-inventory" type="button" role="tab"
                                  aria-controls="assigned-inventory" aria-selected="false">Assigned Inventory</button>
                          </li>
                          <li class="nav-item" role="presentation">
                              <button class="nav-link fss1" id="low-inventory-tab" data-bs-toggle="tab"
                                  data-bs-target="#low-inventory" type="button" role="tab" aria-controls="low-inventory"
                                  aria-selected="false">Low Inventory</button>
                          </li>
                          <li class="nav-item" role="presentation">
                              <button class="nav-link fss1" id="expiring-soon-tab" data-bs-toggle="tab"
                                  data-bs-target="#expiring-soon" type="button" role="tab" aria-controls="expiring-soon"
                                  aria-selected="false">Expiring Soon</button>
                          </li>
                      </ul>
                      <div class="tab-content" id="myTabContent">
                          <div class="tab-pane fade show active" id="inventory" role="tabpanel"
                              aria-labelledby="inventory-tab">
                              <!-- Inventory Content -->
                              <div class="table-responsive">
                                  <table class="table">
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
                                          <!-- Sample data -->
                                          <tr>
                                              <td>Neurotoxins </td>
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Sculputra
                                              </td>
                                              <td>Allergn</td>
                                              <td>USA</td>
                                              <td>2024-04-17</td>
                                              <td>2026-04-17</td>
                                              <td class="fw-bold">10</td>
                                              <td>4567</td>


                                              <td>$10.00</td>
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
                                              <td>Dermal Fillers </td>
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Merz
                                              </td>
                                              <td>Botx</td>
                                              <td>USA</td>
                                              <td>2024-04-17</td>
                                              <td>2026-04-17</td>
                                              <td class="fw-bold">10</td>

                                              <td>7753</td>

                                              <td>$10.00</td>
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
                          <div class="tab-pane fade" id="low-inventory" role="tabpanel"
                              aria-labelledby="low-inventory-tab">
                              <!-- Low Inventory Content -->
                              <div class="table-responsive">
                                  <table class="table">
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
                                      <tbody>
                                          <!-- Sample data -->
                                          <tr>
                                              <td>Neurotoxins </td>
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Sculputra
                                              </td>
                                              <td>Allergn</td>
                                              <td>USA</td>
                                              <td>2024-04-17</td>
                                              <td>2026-04-17</td>
                                              <td class="fw-bold">10</td>



                                              <td>$10.00</td>
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
                                              <td>Dermal Fillers </td>
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Merz
                                              </td>
                                              <td>Botx</td>
                                              <td>USA</td>
                                              <td>2024-04-17</td>
                                              <td>2026-04-17</td>
                                              <td class="fw-bold">10</td>



                                              <td>$10.00</td>
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
                          <div class="tab-pane fade" id="expiring-soon" role="tabpanel"
                              aria-labelledby="expiring-soon-tab">
                              <!-- Expiring Soon Content -->
                              <div class="table-responsive">
                                  <table class="table">
                                      <thead>
                                          <tr>
                                              <th>Brand</th>
                                              <th>Category</th>
                                              <th>Units/Bottle</th>


                                              <th>Date</th>
                                              <th>Location</th>
                                              <th>Quantity</th>
                                              <th>Expiry Date</th>
                                              <th>Price</th>
                                              <th>QR Code</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <!-- Sample data -->
                                          <tr>
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Product 1
                                              </td>
                                              <td>Category A</td>
                                              <td class="fw-bold">10</td>
                                              <td>2024-04-17</td>
                                              <td>Location A</td>
                                              <td class="fw-bold">1</td>
                                              <td class="fw-bold">2024-04-1</td>
                                              <td>$10.00</td>
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
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Product 1
                                              </td>
                                              <td>Category A</td>
                                              <td class="fw-bold">10</td>
                                              <td>2024-04-17</td>
                                              <td>Location A</td>
                                              <td class="fw-bold">1</td>
                                              <td class="fw-bold">2024-04-1</td>
                                              <td>$10.00</td>
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
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Product 1
                                              </td>
                                              <td>Category A</td>
                                              <td class="fw-bold">10</td>
                                              <td>2024-04-17</td>
                                              <td>Location A</td>
                                              <td class="fw-bold">1</td>
                                              <td class="fw-bold">2024-04-1</td>
                                              <td>$10.00</td>
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
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Product 1
                                              </td>
                                              <td>Category A</td>
                                              <td class="fw-bold">10</td>
                                              <td>2024-04-17</td>
                                              <td>Location A</td>
                                              <td class="fw-bold">1</td>
                                              <td class="fw-bold">2024-04-1</td>
                                              <td>$10.00</td>
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
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Product 1
                                              </td>
                                              <td>Category A</td>
                                              <td class="fw-bold">10</td>
                                              <td>2024-04-17</td>
                                              <td>Location A</td>
                                              <td class="fw-bold">1</td>
                                              <td class="fw-bold">2024-04-1</td>
                                              <td>$10.00</td>
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
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Product 1
                                              </td>
                                              <td>Category A</td>
                                              <td class="fw-bold">10</td>
                                              <td>2024-04-17</td>
                                              <td>Location A</td>
                                              <td class="fw-bold">1</td>
                                              <td class="fw-bold">2024-04-1</td>
                                              <td>$10.00</td>
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
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Product 1
                                              </td>
                                              <td>Category A</td>
                                              <td class="fw-bold">10</td>
                                              <td>2024-04-17</td>
                                              <td>Location A</td>
                                              <td class="fw-bold">1</td>
                                              <td class="fw-bold">2024-04-1</td>
                                              <td>$10.00</td>
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
                                              <td class="d-flex gap-1 align-items-center fw-bold">

                                                  Product 1
                                              </td>
                                              <td>Category A</td>
                                              <td class="fw-bold">10</td>
                                              <td>2024-04-17</td>
                                              <td>Location A</td>
                                              <td class="fw-bold">1</td>
                                              <td class="fw-bold">2024-04-1</td>
                                              <td>$10.00</td>
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
                              <div class="my-3 d-flex gap-3 justify-content-center">
                                  <button class="btn btn-danger">Syringes Expiring: 5,000</button>
                                  <button class="btn btn-danger">Units Expiring: 5,000</button>
                                  <button class="btn btn-danger">Amount of Units Expiring: $15,000</button>
                              </div>
                          </div>
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