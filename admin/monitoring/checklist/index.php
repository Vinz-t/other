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
                                    FINDINGS MONITORING CHECKLIST
                                </h4>
                                <small class="text-muted float-end">Monitor and track DATA status efficiently</small>
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
                                                    <button id="filter_btn" type="button" class="btn btn-primary fw-bold rounded-3">
                                                        <i class="mdi mdi-filter me-1"></i>Apply Filter
                                                    </button>
                                                    <button id="clear_btn" type="button" class="btn btn-outline-danger fw-bold rounded-3">
                                                        <i class="mdi mdi-eraser me-1"></i>Clear
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                            <table id="monitoringChecklistTable" class="table table-bordered table-striped">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th>No.</th>
                                        <th>Control Code</th>
                                        <th>Auditee Division</th>
                                        <th>Auditee</th>
                                        <th>Auditor</th>
                                        <th>Category</th>
                                        <th>Date Audited & Shift</th>
                                        <th>Submitted At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>1</td>
                                        <td>WQK341KE45</td>
                                        <td>LENS</td>
                                        <td>Juan Carlo</td>
                                        <td>Mang Juan</td>
                                        <td>Normal Audit<br>Patrol Audit</td>
                                        <td>November 3, 2025</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button"
                                                        class="btn btn-sm btn-outline-primary dropdown-toggle-split rounded-circle ps-2"
                                                        data-bs-toggle="dropdown" aria-expanded="false"
                                                        style="width:38px;height:38px;">
                                                    <i class="mdi mdi-dots-horizontal fs-5"></i>
                                                </button>

                                                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end shadow">
                                                    <li>
                                                        <a class="dropdown-item d-flex align-items-center gap-2" href="#">
                                                            <i class="mdi mdi-information-outline"></i>
                                                            <span>View Info</span>
                                                        </a>
                                                    </li>
                                                    <li><hr class="dropdown-divider"></li>
                                                    <li>
                                                        <a type="button" id="delete_btn" class="dropdown-item d-flex align-items-center gap-2 text-warning" href="#">
                                                            <i class="mdi mdi-delete-empty-outline"></i>
                                                            <span>Delete</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
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

    <!-- Modal -->
    <?php include '../popups.php'; ?>
     
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
    <script src="../../../assets/js/auditorScript/monitoring_checklist.js"></script>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const controlCodeInput = document.getElementById('controlCode');
            const confirmDeleteInput = document.getElementById('confirmDelete');
            const acknowledgeCheckbox = document.getElementById('acknowledgeCheckbox');
            const deleteBtn = document.getElementById('delete_checklist_btn');
            const deleteModal = document.getElementById('deleteChecklistModal');

            function validateForm() {
                const isControlCodeFilled = controlCodeInput.value.trim() !== '';
                const isDeleteTyped = confirmDeleteInput.value === 'DELETE';
                const isAcknowledged = acknowledgeCheckbox.checked;

                deleteBtn.disabled = !(isControlCodeFilled && isDeleteTyped && isAcknowledged);
            }

            // Reset form when modal is closed
            deleteModal.addEventListener('hidden.bs.modal', function () {
                controlCodeInput.value = '';
                confirmDeleteInput.value = '';
                acknowledgeCheckbox.checked = false;
                deleteBtn.disabled = true;
            });

            controlCodeInput.addEventListener('input', validateForm);
            confirmDeleteInput.addEventListener('input', validateForm);
            acknowledgeCheckbox.addEventListener('change', validateForm);
        });
    </script>

</body>
</html>

<!-- <th style="width: 500px; min-width: 300px; max-width: 700px;">Description</th> -->

<!-- <div class="d-flex flex-wrap align-items-center gap-3 mb-3">
    <div class="d-flex align-items-center">
        <label class="me-2 mb-0 text-muted text-nowrap" for="min-date"><i class="mdi mdi-calendar-range me-1"></i>Start Date: </label>
        <input type="date" id="min-date" class="form-control form-control-sm" style="min-width:170px;">
    </div>
    <div class="d-flex align-items-center">
        <label class="me-2 mb-0 text-muted text-nowrap" for="max-date"><i class="mdi mdi-calendar-range me-1"></i>End Date: </label>
        <input type="date" id="max-date" class="form-control form-control-sm" style="min-width:170px;">
    </div>
    <div class="ms-auto">
        <button class="btn btn-primary btn-sm filter_btn">
            <i class="mdi mdi-filter me-1"></i>Filter
        </button>
        <button class="btn btn-outline-danger btn-sm clear_btn ms-2">
            <i class="mdi mdi-eraser me-1"></i>Clear
        </button>
    </div>
</div> -->

<!-- <li>
    <a type="button" id="delete_checklist_btn" class="dropdown-item d-flex align-items-center gap-2 text-warning" data-unicode="${rowData.uniqueCode}">
        <i class="mdi mdi-delete-alert-outline"></i>
        <span>Delete Checklist</span>
    </a>
</li> -->