 <!--start main wrapper-->
 <main class="main-wrapper">
   <div class="main-content">
     <div class="container-fluid mt-0 pt-2 py-5">
       <!-- <div class="row">
              <div class="col-md-2">
                <div class="mt-5 pt-5">
                  <p class="fs3 mt-5 pt-5">Edit Profile</p>
                </div>
              </div>
              <div class="col-md-8">
                <div class="d-flex align-items-center">
                  <div class="peofileImage position-relative">
                    <img src="<?php echo base_url(); ?>assets/images/avatars/03.png" alt="" />
                     <label for="pImage" class="btnAdd btnupImage"><img src="<?php echo base_url(); ?>assets/images/upiIcon.svg" alt="" width="25px"> </label>
                     <input type="file" name="" id="pImage" class="d-none">
                   
                  </div>
                 <div class="d-block  ms-3">
                    <p class="proText m-0">Elenor Pina</p>
                    <p class="proText m-0 fs1">Admin</p>
                 </div>
                </div>
                <div class="my-3">
                  <div class="row">
                    <div class="col-md-6 my-2">
                      <small class="my-3 text-muted fw-bolder">Personal</small>
                      <div class="my-2 d-flex justify-content-between">
                        <div class="mx-1">
                          <label class="prLabel" for="form-label"
                            >First Name</label
                          >
                          <input class="form-control fsele prInp" type="text" />
                        </div>
                        <div class="mx-1">
                          <label class="prLabel" for="form-label"
                            >Surname</label
                          >
                          <input class="form-control fsele prInp" type="text" />
                        </div>
                      </div>
                      <div class="my-2">
                        <label class="prLabel" for="form-label">Vat#</label>
                        <input
                          class="form-control fsele prInp"
                          type="text"
                          placeholder="Enter Value"
                        />
                      </div>
                      <div class="my-2">
                        <label class="prLabel" for="form-label"
                          >Date of birth</label
                        >
                        <input
                          class="form-control fsele prInp"
                          type="text"
                          placeholder="Enter Value"
                        />
                      </div>
                    
                    </div>
                    <div class="col-md-6 my-2">
                      <small class="my-3 text-muted fw-bolder">Contact</small>
                      <div class="my-2">
                        <div class="">
                          <label class="prLabel" for="form-label">Email</label>
                          <input
                            class="form-control fsele prInp"
                            type="text"
                            placeholder="admin@gmail.com"
                          />
                        </div>
                      </div>
                      <div class="my-2">
                        <label for="exampleInput">Phone Number</label>
                        <div class="row">
                          <div class="col-md-4">
                            <select class="form-select fsele" id="exampleSelect">
                              <option value="">+98</option>
                              <option value="option1">Option 1</option>
                              <option value="option2">Option 2</option>
                              <option value="option3">Option 3</option>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <input
                              class="form-control fsele prInp"
                              type="text"
                              placeholder="912000000"
                            />
                          </div>
                        </div>
                      </div>
                      <div class="my-2">
                        <label class="prLabel" for="form-label">Country</label>
                        <input
                          class="form-control fsele prInp"
                          type="text"
                          placeholder="Enter Value"
                        />
                      </div>
                      <div class="my-2">
                        <label class="prLabel" for="form-label">City</label>
                        <input
                          class="form-control fsele prInp"
                          type="text"
                          placeholder="Enter Value"
                        />
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button class="btnAdd btn px-5">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
       <div class="Procard p-3">
         <div class="row">
           <div class="col-md-12 ">
             <div class="bacgroundLogo">
               <div class="d-flex justify-content-center">
                 <img class="mt-5 " src="<?php echo base_url(); ?>assets/images/Logo.svg" alt="">
               </div>
               <div class="d-flex justify-content-end mx-2">
                 <button type="submit" class=" editBtn">
                   <img src="<?php echo base_url(); ?>assets/images/iconedit.svg" alt="">
                   Edit
                 </button>
                 <!-- Edit Button -->
                 <!-- <button type="button" class="btn btn-primary editBtn">
             <img src="<?php echo base_url(); ?>assets/images/iconedit.svg" alt="">
             Edit
           </button> -->


               </div>
             </div>
           </div>
           <div class="col-md-12">
             <div class="d-flex gap-2 align-items-end positSet">
               <div>
                 <label for="pImage">
                   <img class="profImage" src="<?php echo !empty($user->image) ? $user->image : base_url('assets/images/profimage.svg'); ?>" alt="Profile Image">
                 </label>
                 <input type="file" name="image" id="pImage" class="d-none">
               </div>
               <div class="pb-3">
                 <p class="pf1 mb-2" id="fullNameDisplay"><?php echo !empty($user->name) ? $user->name : 'User Name'; ?></p>
                 <p class="pf2 mb-1 mt-2"><?php echo !empty($user->role) ? ucfirst($user->role) : 'Admin'; ?></p>
               </div>
             </div>
           </div>
           <div class="row">
             <!-- First Name -->
             <div class="col-md-4">
               <div class="my-2">
                 <label class="prLabel" for="form-label">First Name</label>
                 <input class="form-control fsele prInp" id="firstName" type="text" value="<?php echo !empty($user->first_name) ? $user->first_name : ''; ?>" disabled />
               </div>
             </div>
             <!-- Last Name -->
             <div class="col-md-4">
               <div class="my-2">
                 <label class="prLabel" for="form-label">Last Name</label>
                 <input class="form-control fsele prInp" id="lastName" type="text" value="<?php echo !empty($user->last_name) ? $user->last_name : ''; ?>" disabled />
               </div>
             </div>
             <!-- Email Address -->
             <div class="col-md-4">
               <div class="my-2">
                 <label class="prLabel" for="form-label">Email Address</label>
                 <input class="form-control fsele prInp" id="email" type="text" value="<?php echo !empty($user->email) ? $user->email : ''; ?>" disabled />
               </div>
             </div>
             <!-- Phone Number -->
             <div class="col-md-4">
               <div class="my-2">
                 <label class="prLabel" for="form-label">Phone Number</label>
                 <input class="form-control fsele prInp" id="phone" type="text" value="<?php echo !empty($user->phone) ? $user->phone : ''; ?>" disabled />
               </div>
             </div>
             <!-- Vat # -->
             <div class="col-md-4">
               <div class="my-2">
                 <label class="prLabel" for="form-label">Vat #</label>
                 <input class="form-control fsele prInp" id="vat" type="text" value="<?php echo !empty($user->vat) ? $user->vat : ''; ?>" disabled />
               </div>
             </div>
             <!-- Date of Birth -->
             <div class="col-md-4">
               <div class="my-2">
                 <label class="prLabel" for="form-label">Date Of Birth</label>
                 <input class="form-control fsele prInp" id="dob" type="date" value="<?php echo !empty($user->dob) ? $user->dob : ''; ?>" disabled />
               </div>
             </div>
             <!-- Country -->
             <div class="col-md-4">
               <div class="my-2">
                 <label class="prLabel" for="form-label">Country</label>
                 <input class="form-control fsele prInp" id="country" type="text" value="<?php echo !empty($user->country) ? $user->country : ''; ?>" disabled />
               </div>
             </div>
             <!-- City -->
             <div class="col-md-4">
               <div class="my-2">
                 <label class="prLabel" for="form-label">City</label>
                 <input class="form-control fsele prInp" id="city" type="text" value="<?php echo !empty($user->city) ? $user->city : ''; ?>" disabled />
               </div>
             </div>
           </div>
           <!-- Update Button (Initially hidden) -->
           <button type="button" class="btn btn-dark updateBtn" style="display: none;">
             Ok
           </button>
         </div>
       </div>


 </main>
 <!--end main wrapper-->


 <!--start overlay-->
 <div class="overlay btn-toggle"></div>
 <!--end overlay-->


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <script>
   $(document).ready(function() {
     $('#pImage').on('change', function() {
       var formData = new FormData();
       var file = this.files[0];
       formData.append('image', file);

       $.ajax({
         url: '<?php echo base_url("general/uploadProfileImage"); ?>',
         type: 'POST',
         data: formData,
         contentType: false,
         processData: false,
         dataType: 'json',
         success: function(response) {
           if (response.status == 'success') {
             $('.profImage').attr('src', response.image_url);

             swal({
               title: "Success!",
               text: "Image updated successfully",
               icon: "success",
               button: "OK",
             });
           } else {
             swal({
               title: "Upload Failed",
               text: "Failed to upload image: " + response.message,
               icon: "error",
               button: "Try Again",
             });
           }
         },
         error: function(xhr, status, error) {
           swal({
             title: "Error",
             text: "An error occurred: " + error,
             icon: "error",
             button: "Close",
           });
         }
       });
     });
   });

   $(document).ready(function() {
     $('.editBtn').on('click', function() {
       $('input').prop('disabled', false);
       $('.updateBtn').show();
       $('.editBtn').hide();
     });

     $('.updateBtn').on('click', function() {
       var updatedData = {
         firstName: $('#firstName').val(),
         lastName: $('#lastName').val(),
         email: $('#email').val(),
         phone: $('#phone').val(),
         vat: $('#vat').val(),
         dob: $('#dob').val(),
         country: $('#country').val(),
         city: $('#city').val(),
       };

       $.ajax({
         url: '<?php echo base_url("general/updateUserProfile"); ?>',
         type: 'POST',
         data: updatedData,
         success: function(response) {
           $('input').prop('disabled', true);
           $('.updateBtn').hide();
           $('.editBtn').show();

           // Concatenate and display the updated full name in the relevant <p> element
           $('#fullNameDisplay').text(updatedData.firstName + ' ' + updatedData.lastName);
           swal({
             title: "Success!",
             text: "Udated successfully",
             icon: "success",
             button: "OK",
           });
         },
         error: function(xhr, status, error) {
           alert('Error updating profile: ' + error);
         }
       });
     });
   });
 </script>