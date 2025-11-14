<?php
    session_start();
    if (empty($_SESSION['login_name'])) {
        session_destroy();
        header('Location: ../../');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../../assets/img/QA_Icon.png" type="image/x-icon" />
    <title>Audit Plan | Audit MS</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="../../assets/css/plugins/bootstrap.min.css" />
    <link rel="stylesheet" href="../../assets/css/plugins/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../assets/css/plugins/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../assets/css/plugins/main.css" />
    <link rel="stylesheet" href="../../assets/css/plugins/sweetalert2.css" />
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="../../assets/css/plugins/datatables.css" />
    <link rel="stylesheet" href="../../assets/css/plugins/datatables.min.css" />

    <style>
        .custom-modal {
            max-width: 1200px;
            /* fixed max width */
            width: 90%;
            /* responsive shrink on smaller screens */
            margin-left: auto;
            /* center horizontally */
            margin-right: auto;
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

    <!-- ======== sidebar-nav start =========== -->
    <?php include '../../assets/includes/sidebar.php'; ?>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        <?php include '../../assets/includes/header.php'; ?>
        <!-- ========== header end ========== -->

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title">
                                <h2>Audit Dashboard</h2>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a>Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a>Audit</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Plan
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <div class="title d-flex flex-wrap justify-content-between">
                                <div class="left">
                                    <h1>PATROL LINE AUDIT CHECKLIST</h1>
                                </div>
                                <div class="right">
                                    <div class="select-style-2">
                                        <div class="select-position select-sm">
                                            <select class="light-bg">
                                                <option selected disabled>Select Audit Type</option>
                                                <option value="">Normal</option>
                                                <option value="">New Changes</option>
                                                <option value="">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Title -->
                            <div class="chart mt-3">
                                <!-- <iframe src="../dashboard/index.php" frameborder="0" style="width: 100%; height: 600px;"></iframe> -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="select-style-1">
                                            <label for="">Auditee Department:</label>
                                            <div class="select-position select-sm">
                                                <select class="light-bg">
                                                    <option selected disabled>Select Department</option>
                                                    <option value="">Lens</option>
                                                    <option value="">PT</option>
                                                    <option value="">INSTAX</option>
                                                    <option value="">LX</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="select-style-1">
                                            <label for="">Auditee:</label>
                                            <div class="select-position select-sm">
                                                <select class="light-bg">
                                                    <option selected disabled>Select Auditee</option>
                                                    <option value="">Girl 1</option>
                                                    <option value="">Girl 2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="select-style-1">
                                            <label for="">Audit Area/Process:</label>
                                            <div class="select-position select-sm">
                                                <select class="light-bg">
                                                    <option selected disabled>Select Area/Process</option>
                                                    <option value="">Washing</option>
                                                    <option value="">Painting</option>
                                                    <option value="">Coating</option>
                                                    <option value="">Shipping</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="select-style-1">
                                            <label for="">Auditor:</label>
                                            <input type="text" class="form-control light-bg" value="<?= $_SESSION['login_name']; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="select-style-1">
                                            <label for="">Audit Date/Shift:</label>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="date" class="form-control light-bg" />
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="select-position select-sm">
                                                        <select class="light-bg">
                                                            <option selected disabled>Select Shift</option>
                                                            <option value="">Day Shift</option>
                                                            <option value="">Night Shift</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="select-style-1">
                                            <label for="">Category of Audit:</label>
                                            <div class="select-position select-sm">
                                                <select class="light-bg">
                                                    <option selected disabled>Select Category</option>
                                                    <option value="">Patrol Audit</option>
                                                    <option value="">Quality Issues</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-info mt-4" role="alert" style="border-left: 3px solid #31708f; padding-left: 15px;">
                                    <div>
                                        <h5>Remarks:</h5>
                                        <p>Kindly click to check the box on the answer column.</p>
                                    </div>
                                    <ul>
                                        <li>• In the "Audit Findings Classification" column, use MajNC for Major Non-conformance, MinNC for Non-conformance, OFI for Oppurtunities for Improvement, and P for Positive Aspects.</li>
                                        <li>• In the Occurence of the Findings column, use the following indicators (I, II, III) to describe each finding:</li>
                                        <li>• I ‣ New (The finding has not been observed in any prior audit of this process or area.)</li>
                                        <li>• II  ‣ Recurrence (The finding is a repeat of one previously noted in the same process or area.)</li>
                                        <li>• III ‣  Reoccur at different Process/Model (The finding is a repeat of one previously noted, but it is now in a different process or model.)</li>
                                    </ul>
                                </div>

                                <div class="table-responsive rounded-3">
                                    <table class="table table-bordered table-striped">
                                        <thead class="text-center">
                                            <tr style="background-color: #007bff; color: white;">
                                                <th rowspan="2" style="width: 5%;">#</th>
                                                <th rowspan="2" style="min-width: 300px;">Check Items</th>
                                                <th colspan="3" class="text-center border-bottom">Answer</th>
                                                <th rowspan="2" style="min-width: 200px;">Evidence/<br>Remarks</th>
                                                <th rowspan="2" style="width: 14%;">Audit Finding Classification <p style="font-size:11px;">(MajNC, MinNC, OFI, P)</p></th>
                                                <th rowspan="2" style="width: 10%;">Occurrence <p style="font-size:12px;">(I, II, III)</p></th>
                                            </tr>
                                            <tr style="background-color: #007bff; color: white;">
                                                <th class="text-center" style="width: 5%; font-size:13px;">Yes</th>
                                                <th class="text-center" style="width: 5%; font-size:13px;">No</th>
                                                <th class="text-center" style="width: 5%; font-size:13px;">N/A</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Section: Identification, Indication, Traceability, & Control of NG Parts -->
                                            <tr style="background-color: #cff4fc;">
                                                <td colspan="8" class="fw-bold text-center pt-2 pb-2">Identification, Indication, Traceability, & Control of NG Parts</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Are all rack items—including hold, pending, and training material—properly identified with correct traceability, following FIFO, and within the height limit?</td>
                                                <td class="text-center"><input type="radio" name="page"></td>
                                                <td class="text-center"><input type="radio" name="page"></td>
                                                <td class="text-center"><input type="radio" name="page"></td>
                                                <td>
                                                    <textarea class="form-control form-control-sm border-0" rows="5" placeholder="Enter evidence/remarks"></textarea>
                                                </td>
                                                <td><select class="form-control form-control-sm border-0">
                                                        <option disabled selected>Select Here</option>
                                                        <option>MNC</option>
                                                        <option>OFI</option>
                                                        <option>MHNC</option>
                                                        <option>P</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control form-control-sm border-0">
                                                        <option disabled selected>Select Here</option>
                                                        <option>I</option>
                                                        <option>II</option>
                                                        <option>III</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Are each workstation clearly identified, defined, and marked?</td>
                                                <td class="text-center"><input type="checkbox" checked></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Does the special workstation have a clear label or indication of its status (e.g. "Under Evaluation," "New Model," "Prototype")?</td>
                                                <td class="text-center"><input type="checkbox" checked></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Is Label and segregation of Input, Output, NG are being followed?</td>
                                                <td class="text-center"><input type="checkbox" checked></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Does NG Tag/Label have correct details (e.g. defect type, disposition)?</td>
                                                <td class="text-center"><input type="checkbox" checked></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>Are all NG (non-good) parts properly arranged, placed in the designated location, and clearly identified with correct labels and traceability to prevent further damage?</td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td class="text-center"><input type="checkbox" checked></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td>Found NG Lens in brushing area located on top of dipper</td>
                                                <td>OFI</td>
                                                <td>II</td>
                                            </tr>

                                            <!-- Section: Process-Prevention of Errors -->
                                            <tr style="background-color: #d4edda;">
                                                <td colspan="8" class="font-weight-bold">Process-Prevention of Errors</td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Are the units/items being handled correctly and in the proper orientation?</td>
                                                <td class="text-center"><input type="checkbox" checked></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>Method of loading/unloading unit correct?</td>
                                                <td class="text-center"><input type="checkbox" checked></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Does production conduct sampling/frequency inspection? Sampling Size was followed?</td>
                                                <td class="text-center"><input type="checkbox" checked></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Are all tools, jigs, and equipment properly maintained, in good condition, and calibrated?</td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td class="text-center"><input type="checkbox" checked></td>
                                                <td class="text-center"><input type="checkbox"></td>
                                                <td>Damage IPA Vapor bath button</td>
                                                <td>MNC</td>
                                                <td>I</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End Chart -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->

        <!-- ========== footer start =========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-center text-md-start">
                            FujiFilm Optics Philippines
                        </div>
                    </div>
                    <!-- end col-->
                    <div class="col-md-6">
                        <div class="terms text-sm d-flex justify-content-center justify-content-md-end">
                            2025 © IT Department
                        </div>
                    </div>
                </div>
            <!-- end row -->
            </div>
            <!-- end container -->
        </footer>
    <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="../../assets/js/plugins/jquery-3.7.1.js"></script>
    <script src="../../assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/plugins/main.js"></script>
    <script src="../../assets/js/plugins/sweetalert2.all.js"></script>
    <!-- DataTables JS -->
    <script src="../../assets/js/plugins/datatables.js"></script>
    <script src="../../assets/js/plugins/datatables.min.js"></script>

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


                            <!-- ////////////////////////////////////////// -->
                            <div class="row g-3 mb-3">
                                <div class="col-md-3">
                                    <label class="form-label">Auditee Division</label>
                                    <select name="division" class="form-select" required>
                                        <option value="" selected disabled>Select Division</option>
                                        <option value="LENS">LENS</option>
                                        <option value="PT">PT</option>
                                        <option value="INSTAX">INSTAX</option>
                                        <option value="LA">LA</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Auditee</label>
                                    <select name="auditee" class="form-select" required>
                                        <option value="" selected disabled>Select Auditee</option>
                                        <!-- <option value="juan_carlo">Juan Carlo</option>
                                        <option value="carlos_yulo">Carlos Yulo</option> -->
                                    </select>
                                </div>

                                <div class="col-md-5">
                                    <label class="form-label">Audit Area / Process</label>
                                    <select name="the_area" id="choices-multiple" class="form-control form-control-sm" multiple></select>
                                    <!-- <label class="form-label">Audit Area / Process</label>
                                    <select name="area" class="form-select form-select-sm" required>
                                        <option value="" selected disabled>Select Area / Process</option>
                                        <option value="washing">Washing</option>
                                        <option value="painting">Painting</option>
                                    </select> -->
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Auditor</label>
                                    <input type="text" name="auditor" class="form-control form-control-sm" value="<?= htmlspecialchars($_SESSION['login_name']); ?>" readonly />
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Audit Date / Shift</label>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <input type="date" name="audit_date" class="form-control form-control-sm" required />
                                        </div>
                                        <div class="col-6">
                                            <select name="shift" class="form-select form-select-sm" required>
                                                <option value="" selected disabled>Select Shift</option>
                                                <option value="day">Day Shift</option>
                                                <option value="night">Night Shift</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label">Category of Audit</label>
                                    <select name="category" class="form-select form-select-sm" required>
                                        <option value="" selected disabled>Select Category</option>
                                        <optgroup label="Normal">
                                            <option value="washing_basic">Patrol Audit</option>
                                            <option value="washing_delicate">Quality Issue</option>
                                        </optgroup>
                                        <option value="painting">New Changes</option>
                                        <option value="shipping">Other</option>
                                    </select>
                                </div>
                            </div>
