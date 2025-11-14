<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Audit MS </title>

    <link rel="shortcut icon" href="assets/img/tab_icon.png" />
    
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/plugins/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/plugins/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/design.css" />
    <link rel="stylesheet" href="assets/css/plugins/sweetalert2.css" />

</head>
<body>
    
    <!-- [ Pre-loader ] start -->
    <div class="loader-spinner-bg">
        <div class="spinner"></div>
        <div class="loader-text">Loading...</div>
    </div>
    <!-- [ Pre-loader ] End -->

    <section class="signin-section min-vh-100 d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-11 col-lg-9">
                    <div class="row g-0 shadow-lg rounded-4 overflow-hidden">
                        <!-- Welcome Panel with Glass Effect -->
                        <div class="col-lg-6 position-relative" 
                            style="background: linear-gradient(45deg, #0a57caea 0%, #0d6efd 100%);">
                            <div class="d-flex flex-column justify-content-center p-5 h-100 text-center">
                                <h1 class="text-white fw-bold mb-3">Welcome!</h1>
                                <p class="text-white-50 mb-4 lead">Access your Audit Management System</p>
                                <img src="assets/img/QA_Icon.png" alt="Quality Assurance Logo" 
                                    class="img-fluid mx-auto" style="max-width: 250px;">
                            </div>
                        </div>                    
                        <!-- Sign-In Form with Modern Design -->
                        <div class="col-lg-6 bg-white">
                            <div class="p-4 p-lg-5">
                                <div class="text-center mb-4">
                                    <h3 class="fw-bold">LOG IN</h3>
                                    <p class="text-muted">Enter your credentials to continue</p>
                                </div>
                                
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="number" class="form-control" id="txtEid" placeholder="Enter your Employee ID">
                                            <label for="txtEid">Employee ID</label>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-floating position-relative">
                                            <input type="password" class="form-control pe-5" id="txtPassword" placeholder="Enter your Password">
                                            <label for="txtPassword">Password</label>
                                            <button type="button" class="btn btn-link position-absolute top-50 end-0 translate-middle-y me-3 p-0" onclick="togglePassword()" aria-label="Toggle password visibility">
                                                <i id="togglePasswordIcon" class="mdi mdi-eye-outline" style="font-size:1.25rem; color:#6c757d;"></i>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#passwordContactModal" class="text-primary text-decoration-none">Forgot Password?</a>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold rounded-3 auth-btn d-flex align-items-center justify-content-center">
                                            <i class="mdi mdi-login me-2" style="font-size: 1.5rem;"></i>
                                            Log In
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- [ Modal Information ] start -->
    <div class="modal fade" id="passwordContactModal" tabindex="-1" aria-labelledby="passwordContactModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-light fw-bold d-flex align-items-center justify-content-center" id="passwordContactModalLabel">
                        <i class="mdi mdi-information-outline me-2" style="font-size: 1.4rem;"></i>
                        Password Change Policy
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <p class="lead">
                        For security and system synchronization, all **password changes** must be processed by the IT Department.
                    </p>
                    <br>
                    <p>
                        Kindly contact the Help Desk below, and they will assist you with securely resetting your password.
                    </p>

                    <h6 class="mt-4 text-primary">IT Help Desk Contact:</h6>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <i class="bi bi-telephone-fill me-2"></i>
                            **Telephone:** IT-HELP (155) or IT-TECHNICAL (154)
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-envelope-fill me-2"></i>
                            **Email:** <a href="mailto:royvincent.paring@007.fujifilm.com">royvincent.paring@007.fujifilm.com</a>
                        </li>
                    </ul>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="mailto:royvincent.paring@007.fujifilm.com" class="btn btn-primary">Email IT Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Modal Information ] end -->

    <!-- JQuery JS -->
    <script src="assets/js/plugins/jquery-3.7.1.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="assets/js/plugins/sweetalert2.all.js"></script>
    <script src="assets/js/login.js"></script>

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

        function togglePassword() {
            const passwordInput = document.getElementById('txtPassword');
            const icon = document.getElementById('togglePasswordIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('mdi-eye-outline');
                icon.classList.add('mdi-eye-off-outline');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('mdi-eye-off-outline');
                icon.classList.add('mdi-eye-outline');
            }
        }
    </script>

  </body>
</html>
