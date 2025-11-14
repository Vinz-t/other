$(document).ready(function () {
    
    // For Logout
    $('#logout_btn').on('click', function () {
        var eid = $(this).data('id');

        Swal.fire({
            title: 'Are you sure you want to log out?',
            text: "You will be redirected to the login page.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, log me out!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.post('../../../assets/backend/core.php', {
                    action: '_Logout',
                    eid: eid
                }, function (response) {
                    //alert(response);
                    if (response.trim() === 'success') { // not getting the real value of the response
                        notification('success', 'Logged Out!', 'You have been successfully logged out.');
                    } else {
                        notification('success', 'Failed', 'Error Found.');
                    }
                });
            }
        });
    });

    function notification(icon, title, text) {
        Swal.fire({
            position: "top-center",
            icon: icon,
            title: title,
            text: text,
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
        }).then(() => {
            window.location.href = '../../../';
        });
    }

});