<!-- Submission of Correction Modal (Bright Modern Style) -->
<div class="modal fade" id="submissionModal" tabindex="-1" aria-labelledby="submissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">
        
            <!-- Header -->
            <div class="modal-header bg-primary bg-gradient border-0 py-2 px-5">
                <div>
                    <p class="text-uppercase small mb-1 fw-semibold text-white-50">Corrective Action</p>
                    <h4 class="text-uppercase fw-bold text-white mb-0">
                        <i class="mdi mdi-package-up me-1"></i>
                        Submission Area
                    </h4>
                    <p class="text-uppercase small mb-0 fw-semibold text-white">Control Code: <span id="conCode">1DSKE49FS</span></p>
                </div>
                <!-- <div class="text-end">
                    <span class="badge rounded-pill bg-light text-primary fw-semibold px-3 py-2">
                        Control Code: 1DSKE49FS
                    </span>
                </div> -->
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body bg-light p-5 pt-4 pb-4">
                
                <!-- Audit Summary -->
                <div class="card border-0 rounded-4 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="mb-0 fw-bold text-secondary">Audit Details</h5>
                            <span class="badge bg-info fw-semibold px-3 py-2">
                                 Classification: <span id="classification">OFI</span>
                            </span>
                        </div>

                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3">
                                    <p class="text-uppercase text-muted small mb-1">Date Audited</p>
                                    <p id="date_audit" class="fw-semibold mb-0">November 14, 2025</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded-3">
                                    <p class="text-uppercase text-muted small mb-1">Target Closure</p>
                                    <p id="date_target" class="fw-semibold mb-0 text-danger">November 28, 2025</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="p-3 border rounded-3">
                                    <p class="text-uppercase text-muted small mb-1">Model & Process / Area</p>
                                    <p id="mpa" class="mb-0">MINI 41 BO-40 - AS 1, MINI LINK 2 - AS 1, MINI LINK 3 - AS 1, MINI 12 /BO-20 - AS 1.1, MINI 12 /BO-20 - AS 1.2, MINI 12 /BO-20 - AS 10</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="p-3 bg-light rounded-3">
                                    <p class="text-uppercase text-muted small mb-1">Relevant Audit Result</p>
                                    <p id="audit_result" class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati, dolor saepe. Sit, tempora libero perspiciatis, accusantium, nihil magnam neque non ducimus ut autem veritatis dolorem officia? Pariatur mollitia quidem voluptatibus!</p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="p-3 border rounded-3">
                                    <p class="text-uppercase text-muted small mb-1">Auditor Evidence</p>
                                    <a type="button" class="open_file_btn btn btn-sm btn-outline-primary rounded-pill ps-3 pe-4">
                                        <i class="mdi mdi-file-download-outline me-1"></i>
                                        <span id="file_name"></span>
                                        <!-- Download PDF -->
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Corrective Action Form -->
                <div class="card border-0 rounded-4 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center me-3" style="width: 48px; height: 48px;">
                                <i class="mdi mdi-pencil-box-outline fs-3"></i>
                            </div>
                            <div>
                                <p class="text-uppercase small text-muted mb-1">Action Details</p>
                                <h5 class="fw-bold mb-0 text-primary">Submit Your Corrective Action</h5>
                            </div>
                        </div>
                        <form class="row g-4">
                            <div class="col-12">
                                <label for="rootCause" class="form-label fw-semibold text-secondary">Root Cause Analysis <span class="text-danger">*</span></label>
                                <textarea id="rootCause" class="form-control border-0 bg-light rounded-3 shadow-sm" rows="3" placeholder="Describe the root cause..."></textarea>
                            </div>
                            <div class="col-12">
                                <label for="actionPlan" class="form-label fw-semibold text-secondary">Corrective Action Plan <span class="text-danger">*</span></label>
                                <textarea id="actionPlan" class="form-control border-0 bg-light rounded-3 shadow-sm" rows="3" placeholder="What will be done to resolve it?"></textarea>
                                <div class="form-text">Include responsibilities and deadlines of the client.</div>
                            </div>
                            <div class="col-12">
                                <label for="evidenceFile" class="form-label fw-semibold text-secondary">Provide Evidence <span class="text-danger">*</span></label>
                                <div class="input-group rounded-3 shadow-sm">
                                    <span class="input-group-text bg-white border-0"><i class="mdi mdi-cloud-upload-outline text-primary"></i></span>
                                    <input type="file" id="evidenceFile" class="form-control border-0" accept="application/pdf">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <button id="correction_submit_btn" type="button" class="btn btn-primary rounded-4 fw-bold text-uppercase w-100 px-5">
                    <i class="mdi mdi-send-check-outline me-2"></i>Submit Correction
                </button>
            </div>

        </div>
    </div>
</div>

























<!-- Submission of Correction Modal (Improved Design) -->
<div class="modal fade" id="submissionModalsss" tabindex="-1" aria-labelledby="submissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title" id="submissionModalLabel">Corrective Submission Area</h5>
                    <p class="small text-muted mb-0">Control Code: 1DSKE49FS</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <!-- Section 1: Read-only Audit Details -->
                <div class="p-3 rounded bg-light mb-4">
                    <h6 class="border-bottom pb-2 mb-3">Relevant Audit Details</h6>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="fw-bold">Relevant Audit Result:</label>
                            <p id="audit_result_text" class="text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima fugit laborum odit repellendus voluptates vero accusamus magnam deleniti vel.</p>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="fw-bold">Model & Process / Area:</label>
                            <p id="model_process_area" class="text-muted">MINI 41 BO-40 - AS 1, MINI LINK 2 - AS 1, MINI LINK 3 - AS 1, MINI 12 /BO-20 - AS 1.1, MINI 12 /BO-20 - AS 1.2, MINI 12 /BO-20 - AS 10</p>
                        </div>
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="fw-bold">Date Audited:</label>
                            <p id="date_audited" class="text-muted">November 14, 2025</p>
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">Proposed Target Date:</label>
                            <p id="target_date" class="text-muted">November 28, 2025</p>
                        </div>
                         <div class="col-md-12 mt-3">
                            <label class="fw-bold">Auditor Uploaded Evidence:</label>
                            <div>
                                <a href="#" id="auditor_evidence_link">the_file.pdf</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Section 2: User Input Form -->
                <div>
                    <h6 class="border-bottom pb-2 mb-3">Submit Your Correction</h6>
                    <form>
                        <div class="mb-3">
                            <label for="root_cause_analysis" class="form-label">Results of root cause analysis:</label>
                            <textarea class="form-control" id="root_cause_analysis" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="intended_corrective_action" class="form-label">Intended Corrective Action:</label>
                            <textarea class="form-control" id="intended_corrective_action" rows="4"></textarea>
                            <div class="form-text">Include responsibilities and deadlines of the client.</div>
                        </div>
                        <div class="mb-3">
                            <label for="evidence_upload" class="form-label">Provide Evidence:</label>
                            <input type="file" class="form-control" id="evidence_upload">
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit Corrective Action</button>
            </div>
        </div>
    </div>
</div>

















<!-- Submission of Correction Modal -->
<div class="modal fade" id="submissionModals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Corrective Submission Area</h5><br>
                <p class="small text-muted">Control Code: 1DSKE49FS</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 border">
                        <div class="row">
                            <div class="col-md-12 border mb-2">
                                <span>Relevant Audit Result:</span><br>
                                <span id="audit_result">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima fugit laborum odit repellendus voluptates vero accusamus magnam deleniti vel. Est doloribus quaerat rem ipsam quia doloremque molestias, incidunt debitis totam.</span>
                            </div>
                            <div class="col-md-12 border">
                                <span>Auditor Uploaded Evidence File: the_file.pdf</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-6 border">
                        <span>Model & Process / Area:</span><br>
                        <span id="audit_result">MINI 41 BO-40 - AS 1, MINI LINK 2 - AS 1, MINI LINK 3 - AS 1, MINI 12 /BO-20 - AS 1.1, MINI 12 /BO-20 - AS 1.2, MINI 12 /BO-20 - AS 10</span>
                    </div>
                    <div class="col-md-6 border">
                        <span>Date Audited: November 14 2025</span>
                    </div>
                    <div class="col-md-6 border">
                        <span>Proposed Target Date to be Closed: November 28 2025</span>
                    </div>
                    <div class="col-md-6">
                        <label for="corrective_action" class="form-label mt-2">Results of root cause analysis:</label>
                        <textarea class="form-control" id="corrective_action" rows="4"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="corrective_action" class="form-label mt-2">Intended Corrective Action: <br><small>(Including resposibilities and deadlines of the client)</small></label>
                        <textarea class="form-control" id="corrective_action" rows="4"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="corrective_action" class="form-label mt-2">Provide Evidence:</label>
                        <input type="file" class="form-control" id="corrective_action">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Submit Corrective Action</button>
            </div>
        </div>
    </div>
</div>