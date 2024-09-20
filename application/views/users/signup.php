<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Aesthetics Pro</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- custom css -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- fontawesone link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body class="">
    <div class="container-fluid bgcon">
        <div class="row h-100vh">
            <div class="col-md-6 bgLeft d-flex justify-content-center align-items-center ">
                <div class="">
                    <img class="img-fluid d-block mx-auto logoImg" src="<?php echo base_url(); ?>assets/images/logo.png" alt="">
                    <div class="my-2 d-flex gap-2 justify-content-center flex-wrap">
                        <img class="brandBtn" src="<?php echo base_url(); ?>assets/images/AppStore.svg" alt="">
                        <img class="brandBtn" src="<?php echo base_url(); ?>assets/images/GooglePlay.svg" alt="">
                    </div>

                </div>
            </div>
            <?php if ($this->session->flashdata('success')): ?>
                <script>
                    swal({
                        title: "Success!",
                        text: "<?php echo $this->session->flashdata('success'); ?>",
                        icon: "success",
                        button: "Ok"
                    });
                </script>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <script>
                    swal({
                        title: "Error!",
                        text: "<?php echo $this->session->flashdata('error'); ?>",
                        icon: "error",
                        button: "Ok"
                    });
                </script>
            <?php endif; ?>

            <div class="col-md-6 align-self-center my-2 my-md-0 position-relative overflow-hidden h100p">
                <!-- <img class="imgwav" src="./assets/images/wav1.png" alt=""> -->
                <img class="imgwav" src="<?php echo base_url(); ?>assets/images/wavb1.svg" alt="">
                <div class="container mb13 position-relative conSign">
                    <form action="<?php echo base_url('signup/register'); ?>" method="post" class="bgCardSign mx-0 mx-md-4 p-3 border8">
                        <h3 class="text-black text-center">Sign Up To SpaStrategix</h3>
                        <div class="my-2 row">
                            <div class="col-md-6 my-2">
                                <label for="first_name" class="fs3 mb-2">First Name</label>
                                <input class="form-control formInp py-1" type="text" name="first_name" placeholder="Enter Here" value="<?php echo set_value('first_name'); ?>" />
                                <?php echo form_error('first_name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="last_name" class="fs3 mb-2">Last Name</label>
                                <input class="form-control formInp py-1" type="text" name="last_name" placeholder="Enter Here" value="<?php echo set_value('last_name'); ?>" />
                                <?php echo form_error('last_name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="my-2 row">
                            <div class="col-md-6 my-2">
                                <label for="email" class="fs3 mb-2">Email</label>
                                <input class="form-control formInp py-1" type="email" name="email" placeholder="Enter Here" value="<?php echo set_value('email'); ?>" />
                                <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6 my-2">
                                <label for="phone" class="fs3 mb-2">Phone Number</label>
                                <input class="form-control formInp py-1" type="text" name="phone" placeholder="Enter Here" value="<?php echo set_value('phone'); ?>" />
                                <?php echo form_error('phone', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="my-2 row">
                            <div class="col-md-6 my-2 position-relative">
                                <label for="password" class="fs3 mb-2">Password</label>
                                <input class="form-control formInp py-1" type="password" name="password" placeholder="Password" />
                                <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="col-md-6 my-2 position-relative">
                                <label for="confirm_password" class="fs3 mb-2">Confirm Password</label>
                                <input class="form-control formInp py-1" type="password" name="confirm_password" placeholder="Confirm Password" />
                                <?php echo form_error('confirm_password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="row my-2 justify-content-center">
                            <div class="col-md-12">
                                <div class="row justify-content-center">
                                    <div class="col-md-6">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <button type="submit" class="btn my-2 signB py-1">
                                                Sign Up
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>


                    <div class="d-flex justify-content-center">
                        <a href="<?php echo base_url(); ?>login" class="forgText my-2 py-3 mt-5">Already Have Account? Login</a>
                    </div>
                </div>
                <div class="d-flex justify-content-end mainWaveBox2">
                    <div class="wavBox2 position-relative">
                        <div>
                            <ul class="nav foot gap-3">
                                <li><a href="#">Contact Us</a></li>
                                <li>-</li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                        <!-- <img class="imgwav2" src="./assets/images/wav2.png" alt=""> -->
                        <img class="imgwav2" src="<?php echo base_url(); ?>assets/images/wavb2.svg" alt="">
                    </div>
                </div>

            </div>

        </div>

        <!-- <div class="row">
          <div class="col-md-12 bg-white d-flex justify-content-center align-items-center">
            <ul class="d-flex gap-3 footer mb-0">
              <li><a href="#"><i class="fa-solid fa-copyright"></i> United States</a></li>
             
              <li><a href="#"> Contact Us</a></li>
              <li><a href="#"> Help</a></li>
          </ul>
        </div>
        </div> -->
    </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const eyeIcons = document.querySelectorAll(".eye");

            eyeIcons.forEach(function(icon) {
                icon.addEventListener("click", function() {
                    const passwordField = this.previousElementSibling;
                    if (passwordField.type === "password") {
                        passwordField.type = "text";
                        this.classList.remove("fa-eye");
                        this.classList.add("fa-eye-slash");
                    } else {
                        passwordField.type = "password";
                        this.classList.remove("fa-eye-slash");
                        this.classList.add("fa-eye");
                    }
                });
            });
        });
    </script>
</body>

</html>