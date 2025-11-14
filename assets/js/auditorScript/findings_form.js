const jsConfetti = new JSConfetti();

// Check first for the file size of the uploaded file proof
function validateFileSize(input) {
    // const maxSize = maxSizeMB * 1024 * 1024;
    const maxSizeKB = 500; // 500KB
    const maxSize = maxSizeKB * 1024;
    const file = input.files[0];
        
    if (file && file.size > maxSize) {
        notification('error', 5500, 'File Validation', `File size must be less than <strong>${maxSizeKB}KB</strong>.`);
        input.value = '';
        return false;
    }
    return true;
}

$(document).ready(function () { 
    // Initialize Choices at the start
    // keep a reference to the Choices instance so we can update it later
    let choicesInstance;
    choicesInstance = new Choices('#choices-multiple', {
        removeItems: true,
        maxItemCount: 10,
        addItems: true,
        duplicateItemsAllowed: false,
        editItems: false,
        shouldSort: false,
        placeholder: true,
        placeholderValue: 'Select Areas / Processes',
        renderChoiceLimit: -1
    });

    function retrieveAuditee() {
        $.post('../../../assets/backend/core.php', {
            action: '_load_auditee_list',
            division: $division.val() //$('select[name="division"]').val()
        }, function (response) {
            $('select[name="auditee"]').html(response);
        });
    }

    const $division = $('select[name="division"]');
    $division.on('change', retrieveAuditee);

    // If there's an initial selection (non-empty), load auditee now
    if ($division.val()) {
        retrieveAuditee();
    }

    function retrieveAreaProcess() {
        // clear underlying select and Choices UI immediately
        $('#choices-multiple').val([]).trigger('change');
        if (choicesInstance) {
            if (typeof choicesInstance.removeActiveItems === 'function') choicesInstance.removeActiveItems();
            if (typeof choicesInstance.clearChoices === 'function') choicesInstance.clearChoices();
            if (typeof choicesInstance.clearInput === 'function') choicesInstance.clearInput();
        }

        // load new area choices
        $.post('../../../assets/backend/core.php', {
            action: '_load_area_process_list',
            division: $division.val()
        }, function (response) {
            var areas = (typeof response === 'string') ? (JSON.parse(response || '[]')) : (response || []);
            var source = Array.isArray(areas) ? areas : (Array.isArray(areas.area_name) ? areas.area_name : []);
            var choices = source.map(function (a) {
                var name = (typeof a === 'string') ? a : (a.area_name || '');
                return { value: name, label: name };
            });

            if (!choicesInstance) {
                choicesInstance = new Choices('#choices-multiple', {
                    removeItems: true,
                    maxItemCount: 10,
                    addItems: true,
                    duplicateItemsAllowed: false,
                    editItems: false,
                    shouldSort: false,
                    placeholder: true,
                    placeholderValue: 'Select Areas / Processes',
                    renderChoiceLimit: -1
                });
            }

            choicesInstance.setChoices(choices, 'value', 'label', true);
            if (typeof choicesInstance.removeActiveItems === 'function') choicesInstance.removeActiveItems();
        });
    };

    $division.on('change', retrieveAreaProcess);

    // Questions Area

    function getFindings(findingNumber) {
        const findings = [];
            
        // Loop through all questions (1-30)
        for(let i = 1; i <= findingNumber; i++) {
            const noRadio = document.querySelector(`input[name="finding_${i}"][value="no"]`);
            const yesRadio = document.querySelector(`input[name="finding_${i}"][value="yes"]`);
            const naRadio = document.querySelector(`input[name="finding_${i}"][value="na"]`);
                
            if(noRadio && noRadio.checked) {
                // Get the row containing this question
                const row = noRadio.closest('tr');
                    
                // Get the evidence, proof, classification and occurrence
                const evidence = row.querySelector('.evidence').value;
                const proofFile = row.querySelector('.proof').files[0];
                const classification = row.querySelector('.classification').value;
                const occurrence = row.querySelector('.occurrence').value;
                //const actionCategory = row.querySelector('.actionCategory').value;

                // Validate required fields for "no" answers
                if (!evidence || !proofFile || !classification || !occurrence) {
                    //alert(`For "No" answer to Question ${i}, Evidence, Proof, Classification and Occurrence are required.`);
                    notification('info', 3500, `Question ${i}, Validation`, 'For "No", <strong>Evidence, Proof, Classification and Occurrence</strong> are required.');
                    return;
                }

                findings.push({
                    questionNumber: i,
                    question: row.querySelector('td:nth-child(2)').textContent,
                    answer: 'no',
                    evidence: evidence,
                    proof: proofFile ? proofFile.name : '',
                    classification: classification,
                    occurrence: occurrence,
                    actionCategory: ''
                });
            } else if(yesRadio && yesRadio.checked) {
                // Get the row containing this question
                const row = yesRadio.closest('tr');
                    
                // Get the evidence, proof and classification
                const evidence = row.querySelector('.evidence').value;
                const proofFile = row.querySelector('.proof').files[0];
                const classification = row.querySelector('.classification').value;

                // Validate required fields for "yes" answers
                if (!evidence || !proofFile || !classification) {
                    //alert(`For "Yes" answer to Question ${i}, Evidence, Proof, and Classification are required.`);
                    notification('info', 3500, `Question ${i}, Validation`, 'For "Yes", <strong>Evidence, Proof, and Classification</strong> are required.');
                    return;
                }

                findings.push({
                    questionNumber: i,
                    question: row.querySelector('td:nth-child(2)').textContent,
                    answer: 'yes',
                    evidence: evidence,
                    proof: proofFile ? proofFile.name : '',
                    classification: classification,
                    occurrence: null,
                    actionCategory: null
                });
            }
            else if(naRadio && naRadio.checked) {
                findings.push({
                    questionNumber: i,
                    question: '',
                    answer: 'n/a',
                    evidence: '',
                    proof: '',
                    classification: '',
                    occurrence: null,
                    actionCategory: null
                });
            }
        }

        return findings;
    }

    // $('#submit_btn').on('click', function () {
    //     // Count all finding_ radio buttons and checked ones
    //     const findingNames = Array.from(document.querySelectorAll('input[name^="finding_"]')).map(input => parseInt(input.name.split('_')[1]));
    //     const maxFindingNumber = Math.max(...findingNames); // Get the maximum finding number

    //     // Alert the counts
    //     alert(`Max finding number: ${maxFindingNumber}`);
    // });

    $('#submit_btn').on('click', function () {

        const auditee = $('select[name="auditee"]').val();
        const areaChoice = $('#choices-multiple').val();
        const typeOfAudit = $('select[name="category"]').val();
        const shift = $('select[name="shift"]').val();

        const findingNames = Array.from(document.querySelectorAll('input[name^="finding_"]')).map(input => parseInt(input.name.split('_')[1]));
        const maxFindingNumber = Math.max(...findingNames); // Get the maximum finding number
        // Alert the counts
        //alert(`Max finding number: ${maxFindingNumber}`);

        // Alternative: treat undefined as validation abort, then build FormData (including files) and submit
        const findings = getFindings(maxFindingNumber);

        // getNoFindings returns undefined on validation failure — stop quietly
        if (typeof findings === 'undefined') return;

        // Ensure we have a non-empty array
        // Ensure every question (1-30) has a selected radio
        const missing = [];
        for (let i = 1; i <= maxFindingNumber; i++) {
            const radios = document.querySelectorAll(`input[name="finding_${i}"]`);
            if (!radios || radios.length === 0) continue; // skip if question row doesn't exist
            const checked = Array.from(radios).some(r => r.checked);
            if (!checked) missing.push(i);
        }
        // Validation for the other input box
        if ($division.val() == '' || auditee == null || areaChoice.length === 0 || typeOfAudit == null || shift == null ) {
            //alert('All fields are required. Please fill out division, auditee, areas/processes, category, and shift.');
            notification('info', 3500, 'Input Validation', 'All fields are required. Please fill out <strong>division, auditee, areas/processes, category, and shift</strong>.');
            return false;
        }
        // Validation for missing radio selections
        if (missing.length) {
            //alert('Please answer all questions. Missing selections for question number: ' + missing.join(', '));
            notification('info', 3500, 'Questions Validation', 'Please answer all questions. Missing selections for question number: <b>' + missing.join(', ') + '</b>');
            return false;
        }

        // Ensure we have at least one finding with required details
        if (!Array.isArray(findings) || findings.length === 0) {
            //alert('No findings found. Please answer all question with required details.');
            notification('error', 3500, 'Validation Error', 'No findings found. Please answer all question with required details.');
            return false;
        }

        // // Open the modal for summary confirmation
        // $('#summaryModal').modal('show');

        // Build FormData and attach findings + actual proof files from the DOM
        const fd = new FormData();
        fd.append('action', '_submit_form');
        fd.append('division', $division.val());
        fd.append('auditee', auditee);
        fd.append('areas', areaChoice.join(', '));
        fd.append('auditor', $('input[name="auditor"]').val());
        fd.append('category', typeOfAudit);
        fd.append('audit_date', $('input[name="audit_date"]').val());
        fd.append('shift', shift);
        // fd.append('findings', JSON.stringify(findings));

        findings.forEach(function (f) {
            if (!f || !f.questionNumber) return;
            // locate the row and file input for this question number
            const fileInput = document.querySelector(`input[name="finding_${f.questionNumber}"]`)?.closest('tr')?.querySelector('.proof');
            if (fileInput && fileInput.files && fileInput.files[0]) {
                fd.append(`proof_${f.questionNumber}`, fileInput.files[0]);
            }
        });

        //console.log('Findings:', findings);

        // Check if all findings have classification 'P'
        const allP = findings.every(f => f.answer === 'yes' || f.answer === 'n/a');

        if (allP) {
            fd.append('findings', JSON.stringify(findings));
            confirmationSubmission(fd);
            return;
        }

        // Show modal only if there are non-P classifications
        $('#summaryModal').modal('show');

        for (let i = 0; i < findings.length; i++) {
            const finding = findings[i];
            
            if (finding.answer === 'no') {
                $('#summaryTableBody tbody').append(`
                    <tr>
                        <td>${finding.questionNumber}</td>
                        <td>${finding.evidence}</td>
                        <td>${finding.classification}</td>
                        <td>
                            <select class="form-select rounded-2 actionCategory" name="actionCat_${finding.questionNumber}" required>
                                <option selected disabled>Select Action Category</option>
                                <option value="For Improvement">For Improvement</option>
                                <option value="Documentation">Documentation</option>
                                <option value="Long-Term Improvement">Long-Term Improvement</option>
                                <option value="Immediate Improvement">Immediate Improvement</option>
                            </select>
                        </td>
                    </tr>
                `);
            }
        }

        // Update actionCategory in findings when select changes
        $(document).on('change', '.actionCategory', function() {
            const questionNumber = parseInt($(this).attr('name').split('_')[1]);
            const selectedValue = $(this).val();
            
            const finding = findings.find(f => f.questionNumber === questionNumber);
            if (finding) {
                finding.actionCategory = selectedValue;
            }

            fd.append('findings', JSON.stringify(findings));

            $('.proceed_btn').data('theFinding', fd);

            // console.log('------------------------------------------------------------------------------------------------------------');
            // console.log('Findings:', findings);
        });
        
    });

    $('.close_btn').on('click', function () {
        // Clear the summary table body when modal is closed
        $('#summaryTableBody tbody').empty();
    });

    $('.proceed_btn').on('click', function () {
        const findingsData = $(this).data('theFinding');
        //console.log('Proceeding with findings data:', findingsData);

        // Ensure all actionCategory selects have a value
        const missingActionCats = [];
        $('.actionCategory').each(function () {
            const val = $(this).val();
            if (val === null || val === '' || typeof val === 'undefined') {
                const qNum = ($(this).attr('name') || '').split('_')[1] || '?';
                missingActionCats.push(qNum);
            }
        });

        if (missingActionCats.length > 0) {
            //alert('Please select Action Category for question(s): ' + missingActionCats.join(', '));
            notification('info', 3500, 'Action Category Validation', 'Please select <strong>Action Category</strong> for question(s): <b>' + missingActionCats.join(', ') + '</b>');
            return;
        }

        $('#summaryModal').modal('hide');

        confirmationSubmission(findingsData);
    });

});

function confirmationSubmission(allFindingsData) {
    swal.fire({
        title: 'Confirm Submission',
        text: 'Are you sure you want to submit the findings?',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Yes, submit',
        cancelButtonText: 'Cancel',
    }).then((result) => {
        if (result.isConfirmed) {
            executeInsertion(allFindingsData);
        } else {
            $('#summaryTableBody tbody').empty();
        }
    });
}

function executeInsertion(dataForm) {
    const loadingAlert = Swal.fire({
        title: 'Processing',
        html: `
            <div id="swal-status" aria-live="polite">Initializing…</div>
        `,
        timerProgressBar: true,
        background: '#0f172a',  // dark slate
        color: '#e5e7eb',       // light text
        // Page overlay behind the modal
        backdrop: 'rgba(0,0,0,0.6)',
        didOpen: () => {
            Swal.showLoading(); // Show the loading spinner
            const steps = [
                'Initializing…',
                'Validating data…',
                'Inserting records…',
                'Crunching numbers…',
                'Almost there…',
                'Finalizing submission…'
            ];
            const statusEl = Swal.getHtmlContainer().querySelector('#swal-status');
            let i = 0;
            const interval = setInterval(() => {
                statusEl.textContent = steps[i % steps.length];
                i++;
            }, 1200);
            // Keep a reference to clear later
            Swal._statusInterval = interval;
        },
        allowOutsideClick: false, // Prevent closing SweetAlert outside the modal
        showConfirmButton: false, // Hide confirm button
        allowEscapeKey: false,
        scrollbarPadding: false,
        heightAuto: false
    });

    // Submit via AJAX (FormData ensures files are uploaded)
    $.ajax({
        url: '../../../assets/backend/core.php',
        method: 'POST',
        data: dataForm,
        processData: false,
        contentType: false,
        success: function (response) {
            const d = JSON.parse(response);
            if (d.status === 'success') {
                //notification('success', 3500, 'Success', d.message);
                jsConfetti.addConfetti();
                Swal.fire({
                    position: "top-center",
                    icon: false,
                    title: '',
                    html: `
                        <div style="text-align: center;">
                            <div style="width: 100px; height: 100px; margin: 0 auto 20px; background: linear-gradient(45deg, #22c55e, #10b981); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 48px; color: white; box-shadow: 0 10px 30px rgba(34, 197, 94, 0.3);">
                                ✓
                            </div>
                            <h3 style="color: #059669; margin: 10px 0;">Success!</h3>
                            <p style="color: #6b7280;">${d.message}!</p>
                            <div style="margin-top: 20px; font-size: 18px; color: #9ca3af;">
                                The Control Code is: <strong>${d.unique_code}</strong>
                            </div>
                        </div>
                    `,
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                    background: '#f5f5f5ff',
                    color: '#059669',
                    width: '400px',
                    padding: '30px',
                    backdrop: 'rgba(34, 197, 94, 0.04)',
                    showClass: {
                        popup: 'animate__animated animate__flipInX'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__backOutUp'
                    },
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                }).then(() => {
                    window.location.href = '../../monitoring/checklist/index.php';
                });
            } else {
                alert(d.message);
            }
        },
        complete: function(){
            // when complete close the sweet alert
            loadingAlert.close();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.error('Submit error:', textStatus, errorThrown);
            alert('Failed to submit findings.');
        }
    });
}

function notification(icon, duration, title, text) {
    // Dynamic Bootstrap alert based on icon type
    const getBootstrapAlertClass = (icon) => {
        const alertClasses = {
            'success': '#38b308ff',
            'error': '#e44a4aff', 
            'warning': '#d3d606ff',
            'info': '#00b1b8ff'
        };
        return alertClasses[icon] || 'alert alert-secondary';
    };

    // Show your SweetAlert2 success toast here
    const Toast = Swal.mixin({
        toast: true,
        position: "top",
        showConfirmButton: false,
        timer: duration,
        timerProgressBar: true,
        width: '500px',
        //backdrop: 'rgba(0, 0, 0, 0.14)',
        allowOutsideClick: false,
        allowEscapeKey: false,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;  
        }
    });

    Toast.fire({
        icon: icon,
        title: title,
        html: text,
        background: getBootstrapAlertClass(icon),
        color: '#ffffff',
        iconColor: '#ffffff'
    });
}

