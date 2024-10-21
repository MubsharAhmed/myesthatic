<style>
    .spinner-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(255, 255, 255, 0.8);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .spinner {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div id="spinner" class="spinner-overlay" style="display: none;">
    <div class="spinner"></div>
</div>

<!--start main wrapper-->
<main class="main-wrapper">
    <div class="main-content">
        <h3 class="fmon">Add Patient</h3>
        <form id="addPatientForm" enctype="multipart/form-data" method="post" action="<?= base_url('Patient/add_patient'); ?>">
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
                    <label class="slabel">Phone number</label>
                    <input type="text" class="form-control fsele" name="phone" id="phone" placeholder="Write Here" required>
                </div>


                <div class="col-md-6 my-2">
                    <label class="slabel">Date of birth</label>
                    <input type="date" class="form-control fsele" name="dob" placeholder="Write Here" required>
                </div>
                <div class="col-md-6 my-2">
                    <label class="slabel">Location</label>
                    <select class="form-select fsele" name="location" id="location" required>
                        <option value="" selected>Select Location</option>
                        <!-- Options will be populated via AJAX -->
                    </select>
                </div>
                <!-- <div class="col-md-6 my-2">
                      <label class="slabel">Password</label>
                      <input type="password" class="form-control fsele" name="password" placeholder="Write Here" required>
                  </div> -->

                <div class="col-md-12 my-2">
                    <div class="d-flex justify-content-center align-items-center w-100">
                        <button type="submit" class="btn btnAdd w-25">Add Patient</button>
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

        $('#addPatientForm').on('submit', function(e) {
            e.preventDefault();

            // Show the spinner
            $('#spinner').show();

            var formData = new FormData(this);

            $.ajax({
                url: '<?= base_url('Patient/add_patient'); ?>',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Hide the spinner
                    $('#spinner').hide();

                    var result = JSON.parse(response);
                    if (result.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: result.message,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '<?= base_url('Patient'); ?>';
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
                    // Hide the spinner
                    $('#spinner').hide();

                    console.error('Error adding user:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    });
                }
            });
        });


    });

    document.getElementById('phone').addEventListener('input', function(e) {
        let input = e.target.value.replace(/\D/g, '');
        let formattedPhoneNumber = '';

        if (input.length > 0) {
            formattedPhoneNumber = '(' + input.substring(0, 3);
        }
        if (input.length >= 4) {
            formattedPhoneNumber += ') ' + input.substring(3, 6);
        }
        if (input.length >= 7) {
            formattedPhoneNumber += '-' + input.substring(6, 10);
        }

        e.target.value = formattedPhoneNumber;
    });
</script>