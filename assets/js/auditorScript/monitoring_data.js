$(document).ready(function () {

    // Initialize DataTable
    if ($.fn.DataTable.isDataTable('#monitoringDataTable')) {
        $('#monitoringDataTable').DataTable().clear().destroy();
    }

    var triggerFilter = 'default';

    function getFilterData() {
        return {
            action: '_load_monitoring_data',
            trigger: triggerFilter,
            start_date: new Date($('#min-date').val()).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }),
            end_date: new Date($('#max-date').val()).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }),
            audit_category: $('#audit-category').val(),
            division: $('#auditee-division').val()
        };
    }

    var monitoringDataTable = $('#monitoringDataTable').DataTable({
        processing: true,
        serverSide: false,
        ajax: {
            url: '../../../assets/backend/core.php',
            type: 'POST',
            data: getFilterData,
            dataSrc: ''
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1; // Auto-increment row number
                }
            },
            { data: 'typeAudit' },
            { data: 'modelProcessArea' },
            { data: 'resultEvidence' },
            { data: 'classification' },
            { 
                data: null,
                render: function (rowData) { 
                    return `<span class="badge rounded-pill bg-${rowData.status === 'Open' ? 'danger' : 'success'} fw-bold">${rowData.status}</span>`;
                }
            },
            { data: 'dateAudited' },
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function (rowData) {   
                    return `
                        <div class="btn-group">
                            <button type="button"
                                    class="btn btn-sm btn-outline-primary dropdown-toggle-split rounded-circle ps-2"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    style="width:38px;height:38px;">
                                <i class="mdi mdi-dots-horizontal fs-5"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end shadow">
                                <li>
                                    <a type="button" id="info_btn" class="dropdown-item d-flex align-items-center gap-2" data-unicode="${rowData.uniqueCode}" data-qnumber="${rowData.questionNumber}">
                                        <i class="mdi mdi-information-outline"></i>
                                        <span>View Information</span>
                                    </a>
                                </li>
                                <li>
                                    <a type="button" id="add_findings_btn" class="dropdown-item d-flex align-items-center gap-2">
                                        <i class="mdi mdi-file-plus"></i>
                                        <span>Add Findings</span>
                                    </a>
                                </li>
                                <li>
                                    <a type="button" id="aedit_findings_btn" class="dropdown-item d-flex align-items-center gap-2" href="#">
                                        <i class="mdi mdi-square-edit-outline"></i>
                                        <span>Edit Findings</span>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a type="button" id="delete_btn" class="dropdown-item d-flex align-items-center gap-2 text-warning" data-unicode="${rowData.uniqueCode}" data-qnumber="${rowData.questionNumber}">
                                        <i class="mdi mdi-delete-empty-outline"></i>
                                        <span>Delete</span>
                                    </a>
                                </li>
                            </ul>
                        </div>`;
                }
            }
        ],
        order: [[0, 'asc']],
        responsive: true,
        lengthChange: true,
        pageLength: 10,
        autoWidth: false,
        columnDefs: [
            { targets: 2, width: '50%' },
            { targets: 3, width: '50%' }
        ],
        info: true,                 
        dom: 'B<"d-flex justify-content-between pt-3 pb-2"<l>f>rt<"d-flex justify-content-between align-items-center mt-2"ip>',
        buttons: [
            {
                extend: 'copy',
                //text: '<i class="mdi mdi-content-copy" style="font-size: 1.2rem;"></i>',
                title: 'Fujifilm Optics Philippines Inc. - Corrective Action Report (CAR) Log Sheet',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'csv',
                //text: '<i class="mdi mdi-file-delimited-outline" style="font-size: 1.3rem;"></i>',
                title: 'Fujifilm Optics Philippines Inc. - Corrective Action Report (CAR) Log Sheet',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'excel',
                //text: '<i class="mdi mdi-file-excel-outline" style="font-size: 1.3rem;"></i>',
                title: 'Fujifilm Optics Philippines Inc. - Corrective Action Report (CAR) Log Sheet',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'pdf',
                //text: '<i class="mdi mdi-file-pdf-box" style="font-size: 1.4rem;"></i>',
                title: 'Fujifilm Optics Philippines Inc. - Corrective Action Report (CAR) Log Sheet',
                orientation: 'portrait',
                pageSize: 'A4',
                exportOptions: {
                    columns: ':not(:last-child)'
                }
            },
            {
                extend: 'print',
                //text: '<i class="mdi mdi-printer" style="font-size: 1.4rem;"></i>',
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

    monitoringDataTable.buttons().container().appendTo('#monitoringDataTable_wrapper .col-md-6:eq(0)');

    $('#filter_btn').on('click', function() {

        var min = $('#min-date').val();
        var max = $('#max-date').val();

        function getAuditorNames() {
            $.post('../../../assets/backend/core.php', {
                action: '_load_auditor_names',
                division: $('#auditee-division').val()
            }, function (response) {
                if (response.trim() === '') {
                    $('#auditor_list').html('<span class="badge bg-danger">No auditors found for the selected division.</span>');
                    return;
                }
                $('#auditor_list').html(response);
            });
        }

        if (min && max && new Date(min) > new Date(max)) {
            notification('error', 3000, 'Invalid Date Range!', 'The Start Date cannot be later than the End Date. Please correct the date range and try again.');
            return;
        }

        if (!min || !max || !$('#audit-category').val() || !$('#auditee-division').val()) {
            notification('error', 3000, 'Incomplete Filter!', 'Please select the Start Date, End Date, Category, and Division to apply filters.');
            return;
        }

        notification('info', 3000, 'Filters Applied.', 'The monitoring data is being filtered based on your selections.');

        getAuditorNames();

        triggerFilter = 'apply_filter';
        getFilterData();
        
        monitoringDataTable.ajax.reload();
    });

    $('#clear_btn').on('click', function() {
        
        triggerFilter = 'default';
        getFilterData();

        $('#min-date').val('');
        $('#max-date').val('');
        $('#audit-category').prop('selectedIndex', 0);
        $('#auditee-division').prop('selectedIndex', 0);

        $('#auditor_list').html('<span class="badge bg-danger">Please complete the fields above before proceeding.</span>');
        
        monitoringDataTable.ajax.reload();
    });

    // $(document).on('click', '#info_btn', function () {
    //     const uniqueCode = $(this).data('unicode');
    //     const questionNumber = $(this).data('qnumber');

    //     //alert('Unique Code: ' + uniqueCode + '\nQuestion Number: ' + questionNumber);
    //     $('#viewDataModal').modal('show');
    // });

    $(document).on('click', '#info_btn', function () {
        const uniqueCode = $(this).data('unicode');
        const questionNumber = $(this).data('qnumber');

        //$('.cc').text(uniqueCode);

        const fd = new FormData();
        fd.append('action', '_get_monitoring_info_data');
        fd.append('uniqueCode', uniqueCode);
        fd.append('questionNumber', questionNumber);

        $.ajax({
            url: '../../../assets/backend/core.php',
            type: 'POST',
            data: fd,
            processData: false,
            contentType: false,
            success: function (response) {
                $('#approved_btn').data('fileID', response.fileID);
                $('#cc').text(response.uniqueCode);
                const statusBadge = `<span class="badge bg-${response.status === 'Open' ? 'danger' : 'success'} bg-opacity-20 text-light px-4 py-2 rounded-pill fw-bold fs-6"><i class="${response.status === 'Open' ? 'mdi mdi-clock-outline' : 'mdi mdi-check-circle'} me-2"></i>${response.status}</span>`;
                $('#audit_status').html(statusBadge);
                $('#division_data').text(response.division);
                // first part
                $('#audit_category').text(response.typeAudit);
                //let count = 0;
                // $('#audit_mpa').html(response.modelProcessArea.replace(/,/g, () => ++count % 2 === 0 ? ',<br>' : ', '));
                // Render each segment (split by comma) and turn subsegments (split by ' - ') into badges
                (function () {
                    const mpa = response.modelProcessArea || '';
                    const items = mpa.split(',').map(s => s.trim()).filter(Boolean);

                    // Group items into rows of 2 and render badges for each part (split by ' - ')
                    const rows = [];
                    let currentRow = [];

                    items.forEach(item => {
                        const parts = item.split(',').map(p => p.trim()).filter(Boolean);
                        const badges = parts.map((p, idx) => {
                            const colorClass = idx === 0 ? 'bg-primary' : 'bg-secondary';
                            return `<span class="badge rounded-pill ${colorClass} text-white fw-bold me-1 mb-1" style="font-size:13px;">${p}</span>`;
                        }).join(' ');
                        currentRow.push(badges);

                        if (currentRow.length === 2) {
                            rows.push(currentRow.join(' '));
                            currentRow = [];
                        }
                    });

                    if (currentRow.length) rows.push(currentRow.join(' '));

                    $('#audit_mpa').html(rows.join('<br>'));
                })();
                //$('#audit_mpa').text(response.modelProcessArea);
                // second part
                $('#relevant_result').text(response.resultEvidence);
                $('#upload_file_name').html(`<a id="view_file_btn" type="button" class="text-decoration-underline fw-bold" data-file_id="${response.fileID}">${response.fileName}</a>`);
                //thrid part
                // const statusBadge = `<span class="badge rounded-pill bg-${response.status === 'Open' ? 'danger' : 'success'} fw-bold">${response.status}</span>`;
                $('#incharge').text(response.incharge);

                const classificationMap = {
                    'MinNC': 'Minor Non-Conformity (MinNC)', // change to MinNC
                    'MajNC': 'Major Non-Conformity (MajNC)', // change to MajNC
                    'OFI': 'Opportunity for Improvement (OFI)',
                    'P': 'Positive Aspects (P)'
                };
                $('#audit_classification').text(classificationMap[response.classification] || 'Unknown Classification');

                ///////////////////////////////////////

                if (response.classification === 'P' && response.closureDate === null) { 
                    $('#action_category').html(`<i class="text-success">No Action Category - Positive Aspect</i>`);
                    $('#closure_date').html(`<i class="text-success">No Closed Date - Positive Aspect</i>`);
                } else {
                    $('#action_category').html(response.actionCategory);
                    $('#closure_date').html(response.closureDate || `<i class="text-danger">To Be Approved</i>`);
                }

                const auditDate = new Date(response.dateAudited);
                const todayDate = new Date(); // current date & time
                const currentDate = todayDate.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
                const timeDiff = Math.abs(todayDate - auditDate);
                const daysDiff = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
                const hoursDiff = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                //$('#duration_days').text(`${daysDiff} days (${hoursDiff} hours)`);
                if (currentDate >= response.targetDate && response.classification !== 'P' && response.actionCategory !== 'Long-Term Improvement') {
                    $('#duration_days').html(`${daysDiff} days (${hoursDiff} hours)`);
                    $('#other_text').text(' - Overdue, Please contact the person in charge.').addClass('text-danger fw-bold');
                } else {
                    if (response.classification === 'P') {
                        $('#duration_days').html(`<i class="text-success">No Duration - Positive Aspect</i>`);
                        $('#other_text').text('').removeClass('text-danger fw-bold');
                    } else {
                        $('#duration_days').html(`${daysDiff} days (${hoursDiff} hours)`);
                        $('#other_text').text('').removeClass('text-danger fw-bold');
                    }  
                }

                $('#audit_date_timeline').text(response.dateAudited);
                $('#target_close_date').html(response.targetDate || `<i>No Target Date</i>`);
            },
            error: function (xhr, status, error) {
                alert('An error occurred while fetching the monitoring information: ' + error);
            }
        });

        $('#viewDataModal').modal('show');
    });

    // buttons for deleting data
    $(document).on('click', '#delete_btn', function () { // deleting data one by one
        const uniqueCode = $(this).data('unicode');
        const questionNumber = $(this).data('qnumber');

        swal.fire({
            title: 'Confirm Record Deletion',
            // Using a wrapper DIV for overall background/shadow effect
            html: `
                <div style="
                    background-color: #e7f3fe; 
                    border: 1px solid #bce8f1; 
                    border-radius: 8px; 
                    padding: 15px; 
                    margin-bottom: 20px;
                    text-align: left;
                    font-family: Arial, sans-serif;
                ">
                    <p style="color: #004085; margin: 0;">
                        Are you sure you want to permanently remove this data?
                    </p>
                </div>

                <div style="text-align: left; margin-bottom: 15px;">
                    <strong style="color: #333; font-size: 14px;">
                        To proceed, you MUST type the confirmation word below:
                    </strong>
                </div>
            `,
            icon: 'question', // Changed from 'warning' to 'info' for a more procedural look
            input: 'text',
            inputPlaceholder: 'Type DELETE',
            inputAttributes: {
                autocapitalize: 'characters',
                autocorrect: 'off',
                style: 'font-size: 18px; padding: 12px; border: 2px solid #007bff; border-radius: 5px;' // Emphasize the input
            },
            showCancelButton: true,
            confirmButtonColor: '#007bff', // Blue confirmation color
            cancelButtonColor: '#6c757d',  // Gray cancel color
            confirmButtonText: '<span style="font-weight: bold;">Confirm Deletion</span>',
            cancelButtonText: '<span style="font-weight: bold;">Cancel Operation</span>',
            inputValidator: (value) => {
                if (!value) {
                    return 'Input cannot be empty.';
                }
                if (value.trim().toUpperCase() !== 'DELETE') {
                    return 'Confirmation failed. Please type  <strong style="color: red;">DELETE</strong>.';
                }
                return null;
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // ... (Your existing AJAX code remains the same)
                $.post('../../../assets/backend/core.php', {
                    action: '_delete_monitoring',
                    uniqueCode: uniqueCode,
                    questionNumber: questionNumber,
                    trigger: 'data_only'
                }, function (response) {
                    if (response.trim() === 'success') {
                        $('#deleteChecklistModal').modal('hide');
                        notification('success', 3300, 'Deleted!', 'The monitoring data has been successfully deleted.');
                        monitoringDataTable.ajax.reload(null, false);
                    } else {
                        notification('error', 4000, 'Error!', 'There was an error deleting the data: ' + response);
                    }
                });
            }
        });

        // swal.fire({
        //     title: 'Are you sure?',
        //     html: 'This action will delete the monitoring data.<br><strong>Type <code>DELETE</code> to confirm.</strong>',
        //     icon: 'warning',
        //     input: 'text',
        //     inputPlaceholder: 'Type DELETE to confirm',
        //     inputAttributes: {
        //     autocapitalize: 'characters',
        //     autocorrect: 'off'
        //     },
        //     showCancelButton: true,
        //     confirmButtonColor: '#d33',
        //     cancelButtonColor: '#3085d6',
        //     confirmButtonText: 'Yes, delete it!',
        //     cancelButtonText: 'Cancel',
        //     inputValidator: (value) => {
        //     if (!value) {
        //         return 'You need to type DELETE to confirm.';
        //     }
        //     if (value.trim().toUpperCase() !== 'DELETE') {
        //         return 'You must type DELETE to confirm deletion.';
        //     }
        //     return null;
        //     }
        // }).then((result) => {
        //     if (result.isConfirmed) {
        //         // Proceed with deletion
        //         $.post('../../../assets/backend/core.php',{
        //             action: '_delete_monitoring',
        //             uniqueCode: uniqueCode,
        //             questionNumber: questionNumber,
        //             trigger: 'data_only'
        //         }, function (response) {
        //             //alert(response);
        //             if (response.trim() === 'success') {
        //             $('#deleteChecklistModal').modal('hide');
        //             notification('success', 2000, 'Deleted!', 'The monitoring data has been successfully deleted.');
        //             } else {
        //             notification('error', 3000, 'Error!', 'There was an error deleting the data: ' + response);
        //             }
        //         });
        //     }
        // });
    });

    $(document).on('click', '#view_file_btn', function () {
        const fileID = $(this).data('file_id');
        window.open(`../../../assets/backend/download_file.php?id=${fileID}`, '_blank');
    });

    // $('#approved_btn').on('click', function () {
    //    const fileID = $(this).data('fileID');
    //    alert('File ID: ' + fileID);
    // });

    // button for deleting entire checklist
    // $('#delete_checklist_btn').on('click', function () {
    //     const uniqueCode = $('#controlCode').val();
        
    //     $.post('../../../assets/backend/core.php',{
    //         action: '_delete_monitoring_data',
    //         uniqueCode: uniqueCode,
    //         trigger: 'checklist_data'
    //     }, function (response) {
    //         //alert(response);  
    //         if (response.trim() === 'success') {
    //             $('#deleteChecklistModal').modal('hide');
    //             notification('success', 2000, 'Deleted!', 'The entire checklist has been successfully deleted.');
    //         } else {
    //             notification('error', 3000, 'Error!', 'There was an error deleting the checklist: ' + response);
    //         }
    //     });
    // });

    // $(document).on('click', '#checklist_btn', function () {
    //     notification('success', 3300, 'DELETED!', 'The monitoring data has been successfully deleted.');
    //     monitoringDataTable.ajax.reload(null, false);
    // });

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
            allowOutsideClick: false,
            allowEscapeKey: false
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

});

// swal.fire({ // add a input box here to confirm deletion
//             title: 'Are you sure?',
//             text: 'This action will delete the monitoring data.',  
//             icon: 'warning',
//             showCancelButton: true,
//             confirmButtonColor: '#d33',
//             cancelButtonColor: '#3085d6',
//             confirmButtonText: 'Yes, delete it!',
//             cancelButtonText: 'Cancel'
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 // Proceed with deletion
//                 $.post('../../../assets/backend/core.php',{
//                     action: '_delete_monitoring',
//                     uniqueCode: uniqueCode,
//                     questionNumber: questionNumber,
//                     trigger: 'data_only'
//                 }, function (response) {
//                     //alert(response);
//                     if (response.trim() === 'success') {
//                         $('#deleteChecklistModal').modal('hide');
//                         notification('success', 2000, 'Deleted!', 'The monitoring data has been successfully deleted.');
//                     } else {
//                         notification('error', 3000, 'Error!', 'There was an error deleting the data: ' + response);
//                     }
//                 });
//             }
//         });


        // dom: 'B<"d-flex justify-content-between align-items-center pt-3 pb-2"<l><".centerButton">f>rt<"d-flex justify-content-between align-items-center mt-2"ip>',
        // initComplete: function () {
        //     const $customBtn = $('<button/>')
        //         .text('Refresh Table')
        //         .addClass('btn btn-primary btn-sm');

        //     $customBtn.on('click', function (e) {
        //         e.preventDefault();
        //         alert('Custom button clicked!');
        //     });

        //     // Insert the button in the center
        //     $('.centerButton').append($customBtn);
        // }, 