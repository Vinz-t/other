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
    <title>Monitoring Checklist | Audit MS</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="../../../assets/css/plugins/bootstrap.min.css" />
    <link rel="stylesheet" href="../../../assets/css/plugins/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../../assets/css/plugins/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <!-- [Template CSS Files] -->
    <link rel="stylesheet" href="../../../assets/css/plugins/style.css" id="main-style-link" />
    <link rel="stylesheet" href="../../../assets/css/plugins/style-preset.css" />
    <link rel="stylesheet" href="../../../assets/css/design.css" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="../../../assets/css/plugins/datatables.css" />
    <link rel="stylesheet" href="../../../assets/css/plugins/datatables.min.css" />
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="../../../assets/css/plugins/sweetalert2.css" />
    <link rel="stylesheet" href="../../../assets/css/plugins/animate.min.css" />

    <!-- <style>
        /* container = whole SweetAlert wrapper */
        .swal-container-on-top {
            z-index: 20000 !important;
        }

        /* popup = actual toast box */
        .swal-on-top {
            z-index: 20001 !important;
        }
    </style> -->

</head>
<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-spinner-bg">
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
                <div class="col-md-12 col-xl-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div>
                                <img src="../../../assets/img/index_logo.png" alt="Fujifilm Optics Philippines Inc." height="60" />
                            </div>
                            <div>
                                <h4 class="text-uppercase fw-bold mb-0" style="letter-spacing: 1px;">
                                    NEW CORRECTIVE ACTION FINDINGS
                                </h4>
                                <small class="text-muted float-end">Lists of findings that need actions</small>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="card mb-3">
                                <div class="card-body">
                                    <!-- First row of filters -->
                                    <div class="mb-3">
                                        <form class="row g-2 align-items-end">
                                            <div class="col-md-4">
                                                <label for="min-date" class="form-label text-muted mb-1"><i class="mdi mdi-calendar-range me-1"></i>Start Date</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar-range"></i></span>
                                                    <input type="date" id="min-date" class="form-control form-control-sm" aria-label="Start date">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="max-date" class="form-label text-muted mb-1"><i class="mdi mdi-calendar-range me-1"></i>End Date</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar-range"></i></span>
                                                    <input type="date" id="max-date" class="form-control form-control-sm" aria-label="End date">
                                                </div>
                                            </div>

                                            <div class="col-md-4 text-end">
                                                <div class="d-flex justify-content-end align-items-center gap-2">
                                                    <button id="filter_btn" type="button" class="btn btn-primary btn-sm fw-bold rounded-3">
                                                        <i class="mdi mdi-filter me-1"></i>Apply Filter
                                                    </button>
                                                    <button id="clear_btn" type="button" class="btn btn-outline-danger btn-sm fw-bold rounded-3">
                                                        <i class="mdi mdi-eraser me-1"></i>Clear
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-warning border-0 shadow-sm d-flex align-items-center mt-3 mb-3 rounded-3" role="alert">
                                <div class="me-3 d-flex align-items-center justify-content-center rounded-circle bg-white bg-opacity-75" style="width: 32px; height: 32px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                        class="bi bi-info-circle-fill text-warning" viewBox="0 0 16 16">
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2" />
                                    </svg>
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold mb-1 small text-uppercase">Note: </div>
                                    <small class="mb-0 d-block">
                                        Hover your mouse over a row, then click it to open the compliance popup.
                                    </small>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            
                            <table id="newCorrectiveTable" class="table table-bordered table-striped">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th>No.</th>
                                        <th>Model & Process/Area</th>
                                        <th>Audit Result</th>
                                        <!-- <th>Evidence</th> -->
                                        <th>Classification</th>
                                        <th>Date Audited</th>
                                        <th>Target Date to Close</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>1</td>
                                        <td>MINI 41 BO-40 - AS 1, MINI LINK 2 - AS 1, MINI LINK 3 - AS 1, MINI 12 /BO-20 - AS 1.1, MINI 12 /BO-20 - AS 1.2</td>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente sit molestiae praesentium nostrum a, rerum ipsam dignissimos quo perferendis illo aspernatur cupiditate ab eius enim, nulla quia magnam tempore numquam?</td>
                                        <!-- <td>the_file.pdf</td> -->
                                        <td>Opportunity for Improvement</td>
                                        <td>November 13 2025</td>
                                        <td>November 27 2025</td>
                                    </tr>
                                </tbody>
                            </table>
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
    <script src="../../../assets/js/plugins/js-confetti.js"></script>
    <!-- DataTables JS -->
    <script src="../../../assets/js/plugins/datatables.js"></script>
    <script src="../../../assets/js/plugins/datatables.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="../../../assets/js/plugins/sweetalert2.all.js"></script>
    <script src="../../../assets/js/logout.js"></script>
    <script src="../../../assets/js/auditeeScript/new_corrective.js"></script>

    <?php include '../popup.php'; ?>

    <script>
        window.addEventListener('load', function() {
            const loader = document.querySelector('.loader-spinner-bg');
            if (loader) {
                // Add fade-out class
                loader.classList.add('fade-out');
                
                // Remove from DOM after animation ends
                setTimeout(() => {
                    loader.remove();
                }, 600); // Match transition duration
            }
        });
    </script>
</body>
</html>
