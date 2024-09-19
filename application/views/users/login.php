<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Aesthetics Pro</title>
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- custom css -->


    <!-- fontawesone link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body class="">
    <div class="container-fluid">
        <div class="row h-100vh">

            <div class="col-md-6 bgLeft d-flex justify-content-center align-items-center ">
                <div class="">
                    <img class="img-fluid d-block mx-auto logoImg" src="./assets/images/logo.png" alt="">
                    <div class="my-2 d-flex gap-2 justify-content-center flex-wrap">
                        <img class="brandBtn" src="./assets/images/AppStore.svg" alt="">
                        <img class="brandBtn" src="./assets/images/GooglePlay.svg" alt="">
                    </div>
                    <!-- <div class="d-flex gap-2 flex-wrap align-items-center justify-content-center ">
                        <a class="link" href="#">Contact Us</a>
                        <p class="link m-0">-</p>
                        <a class="link" href="#">Help</a>
                    </div> -->
                </div>
            </div>
            <div class="col-md-6 align-self-center my-2 my-md-0 overflow-hidden position-relative h100p">
                <!-- <img class="imgwav" src="./assets/images/wav1.png" alt=""> -->
                <img class="imgwav" src="./assets/images/wavb1.svg" alt="">
                <div class="container mb13 conSign">



                    <div class="row ">

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12">

                                </div>

                            </div>

                            <form action="<?php echo base_url(); ?>loginMe" method="post"
                                class="bgCard mx-4 p-3 border8">
                                <div>
                                    <?php $this->load->helper('form'); ?>
                                    <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show">', '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'); ?>
                                    <?php
                                    $this->load->helper('form');
                                    $error = $this->session->flashdata('error');
                                    if ($error) {
                                    ?>
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        <?php echo $error; ?>
                                    </div>
                                    <?php }
                                    $success = $this->session->flashdata('success');
                                    if ($success) {
                                    ?>
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                        <?php echo $success; ?>
                                    </div>
                                    <?php } ?>
                                </div>
                                <h3 class="text-black text-center">Login To SpaStrategix</h3>
                                <p class="text-black text-center">Enter Your Email Address And Password</p>
                                <div action="<?php echo base_url(); ?>loginMe" method="post" class="my-2 row  ">

                                    <div class="col-md-12 my-2  position-relative ">
                                        <label for="email" class="fs3 mb-2"> Practice </label>
                                        <input class="form-control formInp py-1 lockInp" type="text"
                                            placeholder="Refresh001" value="Refresh001" disabled />
                                        <i class="fa-solid fa-lock lock"></i>
                                    </div>
                                </div>
                                <div class="my-2 row r">

                                    <div class="col-md-12 my-2 ">
                                        <label for="email" class="fs3 mb-2">Email</label>
                                        <input class="form-control formInp py-1" type="text" placeholder="Enter Here"
                                            name="email" />
                                    </div>

                                </div>
                                <div class="my-2 row ">
                                    <div class="col-md-12 my-2 ">
                                        <label for="password" class="fs3 mb-2">Password</label>
                                        <input class="form-control formInp py-1" type="text" placeholder=" Enter Here"
                                            name="password" />
                                    </div>

                                </div>
                                <div class="my-2 d-flex justify-content-center">
                                    <a href="#" class="text-center forgText">Forgot Your Password</a>
                                </div>


                                <div class="row my-2  justify-content-center">
                                    <div class="col-md-12  ">
                                        <div class="row justify-content-center">
                                            <div class="col-md-8 ">
                                                <div
                                                    class="d-flex flex-column justify-content-center align-items-center">
                                                    <button type="submit" class="btn my-2 signB  py-1 ">
                                                        Login
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <a href="./index.html" class="forgText mt-4 mb-2 z9  ">Don't have an account?
                                        Sign Up</a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mainWaveBox">
                    <div class="wavBox2 position-relative">
                        <div>
                            <ul class="nav foot gap-3">
                                <li><a href="#">Contact Us</a></li>
                                <li>-</li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                        <!-- <img class="imgwav2" src="./assets/images/wav2.png" alt=""> -->
                        <img class="imgwav2" src="./assets/images/wavb2.svg" alt="">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
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