<?php
    session_start();
    if (empty($_SESSION['login_name'])) {
        session_destroy();
        header('Location: ../../../');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../../assets/img/QA_Icon.png" type="image/x-icon" />
    <title>Home | Audit MS</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="../../../assets/css/plugins/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../assets/css/plugins/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../../assets/css/plugins/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="../../../assets/css/plugins/style.css" id="main-style-link" />
    <link rel="stylesheet" href="../../../assets/css/plugins/style-preset.css" />
    <link rel="stylesheet" href="../../../assets/css/design.css" />
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="../../../assets/css/plugins/sweetalert2.css" />

</head>
<body>
    <!-- [ Pre-loader ] start -->
    <div id="loader" class="loader-spinner-bg">
        <div class="spinner"></div>
        <div class="loader-text">Loading...</div>
    </div>
    <!-- [ Pre-loader ] End -->
    
    <?php 
        // [ Sidebar Menu ] start 
        include '../../../assets/includes/sidebar.php'; 
        // [ Sidebar Menu ] end
        // [ Header Topbar ] start
        include '../../../assets/includes/header.php'; 
        // [ Header ] end
    ?>

    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-primary order-card">
                        <div class="card-body">
                            <h6 class="text-white">Orders Received</h6>
                            <h2 class="text-end text-white"><i class="feather icon-shopping-cart float-start"></i><span>486</span> </h2>
                            <p class="m-b-0">Completed Orders<span class="float-end">351</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-success order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Sales</h6>
                            <h2 class="text-end text-white"><i class="feather icon-tag float-start"></i><span>1641</span> </h2>
                            <p class="m-b-0">This Month<span class="float-end">213</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-warning order-card">
                        <div class="card-body">
                            <h6 class="text-white">Revenue</h6>
                            <h2 class="text-end text-white"><i class="feather icon-repeat float-start"></i><span>$42,562</span></h2>
                            <p class="m-b-0">This Month<span class="float-end">$5,032</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-danger order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Profit</h6>
                            <h2 class="text-end text-white"><i class="feather icon-award float-start"></i><span>$9,562</span></h2>
                            <p class="m-b-0">This Month<span class="float-end">$542</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-7">
                    <div class="card">
                        <div class="card-header">
                            <h5>New Order From United States</h5>
                        </div>
                        <div class="card-body">
                            <div id="world-map-markers" class="set-map" style="height: 157px"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-5">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between py-3">
                            <h5>New Order From United States</h5>
                            <div class="dropdown">
                                <a
                                    class="avtar avtar-xs btn-link-secondary dropdown-toggle arrow-none"
                                    href="#"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i class="material-icons-two-tone f-18">more_vert</i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">View</a>
                                    <a class="dropdown-item" href="#">Edit</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="media align-items-center">
                                <div class="avtar avtar-s bg-light-primary flex-shrink-0">
                                    <i class="ph ph-money f-20"></i>
                                </div>
                                <div class="media-body ms-3">
                                    <p class="mb-0 text-muted">Total Earnings</p>
                                    <h5 class="mb-0">$249.95</h5>
                                </div>
                            </div>
                            <div id="earnings-users-chart"></div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="media align-items-center">
                                        <div class="avtar avtar-s bg-grd-primary flex-shrink-0">
                                            <i class="ph ph-money f-20 text-white"></i>
                                        </div>
                                        <div class="media-body ms-2">
                                            <p class="mb-0 text-muted">Total Profit</p>
                                            <h6 class="mb-0">$1,783</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="media align-items-center">
                                        <div class="avtar avtar-s bg-grd-success flex-shrink-0">
                                            <i class="ph ph-shopping-cart text-white f-20"></i>
                                        </div>
                                        <div class="media-body ms-2">
                                            <p class="mb-0 text-muted">Product Sold</p>
                                            <h6 class="mb-0">15,830</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <footer class="pc-footer">
        <div class="footer-wrapper container-fluid">
            <div class="row">
                <div class="col-sm-12 my-1 text-center">
                    <p class="m-0">&#9829; 2025 © IT Department - FujiFilm Optics Philippines Inc.</p>
                </div>
            </div>
        </div>
    </footer>
     
    <!-- Jquery JS -->
    <script src="../../../assets/js/plugins/jquery-3.7.1.js"></script>

    <!-- ========= All Javascript files linkup ======== -->
    <script src="../../../assets/js/plugins/popper.min.js"></script>
    <script src="../../../assets/js/plugins/simplebar.min.js"></script>
    <script src="../../../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../../../assets/js/plugins/script.js"></script>
    <script src="../../../assets/js/plugins/theme.js"></script>
    <script src="../../../assets/js/plugins/feather.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="../../../assets/js/plugins/sweetalert2.all.js"></script>
    <script src="../../../assets/js/logout.js"></script>

    <script>
        // Get 'sc' value from URL in JS
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            const value = urlParams.get(param);
            return value ? atob(value) : null; // decode base64 if value exists
        }

        window.addEventListener('load', () => {
            const code = getQueryParam('code');

            if (code === 'success_login') {
                var name = "<?= $_SESSION['login_name']; ?>";

                // Hide loader after showing alert
                const loader = document.getElementById('loader');
                if (loader) {
                    //loader.remove();
                    loader.classList.add('fade-out');
                    setTimeout(() => loader.remove(), 600);
                }

                // Show your SweetAlert2 success toast here
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;  
                    }
                });
                // Replace ${name} with actual username fetched/stored
                Toast.fire({
                    icon: 'success',
                    title: 'WELCOME BACK!\n' + name + '!',
                    background: '#76e44aff',
                    color: '#ffffff',
                    iconColor: '#ffffff'
                });

                // Optionally, you may want to remove 'code' param from URL if needed
                history.replaceState(null, '', window.location.pathname);
            } else {
                // Just hide the loader
                const loaderSpinner = document.querySelector('.loader-spinner-bg');
                if (loaderSpinner) {
                    loaderSpinner.classList.add('fade-out');
                    setTimeout(() => loaderSpinner.remove(), 600);
                }
            }
        });
    </script>

</body>
</html>

