$(document).ready(function () {
    
    // For Log-In using Button Click
    $('.auth-btn').on('click', function () {
        validateFields();
    });

    // For Log-In using Enter Key
    $('#txtPassword').on('keypress', function (e) {
        if (e.which === 13) { // Enter key pressed
            validateFields();
        }
    });

    function validateFields() {
        const eid = $('#txtEid').val();
        const password = $('#txtPassword').val();

        if (eid === '' || password === '') {
            notification('Please fill in all fields.', 'warning');
            clearFields();
            return false;
        }

        // const loadingAlert = Swal.fire({
        //     text: 'Processing, please wait...',
        //     timerProgressBar: true,
        //     allowOutsideClick: false, // Prevent closing SweetAlert outside the modal
        //     showConfirmButton: false, // Hide confirm button
        //     width: '300px', // Set specific width
        //     heightAuto: false,  // Disable auto height
        //     padding: '10px',
        //     didOpen: () => {
        //         Swal.showLoading(); // Show the loading spinner
        //         // Modify height after modal opens
        //         const popup = Swal.getPopup();
        //         popup.style.height = '150px';
        //         popup.style.minHeight = 'unset';
        //     }
        // });

        authenticateUser(eid, password);
    }

    function authenticateUser(id, pswd) {
        let formData = new FormData();
        formData.append('action', '_login');
        formData.append('eid', id);
        formData.append('password', pswd);

        $.ajax({
            type: "POST",
            url: "assets/backend/core.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                const data = JSON.parse(response);
                if (data.status === 'success') {
                    //notification('Login Successful! Redirecting...', 'success');
                    window.location.href = data.destination;
                } else if (data.status === 'invalid') {
                    notification(data.message, 'error');
                    clearFields();
                } else {
                    notification(data.message, 'error');
                    clearFields();
                }
            },
            // complete: function() {
            //     loadingPrompt.close(); // Close the loading prompt
            // },
            error: function (xhr, status, error) {
                console.error("AJAX Error: ", status, error);
                notification('An error occurred. Please try again.', 'error');
            }
        });
    }

    function notification(message, type) {
        const background = {
            success: '#6ed446ff',
            warning: '#e6d434ff',
            error: '#d9534f'
        }[type];

        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: type,
            title: message,   
            background: background, 
            color: '#fff',  
            iconColor: '#fff'
        });
    }

    function clearFields() {
        $('#txtEid').val('').focus();
        $('#txtPassword').val('');
    }

});