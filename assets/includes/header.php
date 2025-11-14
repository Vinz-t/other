<header class="pc-header">
    <div class="m-header">
        <a href="#" class="b-brand text-primary">
            <!-- ========   Change your logo from here   ============ -->
            <img src="../../../assets/img/white_logo.png" alt="logo image" height="40" />
        </a>
    </div>
    <div class="header-wrapper ps-1"> <!-- [Mobile Media Block] start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- ======= Menu collapse Icon ===== -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                        <i class="mdi mdi-menu"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                        <i class="mdi mdi-menu"></i>
                    </a>
                </li>
                <li class="dropdown pc-h-item d-flex align-items-center">
                    <time id="current-datetime" class="me-2 text-nowrap" aria-label="Current date and time"></time>
                    <i class="mdi mdi-clock-time-four" style="font-size: 1.6em;"></i>
                </li>
                <!-- <li class="dropdown pc-h-item">
                   <div class="d-flex align-items-center" style="gap: 0.75rem; padding: 0 1rem;">
                        <i class="mdi mdi-clock-time-four" style="font-size: 1.7em;"></i>
                        <span id="current-datetime" style="font-weight: 500; font-size: 0.9em; white-space: nowrap;"></span>
                    </div>
                </li> -->
            </ul>
        </div>
        <!-- [Mobile Media Block end] -->
        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item pe-3">
                    <a
                        class="dropdown-toggle arrow-none m-0 position-relative"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        aria-expanded="false"
                    >
                        <i class="mdi mdi-bell" style="font-size: 1.4rem; color: #fff;"></i>
                        <span class="position-absolute translate-middle badge rounded-pill bg-danger" style="left: 28px; top: 4px;">
                            9+
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                    <div class="dropdown-menu pc-h-dropdown drp-search">
                        <form class="px-3">
                            <div class="form-group mb-0 d-flex align-items-center">
                                <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . ." />
                                <button class="btn btn-light-secondary btn-search">Search</button>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="dropdown pc-h-item header-user-profile">
                    <a
                        class="pc-head-link dropdown-toggle arrow-none me-0"
                        data-bs-toggle="dropdown"
                        href="#"
                        role="button"
                        aria-haspopup="false"
                        data-bs-auto-close="outside"
                        aria-expanded="false"
                    >
                        <img src="../../../assets/img/avatar-8.jpg" alt="user-image" class="user-avtar" />
                        <span class="ps-3 d-flex flex-column align-items-start">
                            <span class="fw-bold"><?= $_SESSION['login_name']; ?></span>
                            <small class="text-white d-flex align-items-center" style="font-size: 0.8em;">
                                <span style="color: #00ff00; font-size: 1.4em; line-height: 1; margin-right: 4px;">●</span>
                                <input type="hidden" id="log_division" value="<?= $_SESSION['login_department']; ?>" />
                                <?= $_SESSION['login_role'] === 'admin' ? $_SESSION['login_role'] . ' - (Auditor)' : $_SESSION['login_role'] . ' - <strong class="ms-1">' . $_SESSION['login_department'] . '</strong>'; ?>
                            </small>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown" style="min-width: 250px;">
                        <div class="dropdown-body">
                            <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                                <ul class="list-group list-group-flush w-100">
                                    <li class="list-group-item">
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="mdi mdi-pencil" style="font-size: 1.2em;"></i>
                                                <span>Edit profile</span>
                                            </span>
                                        </a>
                                        <!-- <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph ph-bell"></i>
                                                <span>Notifications</span>
                                            </span>
                                        </a> -->
                                        <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="mdi mdi-cog" style="font-size: 1.2em;"></i>
                                                <span>Settings</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <!-- <a href="#" class="dropdown-item">
                                            <span class="d-flex align-items-center">
                                                <i class="ph ph-plus-circle"></i>
                                                <span>Add account</span>
                                            </span>
                                        </a> -->
                                        <a type="button" id="logout_btn" class="dropdown-item" data-id="<?= $_SESSION['login_id']; ?>">
                                            <span class="d-flex align-items-center">
                                                <i class="mdi mdi-power-standby" style="font-size: 1.2em;"></i>
                                                <span>Logout</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>

<script>
    (function () {
        const elId = 'current-datetime';

        function formatDateTime(d) {
            // Date part: "Wednesday, October 22, 2025"
            const datePart = new Intl.DateTimeFormat('en-US', {
            weekday: 'long', month: 'long', day: 'numeric', year: 'numeric'
            }).format(d);

            // Time parts to control "2:30PM" (no space before AM/PM)
            const parts = new Intl.DateTimeFormat('en-US', {
            hour: 'numeric', minute: '2-digit', hour12: true
            }).formatToParts(d);

            const h = parts.find(p => p.type === 'hour').value;
            const m = parts.find(p => p.type === 'minute').value;
            const dp = parts.find(p => p.type === 'dayPeriod').value
            .replace(/\./g, '')
            .replace(/\s/g, '')
            .toUpperCase(); // AM or PM

            return `${datePart} ${h}:${m}${dp}`;
        }

        function update() {
            const el = document.getElementById(elId);
            if (!el) return;
            const now = new Date();
            el.textContent = formatDateTime(now);
            el.setAttribute('datetime', now.toISOString());
        }

        function tickAlignedToSecond() {
            // Align to the next exact second to avoid drift
            const now = Date.now();
            const msToNextSecond = 1000 - (now % 1000);
            setTimeout(() => {
                update();
                tickAlignedToSecond(); // schedule the next aligned tick
            }, msToNextSecond);
        }

        // Start: update immediately, then align to the system clock
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => { update(); tickAlignedToSecond(); });
        } else {
            update();
            tickAlignedToSecond();
        }
    })();
</script>
