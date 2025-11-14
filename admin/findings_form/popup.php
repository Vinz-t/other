<!-- <link rel="stylesheet" href="../../assets/css/plugins/materialdesignicons.min.css" rel="stylesheet" type="text/css" /> -->
<!-- Modal for Summary -->
<div class="modal fade" id="summaryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="summaryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <!-- Modal Header -->
            <div class="modal-header bg-gradient bg-primary border-0 rounded-top-4">
                <h5 class="modal-title text-white fw-bold" id="summaryModalLabel">
                    <svg class="me-2 mb-1" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v2h-2zm0 4h2v6h-2z"/>
                    </svg>
                    Audit Summary
                </h5>
                <!-- <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>

            <!-- Modal Body -->
            <div class="modal-body p-4">
                <!-- Information Accordion -->
                <div class="accordion border-0 mb-4" id="instructionsCategoryAccordion">
                    <div class="accordion-item border-0 shadow-sm rounded-3 overflow-hidden">
                        <h2 class="accordion-header" id="instructionsHeader">
                            <button class="accordion-button collapsed fw-bold py-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategoryInstruction" aria-expanded="false" aria-controls="collapseCategoryInstruction">
                                <div class="bg-info bg-opacity-15 rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <i class="mdi mdi-information-outline text-light" style="font-size: 1.3rem;"></i>
                                </div>
                                <span>Action Category Guidelines</span>
                            </button>
                        </h2>
                        <div id="collapseCategoryInstruction" class="accordion-collapse collapse" aria-labelledby="instructionsHeader" data-bs-parent="#instructionsCategoryAccordion">
                            <div class="accordion-body p-4 bg-light">
                                <div class="alert alert-info border-0 mb-3">
                                    <strong>📋 Classification Categories:</strong>
                                </div>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <div class="card border-0 m-0 shadow-sm rounded-3 overflow-hidden">
                                            <div class="card-body p-3 bg-white">
                                                <div class="d-flex align-items-start">
                                                    <span class="badge bg-success rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">1</span>
                                                    <div>
                                                        <h6 class="card-title fw-bold text-success mb-1">For Improvement</h6>
                                                        <p class="card-text text-muted small mb-0">Corrective actions required within <strong>7 working days</strong> from audit date.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card border-0 m-0 shadow-sm rounded-3 overflow-hidden">
                                            <div class="card-body p-3 bg-white">
                                                <div class="d-flex align-items-start">
                                                    <span class="badge bg-warning rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">2</span>
                                                    <div>
                                                        <h6 class="card-title fw-bold text-warning mb-1">Documentation</h6>
                                                        <p class="card-text text-muted small mb-0">Document/guideline corrections via DCC within <strong>14 working days</strong> from audit date.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card border-0 m-0 shadow-sm rounded-3 overflow-hidden">
                                            <div class="card-body p-3 bg-white">
                                                <div class="d-flex align-items-start">
                                                    <span class="badge bg-info rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">3</span>
                                                    <div>
                                                        <h6 class="card-title fw-bold text-info mb-1">Long-Term Improvement</h6>
                                                        <p class="card-text text-muted small mb-0">Extended timeline actions (e.g., purchases). Timeline based on request/lead time.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="card border-0 m-0 shadow-sm rounded-3 overflow-hidden">
                                            <div class="card-body p-3 bg-white">
                                                <div class="d-flex align-items-start">
                                                    <span class="badge bg-danger rounded-circle p-2 me-3" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">4</span>
                                                    <div>
                                                        <h6 class="card-title fw-bold text-danger mb-1">Immediate Improvement</h6>
                                                        <p class="card-text text-muted small mb-0">Urgent actions required within <strong>24 hours</strong> from audit date.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Summary Table -->
                <div class="table-responsive mt-4">
                    <table id="summaryTableBody" class="table table-hover table-bordered align-middle mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th class="fw-bold text-center">Question No.</th>
                                <th class="fw-bold">Remarks</th>
                                <th class="fw-bold text-center">Classification</th>
                                <th class="fw-bold">Action Category</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <!-- <tr>
                                <td class="text-center fw-bold">1</td>
                                <td>Very Bad Need Improvement</td>
                                <td class="text-center"><span class="badge bg-danger">OFI</span></td>
                                <td>
                                    <select class="form-select form-select-sm rounded-2 actionCategory" name="actionCat" required>
                                        <option value="" selected disabled>Select Action Category</option>
                                        <option value="For Improvement">For Improvement</option>
                                        <option value="Documentation">Documentation</option>
                                        <option value="Long-Term Improvement">Long-Term Improvement</option>
                                        <option value="Immediate Improvement">Immediate Improvement</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center fw-bold">2</td>
                                <td>Very Nice Work</td>
                                <td class="text-center"><span class="badge bg-success">P</span></td>
                                <td>
                                    <select class="form-select form-select-sm rounded-2 actionCategory" name="actionCat" required>
                                        <option value="" selected disabled>Select Action Category</option>
                                        <option value="For Improvement">For Improvement</option>
                                        <option value="Documentation">Documentation</option>
                                        <option value="Long-Term Improvement">Long-Term Improvement</option>
                                        <option value="Immediate Improvement">Immediate Improvement</option>
                                    </select>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="modal-footer bg-light border-top-0 p-3 rounded-bottom-4">
                <button type="button" class="btn btn-secondary rounded-3 fw-bold close_btn" data-bs-dismiss="modal">
                    <i class="mdi mdi-close me-2"></i>Cancel
                </button>
                <button type="button" class="btn btn-primary rounded-3 fw-bold px-4 proceed_btn">
                    <i class="mdi mdi-check-circle me-2"></i>Proceed to Submission
                </button>
            </div>
        </div>
    </div>
</div>









<!-- <div class="modal fade" id="summaryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">
                    <svg class="me-2 mb-1" width="22" height="22" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v2h-2zm0 4h2v6h-2z"/>
                    </svg>
                    Summary
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="accordion border mb-3" id="instructionsCategoryAccordion">
                    <div class="accordion-item border-0 shadow-sm">
                        <h2 class="accordion-header" id="instructionsHeader">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategoryInstruction" aria-expanded="false" aria-controls="collapseInstructions">
                                <div class="bg-primary bg-opacity-10 rounded-circle p-1 me-2">
                                    <i class="mdi mdi-information-outline" style="font-size: 1.2rem;"></i>
                                </div>
                                <strong>Action Category Information</strong>
                            </button>
                        </h2>
                        <div id="collapseCategoryInstruction" class="accordion-collapse collapse" aria-labelledby="instructionsHeader" data-bs-parent="#instructionsCategoryAccordion">
                            <div class="accordion-body">
                                <div class="alert alert-light mb-0 border-0 p-0"> 
                                    <p>Use the following indicators: <strong class="text-info">For Improvement, Documentation, Long-Term Improvement,</strong> and <strong class="text-info">Immediate Improvement.</strong></p>
                                    <ol class="list-group list-group-numbered">
                                        <li class="list-group-item">
                                            <strong>For Improvement:</strong> Use this for audit findings that requires to correct the actual. The porposed corrective action within 7 working days from date audited.
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Documentation:</strong> This applies to corrective actions related to documents or guidelines that require completion by the Document Control Center (DCC). The proposed corrective actions within 14 working days from date audited.
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Long-Term Improvement:</strong> Use this for actions that will take a long time to complete (e.g., purchasing an item). The proposed corrective action will be based on the request form or lead time from date audited.
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Immediate Improvement:</strong> This is for actions that must be completed immediately. The proposed corrective action should be done within 24 hours from date audited.
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <table class="table table-bordered table-striped shadow-sm">
                    <thead>
                        <tr>
                            <th class="px-3 py-2 border">Question No.</th>
                            <th class="px-3 py-2 border">Remarks</th>
                            <th class="px-3 py-2 border">Classification</th>
                            <th class="px-3 py-2 border">Action Category</th>
                        </tr>
                    </thead>
                    <tbody class="summaryTableBody text-center">
                        <tr>
                            <td class="px-3 py-2 border">1</td>
                            <td class="px-3 py-2 border">Very Bad Need Improvement</td>
                            <td class="px-3 py-2 border">OFI</td>
                            <td class="px-3 py-2 border">
                                <select name="actionCat" id="actionCat">
                                    <option selected disabled>Select Action Category</option>
                                    <option value="For Improvement">For Improvement</option>
                                    <option value="Documentation">Documentation</option>
                                    <option value="Long-Term Improvement">Long-Term Improvement</option>
                                    <option value="Immediate Improvement">Immediate Improvement</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 py-2 border">2</td>
                            <td class="px-3 py-2 border">Very Nice Work</td>
                            <td class="px-3 py-2 border">P</td>
                            <td class="px-3 py-2 border">
                                <select name="actionCat" id="actionCat">
                                    <option selected disabled>Select Action Category</option>
                                    <option value="For Improvement">For Improvement</option>
                                    <option value="Documentation">Documentation</option>
                                    <option value="Long-Term Improvement">Long-Term Improvement</option>
                                    <option value="Immediate Improvement">Immediate Improvement</option>
                                </select>
                            </td>
                    </tbody>
                </table>
                <button type="button" class="btn btn-primary fw-bold rounded-3">Proceed to Submission</button>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="modal-footer">
    <button type="button" class="btn btn-primary fw-bold rounded-3">Proceed to Submission</button>
</div> -->