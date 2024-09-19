 <!--start main wrapper-->
 <main class="main-wrapper">
     <div class="main-content">

         <h3 class="fmon">Add Inventory</h3>
         <div class="row my-2">
             <div class="col-md-6 my-2">
                 <label class="slabel">Category</label>
                 <select class="form-select fsele" id="" required>
                     <option value="Allergan">Neurotoxins </option>
                     <option value="Merz"> Dermal Fillers</option>
                     <option value="Revance">Others</option>


                 </select>
             </div>
             <div class="col-md-6 my-2">
                 <label class="slabel">Brand</label>
                 <select class="form-select fsele" id="" required>
                     <option value="Allergan">Allergan</option>
                     <option value="Merz">Merz</option>
                     <option value="Revance">Revance</option>

                     <option value="Revanesse">Revanesse</option>
                     <option value="Galderma">Galderma</option>
                 </select>
             </div>
             <div class="col-md-6 my-2">
                 <label class="slabel">Product Type</label>
                 <select class="form-select fsele" id="" required>
                     <option>Kybella 4 vials 2ml per vial</option>
                     <option>JUVÉDERM® VOLUMA® XC (2 syringe box) 1.0ml each</option>
                     <option>JUVÉDERM® VOLUX® XC (2 syringe box) 1.0ml each</option>
                     <option>JUVÉDERM® VOLLURE® XC (2 syringe box) 1.0ml each</option>
                     <option>JUVÉDERM® VOLBELLA® XC (2 syringe box) 1.0ml each</option>
                     <option>JUVÉDERM® Ultra Plus XC (2 syringe box) 1.0ml each</option>
                     <option>JUVÉDERM® Ultra XC(2 syringe box) 1.0ml each</option>
                     <option>JUVÉDERM® Ultra XC (2 syringe box) 1.0ml each</option>
                     <option>Skinvive (2 syringe box) 1.0ml each</option>
                     <option>Botox 100 units</option>
                     <option>Botox 50 units</option>
                     <option>Xeomin 100 units</option>
                     <option>Radiesse 0.8ml</option>
                     <option>Radiesse 1.5ml</option>
                     <option>Radiesse (2 syringe box) 1.5ml each</option>
                     <option>Belotero 1 syringe 1m</option>
                     <option>Daxify 50 units</option>
                     <option>Daxify 100 units</option>
                     <option>RHA 2 (2 syringe box) 1.0ml each</option>
                     <option>RHA 3 (2 syringe box) 1.0ml each</option>
                     <option>RHA 4 (2 syringe box) 1.0ml each</option>
                     <option>RHA Redensity (2 syringe box) 1.0ml each</option>
                     <option>Versa + (2 syringe box) 1.2ml each</option>
                     <option>Versa + Lips (2 syringe box) 1.2ml each</option>
                     <option>Sculptura</option>
                     <option>Dysport 300 units</option>
                     <option>Restylane® 1 syringe 1ml</option>
                     <option>Restylane® Contour 1 syringe 1ml</option>
                     <option>Restylane® Defyne 1 syringe 1ml</option>
                     <option>Restylane® Kysse 1 syringe 1ml</option>
                     <option>Restylane® Lyft 1 syringe 1ml</option>
                     <option>Restylane® Refyne 1 syringe 1ml</option>
                     <option>Restylane® Silk 1 syringe 1ml</option>
                     <option>Restylane® Eyelight 1 syringe 1ml</option>
                 </select>

             </div>
             <div class="col-md-6 my-2">
                 <label class="slabel">Units/Bottles</label>
                 <select class="form-select fsele" id="" required>
                     <option value="" selected>Xeamin</option>
                     <option value="">2</option>
                     <option value="">4erz</option>
                 </select>
             </div>
             <div class="col-md-6 my-2">
                 <label class="slabel">vile/syringe</label>
                 <select class="form-select fsele" id="" required>
                     <option value="" selected>Select</option>
                     <option value="">vile</option>
                     <option value="">syringe</option>
                 </select>
             </div>
             <div class="col-md-6 my-2">
                 <label class="slabel">Quantity</label>
                 <input type="text" class="form-control fsele" name="" id="" placeholder="Write Here" required>
             </div>
             <div class="col-md-6 my-2">
                 <label class="slabel">Cost</label>
                 <input type="text" class="form-control fsele" name="" id="" placeholder="Write Here" required
                     value="1000" disabled>
             </div>
             <div class="col-md-6 my-2">
                 <label class="slabel">Today Date</label>
                 <input type="text" class="form-control fsele" name="" id="" placeholder="Write Here" required>
             </div>
             <div class="col-md-6 my-2">
                 <label class="slabel">Location</label>
                 <select class="form-select fsele" id="" required>
                     <option value="" selected>Select</option>
                     <option value="">New York</option>
                     <option value="">London</option>
                 </select>
             </div>
             <div class="col-md-6 my-2">
                 <label class="slabel">Date of expiry</label>
                 <input type="text" class="form-control fsele" name="" id="" placeholder="MM/DD/YYYY" required>
             </div>
             <div class="col-md-6 my-2">
                 <label class="slabel">Lot Number
                 </label>
                 <input type="text" class="form-control fsele" name="" id="" placeholder="Lot Number" required>
             </div>
             <div class="col-md-6 my-2">
                 <label class="slabel">Generate QR</label>
                 <button class="btn btnTap">Tap to Generate QR</button>
             </div>
             <div class="col-md-6 my-2">
                 <label class="slabel">Image</label>
                 <input type="file" class="d-none" id="imageUp">
                 <label for="imageUp" class="btn btnTap">Tap to Upload image</label>
             </div>
             <div class="col-md-12 my-2">
                 <div class="d-flex justify-content-center align-items-center w-100">
                     <button class="btn  btnAdd w-25 ">Add Inventory</button>
                 </div>
             </div>
         </div>


     </div>
 </main>
 <!--end main wrapper-->


 <!--start overlay-->
 <div class="overlay btn-toggle"></div>
 <!--end overlay-->