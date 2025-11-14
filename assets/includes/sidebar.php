    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="../dashboard/index.php" class="b-brand text-primary">
                    <!-- ========   Change your logo from here   ============ -->
                    <img src="../../../assets/img/fujifilm_logo.png" alt="logo image" height="40" />
                </a>
            </div>
            <div class="navbar-content">
                <ul class="pc-navbar">
                    <li class="pc-item pc-caption">
                        <label>Navigations</label>
                    </li>
                    <li class="pc-item">
                        <a href="../../dashboard/content/index.php" class="pc-link d-flex align-items-center">
                            <span class="pc-micon d-flex align-items-center me-2"> <i class="mdi mdi-finance text-primary"></i></span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="pc-item pc-hasmenu for_auditee">
                        <a href="#!" class="pc-link d-flex align-items-center justify-content-between">
                            <span class="d-flex align-items-center">
                                <span class="pc-micon d-flex align-items-center me-3" style="width: 20px;">
                                    <i class="mdi mdi-progress-wrench text-primary"></i>
                                </span>
                                <span class="pc-mtext">Corrective Action</span>
                            </span>
                            <span class="pc-arrow">
                                <i data-feather="chevron-right"></i>
                            </span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item"><a class="pc-link" href="../../corrective_action/new/index.php">New</a></li>
                            <li class="pc-item"><a class="pc-link" href="../../corrective_action/pending/index.php">Pending</a></li>
                        </ul>
                    </li>
                    <li class="pc-item for_auditee">
                        <a href="../../approved_actions/content/index.php" class="pc-link d-flex align-items-center">
                            <span class="pc-micon d-flex align-items-center me-2"> <i class="mdi mdi-check-decagram text-primary"></i></span>
                            <span class="pc-mtext">Approved Actions</span>
                        </a>
                    </li>
                    <li class="pc-item pc-hasmenu for_auditor">
                        <a href="#!" class="pc-link d-flex align-items-center justify-content-between">
                            <span class="d-flex align-items-center">
                                <span class="pc-micon d-flex align-items-center me-3" style="width: 20px;">
                                    <i class="mdi mdi-format-list-bulleted-square text-primary"></i>
                                </span>
                                <span class="pc-mtext">Audit Lists</span>
                            </span>
                            <span class="pc-arrow">
                                <i data-feather="chevron-right"></i>
                            </span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item">
                                <a href="../../audit_plan/content/index.php" class="pc-link">Plan</a>
                            </li>
                            <li class="pc-item pc-hasmenu">
                                <a href="#!" class="pc-link">Findings Form<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                                <ul class="pc-submenu">
                                    <li class="pc-item"><a class="pc-link" href="../../findings_form/normal/index.php">Normal</a></li>
                                    <li class="pc-item"><a class="pc-link" href="#!">New Changes</a></li>
                                    <li class="pc-item"><a class="pc-link" href="#!">Other</a></li>
                                </ul>
                            </li>
                            <!-- <li class="pc-item pc-hasmenu">
                                <a href="#!" class="pc-link">Monitoring<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                                <ul class="pc-submenu">
                                    <li class="pc-item"><a class="pc-link" href="../../monitoring/data/index.php">Checklist Data</a></li>
                                    <li class="pc-item"><a class="pc-link" href="../../monitoring/checklist/index.php">Checklist</a></li>
                                </ul>
                            </li> -->
                        </ul>
                    </li>
                    <li class="pc-item pc-hasmenu for_auditor">
                        <a href="#!" class="pc-link d-flex align-items-center justify-content-between">
                            <span class="d-flex align-items-center">
                                <span class="pc-micon d-flex align-items-center me-3" style="width: 20px;">
                                    <i class="mdi mdi-monitor-dashboard text-primary"></i>
                                </span>
                                <span class="pc-mtext">Monitoring</span>
                            </span>
                            <span class="pc-arrow">
                                <i data-feather="chevron-right"></i>
                            </span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item"><a class="pc-link" href="../../monitoring/data/index.php">Checklist Data</a></li>
                            <li class="pc-item"><a class="pc-link" href="../../monitoring/checklist/index.php">Checklist</a></li>
                        </ul>
                    </li>
                    <!-- <li class="pc-item for_auditor">
                        <a href="../car_form/index.php" class="pc-link d-flex align-items-center">
                            <span class="pc-micon d-flex align-items-center me-2"> <i class="mdi mdi-clipboard-alert text-primary"></i></span>
                            <span class="pc-mtext">Corrective Action</span>
                        </a>
                    </li> -->
                    <!-- <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link">
                            <span class="pc-micon"> <i class="ph ph-tree-structure"></i> </span><span class="pc-mtext">Production Logsheet</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item">
                                <a type="button" class="pc-link add-tab-btn" data-tab="lx" data-icon="LX" data-label="LX">LX</a>
                            </li>
                            <li class="pc-item">
                                <a type="button" class="pc-link add-tab-btn" data-tab="lens" data-icon="LENS" data-label="LENS">LENS</a>
                            </li>
                            <li class="pc-item">
                                <a type="button" class="pc-link add-tab-btn" data-tab="pt" data-icon="PT" data-label="PT">PT</a>
                            </li>
                            <li class="pc-item">
                                <a type="button" class="pc-link add-tab-btn" data-tab="instax" data-icon="INSTAX" data-label="INSTAX">INSTAX</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="pc-item pc-caption for_auditor">
                        <label>Other</label>
                    </li>
                    <li class="pc-item for_auditor">
                        <a href="../status/index.php" class="pc-link d-flex align-items-center">
                            <span class="pc-micon d-flex align-items-center me-2"> <i class="mdi mdi-map-legend text-primary"></i></span>
                            <span class="pc-mtext">Overview</span>
                        </a>
                    </li>
                    <li class="pc-item for_auditor"><a href="../overview/index.php" class="pc-link d-flex align-items-center">
                        <span class="pc-micon d-flex align-items-center me-2">
                            <i class="mdi mdi-account-tie text-primary"></i>
                        </span>
                        <span class="pc-mtext">Name of PIC</span></a>
                    </li> -->
                    <!-- <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link d-flex align-items-center justify-content-between">
                            <span class="d-flex align-items-center">
                                <span class="pc-micon d-flex align-items-center me-3" style="width: 20px;">
                                    <i class="mdi mdi-clipboard-text-multiple"></i>
                                </span>
                                <span class="pc-mtext">Tutorials</span>
                            </span>
                            <span class="pc-arrow">
                                <i data-feather="chevron-right"></i>
                            </span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item">
                                <a type="button" id="help_btn" class="pc-link" data-tab="lx" data-icon="LX" data-label="LX">Submitting Checklist</a>
                            </li>
                            <li class="pc-item">
                                <a href="#" class="pc-link" data-tab="lx" data-icon="LX" data-label="LX">Plan</a>
                            </li>
                            <li class="pc-item">
                                <a href="#" class="pc-link" data-tab="lx" data-icon="LX" data-label="LX">Plan</a>
                            </li>
                            <li class="pc-item">
                                <a href="#" class="pc-link" data-tab="lx" data-icon="LX" data-label="LX">Plan</a>
                            </li>
                        </ul>
                    </li> -->
                    <!-- <li class="pc-item"><a href="#" class="pc-link">
                        <span class="pc-micon">
                            <i class="ph ph-device-tablet"></i>
                        </span>
                        <span class="pc-mtext">Recipient Tab</span></a>
                    </li> -->
                    <!-- <li class="pc-item">
                        <a type="button" id="logout_btn" class="pc-link">
                            <span class="pc-micon">
                                <i class="ph ph-power"></i>
                            </span>
                            <span class="pc-mtext">Log Out</span>
                        </a>
                    </li> -->
                    <!-- <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link">
                            <span class="pc-micon"> <i class="ph ph-tree-structure"></i> </span><span class="pc-mtext">Menu levels</span><span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item"><a class="pc-link" href="#!">Level 2.1</a></li>
                                <li class="pc-item pc-hasmenu">
                                    <a href="#!" class="pc-link">Level 2.2<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                                    <ul class="pc-submenu">
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                                        <li class="pc-item pc-hasmenu">
                                            <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                                            <ul class="pc-submenu">
                                                <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                                                <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pc-item pc-hasmenu">
                                    <a href="#!" class="pc-link">Level 2.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                                    <ul class="pc-submenu">
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 3.1</a></li>
                                        <li class="pc-item"><a class="pc-link" href="#!">Level 3.2</a></li>
                                        <li class="pc-item pc-hasmenu">
                                            <a href="#!" class="pc-link">Level 3.3<span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                                            <ul class="pc-submenu">
                                                <li class="pc-item"><a class="pc-link" href="#!">Level 4.1</a></li>
                                                <li class="pc-item"><a class="pc-link" href="#!">Level 4.2</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <script>
        // Get the user role from PHP session variable
        const userRole = '<?= isset($_SESSION['login_role']) ? $_SESSION['login_role'] : ''; ?>';

        if (userRole === 'admin') {
            // Show auditor-specific menu items
            document.querySelectorAll('.for_auditor').forEach(el => el.style.display = 'block');
            // Hide auditee-specific menu items
            document.querySelectorAll('.for_auditee').forEach(el => el.style.display = 'none');
        } else if (userRole === 'auditee') {
            // Show auditee-specific menu items
            document.querySelectorAll('.for_auditee').forEach(el => el.style.display = 'block');
            // Hide auditor-specific menu items
            document.querySelectorAll('.for_auditor').forEach(el => el.style.display = 'none');
        } else {
            // Hide all role-specific menu items for unknown roles
            document.querySelectorAll('.for_auditor').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.for_auditee').forEach(el => el.style.display = 'none');
        }
    </script>
