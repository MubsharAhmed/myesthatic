<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">

        <div class="row">
            <div class="col-md-6 my-2">
                <h3 class="fmon">Product Cost</h3>
            </div>
            <div class="col-md-6 my-2">
                <div class="row">
                    <div class="col-md-4">
                        <a href="<?php echo base_url(); ?>gerenal/addProductCost" class="btn  btnAdd w-100">Add
                            Cost</a>
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
                <div class="mCard  ">
                    <ul class="nav nav-tabs mb-0" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fss1" id="inventory-tab" data-bs-toggle="tab"
                                data-bs-target="#inventory" type="button" role="tab" aria-controls="inventory"
                                aria-selected="true">Allergan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fss1" id="assigned-inventory-tab" data-bs-toggle="tab"
                                data-bs-target="#assigned-inventory" type="button" role="tab"
                                aria-controls="assigned-inventory" aria-selected="false">Merz</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fss1" id="low-inventory-tab" data-bs-toggle="tab"
                                data-bs-target="#low-inventory" type="button" role="tab" aria-controls="low-inventory"
                                aria-selected="false">Revance</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fss1" id="expiring-soon-tab" data-bs-toggle="tab"
                                data-bs-target="#expiring-soon" type="button" role="tab" aria-controls="expiring-soon"
                                aria-selected="false">Revanesse</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fss1" id="expiring-soon-tab" data-bs-toggle="tab"
                                data-bs-target="#expiring-soon2" type="button" role="tab" aria-controls="expiring-soon2"
                                aria-selected="false">Galderma</button>
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

                                            <th>Price </th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Sample data -->
                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
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
                                            <th>Product Type</th>

                                            <th>Price </th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Sample data -->
                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
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

                                            <th>Price </th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Sample data -->
                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
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
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Product Type</th>

                                            <th>Price </th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Sample data -->
                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                                </div>
                                            </td>
                                        </tr>


                                        <!-- More rows here -->
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="tab-pane fade" id="expiring-soon2" role="tabpanel"
                            aria-labelledby="expiring-soon-tab2">
                            <!-- Expiring Soon Content -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>

                                        <tr>
                                            <th>Category</th>
                                            <th>Brand</th>
                                            <th>Product Type</th>

                                            <th>Price </th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Sample data -->
                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Neurotoxins </td>
                                            <td class="d-flex gap-1 align-items-center fw-bold">

                                                Merz
                                            </td>
                                            <td>Xeomin 100 units</td>



                                            <td>$10.00</td>

                                            <td>
                                                <div class="elep p-2 ">
                                                    <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                                </div>
                                            </td>
                                        </tr>


                                        <!-- More rows here -->
                                    </tbody>
                                </table>
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