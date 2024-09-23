<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">

        <h3 class="fmon">Add User</h3>
        <form id="addUserForm" enctype="multipart/form-data" method="post" action="<?= base_url('User/add'); ?>">
            <div class="row my-2">
                <div class="col-md-6 my-2">
                    <label class="slabel">First Name</label>
                    <input type="text" class="form-control fsele" name="first_name" placeholder="Write Here" required>
                </div>
                <div class="col-md-6 my-2">
                    <label class="slabel">Last Name</label>
                    <input type="text" class="form-control fsele" name="last_name" placeholder="Write Here" required>
                </div>
                <div class="col-md-6 my-2">
                    <label class="slabel">Email Address</label>
                    <input type="email" class="form-control fsele" name="email" placeholder="Write Here" required>
                </div>
                <div class="col-md-6 my-2">
                    <label class="slabel">Phone Number</label>
                    <input type="text" class="form-control fsele" name="phone" placeholder="Write Here" required>
                </div>
                <div class="col-md-6 my-2">
                    <label class="slabel">Date of Birth</label>
                    <input type="date" class="form-control fsele" name="dob" required>
                </div>
                <div class="col-md-6 my-2">
                    <label class="slabel">Password</label>
                    <input type="password" class="form-control fsele" name="password" placeholder="Write Here" required>
                </div>
                <div class="col-md-6 my-2">
                    <label class="slabel">Location</label>
                    <select class="form-select fsele" name="location" id="location" required>
                        <option value="" selected>Select Location</option>
                        <!-- Options will be populated via AJAX -->
                    </select>
                </div>
                <div class="col-md-6 my-2">
                    <label class="slabel">License Number</label>
                    <input type="text" class="form-control fsele" name="license_number" placeholder="Enter Number" required>
                </div>
                <div class="col-md-6 my-2">
                    <label class="slabel">Image</label>
                    <input type="file" class="d-none" name="image" id="image" required>
                    <label for="image" class="btn btnTap">Tap to Upload Image</label>
                    <img id="preview" src="#" alt="Image Preview" class="d-none" />
                </div>
                <div class="col-md-12 my-2">
                    <div class="d-flex justify-content-center align-items-center w-100">
                        <button type="submit" class="btn btnAdd w-25">Add User</button>
                    </div>
                </div>
            </div>
        </form>



    </div>
</main>
<!--end main wrapper-->


<!--start overlay-->
<div class="overlay btn-toggle"></div>
<!--end overlay-->


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $.ajax({
            url: '<?= base_url('Location/get_locations'); ?>',

            method: 'GET',
            success: function(data) {
                // console.log(data);
                var locations = JSON.parse(data);
                $.each(locations, function(index, location) {
                    $('#location').append('<option value="' + location.id + '">' + location.name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching locations:', error);
            }
        });

        $('#addUserForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '<?= base_url('User/add'); ?>',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    var result = JSON.parse(response);
                    // location
                    if (result.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: result.message,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {                           
                                window.location.href = '<?= base_url('User/users'); ?>';
                            }
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error adding user:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    });
                }
            });
        });


        $('#image').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $('#preview').attr('src', event.target.result).removeClass('d-none');
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>