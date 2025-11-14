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
    <title>Normal Form | Audit MS</title>

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
    <link rel="stylesheet" href="../../../assets/css/plugins/choices.min.css" />
    <link rel="stylesheet" href="../../../assets/css/plugins/animate.min.css" />
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/driver.js@0.9.8/dist/driver.min.css">
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
                    <div id="pdf_model" class="card">
                        <div class="card-header d-flex align-items-center justify-content-between pb-0">
                            <div>
                                <img src="../../../assets/img/index_logo.png" alt="Fujifilm Optics Philippines Inc." height="60" />
                            </div>
                            <div>
                                <h4 class="text-uppercase fw-bold mb-0" style="letter-spacing: 1px;">
                                    PATROL LINE AUDIT CHECKLIST
                                </h4>
                                <small class="d-block text-center mb-1">
                                    <span class="text-muted ms-2">Click the link to start a short walkthrough of this form.</span>
                                    <a href="#" id="help_btn" class="text-decoration-underline text-primary" aria-label="Start tutorial" style="cursor:pointer;">
                                        <i class="mdi mdi-help-circle-outline me-1" aria-hidden="true"></i>
                                        Start Tutorial
                                    </a>
                                </small>
                            </div>
                        </div>
                        <div class="card-body"><hr>
                            <div class="row g-3"> <!-- g-3 adds consistent gap between columns -->
                                <!-- Left Column: Audit Details -->
                                <div class="col-md-7">
                                    <div class="row g-3">
                                    <!-- Auditee Division -->
                                    <div class="col-md-6">
                                        <div id="Division_Holder">
                                            <label for="division" class="form-label fw-bold">
                                                <i class="mdi mdi-office-building me-1"></i>
                                                Auditee Division
                                            </label>
                                            <select id="division" name="division" class="form-select shadow-sm" required>
                                                <option value="" selected disabled>Select Division</option>
                                                <option value="LENS">LENS</option>
                                                <option value="PT">PT</option>
                                                <option value="INSTAX">INSTAX</option>
                                                <option value="LA">LA</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Auditee (Dynamic) -->
                                    <div class="col-md-6">
                                        <div id="Auditee_Holder">
                                            <label for="auditee" class="form-label fw-bold">
                                                <i class="mdi mdi-account-circle me-1"></i>
                                                Auditee
                                            </label>
                                            <select id="auditee" name="auditee" class="form-select shadow-sm" required disabled>
                                                <option selected disabled>Select Division First</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Auditor -->
                                    <div class="col-md-6">
                                        <div id="Auditor_Holder">
                                            <label for="auditor" class="form-label fw-bold">
                                                <i class="mdi mdi-account-tie me-1"></i>
                                                Auditor
                                            </label>
                                            <input 
                                                type="text" 
                                                id="auditor" 
                                                name="auditor" 
                                                class="form-control shadow-sm bg-light" 
                                                value="<?= htmlspecialchars($_SESSION['login_name'] ?? 'error', ENT_QUOTES, 'UTF-8'); ?>" 
                                                style="font-weight: bold;"
                                                readonly 
                                                aria-readonly="true"
                                            />
                                        </div>
                                    </div>

                                    <!-- Audit Type -->
                                    <div class="col-md-6">
                                        <div id="Category_Holder">
                                            <label for="category" class="form-label fw-bold">
                                                <i class="mdi mdi-clipboard-list me-1"></i>
                                                Type of Normal Audit
                                            </label>
                                            <select id="category" name="category" class="form-select shadow-sm" required>
                                                <option selected disabled>Select Normal Type</option>
                                                <option value="Patrol Audit">Patrol Audit</option>
                                                <option value="Quality Issue">Quality Issue</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Audit Date & Shift -->
                                    <div class="col-md-12">
                                        <fieldset id="Date_Shift_Holder" class="border rounded p-3">
                                            <legend class="form-label fw-bold float-none w-auto px-2 mb-0">
                                                <i class="mdi mdi-calendar-clock me-1"></i>
                                                Audit Date / Shift
                                            </legend>
                                            <div class="row g-2">
                                                <div class="col-md-6">
                                                    <input 
                                                        type="date" 
                                                        id="audit_date" 
                                                        name="audit_date" 
                                                        class="form-control shadow-sm" 
                                                        value="<?php echo date('Y-m-d'); ?>"
                                                        style="font-weight: bold;"
                                                        readonly
                                                    />
                                                </div>
                                                <div class="col-md-6">
                                                    <select id="shift" name="shift" class="form-select shadow-sm" required>
                                                        <option selected disabled>Select Shift</option>
                                                        <option value="DS">Day Shift</option>
                                                        <option value="NS">Night Shift</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    </div>
                                </div>

                                <!-- Right Column: Audit Area -->
                                <div class="col-md-5">
                                    <div id="Choices_Holder">
                                        <label for="choices-multiple" class="form-label fw-bold">
                                            <i class="mdi mdi-map-marker me-1"></i>
                                            Audit Area / Process
                                        </label>
                                        <select 
                                            name="the_area[]" 
                                            id="choices-multiple" 
                                            class="form-control form-control-sm shadow-sm choices_multiple" 
                                            multiple 
                                            aria-describedby="area-help"
                                        >
                                        <!-- Options can be populated dynamically via JS -->
                                        </select>
                                    </div>
                                    
                                    <small id="area-help" class="form-text text-muted mt-2">
                                        <i class="mdi mdi-information-outline me-1"></i>
                                        Only 10 areas can be selected.
                                    </small>
                                </div>
                            </div>
                            
                            <!-- START: Collapsible Instructions Section -->
                            <div class="accordion mt-2 mb-2" id="instructionsAccordion">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="instructionsHeader">
                                    <button 
                                        class="accordion-button collapsed" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#collapseInstructions" 
                                        aria-expanded="false" 
                                        aria-controls="collapseInstructions"
                                    >
                                        <i class="mdi mdi-information-outline me-2" style="font-size: 1.2rem;"></i>
                                        <strong>View Audit Instructions</strong>
                                    </button>
                                    </h2>
                                    <div 
                                    id="collapseInstructions" 
                                    class="accordion-collapse collapse" 
                                    aria-labelledby="instructionsHeader" 
                                    data-bs-parent="#instructionsAccordion"
                                    >
                                        <div class="accordion-body">
                                            <div class="alert alert-light mb-0 border-0 p-0"> <!-- Light alert for subtle background -->
                                                <p class="mb-3">
                                                    Kindly click to check the box on the answer column.
                                                </p>

                                                <h6 class="text-primary fw-bold">Audit Findings Classification</h6>
                                                <p>In this column, use the following abbreviations:</p>
                                                <ul>
                                                    <li><strong>MajNC:</strong> Major Non-conformance</li>
                                                    <li><strong>MinNC:</strong> Non-conformance</li>
                                                    <li><strong>OFI:</strong> Opportunity for Improvement</li>
                                                    <li><strong>P:</strong> Positive Aspects</li>
                                                </ul>

                                                <h6 class="text-primary fw-bold mt-4">Occurrence of Findings</h6>
                                                <p>Use the following indicators (I, II, III) to describe each finding:</p>
                                                <ol class="list-group list-group-numbered">
                                                    <li class="list-group-item">
                                                        <strong>New:</strong> The finding has not been observed in any prior audit of this process or area.
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Recurrence:</strong> The finding is a repeat of one previously noted in the same process or area.
                                                    </li>
                                                    <li class="list-group-item">
                                                        <strong>Reoccur at different Process/Model:</strong> The finding is a repeat of one previously noted, but it is now in a different process or model.
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END: Collapsible Instructions Section -->

                            <div class="table-responsive rounded-3">
                                <?php include 'questionaires.php'; ?>
                            </div>
                        </div>

                        <div class="card-footer pt-1">
                            <div class="d-flex flex-column align-items-center mb-3">
                                <button id="submit_btn" type="button" class="btn btn-success d-inline-flex align-items-center fw-bold mb-2">
                                    <i class="mdi mdi-send me-2" aria-hidden="true"></i>
                                    <span>Submit Checklist Form</span>
                                </button>
                                <!-- <button id="help_btn" type="button" class="btn btn-primary d-inline-flex align-items-center fw-bold mb-2">
                                    <i class="mdi mdi-code-braces me-2" aria-hidden="true"></i>
                                    <span>Help Button</span>
                                </button> -->
                                <small class="text-muted text-center">Use the buttons above to navigate the form. Ensure required fields are completed before submitting.</small>
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

    <?php include '../popup.php'; ?>
     
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
    <script src="../../../assets/js/plugins/choices.min.js"></script>
    <script src="../../../assets/js/plugins/js-confetti.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/js-confetti@latest/dist/js-confetti.browser.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/driver.js@0.9.8/dist/driver.min.js"></script>
    <!-- My Script -->
    <script src="../../../assets/js/logout.js"></script>
    <script src="../../../assets/js/findings_form.js"></script>
    <script src="../../../assets/js/tutorial.js"></script>

    <script src="../../../assets/js/plugins/html2canvas.min.js"></script>
    <script src="../../../assets/js/plugins/jspdf.umd.min.js"></script>

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
        document.getElementById('division').addEventListener('change', function() {
            const auditeeSelect = document.getElementById('auditee');
            auditeeSelect.disabled = false;
            // Clear and populate based on division
            auditeeSelect.innerHTML = '<option value="" disabled selected>Select Auditee</option>';
            // Add options dynamically...
        });
    </script>

    <!-- <script>
        new Choices('#choices-multiple', {
            choices: [
                { value: 'washing', label: 'Washing' },
                { value: 'painting', label: 'Painting' },
                { value: 'shipping', label: 'Shipping' }
            ],
            removeItems: true,
            maxItemCount: 10,
            addItems: true,
            duplicateItemsAllowed: false,
            editItems: false,
            shouldSort: false,
            // placeholder: true,
            // placeholderValue: 'Select Area',
            renderChoiceLimit: -1
        });
    </script> -->

    <!-- <script>
        async function generatePDFFromDiv() {
            const { jsPDF } = window.jspdf;
            const element = document.getElementById('pdf_model');
            if (!element) {
                console.error('Element with id "pdf_model" not found.');
                return;
            }

            const doc = new jsPDF('p', 'pt', 'a4');
            doc.setFont('helvetica', 'normal');

            try {
                const canvas = await html2canvas(element, {
                    scale: 1.2,
                    useCORS: true
                });

                const imgData = canvas.toDataURL('image/jpeg', 1);
                if (!imgData || !imgData.startsWith('data:image/jpeg;base64,')) {
                    console.error('Invalid image data generated.');
                    // If you have loadingAlert.close() elsewhere, you can call it here.
                    return;
                }

                // Calculate width and height for A4 size paper (in points)
                const pdfWidth = doc.internal.pageSize.getWidth();
                const pdfHeight = doc.internal.pageSize.getHeight();

                // Calculate the image height maintaining aspect ratio
                const imgProps = {
                    width: canvas.width,
                    height: canvas.height
                };

                // Define padding (5pt)
                const padding = 5;

                // Calculate the image width/height maintaining aspect ratio, but accounting for padding
                const availableWidth = pdfWidth - padding * 2;
                const ratio = imgProps.width / availableWidth;
                const imgHeight = imgProps.height / ratio;

                // Prevent image height exceeding page height minus padding
                const availableHeight = pdfHeight - padding * 2;
                const finalImgHeight = imgHeight > availableHeight ? availableHeight : imgHeight;

                // Calculate width accordingly to preserve ratio if height is capped
                const finalImgWidth = imgProps.width / (imgProps.height / finalImgHeight);

                doc.addImage(imgData, 'PNG', padding, padding, finalImgWidth, finalImgHeight);

                doc.save('work_order.pdf');
            } catch (error) {
                console.error('Error generating PDF:', error);
                // Likewise handle loadingAlert if applicable
            }
        }
    </script> -->

    <!-- <script>
        $.post('../../assets/backend/core.php', {
            action: 'load_checklist_questions'
        }, function (response) {
            var d = JSON.parse(response);

            if (Array.isArray(d.questions)) {
                // Filter questions with category === "IITCNGP"
                var IITCNGPQuestions = d.questions.filter(function(question) {
                    return question.category === "IITCNGP";
                });

                var PPEQuestions = d.questions.filter(function(question) {
                    return question.category === "PPE";
                });

                let tableRows = ''; // Start with an empty string

                if (IITCNGPQuestions.length > 0) {
                    tableRows += `
                        <tr id="title" class="bg-info">
                            <td colspan="9" class="text-center text-white pt-2 pb-2">
                                Identification, Indication, Traceability, & Control of NG Parts
                            </td>
                        </tr>
                    `;
                }

                IITCNGPQuestions.forEach(function(question, index) {
                    const questionNumber = index + 1;
                    const name = `finding_${question.id}`; // Use unique name per question (based on ID)

                    tableRows += `
                        <tr>
                            <td class="fw-bold">${questionNumber}.</td>
                            <td class="fw-bold">${question.question}</td>
                            <td class="text-center"><input type="radio" class="form-check-input" name="${name}" value="yes"></td>
                            <td class="text-center"><input type="radio" class="form-check-input" name="${name}" value="no"></td>
                            <td class="text-center"><input type="radio" class="form-check-input" name="${name}" value="na"></td>
                            <td>
                                <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                                <input type="file" class="form-control form-control-sm border-0 mt-2 proof"/>
                            </td>
                            <td>
                                <select class="form-control form-control-sm classification">
                                    <option disabled selected>Select</option>
                                    <option>MNC</option>
                                    <option>OFI</option>
                                    <option>MHNC</option>
                                    <option>P</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control form-control-sm occurrence">
                                    <option disabled selected>Select</option>
                                    <option>I</option>
                                    <option>II</option>
                                    <option>III</option>
                                </select>
                            </td>
                        </tr>
                    `;
                });

                if (PPEQuestions.length > 0) {
                    tableRows += `
                        <tr id="title" class="bg-info">
                            <td colspan="9" class="text-center text-white pt-2 pb-2">
                                Identification, Indication, Traceability, & Control of NG Parts
                            </td>
                        </tr>
                    `;
                }

                PPEQuestions.forEach(function(question, index) {
                    const questionNumber = index + 1;
                    const name = `finding_${question.id}`; // Use unique name per question (based on ID)

                    tableRows += `
                        <tr>
                            <td class="fw-bold">${questionNumber}.</td>
                            <td class="fw-bold">${question.question}</td>
                            <td class="text-center"><input type="radio" class="form-check-input" name="${name}" value="yes"></td>
                            <td class="text-center"><input type="radio" class="form-check-input" name="${name}" value="no"></td>
                            <td class="text-center"><input type="radio" class="form-check-input" name="${name}" value="na"></td>
                            <td>
                                <textarea class="form-control form-control-sm evidence" placeholder="Enter evidence/remarks"></textarea>
                                <input type="file" class="form-control form-control-sm border-0 mt-2 proof"/>
                            </td>
                            <td>
                                <select class="form-control form-control-sm classification">
                                    <option disabled selected>Select</option>
                                    <option>MNC</option>
                                    <option>OFI</option>
                                    <option>MHNC</option>
                                    <option>P</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control form-control-sm occurrence">
                                    <option disabled selected>Select</option>
                                    <option>I</option>
                                    <option>II</option>
                                    <option>III</option>
                                </select>
                            </td>
                        </tr>
                    `;
                });

                // Append all rows to your table body (e.g., inside <tbody id="question-table-body">)
                $('#question-table-body').html(tableRows);
            } else {
                console.error('Expected d.questions to be an array');
                // console.log(question.question); // or display in HTML, etc.
            }
        });
    </script> -->

    <!-- <script>
        $(document).ready(function () {
            function toggleFields() {
                $('tr').each(function() {
                    var sel = $(this).find('input[name^="finding_"]:checked').val();
                    // sel will be "no", "yes", or undefined (if nothing checked)
                    var enable = (sel === 'no');
                    $(this).find('.upload, .evidence, .proof, .classification, .occurrence').prop('disabled', !enable);
                });
            }

            // set initial state on load
            toggleFields();

            // update state when any radio is changed
            $(document).on('change', 'input[name^="finding_"]', toggleFields);
        });
    </script> -->

    <!-- <script>
        $(document).ready(function () {
            function toggleFields() {
                var sel = $('input[name="finding"]:checked').val();
                // sel will be "no", "yes", or undefined (if nothing checked)
                var enable = (sel === 'no');
                $('.upload, .evidence, .proof, .classification, .occurrence').prop('disabled', !enable);
            }

            // set initial state on load
            toggleFields();

            // update state when any radio is changed
            $(document).on('change', 'input[name="finding"]', toggleFields);
        });
    </script> -->

</body>
</html>

<!-- <th style="width: 500px; min-width: 300px; max-width: 700px;">Description</th> -->