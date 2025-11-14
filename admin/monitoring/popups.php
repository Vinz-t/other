<style>
    .custom-modal {
        max-width: 1200px;
        /* fixed max width */
        width: 95%;
        /* responsive shrink on smaller screens */
        margin-left: auto;
        /* center horizontally */
        margin-right: auto;
    }
    #instructionsHeader .accordion-button {
        --bs-accordion-btn-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        --bs-accordion-btn-active-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }
</style>

<!-- Modal For Viewing Checklist -->
<div class="modal fade" id="viewChecklistModal" tabindex="-1" aria-labelledby="viewChecklistModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <!-- Header -->
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title text-white fw-bold mb-0" id="viewChecklistModalLabel">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-clipboard-check-fill me-2 mb-1" viewBox="0 0 16 16">
                        <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                        <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708"/>
                    </svg>
                    Checklist Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <!-- Body -->
            <div class="modal-body p-4" style="background-color: #f8f9fa;">
                <!-- Info Cards -->
                <div class="row g-3">
                    <!-- Card 1: Date & Area -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-calendar-event text-primary" viewBox="0 0 16 16">
                                            <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                        </svg>
                                    </div>
                                    <small class="text-muted text-uppercase fw-semibold" style="font-size: 0.7rem; letter-spacing: 0.5px;">Schedule & Area/Process</small>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">Audit Date/Shift</small>
                                    <p class="mb-0 fw-semibold text-dark"><span id="audit_date_shift">Date / Shift</span></p>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">Audit Area/Process</small>
                                    <p class="mb-0 fw-semibold text-dark"><span id="audit_area_process">Area / Process</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: People -->
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-people-fill text-success" viewBox="0 0 16 16">
                                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                                        </svg>
                                    </div>
                                    <small class="text-muted text-uppercase fw-semibold" style="font-size: 0.7rem; letter-spacing: 0.5px;">Personnel</small>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">Auditor</small>
                                    <p class="mb-0 fw-semibold text-dark"><span id="auditor">Auditor</span></p>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">Auditee</small>
                                    <p class="mb-0 fw-semibold text-dark"><span id="auditee">Auditee</span></p>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">Submitted At</small>
                                    <p class="mb-0 fw-semibold text-dark"><span id="submitted_at">Time</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Details -->
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center mb-3 pb-2 border-bottom">
                                    <div class="bg-info bg-opacity-10 rounded-circle p-2 me-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-info-circle-fill text-info" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                                        </svg>
                                    </div>
                                    <small class="text-muted text-uppercase fw-semibold" style="font-size: 0.7rem; letter-spacing: 0.5px;">Information</small>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">Control Code</small>
                                    <p class="mb-0 fw-semibold text-dark font-monospace bg-light px-2 py-1 rounded"><span id="control_code">Code</span></p>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">Division</small>
                                    <p class="mb-0 fw-semibold text-dark"><span id="division">Division</span></p>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-1" style="font-size: 0.75rem;">Type of Normal Audit</small>
                                    <p class="mb-0 fw-semibold text-dark"><span id="audit_type">Audit Type</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Instruction Section -->
                <div class="accordion mt-3 mb-3" id="instructionsAccordion">
                    <div class="accordion-item border-0 shadow-sm">
                        <h2 class="accordion-header" id="instructionsHeader">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInstructions" aria-expanded="false" aria-controls="collapseInstructions">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-1 me-2">
                                    <i class="mdi mdi-information-outline" style="font-size: 1.2rem;"></i>
                                </div>
                                <strong>Audit Information</strong>
                            </button>
                        </h2>
                        <div id="collapseInstructions" class="accordion-collapse collapse" aria-labelledby="instructionsHeader" data-bs-parent="#instructionsAccordion">
                            <div class="accordion-body">
                                <div class="alert alert-light mb-0 border-0 p-0"> 
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

                <!-- <div class="alert alert-info border-0 shadow-sm d-flex align-items-center mb-3 mt-0" role="alert">
                    <span id="possible_data" class="float-end">Data</span>
                </div> -->
                <div class="alert alert-info border-0 shadow-sm d-flex justify-content-between align-items-center mb-3 mt-0" role="alert">
                    <span>Item with answer "Yes" and "No"...</span>
                    <span id="possible_data"></span>
                </div>

                <!-- Question Section -->
                <div class="table-responsive shadow-sm rounded-3">
                    <?php include '../fix_questions.php'; ?>
                </div>

                <div class="alert alert-warning border-0 shadow-sm d-flex align-items-center mt-3 mb-0" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle-fill me-2 flex-shrink-0" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>
                    <small class="mb-0"><strong>Note:</strong> All data displayed is read-only and cannot be modified.</small>
                </div>
            </div>
            
            <!-- Footer -->
            <!-- <div class="modal-footer bg-white border-top">
                <button type="button" class="btn btn-light border px-4" data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg me-1" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                    </svg>
                    Close
                </button>
                <button type="button" class="btn btn-primary px-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill me-1" viewBox="0 0 16 16">
                        <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1"/>
                        <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                    </svg>
                    Print
                </button>
            </div> -->
        </div>
    </div>
</div>

<!-- Modal For Viewing Data -->
<div class="modal fade" id="viewDataModal" tabindex="-1" aria-labelledby="viewDataModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <!-- Header -->
            <div class="modal-header bg-primary text-white border-0 py-3">
                <h5 class="modal-title text-white fw-bold mb-0" id="viewChecklistModalLabel">
                    <svg class="me-2 mb-1" width="22" height="22" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v2h-2zm0 4h2v6h-2z"/>
                    </svg>
                    Control Code: <span id="cc"></span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <!-- Body -->
            <div class="modal-body p-4" style="background-color: #f8f9fa;">
                <!-- Header Section -->
                <div class="mb-4 p-4 rounded-3 shadow-sm" style="background: #1e293b;">
                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                        <div class="d-flex align-items-center">
                            <div class="me-3 rounded-circle d-flex align-items-center justify-content-center" style="width:44px;height:44px;background-color:rgba(255, 255, 255, 0.69);">
                                <i class="mdi mdi-file-document-outline fs-4"></i>
                            </div>
                            <div>
                                <h5 class="mb-1 fw-bold text-white">Audit Report Details</h5>
                                <p class="text-white-50 mb-0 small">Review comprehensive audit findings</p>
                                <p class="text-white-50 mb-0">Division: <span class="badge rounded-pill bg-primary fw-bold" id="division_data"></span></p>
                            </div>
                        </div>
                        <div id="audit_status">
                            <!-- Status Badge will be inserted here -->
                        </div>
                    </div>
                </div>
                <!-- Info Cards One -->
                <div class="row g-3">
                    <!-- Card 1: Auditor Finding -->
                    <div class="col-md-5">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="mdi mdi-clipboard-outline text-primary fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-primary fw-bold text-uppercase mb-1">Auditor Finding</h6>
                                        <p class="text-muted small mb-0">Primary Audit Data</p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small fw-bold text-uppercase d-block mb-2">
                                        <i class="mdi mdi-tag-outline"></i> Type of Audit Category
                                    </label>
                                    <div class="bg-light p-3 rounded-3 border-start border-2 border-primary">
                                        <p class="mb-0 text-dark" id="audit_category">The Category</p>
                                    </div>
                                </div>
                                <div>
                                    <label class="text-muted small fw-bold text-uppercase d-block mb-2">
                                        <i class="mdi mdi-package-variant me-1"></i>Model & Process Area
                                    </label>
                                    <div class="bg-light p-3 rounded-3 border-start border-2 border-primary">
                                        <p class="mb-0 text-dark" id="audit_mpa">The MPA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Relevant Audit Results -->
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-success bg-opacity-10 rounded-3 p-2 me-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="mdi mdi-magnify text-success fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-success fw-bold text-uppercase mb-1">Audit Results</h6>
                                        <p class="text-muted small mb-0">Findings & Evidence</p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small fw-bold text-uppercase d-block mb-2">
                                        <i class="mdi mdi-chat me-1"></i> Audit Comments
                                    </label>
                                    <div class="bg-light p-3 rounded-3 border-start border-2 border-success">
                                        <p class="mb-0 text-dark" id="relevant_result">The PIC</p>
                                    </div>
                                </div>
                                <div>
                                    <label class="text-muted small fw-bold text-uppercase d-block mb-2">
                                        <i class="mdi mdi-paperclip me-1"></i> Audit Evidence or Proof
                                    </label>
                                    <div class="bg-light p-3 rounded-3 border-start border-2 border-success">
                                        <p class="mb-0 text-dark" id="upload_file_name">The Proof</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Details -->
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-info bg-opacity-10 rounded-3 p-2 me-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="mdi mdi-account-tie text-info fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-info fw-bold text-uppercase mb-1">Personnel</h6>
                                        <p class="text-muted small mb-0">Staff & Classification</p>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="text-muted small fw-bold text-uppercase d-block mb-2">
                                        <i class="mdi mdi-account me-1"></i> Person In Charge
                                    </label>
                                    <div class="bg-light p-3 rounded-3 border-start border-2 border-info">
                                        <p class="mb-0 text-dark" id="incharge">The PIC</p>
                                    </div>
                                </div>
                                <div>
                                    <label class="text-muted small fw-bold text-uppercase d-block mb-2">
                                        <i class="mdi mdi-bookmark me-1"></i> Audit Classification
                                    </label>
                                    <div class="bg-light p-3 rounded-3 border-start border-2 border-info">
                                        <p class="mb-0 text-dark" id="audit_classification">The Classification</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Instruction Section -->
                <div class="accordion mt-3 mb-3" id="instructionsAccordion">
                    <div class="accordion-item border-0 shadow-sm rounded-3 overflow-hidden">
                        <h2 class="accordion-header" id="instructionsHeader">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseInstructions" aria-expanded="false" aria-controls="collapseInstructions" style="background: #1e293b !important; color: white !important; border: none !important; --bs-accordion-btn-icon-color: white; --bs-accordion-btn-active-icon-color: white;">
                                <div class="bg-white bg-opacity-25 rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px; flex-shrink: 0;">
                                    <i class="mdi mdi-lightbulb-on-outline text-white" style="font-size: 1.3rem; color: white !important;"></i>
                                </div>
                                <span style="color: white !important;">Audit Information Guidelines</span>
                            </button>
                        </h2>
                        <div id="collapseInstructions" class="accordion-collapse collapse" aria-labelledby="instructionsHeader" data-bs-parent="#instructionsAccordion">
                            <div class="accordion-body bg-light p-4" style="background-color: #f8f9fa;">
                                <!-- Findings Classification Section -->
                                <div class="mb-4">
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-3 d-flex align-items-center justify-content-center" style="width: 33px; height: 33px;">
                                            <i class="mdi mdi-bookmark-check text-primary" style="font-size: 1.1rem;"></i>
                                        </div>
                                        <h6 class="text-primary fw-bold mb-0">Audit Findings Classification</h6>
                                    </div>
                                    <p class="text-muted small mb-3">Use the following indicators to classify your audit findings:</p>
                                    <div class="row g-2">
                                        <div class="col-md-6">
                                            <div class="card border-0 shadow-sm bg-white h-100">
                                                <div class="card-body p-3">
                                                    <div class="d-flex align-items-start">
                                                        <span class="badge bg-danger rounded-pill me-2 mt-1">MajNC</span>
                                                        <div>
                                                            <p class="fw-bold mb-1 text-dark">Major Nonconformity</p>
                                                            <p class="small text-muted mb-0">A significant process failure that has caused, or is highly likely to cause, a serious impact on product quality, customer satisfaction, or compliance.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card border-0 shadow-sm bg-white h-100">
                                                <div class="card-body p-3">
                                                    <div class="d-flex align-items-start">
                                                        <span class="badge bg-warning rounded-pill me-2 mt-1">MinNC</span>
                                                        <div>
                                                            <p class="fw-bold mb-1 text-dark">Minor Nonconformity</p>
                                                            <p class="small text-muted mb-0">An isolated deviation from the process or requirements that has minimal or no immediate effect on product quality.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card border-0 shadow-sm bg-white h-100">
                                                <div class="card-body p-3">
                                                    <div class="d-flex align-items-start">
                                                        <span class="badge bg-info rounded-pill me-2 mt-1">OFI</span>
                                                        <div>
                                                            <p class="fw-bold mb-1 text-dark">Opportunity for Improvement</p>
                                                            <p class="small text-muted mb-0">A process observation where requirements are met, but there is a chance to enhance efficiency and effectiveness.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card border-0 shadow-sm bg-white h-100">
                                                <div class="card-body p-3">
                                                    <div class="d-flex align-items-start">
                                                        <span class="badge bg-success rounded-pill me-2 mt-1">P</span>
                                                        <div>
                                                            <p class="fw-bold mb-1 text-dark">Positive Aspects</p>
                                                            <p class="small text-muted mb-0">Positive aspects of the management system meriting special mention.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-4">

                                <!-- Action Category Section -->
                                <div>
                                    <div class="d-flex align-items-center mb-3">
                                        <div class="bg-success bg-opacity-10 rounded-3 p-2 me-2">
                                            <i class="mdi mdi-target text-success" style="font-size: 1.1rem;"></i>
                                        </div>
                                        <h6 class="text-success fw-bold mb-0">Action Category & Timeline</h6>
                                    </div>
                                    <p class="text-muted small mb-3">Select the appropriate action category based on the urgency and scope:</p>
                                    <div class="timeline row">
                                        <div class="col-md-6">
                                            <div class="d-flex mb-3">
                                                <div class="me-3">
                                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; flex-shrink: 0;">
                                                        <i class="mdi mdi-lightning-bolt-outline text-white" style="font-size: 1rem;"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fw-bold mb-1 text-dark">Immediate Improvement <span class="badge bg-danger small">24 hours</span></p>
                                                    <p class="small text-muted mb-0">Actions that must be completed immediately from the date audited.</p>
                                                </div>
                                            </div>
                                            <div class="d-flex mb-3">
                                                <div class="me-3">
                                                    <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; flex-shrink: 0;">
                                                        <i class="mdi mdi-wrench-outline text-white" style="font-size: 1rem;"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fw-bold mb-1 text-dark">For Improvement <span class="badge bg-warning small">7 working days</span></p>
                                                    <p class="small text-muted mb-0">Corrective actions to address actual findings from the date audited.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex mb-3">
                                                <div class="me-3">
                                                    <div class="bg-info rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; flex-shrink: 0;">
                                                        <i class="mdi mdi-file-document-outline text-white" style="font-size: 1rem;"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fw-bold mb-1 text-dark">Documentation <span class="badge bg-info small">14 working days</span></p>
                                                    <p class="small text-muted mb-0">Document or guideline updates requiring DCC completion from the date audited.</p>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="me-3">
                                                    <div class="bg-success rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; flex-shrink: 0;">
                                                        <i class="mdi mdi-calendar-clock text-white" style="font-size: 1rem;"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fw-bold mb-1 text-dark">Long-Term Improvement <span class="badge bg-success small">Custom deadline</span></p>
                                                    <p class="small text-muted mb-0">Actions requiring extended timelines (e.g., equipment purchase). Based on request form or lead time.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info Cards Two -->
                <div class="row g-3">
                    <!-- Card 1: Auditee Corrective Action -->
                    <div class="col-md-8">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-warning bg-opacity-10 rounded-3 p-2 me-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="mdi mdi-wrench-outline text-warning fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-warning fw-bold text-uppercase mb-1">Auditee Corrective Action</h6>
                                        <p class="text-muted small mb-0">Root Cause & Remediation Plan</p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="text-muted small fw-bold text-uppercase d-block mb-2">
                                        <i class="mdi mdi-lightbulb-on-outline"></i> Results of Root Cause Analysis
                                    </label>
                                    <div class="bg-light p-3 rounded-3 border-start border-2 border-warning">
                                        <p class="mb-0 text-dark" id="root_cause_analysis">The Analysis</p>
                                    </div>
                                </div>
                                <div>
                                    <label class="text-muted small fw-bold text-uppercase d-block mb-2">
                                        <i class="mdi mdi-target-account"></i> Intended Corrective Action
                                    </label>
                                    <div class="bg-light p-3 rounded-3 border-start border-2 border-warning">
                                        <p class="mb-0 text-dark" id="corrective_action">The Corrective Action</p>
                                        <small class="text-muted d-block mt-2"><i class="mdi mdi-information-outline"></i> Including responsibilities and deadlines of the client</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Auditee Other Information -->
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4">
                                    <div class="bg-success bg-opacity-10 rounded-3 p-2 me-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <i class="mdi mdi-file-check-outline text-success fs-4"></i>
                                    </div>
                                    <div>
                                        <h6 class="text-success fw-bold text-uppercase mb-1">Supporting Documentation</h6>
                                        <p class="text-muted small mb-0">Evidence & Remarks</p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="text-muted small fw-bold text-uppercase d-block mb-2">
                                        <i class="mdi mdi-paperclip"></i> Auditee Evidence or Proof
                                    </label>
                                    <div class="bg-light p-3 rounded-3 border-start border-2 border-success">
                                        <p class="mb-0 text-dark" id="evidence">The Evidence</p>
                                    </div>
                                </div>
                                <div>
                                    <label class="text-muted small fw-bold text-uppercase d-block mb-2">
                                        <i class="mdi mdi-note-text-outline"></i> Remarks
                                    </label>
                                    <div class="bg-light p-3 rounded-3 border-start border-2 border-success">
                                        <p class="mb-0 text-dark" id="incharge">The Notes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Approving Button Part -->
                <div id="approving_area" class="alert alert-info border-0 border-start border-3 border-info shadow-sm d-flex align-items-center mt-3 mb-0" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle-fill me-2 flex-shrink-0" viewBox="0 0 16 16">
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2"/>
                    </svg>
                    <small class="mb-0"><strong>Note:</strong> Ensure all data is correct before proceeding with approval to closed the audit.</small>
                    <div class="ms-auto">
                        <button id="approved_btn" class="btn btn-success rounded-3 me-2 d-inline-flex align-items-center" title="Approve this checklist">
                            <i class="mdi mdi-check-circle-outline me-2"></i>
                            <span>Approve</span>
                        </button>
                        <button class="btn btn-danger rounded-3 me-2 d-inline-flex align-items-center" title="Approve this checklist">
                            <i class="mdi mdi-cancel me-2"></i>
                            <span>Disapprove</span>
                        </button>
                    </div>
                </div>

                <!-- Info Cards Third -->
                <div class="row mt-1 g-3">
                    <!-- Card 1: QA Verification -->
                    <div class="col-md-5">
                        <div class="card border-0 shadow-sm h-100 overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                                    <div class="bg-primary bg-opacity-10 rounded-3 p-2 me-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard-check text-primary" viewBox="0 0 16 16">
                                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm0-1a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h6 class="text-primary fw-bold text-uppercase mb-0" style="font-size: 0.85rem; letter-spacing: 0.5px;">QA Verification</h6>
                                        <small class="text-muted">Review & Comments</small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted d-block mb-2 fw-bold text-uppercase" style="font-size: 0.7rem;">Remarks</small>
                                    <p class="mb-0 text-dark" id="qa_remarks">September 3, 2025 - <span class="badge rounded-pill bg-info">For Verification</span></p>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-2 fw-bold text-uppercase" style="font-size: 0.7rem;">Comments</small>
                                    <div class="bg-light p-3 rounded-3 border-start border-2 border-primary">
                                        <p class="mb-0 text-dark small" id="qa_comments">The Comment Here</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2: Action Category -->
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm h-100 overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                                    <div class="bg-warning bg-opacity-10 rounded-3 p-2 me-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-lightning-charge-fill text-warning" viewBox="0 0 16 16">
                                            <path d="M11.046.646a.5.5 0 0 1 .708.708L2.414 15.354a.5.5 0 0 1-.708-.708L10.338.646z"/>
                                            <path d="m11.068 4.993.812 2.426-5.379 1.994 4.61 2.885-.812 2.426-6.183-3.885 1.952-5.846z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h6 class="text-warning fw-bold text-uppercase mb-0" style="font-size: 0.85rem; letter-spacing: 0.5px;">Action Details</h6>
                                        <small class="text-muted">Category & Duration</small>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <small class="text-muted d-block mb-2 fw-bold text-uppercase" style="font-size: 0.7rem;">Action Category</small>
                                    <div class="bg-light p-3 rounded-3 border-start border-2 border-warning">
                                        <p class="mb-0 text-dark" id="action_category">For Improvement</p>
                                    </div>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-2 fw-bold text-uppercase" style="font-size: 0.7rem;">Duration After Audit</small>
                                    <div class="bg-light p-3 rounded-3 border-start border-2 border-warning">
                                        <p class="mb-0 text-dark">
                                            <!-- <span id="duration_days" class="badge bg-warning text-dark fw-semibold me-2">7 Days</span> -->
                                             <span id="duration_days">7 Days</span>
                                            <span id="other_text"></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3: Timeline -->
                    <div class="col-md-3">
                        <div class="card border-0 shadow-sm h-100 overflow-hidden">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                                    <div class="bg-success bg-opacity-10 rounded-3 p-2 me-3 d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar-check-fill text-success" viewBox="0 0 16 16">
                                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v2h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h6 class="text-success fw-bold text-uppercase mb-0" style="font-size: 0.85rem; letter-spacing: 0.5px;">Timeline</h6>
                                        <small class="text-muted">Key Dates</small>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <small class="text-muted d-block mb-2 fw-bold text-uppercase" style="font-size: 0.7rem;">Date Audited</small>
                                    <p class="mb-0 text-dark fw-semibold" id="audit_date_timeline">September 11, 2025</p>
                                </div>
                                <div class="mb-4">
                                    <small class="text-muted d-block mb-2 fw-bold text-uppercase" style="font-size: 0.7rem;">Target Closure Date</small>
                                    <div class="bg-light p-2 rounded-3 border-start border-2 border-danger">
                                        <p class="mb-0 text-dark text-center" id="target_close_date">September 18, 2025</p>
                                    </div>
                                </div>
                                <div>
                                    <small class="text-muted d-block mb-2 fw-bold text-uppercase" style="font-size: 0.7rem;">Date Closed</small>
                                    <p class="mb-0 text-dark fw-semibold" id="closure_date">To Be Approved</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
        </div>
    </div>
</div>

<!-- Modal For Deleting Checklist -->
<div class="modal fade" id="deleteChecklistModal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content rounded-4 shadow-lg">
            <div class="modal-header bg-danger">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    <i class="mdi mdi-alert"></i> Deleting Checklist
                </h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- Warning Alert -->
                <div class="alert alert-danger d-flex align-items-start" role="alert">
                    <i class="bi bi-exclamation-circle-fill me-3 flex-shrink-0" style="font-size: 1.25rem;"></i>
                    <div>
                        <strong>Irreversible Action</strong>
                        <p class="mb-0 small mt-1">Deleting this checklist will permanently remove all associated data and cannot be undone.</p>
                    </div>
                </div>

                <!-- Confirmation Steps -->
                <div class="mt-4">
                    <label for="controlCode" class="form-label fw-semibold">
                        <span class="badge bg-primary">Step 1</span> Enter Control Code
                    </label>
                    <input 
                        type="text" 
                        id="controlCode" 
                        class="form-control" 
                        placeholder="e.g., CH87W39F8"
                        aria-describedby="controlCodeHelp">
                    <small id="controlCodeHelp" class="form-text text-muted d-block mt-1">
                        Enter the control number of the checklist you want to delete
                    </small>
                </div>

                <div class="mt-4">
                    <label for="confirmDelete" class="form-label fw-semibold">
                        <span class="badge bg-primary">Step 2</span> Type "DELETE" to Confirm
                    </label>
                    <input 
                        type="text" 
                        id="confirmDelete" 
                        class="form-control" 
                        placeholder="Type DELETE here"
                        aria-describedby="confirmDeleteHelp">
                    <small id="confirmDeleteHelp" class="form-text text-muted d-block mt-1">
                        Type <strong>DELETE</strong> (case-sensitive) to enable the deletion button
                    </small>
                </div>

                <!-- Acknowledgment Checkbox -->
                <div class="mt-4">
                    <div class="form-check">
                        <input 
                            class="form-check-input" 
                            type="checkbox" 
                            id="acknowledgeCheckbox">
                        <label class="form-check-label" for="acknowledgeCheckbox">
                            I understand this action cannot be reversed and I have backed up necessary data
                        </label>
                    </div>
                </div>
            </div>

            <div class="modal-footer bg-light border-top">
                <button type="button" class="btn btn-secondary rounded-3" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="delete_checklist_btn" class="btn btn-danger rounded-3" disabled>
                    <i class="bi bi-trash"></i> Proceed to Deletion
                </button>
            </div>
        </div>
    </div>
</div>

