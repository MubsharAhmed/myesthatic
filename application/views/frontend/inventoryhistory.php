 <!--start main wrapper-->
 <main class="main-wrapper">
     <div class="main-content">

         <div class="row">
             <div class="col-md-6 my-2">
                 <h3 class="fmon">Inventory History</h3>
             </div>
             <div class="col-md-6 my-2">
                 <div class="row">

                     <div class="col-md-6 my-1">
                         <select name="" id="" class="form-select fsele">
                             <option value="" selected>Today</option>
                             <option value="">1</option>
                             <option value="">2</option>
                             <option value="">2</option>
                         </select>
                     </div>
                     <div class="col-md-6 my-1">
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
                 <p>Report Filter:</p>
                 <div class="my-2 d-flex justify-content-between gap-2 flex-wrap">

                     <div class="filtr">

                         <label for="">Brand</label>
                         <select name="" id="" class="form-select fsele">
                             <option value="" selected>Merz</option>
                             <option value="">1</option>
                             <option value="">2</option>
                             <option value="">2</option>
                         </select>
                     </div>
                     <div class="filtr">

                         <label for="">Product Type</label>
                         <select name="" id="" class="form-select fsele">
                             <option value="" selected>Xeoimin 100 units</option>
                             <option value="">1</option>
                             <option value="">2</option>
                             <option value="">2</option>
                         </select>
                     </div>
                     <div class="filtr">

                         <label for="">Date Range</label>
                         <select name="" id="" class="form-select fsele">
                             <option value="" selected>Jan - Mar</option>
                             <option value="">1</option>
                             <option value="">2</option>
                             <option value="">2</option>
                         </select>
                     </div>
                     <div class="filtr">

                         <label for="">Assigned To</label>
                         <select name="" id="" class="form-select fsele">
                             <option value="" selected>John Doe</option>
                             <option value="">1</option>
                             <option value="">2</option>
                             <option value="">2</option>
                         </select>
                     </div>
                     <div class="filtr">

                         <label for="">Location</label>
                         <select name="" id="" class="form-select fsele">
                             <option value="" selected>Newyork</option>
                             <option value="">1</option>
                             <option value="">2</option>
                             <option value="">2</option>
                         </select>
                     </div>
                 </div>
                 <div class="mCard  ">



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
                                 <!-- Sample data -->
                                 <tr>
                                     <td>Merz </td>
                                     <td class="">

                                         Xeomin 100 units
                                     </td>
                                     <td>Lionel Messi</td>
                                     <td>23 Mar 2024</td>
                                     <td>New york</td>
                                     <td>300 Units</td>
                                     <td class="leftUnits">230 Units</td>
                                     <td>$50,000</td>
                                     <td><img src="<?php echo base_url(); ?>assets/images/qrp.png" alt=""></td>


                                     <td>
                                         <div class="elep p-2 ">
                                             <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                         </div>
                                     </td>
                                 </tr>

                                 <tr>
                                     <td>Merz </td>
                                     <td class="">

                                         Xeomin 100 units
                                     </td>
                                     <td>Lionel Messi</td>
                                     <td>23 Mar 2024</td>
                                     <td>New york</td>
                                     <td>300 Units</td>
                                     <td class="leftUnits">230 Units</td>
                                     <td>$50,000</td>
                                     <td><img src="<?php echo base_url(); ?>assets/images/qrp.png" alt=""></td>


                                     <td>
                                         <div class="elep p-2 ">
                                             <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                         </div>
                                     </td>
                                 </tr>
                                 <tr>
                                     <td>Merz </td>
                                     <td class="">

                                         Xeomin 100 units
                                     </td>
                                     <td>Lionel Messi</td>
                                     <td>23 Mar 2024</td>
                                     <td>New york</td>
                                     <td>300 Units</td>
                                     <td class="leftUnits">230 Units</td>
                                     <td>$50,000</td>
                                     <td><img src="<?php echo base_url(); ?>assets/images/qrp.png" alt=""></td>


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


 </main>
 <!--end main wrapper-->


 <!--start overlay-->
 <div class="overlay btn-toggle"></div>
 <!--end overlay-->