<!doctype html>
<html lang="en" data-bs-theme="light">


<!-- Mirrored from codervent.com/matoxi/demo/vertical-menu/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Jan 2024 16:36:45 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Aesthetics Pro</title>
    <!--favicon-->


    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!--plugins-->
    <link href="<?php echo base_url(); ?>assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/metismenu/metisMenu.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/plugins/metismenu/mm-vertical.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet">

    <!--bootstrap css-->

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- main css -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>sass/main.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>sass/dark-theme.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>sass/semi-dark.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>sass/bordered-theme.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>sass/responsive.css" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

</head>

<body>

    <!--start header-->
    <header class="top-header">
        <nav class="navbar navbar-expand align-items-center gap-4">
            <div class="btn-toggle d-block d-md-none">
                <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
            </div>
            <div class="search-bar flex-grow-1">
                <div class="position-relative">
                    <input class="form-control pe-5 search-control d-lg-block d-none " type="text"
                        placeholder="Search Something">

                    <span
                        class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 search-close">close</span>
                    <div class="search-popup p-3">
                        <div class="card rounded-4 overflow-hidden">
                            <div class="card-header d-lg-none">
                                <div class="position-relative">
                                    <input class="form-control rounded-5 px-5 mobile-search-control" type="text"
                                        placeholder="Search">
                                    <span
                                        class="material-icons-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                                    <span
                                        class="material-icons-outlined position-absolute me-3 translate-middle-y end-0 top-50 mobile-search-close">close</span>
                                </div>
                            </div>
                            <div class="card-body search-content">
                                <p class="search-title">Recent Searches</p>
                                <div class="d-flex align-items-start flex-wrap gap-2 kewords-wrapper">
                                    Nothing To Show
                                </div>
                                <hr>





                            </div>
                            <div class="card-footer text-center bg-transparent">
                                <a href="javascript:;" class="btn w-100">See All Search Results</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="navbar-nav gap-1 nav-right-links align-items-center">
                <li class="nav-item dropdown d-none">

                    </a>
                    <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
                        <div class="notify-list">

                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                        <div class="d-flex align-items-center">
                            <div class="me-1">
                                <p class="mb-0 fs2">Eleanor Pena</p>
                                <p class="text-muted mt-0 fmon text-end mb-0 "> Admin</p>
                            </div>
                            <img src="<?php echo base_url(); ?>assets/images/avatars/01.png" class="p-1 borderCustom"
                                width="45" height="45" style="border-radius: 50%;" />


                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                        <a class="dropdown-item gap-2 py-2" href="javascript:;">
                            <div class="text-center">
                                <img src="<?php echo base_url(); ?>assets/images/avatars/01.png" class="p-1 shadow mb-3"
                                    width="90" height="90" alt="" />
                                <h5 class="user-name mb-0 fw-bold">Eleanor Pena</h5>
                                <small class="text-muted mt-0 fmon"> Pharmacy:25dsaf84</small>
                            </div>
                        </a>
                        <hr class="dropdown-divider" />
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2"
                            href="<?php echo base_url(); ?>general/settings"><i
                                class="material-icons-outlined">person_outline</i>Profile</a>

                        <hr class="dropdown-divider" />
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="<?php echo base_url(); ?>logout"><i
                                class="material-icons-outlined">power_settings_new</i>Logout</a>
                    </div>
                </li>
            </ul>


        </nav>
    </header>

    <!--end top header-->


    <!--start sidebar-->
    <aside class="sidebar-wrapper">
        <div class="sidebar-header">
            <div class="logo-icon m-auto">
                <div>
                    <img src="<?php echo base_url(); ?>assets/images/dplogo.png" class="" width="150px" alt="">
                    <p class="text-white text-center fontLgo m-0">Inventory Management Solutions</p>
                </div>
            </div>

            <div class="sidebar-close">
                <span class="material-icons-outlined">close</span>
            </div>
        </div>
        <div class="sidebar-nav" data-simplebar="true">

            <!--navigation-->
            <ul class="metismenu" id="sidenav">
                <li>
                    <a href="<?php echo base_url(); ?>dashboard" class="">
                        <div class="icnonDiv">

                            <img class="img2" src="<?php echo base_url(); ?>assets/images/Dashboard.svg" alt="">
                        </div>
                        <div class="menu-title">Home</div>
                    </a>

                </li>
                <li>
                    <a href="<?php echo base_url(); ?>user/users" class="">
                        <div class="icnonDiv">

                            <img class="img2" src="<?php echo base_url(); ?>assets/images/Users.svg" alt="">
                        </div>
                        <div class="menu-title">Users</div>
                    </a>

                </li>
                <li>
                    <a href="<?php echo base_url(); ?>general/patients" class="">
                        <div class="icnonDiv">

                            <img class="img2" src="<?php echo base_url(); ?>assets/images/Patients.svg" alt="">
                        </div>
                        <div class="menu-title">Patients</div>
                    </a>

                </li>
                <li>
                    <a href="<?php echo base_url(); ?>general/locations" class="">
                        <div class="icnonDiv">

                            <span class="img2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-crosshair2" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0a.5.5 0 0 1 .5.5v.518A7 7 0 0 1 14.982 7.5h.518a.5.5 0 0 1 0 1h-.518A7 7 0 0 1 8.5 14.982v.518a.5.5 0 0 1-1 0v-.518A7 7 0 0 1 1.018 8.5H.5a.5.5 0 0 1 0-1h.518A7 7 0 0 1 7.5 1.018V.5A.5.5 0 0 1 8 0m-.5 2.02A6 6 0 0 0 2.02 7.5h1.005A5 5 0 0 1 7.5 3.025zm1 1.005A5 5 0 0 1 12.975 7.5h1.005A6 6 0 0 0 8.5 2.02zM12.975 8.5A5 5 0 0 1 8.5 12.975v1.005a6 6 0 0 0 5.48-5.48zM7.5 12.975A5 5 0 0 1 3.025 8.5H2.02a6 6 0 0 0 5.48 5.48zM10 8a2 2 0 1 0-4 0 2 2 0 0 0 4 0" />
                                </svg></span>
                        </div>
                        <div class="menu-title">Locations</div>
                    </a>

                </li>
                <li>

                    <a href="<?php echo base_url(); ?>general/vendors" class="">

                        <div class="icnonDiv">

                            <span class="img2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                </svg></span>
                        </div>
                        <div class="menu-title">Vendors</div>
                    </a>

                </li>
                <li>
                    <a href="<?php echo base_url(); ?>general/totalInventory" class="">
                        <div class="icnonDiv">

                            <img class="img2" src="<?php echo base_url(); ?>assets/images/Inventory.svg" alt="">
                        </div>
                        <div class="menu-title">Total Inventory</div>
                    </a>

                </li>

                <li>
                    <a href="<?php echo base_url(); ?>general/inventoryHistory" class="">
                        <div class="icnonDiv">

                            <img class="img2" src="<?php echo base_url(); ?>assets/images/Inventory.svg" alt="">
                        </div>
                        <div class="menu-title"> Inventory History</div>
                    </a>

                </li>




                <li>
                    <a href="<?php echo base_url(); ?>general/financialReports" class="">
                        <div class="icnonDiv">

                            <img class="img2" src="<?php echo base_url(); ?>assets/images/Reports.svg" alt="">
                        </div>
                        <div class="menu-title">Financial Reports</div>
                    </a>

                </li>
                <li>
                    <a href="<?php echo base_url(); ?>general/procedureReports" class="">
                        <div class="icnonDiv">

                            <img class="img2" src="<?php echo base_url(); ?>assets/images/ProcedureReports.svg" alt="">
                        </div>
                        <div class="menu-title">Procedure Reports</div>
                    </a>

                </li>

                <li>
                    <a href="<?php echo base_url(); ?>general/productCost" class="">
                        <div class="icnonDiv">

                            <img class="img2" src="<?php echo base_url(); ?>assets/images/Reports.svg" alt="">
                        </div>
                        <div class="menu-title">Product Cost</div>
                    </a>

                </li>


                <li>
                    <a href="#" class="">
                        <div class="icnonDiv">

                            <img class="img2" src="<?php echo base_url(); ?>assets/images/Shops.svg" alt="">
                        </div>
                        <div class="menu-title">Shop</div>
                    </a>

                </li>



            </ul>
            <ul class="metismenu d-flex flex-column justify-content-center m-0">

                <li class="">
                    <a href="<?php echo base_url(); ?>general/settings" class="">
                        <div class="icnonDiv">

                            <img class="img2" src="<?php echo base_url(); ?>assets/images/Setting.svg" alt="">
                        </div>
                        <div class="menu-title">Settings</div>
                    </a>

                </li>
                <li class="">
                    <a href="<?php echo base_url(); ?>general/support" class="">
                        <div class="icnonDiv">

                            <img class="img2" src="<?php echo base_url(); ?>assets/images/Support.svg" alt="">
                        </div>
                        <div class="menu-title">Support</div>
                    </a>

                </li>
                <li>
                    <!-- <a href="#" class="">
                  <div class="icnonDiv">
                    
                    <img class="img2" src="./assets/images/LogOut.svg" alt="">
                   </div>
                  <div class="menu-title">Logout</div>
                </a> -->

                </li>

            </ul>
            <!--end navigation-->
        </div>
        <div class="m-2">
            <a href="<?php echo base_url(); ?>logout" class="btn btn-danger d-flex justify-content-center  align-items-center gap-2">
                <div class="icnonDiv">

                    <img class="i" src="<?php echo base_url(); ?>assets/images/LogOut.svg" alt="">
                </div>
                <div class="menu-title">Logout</div>
            </a>
        </div>

    </aside>
    <!--end sidebar-->