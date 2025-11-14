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

    <style>
        .pagination {
            text-align: center;
            margin-top: 30px;
        }

        .pagination button,
        .pagination .page-btn {
            margin: 0 5px;
            padding: 8px 12px;
            cursor: pointer;
        }

        .page-btn.active {
            background-color: #007bff;
            color: white;
        }
    </style>

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
                <!-- Header Card -->
                <div class="col-md-12 col-xl-12">
                    <div class="card rounded-4">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <div>
                                <img src="../../../assets/img/index_logo.png" alt="Fujifilm Optics Philippines Inc." height="60" />
                            </div>
                            <div>
                                <h4 class="text-uppercase fw-bold mb-0" style="letter-spacing: 1px;">
                                    NEW CORRECTIVE ACTION FINDINGS
                                </h4>
                                <small class="text-muted float-end">Monitor and track DATA status efficiently</small>
                            </div>
                        </div>
                        <!-- <div class="card-body">

                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <form class="row g-2 align-items-end">
                                            <div class="col-md-4">
                                                <label for="min-date" class="form-label text-muted mb-1"><i class="mdi mdi-calendar-range me-1"></i>Start Date</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar-range"></i></span>
                                                    <input type="date" id="min-date" class="form-control" aria-label="Start date">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label for="max-date" class="form-label text-muted mb-1"><i class="mdi mdi-calendar-range me-1"></i>End Date</label>
                                                <div class="input-group">
                                                    <span class="input-group-text"><i class="mdi mdi-calendar-range"></i></span>
                                                    <input type="date" id="max-date" class="form-control" aria-label="End date">
                                                </div>
                                            </div>

                                            <div class="col-md-4 text-end">
                                                <div class="d-flex justify-content-end align-items-center gap-2">
                                                    <button id="filter_btn" type="button" id="applyFilters" class="btn btn-primary fw-bold rounded-3">
                                                        <i class="mdi mdi-filter me-1"></i>Apply Filter
                                                    </button>
                                                    <button id="clear_btn" type="button" id="clearFilters" class="btn btn-outline-danger fw-bold rounded-3">
                                                        <i class="mdi mdi-eraser me-1"></i>Clear
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- Pagination -->
                 <div class="col-md-12 col-xl-12">
                    <div class="card shadow-none bg-light">
                        <div class="pagination">
                            <button id="prevBtn">Previous</button>
                            <span id="pageNumbers"></span>
                            <button id="nextBtn">Next</button>
                        </div>
                    </div>
                </div>
                <!-- Card of Findings Area -->
                <div id="all_findings_area">
                    <!-- its appear here -->
                    <!-- DESIGN 2: EXECUTIVE TIMELINE CARD -->
                    <div class="col-md-4 col-xl-4">
                        <div class="card border rounded-4 overflow-hidden">
                            <!-- This outer div uses flexbox to create the two-tone background -->
                            <div class="d-flex flex-column">

                                <!-- Top Section: High-Level Summary (light background) -->
                                <div class="p-4 pb-2 bg-light text-center">
                                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-bold mb-2">
                                        OFI - Opportunity for Improvement
                                    </span>
                                    <h5 class="fw-bold text-dark text-uppercase">Model & Process/Area</h5>
                                    <p class="small fw-bold text-muted mb-0">
                                        MINI 41 BO-40 - AS 1, MINI LINK 2 - AS 1, MINI LINK 3 - AS 1, MINI 12 /BO-20 - AS 1.1, MINI 12 /BO-20 - AS 1.2
                                    </p>
                                </div>
                                
                                <!-- Bottom Section: The Timeline (white background) -->
                                <div class="p-4 bg-white flex-grow-1">
                                    <!-- Timeline Item 1: Audit Date -->
                                    <div class="d-flex">
                                        <div class="text-center me-3">
                                            <div class="p-2 bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 33px; height: 33px;">
                                                <i class="mdi mdi-calendar-check text-white"></i>
                                            </div>
                                            <div class="border-start border-2 border-dashed h-100 mx-auto" style="width: 0;"></div>
                                        </div>
                                        <div>
                                            <span class="small text-muted text-uppercase">Date Audited : </span>
                                            <p class="fw-bold mb-4">November 13, 2025</p>
                                        </div>
                                    </div>

                                    <!-- Timeline Item 2: Finding Details (using Accordion) -->
                                    <div class="d-flex">
                                        <div class="text-center me-3">
                                            <div class="p-2 bg-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 33px; height: 33px;">
                                                <i class="mdi mdi-notebook text-white"></i>
                                            </div>
                                            <div class="border-start border-2 border-dashed h-100 mx-auto" style="width: 0;"></div>
                                        </div>
                                        <div class="w-100 mb-4">
                                            <span class="small text-muted text-uppercase">Audit Result : </span>
                                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                                <div class="accordion-item border-0">
                                                    <h2 class="accordion-header" id="flush-headingOne">
                                                        <button class="accordion-button collapsed p-0 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne">
                                                            View Details
                                                        </button>
                                                    </h2>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse">
                                                        <div class="accordion-body p-0 pt-2">
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio optio magnam reiciendis similique qui illo, suscipit distinctio aliquid tempore harum laborum dolor dolores repellat necessitatibus saepe, sed reprehenderit magni veritatis!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- File 3: The Uploaded file of audit -->
                                    <div class="d-flex">
                                        <div class="text-center me-3">
                                            <div class="p-2 bg-info rounded-circle d-flex align-items-center justify-content-center" style="width: 33px; height: 33px;">
                                                <i class="mdi mdi-file-document-outline text-white"></i>
                                            </div>
                                            <div class="border-start border-2 border-dashed h-100 mx-auto" style="width: 0;"></div>
                                        </div>
                                        <div>
                                            <span class="small text-muted text-uppercase">Uploaded File : </span>
                                            <p class="fw-bold text-info mb-4">the_file.pdf</p>
                                        </div>
                                    </div>

                                    <!-- Timeline Item 4: Target Date (Final item, no bottom border) -->
                                    <div class="d-flex">
                                        <div class="text-center me-3">
                                            <div class="p-2 bg-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 33px; height: 33px;">
                                                <i class="mdi mdi-calendar-alert text-white"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <span class="small text-muted text-uppercase">Target Date to Close : </span>
                                            <p class="fw-bold text-danger mb-0">November 27, 2025</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="p-3 pt-0">
                                    <button id="comply_btn" class="btn btn-success rounded-3 fw-bold w-100 d-flex align-items-center justify-content-center">
                                        <i class="mdi mdi-subdirectory-arrow-right me-2"></i> Comply
                                    </button>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-4 col-xl-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center text-uppercase">
                                <strong>Model & Process/Area</strong><br>
                                <span>MINI 41 BO-40 - AS 1, MINI LINK 2 - AS 1, MINI LINK 3 - AS 1, MINI 12 /BO-20 - AS 1.1, MINI 12 /BO-20 - AS 1.2</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div>
                                <strong class="text-uppercase">Date Audited :</strong><br>
                                <span>November 13, 2025</span>
                            </div>
                            <br>
                            <div>
                                <strong class="text-uppercase">Audit Result :</strong><br>
                                <span>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam voluptatem iure aliquam accusantium nulla labore porro! Pariatur possimus corrupti, nihil accusamus cupiditate in doloribus autem omnis repudiandae facilis eum fugiat?</span>
                            </div>
                            <br>
                            <div>
                                <strong class="text-uppercase">File Uploaded :</strong><br>
                                <span>the file been upload.pdf</span>
                            </div>
                            <br>
                            <div>
                                <strong class="text-uppercase">Classification :</strong><br>
                                <span>OFI - Opportunity for Improvement</span>
                            </div>
                            <br>
                            <div>
                                <strong class="text-uppercase">Target Date to be Closed:</strong><br>
                                <span>November 27, 2025</span>
                            </div>
                        </div>
                    </div>
                </div> -->                
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
    <!-- DataTables JS -->
    <script src="../../../assets/js/plugins/datatables.js"></script>
    <script src="../../../assets/js/plugins/datatables.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="../../../assets/js/plugins/sweetalert2.all.js"></script>
    <script src="../../../assets/js/logout.js"></script>
    <script src="../../../assets/js/auditeeScript/new_corrective.js"></script>

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
