$(document).ready(function () {
    // Initialize DataTable
    if ($.fn.DataTable.isDataTable('#monitoringChecklistTable')) {
        $('#monitoringChecklistTable').DataTable().clear().destroy();
    }

    var monitoringChecklistTable = $('#monitoringChecklistTable').DataTable({
        processing: true,
        serverSide: false,
        ajax: {
            url: '../../../assets/backend/core.php',
            type: 'POST',
            data: {
                action: '_load_monitoring_checklist',
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
            { data: 'uniqueCode' },
            { data: 'division' },
            { data: 'auditee' },
            { data: 'auditor' },
            { 
                data: null,
                render: function (rowData) {
                    if (rowData.category === 'Patrol Audit' || rowData.category === 'Quality Issue') {
                        return `Normal Audit, <span class="badge rounded-pill bg-info fw-bold text-light">${rowData.category}</span>`;
                    } else {
                        return rowData.category;
                    }
                } 
            },
            { data: 'dateAudited' },
            { data: 'submittedAt' },
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
                                    <a type="button" id="info_btn" class="dropdown-item d-flex align-items-center gap-2" data-unicode="${rowData.uniqueCode}">
                                        <i class="mdi mdi-information-outline"></i>
                                        <span>View Information</span>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a type="button" id="open_delete_modal" class="dropdown-item d-flex align-items-center gap-2 text-warning" data-unicode="${rowData.uniqueCode}">
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

    $.fn.dataTable.ext.search.push(function(settings, data) {
        // only apply this filter to the approved-table
        if (settings.nTable.id !== 'monitoringChecklistTable') return true;

        var min = $('#min-date').val(); // format YYYY-MM-DD
        var max = $('#max-date').val();

        // var min = new Date($('#min-date').val()).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }); // format YYYY-MM-DD
        // var max = new Date($('#max-date').val()).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
        var dateStr = data[6]; // Date Submitted value from the row

        // if no filter supplied, show all
        if (!min && !max) return true;

        var rowDate = parseRowDate(dateStr);
        if (!rowDate) return false;

        if (min) {
            var minDate = new Date(min);
            minDate.setHours(0,0,0,0);
            if (rowDate.getTime() < minDate.getTime()) return false;
        }
        if (max) {
            var maxDate = new Date(max);
            maxDate.setHours(23,59,59,999);
            if (rowDate.getTime() > maxDate.getTime()) return false;
        }

        return true;
    });

    function parseRowDate(dateStr) {
        if (!dateStr) return null;
        dateStr = String(dateStr).trim();

        // Extract date part before " - NS" or " - DS" or any " - "
        var dashIndex = dateStr.indexOf(' - ');
        if (dashIndex > -1) {
            dateStr = dateStr.substring(0, dashIndex).trim();
        }

        // If it's already ISO-like (YYYY-MM-DD or with time) -> use directly
        var isoMatch = dateStr.match(/^\d{4}-\d{2}-\d{2}/);
        if (isoMatch) {
            var d = new Date(dateStr);
            return isNaN(d) ? null : d;
        }

        // Try JS Date parsing for formats like "February 3, 2025" or "Mar 3 2025"
        var d2 = new Date(dateStr);
        if (!isNaN(d2)) return d2;
        // Try dd/mm/yyyy or dd-mm-yyyy or mm/dd/yyyy detection (fallback)

        var parts = dateStr.match(/(\d{1,2})[\/\-](\d{1,2})[\/\-](\d{4})/);
        if (parts) {
            // assume parts[1]=day, parts[2]=month, parts[3]=year (common)
            var day = parts[1].padStart(2, '0');
            var month = parts[2].padStart(2, '0');
            var year = parts[3];
            var constructed = year + '-' + month + '-' + day;
            var d3 = new Date(constructed);
            return isNaN(d3) ? null : d3;
        }

        return null;
    }

    $('#filter_btn').on('click', function() {
        var min = $('#min-date').val();
        var max = $('#max-date').val();

        min = min ? min.trim() : '';
        max = max ? max.trim() : '';

        if (!min || !max) {
            notification('error', 3000, 'Incomplete Filter!', 'Please select both Start Date and End Date to apply date range filter.');
            return;
        }

        if (min && max && new Date(min) > new Date(max)) {
            notification('error', 3000, 'Invalid Date Range!', 'The Start Date cannot be later than the End Date. Please correct the date range and try again.');
            clearFields();
            return;
        }

        notification('info', 2800, 'Filters Applied.', 'The monitoring checklist is being filtered based on your selections.');

        monitoringChecklistTable.draw();
    });

    $('#clear_btn').on('click', function () {
        clearFields();
        monitoringChecklistTable.draw();
    });

    function clearFields() {
        $('#min-date').val('');
        $('#max-date').val('');
    }

    monitoringChecklistTable.buttons().container().appendTo('#monitoringChecklistTable_wrapper .col-md-6:eq(0)');

    //button to open info modal
    $(document).on('click', '#info_btn', function () {
        const uniqueCode = $(this).data('unicode');
        //$('#view_checklist_btn').data('uni_code', uniqueCode);
        //$('#control_code').text(uniqueCode);

        const findingNames = Array.from(document.querySelectorAll('input[name^="finding_"]')).map(input => parseInt(input.name.split('_')[1]));
        const maxFindingNumber = Math.max(...findingNames);

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
                    'Fetching records…',
                    'Crunching numbers…',
                    'Almost there…'
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

        var formData = new FormData();
        formData.append('action', '_get_monitoring_info_checklist');
        formData.append('uniqueCode', uniqueCode);

        $.ajax({
            url: '../../../assets/backend/core.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // console.log(response);
                // Schedule & Area/Process
                $('#audit_date_shift').text(response.dateAudited.replace("DS", "DAY SHIFT").replace("NS", "NIGHT SHIFT"));
                let count = 0;
                $('#audit_area_process').html(response.areaProcess.replace(/,/g, () => ++count % 3 === 0 ? ',<br>' : ', '));

                // Personnel
                $('#auditor').text(response.auditor);
                $('#auditee').text(response.auditee);
                $('#submitted_at').text(response.submittedAt);

                // Information
                $('#control_code').text(response.uniqueCode);
                $('#division').text(response.division);
                $('#audit_type').text(response.category);

                // Table Data
                if (response.result === null) {
                    $('#possible_data').text('0 / 30 Items');

                    for (let index = 1; index <= maxFindingNumber; index++) {
                        $(`input[name="finding_${index}"][value="na"]`).prop('checked', true);
                    }
                } else {

                    $('#possible_data').text(response.uploads.length + ' / 30 Items');
                    
                    for (let index = 0; index < response.uploads.length; index++) {
                        var q_number = response.uploads[index].questionNumber;
                        
                        $(`input[name="finding_${q_number}"][value="${response.uploads[index].answer}"]`).prop('checked', true);

                        $(`#file_id_${q_number}`).val(response.uploads[index].fileID);
                        $('.proof_' + q_number).html('File: ' + response.uploads[index].fileName);

                        $(`.evidence_${q_number}`).val(response.uploads[index].result);
                        $(`.classification_${q_number}`).text(response.uploads[index].classification);
                        $(`.occurrence_${q_number}`).text(response.uploads[index].occurrence);
                    }

                    for (let index = 1; index <= maxFindingNumber; index++) {
                        if (!$(`input[name="finding_${index}"]`).is(':checked')) {
                            $(`input[name="finding_${index}"][value="na"]`).prop('checked', true);
                        }
                    }
                }
            },
            complete: function() {
                loadingAlert.close();
                // if (Swal._statusInterval) clearInterval(Swal._statusInterval);
                // document.body.style.paddingRight = '';
                // document.documentElement.style.paddingRight = '';
                $('#viewChecklistModal').modal('show');
            },
            error: function() {
                alert('Error fetching monitoring info.');
            }
        });
        //$('#viewChecklistModal').modal('show');
    });

    $('#viewChecklistModal').on('hidden.bs.modal', function () {
        // Clear all selections and inputs in the modal
        for (let index = 1; index <= 30; index++) {
            $(`input[name="finding_${index}"]`).prop('checked', false);
            $(`.evidence_${index}`).val('');
            $('.proof_' + index).html('');
            $(`.classification_${index}`).text('');
            $(`.occurrence_${index}`).text('');
        }
    });

    $(document).on('click', '#open_delete_modal', function () {
        const uniqueCode = $(this).data('unicode');
        $('#delete_checklist_btn').data('uni_code', uniqueCode);

        $('#deleteChecklistModal').modal('show');
    });
    // button for deleting entire checklist
    $('#delete_checklist_btn').on('click', function () {
        const uniqueCode = $(this).data('uni_code');
        // alert(uniqueCode);
        
        $.post('../../../assets/backend/core.php',{
            action: '_delete_monitoring',
            uniqueCode: uniqueCode,
            trigger: 'checklist_data'
        }, function (response) { 
            if (response.trim() === 'success') {
                $('#deleteChecklistModal').modal('hide');
                notification('success', 3000, 'DELETED!', 'The Checklist has been successfully deleted.');
                monitoringChecklistTable.ajax.reload(null, false);
            } else {
                notification('error', 4000, 'Error!', 'There was an error deleting the checklist: ' + response);
            }
        });
    });

    $(document).on('click', '.open_file_btn', function () {
        const fileID = $(this).data('id');
        const id = $('#file_id_' + fileID).val();

        // alert('File ID: ' + file);

        if (!id) {
            alert('No file available for download.');
            return;
        }

        window.open("../../../assets/backend/download_file.php?id=" + id, "_blank");
    });

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
        // .then(() => {
        //     if (icon === 'success') {
        //         monitoringChecklistTable.ajax.reload(null, false);
        //     }
        // });
    }
});
