 <!--start main wrapper-->
 <main class="main-wrapper">
     <div class="main-content">

         <div class="row">
             <div class="col-md-8 my-2">
                 <h3 class="fmon">Dashboard</h3>
             </div>
             <div class="col-md-4 my-2">
                 <div class="row">
                     <div class="col-md-6 my-1">
                         <select class="form-select date-selection" name="date-selection" id="date-selection-1">
                             <option value="Today" selected>Today</option>
                             <option value="Yesterday">Yesterday</option>
                             <option value="This Week">This Week</option>
                             <option value="Last Week">Last Week</option>
                             <option value="This Month">This Month</option>
                             <option value="Last Month">Last Month</option>
                             <option value="Custom">Custom</option>
                         </select>
                         <div class="d-flex d-none date" id="">
                             <input class="form-control " type="date" class="">
                             <button class="btn btnRefresh" id=""> <img
                                     src="<?php echo base_url(); ?>assets/images/reload.svg" alt=""
                                     width="15px"></button>
                         </div>
                     </div>
                     <div class="col-md-6 my-1">
                         <select name="" id="" class="form-select fsele ">
                             <option value="" selected>Filter</option>
                             <option value="">Reports</option>
                             <option value="">Stock Items</option>
                             <option value="">Treatments Administered</option>

                         </select>
                     </div>
                 </div>

             </div>
         </div>

         <div class="row my-2">
             <div class="col-md-9">
                 <div class="row">
                     <div class="my-2 col-md-4">
                         <div class=" mCard p-2">
                             <div class="card-body">
                                 <div class="d-flex justify-content-between align-items-center">
                                     <div class="d-flex justify-content-between align-items-center">
                                         <img src="<?php echo base_url(); ?>assets/images/ous.svg" alt="">
                                         <p class="m-0 ms-2 fs1">Reports</p>
                                     </div>
                                     <div>
                                         <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6 my-1">
                                         <p class="fs2">Financial & Inventory</p>
                                         <div class="mt-2">
                                             <!-- <div class="blBox d-flex justify-content-evenly align-items-center p-2">
                    <img src="<?php echo base_url(); ?>assets/images/ar.png" alt="">
                    <p class="fs4 m-0">2.1%</p>
                  </div> -->
                                         </div>
                                     </div>
                                     <div class="col-md-6 my-1 d-flex justify-content-end align-items-center">
                                         <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/onof.svg"
                                             alt="">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="my-2 col-md-4">
                         <div class=" mCard p-2">
                             <div class="card-body">
                                 <div class="d-flex justify-content-between align-items-center">
                                     <div class="d-flex justify-content-between align-items-center">
                                         <img src="<?php echo base_url(); ?>assets/images/op.svg" alt="">
                                         <p class="m-0 ms-2 fs1"> Treatments Administered</p>
                                     </div>
                                     <div>
                                         <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6 my-1">
                                         <p class="fs2">New & Old Patients</p>
                                         <div class="mt-2">
                                             <div class="blBox2 d-flex justify-content-evenly align-items-center p-2">
                                                 <i class="fa-solid fa-arrow-trend-up fsy6"></i>
                                                 <p class="fsy6 m-0">172.1%</p>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6 my-1 d-flex justify-content-end align-items-center">
                                         <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/nop.svg"
                                             alt="">
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="my-2 col-md-4">
                         <div class=" mCard p-2">
                             <div class="card-body">
                                 <div class="d-flex justify-content-between align-items-center">
                                     <div class="d-flex justify-content-between align-items-center">
                                         <img src="<?php echo base_url(); ?>assets/images/sti.svg" alt="">
                                         <p class="m-0 ms-2 fs1">Stock Items</p>
                                     </div>
                                     <div>
                                         <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6 my-1">
                                         <p class="fs2 text-wrap">Sync your stock items</p>
                                         <div class="mt-2">
                                             <div class="blBox3 d-flex justify-content-evenly align-items-center p-2">
                                                 <i class="fa-solid fa-arrow-trend-up fs6"></i>
                                                 <p class="fs6 m-0">172.1%</p>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6 my-1">
                                         <div class="d-flex justify-content-between">
                                             <div class="d-flex align-items-center ">
                                                 <img src="<?php echo base_url(); ?>assets/images/bdot.png" alt="">
                                                 <p class="mb-0 fs7 ms-1">75.9% </p>
                                             </div>
                                             <div class="d-flex align-items-center ">
                                                 <img src="<?php echo base_url(); ?>assets/images/rdot.png" alt="">
                                                 <p class="mb-0 fs7 ms-1">89.9% </p>
                                             </div>
                                         </div>
                                         <div class=" mt-1 mb-0 d-flex justify-content-end align-items-center"
                                             style="height: 70%;">
                                             <img class="img-fluid"
                                                 src="<?php echo base_url(); ?>assets/images/stio.svg" alt="">
                                         </div>

                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="mCard p-2">
                     <div class="row">
                         <div class="col-md-4 my-2">
                             <div class="row ps-2">
                                 <div class="col-md-12 my-2">
                                     <div class=" mCard p-2" class="btn btn-primary" data-bs-toggle="modal"
                                         data-bs-target="#exampleModal">
                                         <div class="card-body">
                                             <div class="">
                                                 <div class="d-flex align-items-center">
                                                     <img src="<?php echo base_url(); ?>assets/images/apc.svg" alt="">
                                                     <p class="m-0 ms-2 fs8">Inventory checked out Today</p>

                                                 </div>
                                                 <div
                                                     class="my-2 d-flex justify-content-between align-items-center flex-wrap">
                                                     <p class="fs9 m-0">$30,000</p>
                                                     <div class="d-flex justify-content-between align-items-center">
                                                         <img class="mx-1"
                                                             src="<?php echo base_url(); ?>assets/images/aru.png"
                                                             alt="">
                                                         <p class="mb-0 ff1">2.99%</p>
                                                     </div>
                                                 </div>

                                             </div>

                                         </div>
                                         <!-- moodal -->
                                         <!-- Button trigger modal -->


                                         <!-- Modal -->
                                         <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inventory Checked Out</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
              <tr>
                  <th>Inventory Name</th>
                  <th>Name of Responsible Person</th>
                  <th>Date of Inventory</th>
              </tr>
          </thead>
          <tbody>
          
              <tr>
                  <td>Inventory 1</td>
                  <td>John Doe</td>
                  <td>2024-06-10</td>
              </tr>
              <tr>
                  <td>Inventory 2</td>
                  <td>Jane Smith</td>
                  <td>2024-06-09</td>
              </tr>
              <tr>
                  <td>Inventory 3</td>
                  <td>David Johnson</td>
                  <td>2024-06-08</td>
              </tr>
           
          </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div> -->

                                     </div>
                                 </div>
                                 <div class="col-md-12 my-2">
                                     <div class=" mCard p-2">
                                         <div class="card-body">
                                             <div class="">
                                                 <div class="d-flex align-items-center">
                                                     <img src="<?php echo base_url(); ?>assets/images/apii.svg" alt="">
                                                     <p class="m-0 ms-2 fs8">Average Price of
                                                         inventory items</p>

                                                 </div>
                                                 <div
                                                     class="my-2 d-flex justify-content-between align-items-center flex-wrap">
                                                     <p class="fs9 m-0">$10,000</p>
                                                     <div class="d-flex justify-content-between align-items-center">
                                                         <img class="mx-1"
                                                             src="<?php echo base_url(); ?>assets/images/icuppp.svg"
                                                             alt="">
                                                         <p class="mb-0 fff2">2.99%</p>
                                                     </div>
                                                 </div>

                                             </div>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12 my-2">
                                     <div class=" mCard p-2">
                                         <div class="card-body">
                                             <div class="">
                                                 <div class="d-flex align-items-center">
                                                     <img src="<?php echo base_url(); ?>assets/images/ixs.svg" alt="">
                                                     <p class="m-0 ms-2 fs8">Inventory expiring (30 days)</p>

                                                 </div>
                                                 <div
                                                     class="my-2 d-flex justify-content-between align-items-center flex-wrap">
                                                     <p class="fs9 m-0">$10,000</p>
                                                     <div class="d-flex justify-content-between align-items-center">
                                                         <img class="mx-1"
                                                             src="<?php echo base_url(); ?>assets/images/arb.png"
                                                             alt="">
                                                         <p class="mb-0 ff2">2.99%</p>
                                                     </div>
                                                 </div>

                                             </div>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-md-12 my-2">
                                     <div class=" mCard p-2">
                                         <div class="card-body">
                                             <div class="">
                                                 <div class="d-flex align-items-center">
                                                     <img src="<?php echo base_url(); ?>assets/images/lsi.svg" alt="">
                                                     <p class="m-0 ms-2 fs8">Low Stock Items</p>

                                                 </div>
                                                 <div
                                                     class="my-2 d-flex justify-content-between align-items-center flex-wrap">
                                                     <p class="fs9 m-0">500</p>
                                                     <div class="d-flex justify-content-between align-items-center">
                                                         <img class="mx-1"
                                                             src="<?php echo base_url(); ?>assets/images/arb2.png"
                                                             alt="">
                                                         <p class="mb-0 ff3">2.99%</p>
                                                     </div>
                                                 </div>

                                             </div>

                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-md-8 my-2">
                             <div class="row pe-4">
                                 <div class="col-md-9 my-2">
                                     <p class="ff4 m-0">Total Inventory</p>
                                     <p class="ff5 m-0">$225,000</p>
                                 </div>
                                 <div class="col-md-3 my-2">





                                     <select class="form-select date-selection" name="date-selection"
                                         id="date-selection-1">
                                         <option value="Today" selected>Today</option>
                                         <option value="Yesterday">Yesterday</option>
                                         <option value="This Week">This Week</option>
                                         <option value="Last Week">Last Week</option>
                                         <option value="This Month">This Month</option>
                                         <option value="Last Month">Last Month</option>
                                         <option value="Custom">Custom</option>
                                     </select>
                                     <div class="d-flex d-none date" id="">
                                         <input class="form-control " type="date" class="">
                                         <button class="btn btnRefresh" id=""> <img
                                                 src="<?php echo base_url(); ?>assets/images/reload.svg" alt=""
                                                 width="15px"></button>
                                     </div>

                                 </div>
                             </div>
                             <div>
                                 <div id="chart"></div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>
             <div class="col-md-3 py-2">
                 <div class="mCard p-2">
                     <div class="d-flex justify-content-between align-items-center flex-wrap">
                         <p class="ff4 m-0">Inventory History</p>
                         <div>
                             <img src="<?php echo base_url(); ?>assets/images/ellep.png" alt="">
                         </div>

                     </div>
                     <p class="ff5">Total Stock 20,000 </p>
                     <div class="row  borderB ">
                         <div class="col-md-6 my-2">
                             <div class="d-flex gap-2 align-items-center">
                                 <img src="<?php echo base_url(); ?>assets/images/arau.svg" alt="" class="arowU">
                                 <p class="m-0 fs2">Add Stock Items</p>

                             </div>
                             <p class="ff6">Items 21,456</p>
                         </div>
                         <div class="col-md-6 my-2">
                             <div class="d-flex gap-2 align-items-center">
                                 <img src="<?php echo base_url(); ?>assets/images/assigned.svg" alt="" class="arowd">
                                 <p class="m-0 fs2">Assinged Items</p>
                             </div>
                             <p class="ff6">Items 10,356</p>
                         </div>
                     </div>
                     <div>
                         <div class="d-flex justify-content-between align-items-center">
                             <p class="ff7 m-0">Popular</p>
                             <p class="fs2 m-0">3 Items</p>
                         </div>
                         <div class="my-2">
                             <div id="chartpie"></div>
                             <div class="my-2 ">
                                 <div class="d-flex justify-content-between align-items-center flex-wrap my-2">
                                     <div class="d-flex gap-1 align-items-center">
                                         <div class="mBox">
                                             <img src="<?php echo base_url(); ?>assets/images/m1.png" alt="">
                                         </div>
                                         <p class="m-0 ff8">Xeomin</p>
                                     </div>


                                     <div class="d-flex justify-content-between align-items-center">
                                         <img class="mx-1" src="<?php echo base_url(); ?>assets/images/ru.png" alt="">
                                         <p class="mb-0 ff2">2.99%</p>
                                     </div>

                                 </div>
                                 <div class="d-flex justify-content-between align-items-center flex-wrap my-2">
                                     <div class="d-flex gap-1 align-items-center">
                                         <div class="mBox">
                                             <img src="<?php echo base_url(); ?>assets/images/m1.png" alt="">
                                         </div>
                                         <p class="m-0 ff8">Xeomin</p>
                                     </div>


                                     <div class="d-flex justify-content-between align-items-center">
                                         <!-- <img class="mx-1" src="<?php echo base_url(); ?>assets/images/yu.png" alt=""> -->
                                         <i class="fa-solid fa-arrow-up fsy6"></i>
                                         <p class="mb-0 fsy6">2.99%</p>
                                     </div>

                                 </div>
                                 <div class="d-flex justify-content-between align-items-center flex-wrap my-2">
                                     <div class="d-flex gap-1 align-items-center">
                                         <div class="mBox">
                                             <img src="<?php echo base_url(); ?>assets/images/m1.png" alt="">
                                         </div>
                                         <p class="m-0 ff8">Xeomin</p>
                                     </div>


                                     <div class="d-flex justify-content-between align-items-center">
                                         <img class="mx-1" src="<?php echo base_url(); ?>assets/images/bu.png" alt="">
                                         <p class="mb-0 fff3">2.99%</p>
                                     </div>

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