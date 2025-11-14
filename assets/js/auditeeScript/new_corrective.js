
$(document).ready(function () {
    
    if ($.fn.DataTable.isDataTable('#newCorrectiveTable')) {
        $('#newCorrectiveTable').DataTable().clear().destroy();
    }

    var newCorrectiveTable = $('#newCorrectiveTable').DataTable({
        processing: true,
        serverSide: false,
        ajax: {
            url: '../../../assets/backend/core.php',
            type: 'POST',
            data: {
                action: '_load_new_corrective_on_division',
                division: $('#log_division').val(),
                status: 'For Comply'
            },
            dataSrc: ''
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1; // Auto-increment row number
                }
            },
            { data: 'modelProcessArea' },
            { data: 'AuditResult' },
            // { 
            //     data: null,
            //     render: function (rowData) {
            //         return `<a type="button" class="text-decoration-underline text-primary" data-fileId="${rowData.fileID}">${rowData.fileName}</a>`;
            //     }
            // },
            { data: 'classification' },
            { data: 'dateAudited' },
            { data: 'targetDate' }
        ],
        order: [[0, 'asc']],
        responsive: true,
        lengthChange: true,
        pageLength: 10,
        autoWidth: false,
        info: true,
        dom: 'B<"d-flex justify-content-between pt-3 pb-2"<l>f>rt<"d-flex justify-content-between align-items-center mt-2"ip>',
        buttons: [
            {
                extend: 'copy',
                title: 'Fujifilm Optics Philippines Inc. - Corrective Action Report (CAR) Log Sheet',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'csv',
                title: 'Fujifilm Optics Philippines Inc. - Corrective Action Report (CAR) Log Sheet',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'excel',
                title: 'Fujifilm Optics Philippines Inc. - Corrective Action Report (CAR) Log Sheet',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                title: 'Fujifilm Optics Philippines Inc. - Corrective Action Report (CAR) Log Sheet',
                orientation: 'portrait',
                pageSize: 'A4',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'print',
                title: 'Fujifilm Optics Philippines Inc. - Corrective Action Report (CAR) Log Sheet',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'colvis',
                columnText: function (dt, idx, title) {
                    return idx + 1 + '. ' + title;
                }
            }
        ]
    });

    newCorrectiveTable.buttons().container().appendTo('#newCorrectiveTable_wrapper .col-md-6:eq(0)');

    $('#newCorrectiveTable tbody tr').css('cursor', 'pointer');

    // Add scaling effect on hover
    $('#newCorrectiveTable tbody').on('mouseenter', 'tr', function () {
        $(this).addClass('table-active scale-row');
    });

    $('#newCorrectiveTable tbody').on('mouseleave', 'tr', function () {
        $(this).removeClass('table-active scale-row');
    });

    // Row click handler (except Action button)
    $('#newCorrectiveTable tbody').on('click', 'tr', function (e) {
        if ($(e.target).closest('button').length) return;
        //if ($(e.target).closest('a[data-fileId]').length) return;

        const monitoringID = newCorrectiveTable.row(this).data().id;
        const controlCode = newCorrectiveTable.row(this).data().uniqueCode;
        const classification = newCorrectiveTable.row(this).data().classification;
        const auditDate = newCorrectiveTable.row(this).data().dateAudited;
        const dateTarget = newCorrectiveTable.row(this).data().targetDate;
        const modelProcessArea = newCorrectiveTable.row(this).data().modelProcessArea;
        const auditResult = newCorrectiveTable.row(this).data().AuditResult;
        const fileID = newCorrectiveTable.row(this).data().fileID;
        const fileName = newCorrectiveTable.row(this).data().fileName;
        //////////////////////////////////////////
        // const mpa = $(this).find('td').eq(1).text().trim();
        // const auditResult = $(this).find('td').eq(2).text().trim();

        if (monitoringID) {
            $('#conCode').text(controlCode);

            const classificationMap = {
                'OFI': 'Opportunity for Improvement',
                'MinNC': 'Minor Non-Conformance',
                'MajNC': 'Major Non-Conformance',
                'P': 'Positive Aspect'
            };
            $('#classification').text(classificationMap[classification]);

            $('#date_audit').text(auditDate);
            $('#date_target').text(dateTarget);

            const badgesHtml = modelProcessArea.split(',').map(item => `<span class="badge rounded-pill bg-primary text-white fw-bold me-1 mb-1">${item.trim()}</span>`).join('');
            $('#mpa').html(badgesHtml);

            $('#audit_result').text(auditResult);
            $('#file_name').text(fileName);
            // Set the fileID to the submit butoon
            $('#correction_submit_btn').data('fileId', monitoringID);

            $('#submissionModal').modal('show');

            // Set the download link with the fileID
            $('#submissionModal a.open_file_btn').attr('href', `../../../assets/backend/download_file.php?id=${fileID}`).attr('target', '_blank');
        }

        // const carNo = $(this).find('td').eq(1).text().trim();
        // if (carNo) {
        //     Swal.fire({
        //     title: 'CAR No: ' + monitoringID + ' - ' + controlCode,
        //     text: 'You clicked row with CAR No: ' + carNo,
        //     icon: 'info'
        //     });
        // }

    });

    // Add CSS for scaling effect
    $('<style>')
    .prop('type', 'text/css')
    .html('.scale-row { transition: transform 0.2s cubic-bezier(.4,0,.2,1); transform: scale(1.03); z-index: 2; position: relative; }')
    .appendTo('head');

    // $(document).on('click', 'a[data-fileId]', function () {
    //     // e.preventDefault();
    //     // e.stopPropagation(); // prevent the row click handler from also running
    //     const fileId = $(this).attr('data-fileId'); // use .attr() because your attribute is data-fileId
    //     //alert('Open file with ID: ' + fileId);

    //     window.open(`../../../assets/backend/download_file.php?id=${fileId}`, '_blank');
    // });

    $(document).on('click', '#correction_submit_btn', function () {
        const monitoringID = $(this).data('fileId');
        
        if ($('#rootCause').val().trim() === '' || $('#actionPlan').val().trim() === '' || $('#evidenceFile')[0].files.length === 0) {
            notification(
                'error', 
                3000, 
                'Incomplete Data', 
                'Please fill out all required fields and attach the evidence file before submitting.'
            );
            return;
        }

        const formData = new FormData();
        formData.append('action', '_submit_correction_action');
        formData.append('monitoringID', monitoringID);
        formData.append('rootCause', $('#rootCause').val().trim());
        formData.append('actionPlan', $('#actionPlan').val().trim());
        formData.append('evidenceFile', $('#evidenceFile')[0].files[0]);

        visibilityModal();

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
            heightAuto: false,
            customClass: {
                popup: 'swal-on-top',      // add this
                container: 'swal-container-on-top' // add this
            }
        });

        $.ajax({
            url: '../../../assets/backend/core.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                const res = JSON.parse(response);
                if (res.status === 'success') {
                    swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        html: '<div style="font-size: 16px; line-height: 1.5;">✅ Your corrective action has been successfully submitted.</div>',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        padding: '25px',
                        background: '#f8f9fa',
                        backdrop: 'rgba(0, 0, 0, 0.5)',
                        showClass: {
                            popup: 'animate__animated animate__zoomIn'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__zoomOut'
                        },
                        customClass: {
                            popup: 'swal-on-top',
                            container: 'swal-container-on-top',
                            title: 'swal-title',
                            htmlContainer: 'swal-text'
                        }
                    }).then(() => {
                        $('#rootCause').val('');
                        $('#actionPlan').val('');
                        $('#evidenceFile').val('');
                        $('#submissionModal').modal('hide');
                        newCorrectiveTable.ajax.reload(null, false);
                    });
                }
            },
            complete: function(){
                // when complete close the sweet alert
                loadingAlert.close();
            },
            error: function (xhr, status, error) {
                alert('Error submitting correction action:', error);
            }
        });
    });

});

function visibilityModal() {
    const style = document.createElement('style');
    style.innerHTML = `
        .swal-container-on-top {
            z-index: 10000 !important;
        }
        .swal-on-top {
            z-index: 10001 !important;
        }
    `;
    document.head.appendChild(style);
}

function notification(icon, duration, title, text) {
    
    visibilityModal();
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
        customClass: {
            popup: 'swal-on-top',      // add this
            container: 'swal-container-on-top' // add this
        },
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