<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>ONE FOPH - Web Systems</title>

    <link rel="icon" type="image/svg+xml" href="assets/img/icon2.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Mouse Trail Effect -->
    <div class="mouse-trail" id="mouseTrail"></div>
    <div class="mouse-dot" id="mouseDot"></div>

    <div class="aurora-light" id="auroraLight"></div>

    <!-- Background Image -->
    <div class="bg-image" id="bgImage"></div>
    
    <!-- Dark Overlay -->
    <div class="bg-overlay"></div>
    
    <!-- Animated Gradient Overlay -->
    <div class="bg-gradient-animated"></div>

    <!-- Floating Shapes -->
    <div class="floating-shapes">
        <div class="floating-shape" id="shape1"></div>
        <div class="floating-shape" id="shape2"></div>
        <div class="floating-shape" id="shape3"></div>
    </div>

    <!-- Particles -->
    <div class="particles" id="particles"></div>

    <!-- Enhanced Preloader -->
    <div class="preloader" id="preloader">
        <!-- Preloader Background -->
        <div class="preloader-bg">
            <div class="preloader-orb"></div>
            <div class="preloader-orb"></div>
            <div class="preloader-orb"></div>
        </div>

        <!-- Preloader Particles -->
        <div class="preloader-particles" id="preloaderParticles"></div>

        <!-- Loader Content -->
        <div class="loader-container">
            <!-- Logo -->
            <div class="loader-logo">
                <div class="loader-logo-icon">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                </div>
                <div class="loader-brand">
                    <div class="loader-brand-text">
                        <span>O</span><span>N</span><span>E</span><span class="space">&nbsp;</span><span>F</span><span>O</span><span>P</span><span>H</span>
                    </div>
                    <div class="loader-tagline">Unified Platform Solutions</div>
                </div>
            </div>

            <!-- Spinner -->
            <div class="loader-spinner">
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
                <div class="spinner-ring"></div>
                <div class="spinner-center"></div>
            </div>

            <!-- Progress Bar -->
            <div class="loader-progress">
                <div class="progress-bar-container">
                    <div class="progress-bar-fill" id="progressFill"></div>
                </div>
                <div class="progress-text">
                    <span>Loading systems...</span>
                    <span class="progress-percent" id="progressPercent">0%</span>
                </div>
            </div>
        </div>

        <!-- Loading Tips -->
        <div class="loader-tips">
            <div class="tip-text">
                <i class="bi bi-lightbulb"></i>
                <span id="loadingTip">Preparing your dashboard experience</span>
            </div>
        </div>
    </div>

    <div class="main-container" id="mainContainer">
        <!-- Header -->
        <header class="header" id="header">
            <div class="container">
                <div class="header-content">
                    <a href="#" class="logo">
                        <div class="logo-icon">
                            <i class="bi bi-grid-3x3-gap-fill"></i>
                        </div>
                        <span class="logo-text">ONE FOPH</span>
                    </a>

                    <div class="header-stats">
                        <div class="header-stat">
                            <div class="header-stat-value">
                                <i class="bi bi-grid-3x3"></i> 12
                            </div>
                            <div class="header-stat-label">Systems</div>
                        </div>
                        <div class="header-stat">
                            <div class="header-stat-value">
                                <i class="bi bi-folder2"></i> 4
                            </div>
                            <div class="header-stat-label">Categories</div>
                        </div>
                        <!-- <div class="header-stat">
                            <div class="header-stat-value">
                                <span class="status-dot"></span> Online
                            </div>
                            <div class="header-stat-label">Status</div>
                        </div> -->
                    </div>

                    <div class="header-actions">
                        <div class="search-wrapper" id="searchWrapper">
                            <input type="text" class="search-input" id="searchInput" placeholder="Search systems...">
                            <button class="btn-icon search-close-btn" id="searchClose">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                        <button class="btn-icon" id="searchBtn" title="Search">
                            <i class="bi bi-search"></i>
                        </button>
                        <button class="btn-icon" title="Notifications">
                            <i class="bi bi-bell"></i>
                        </button>
                        <button class="btn-icon" id="settingsBtn" title="Settings">
                            <i class="bi bi-gear"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <div class="settings-overlay" id="settingsOverlay"></div>
        <div class="settings-panel" id="settingsPanel">
            <div class="settings-header">
                <h3><i class="bi bi-gear me-2"></i>Settings</h3>
                <button class="btn-icon" id="settingsClose">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="settings-body">

                <!-- ── Account ── -->
                <div class="settings-section settings-account">
                    <h6 class="settings-section-title">Account</h6>
                    <div class="account-card">

                        <!-- Logged-out state -->
                        <div class="account-logged-out" id="accountLoggedOut">
                            <div class="account-avatar-placeholder">
                                <i class="bi bi-person-circle"></i>
                            </div>
                            <div class="account-info">
                                <span class="account-name">Guest User</span>
                                <span class="account-role">Not signed in</span>
                            </div>
                            <button class="btn-sign-in" id="openLoginBtn">
                                <i class="bi bi-box-arrow-in-right"></i> Sign In
                            </button>
                        </div>

                        <!-- Logged-in state -->
                        <div class="account-logged-in" id="accountLoggedIn" style="display:none">
                            <div class="account-avatar">
                                <span id="userInitials">JD</span>
                            </div>
                            <div class="account-info">
                                <span class="account-name" id="displayName">John Doe</span>
                                <span class="account-role" id="displayRole">Administrator</span>
                            </div>
                            <button class="btn-sign-out" id="logoutBtn" title="Sign out">
                                <i class="bi bi-box-arrow-right"></i>
                            </button>
                        </div>

                    </div>
                </div>

                <!-- ── Accent Color ── -->
                <div class="settings-section">
                    <h6 class="settings-section-title">Accent Color</h6>
                    <div class="color-presets">
                        <button class="color-preset active"
                            data-primary="#667eea" data-secondary="#764ba2" data-accent="#f093fb"
                            style="background:linear-gradient(135deg,#667eea,#764ba2)" title="Purple"></button>
                        <button class="color-preset"
                            data-primary="#11998e" data-secondary="#38ef7d" data-accent="#43e97b"
                            style="background:linear-gradient(135deg,#11998e,#38ef7d)" title="Teal"></button>
                        <button class="color-preset"
                            data-primary="#f093fb" data-secondary="#f5576c" data-accent="#fd79a8"
                            style="background:linear-gradient(135deg,#f093fb,#f5576c)" title="Pink"></button>
                        <button class="color-preset"
                            data-primary="#4facfe" data-secondary="#00f2fe" data-accent="#a8edea"
                            style="background:linear-gradient(135deg,#4facfe,#00f2fe)" title="Blue"></button>
                        <button class="color-preset"
                            data-primary="#fa709a" data-secondary="#fee140" data-accent="#ffd700"
                            style="background:linear-gradient(135deg,#fa709a,#fee140)" title="Sunset"></button>
                        <button class="color-preset"
                            data-primary="#a18cd1" data-secondary="#fbc2eb" data-accent="#ffecd2"
                            style="background:linear-gradient(135deg,#a18cd1,#fbc2eb)" title="Lavender"></button>
                    </div>
                </div>

                <!-- ── Display Toggles ── -->
                <div class="settings-section">
                    <h6 class="settings-section-title">Display</h6>
                    <div class="settings-toggle-row">
                        <div class="settings-toggle-info">
                            <span class="settings-toggle-label">Particles</span>
                            <span class="settings-toggle-desc">Floating background particles</span>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="toggleParticles" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    <div class="settings-toggle-row">
                        <div class="settings-toggle-info">
                            <span class="settings-toggle-label">Mouse Trail</span>
                            <span class="settings-toggle-desc">Cursor glow effect</span>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="toggleMouseTrail" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    <div class="settings-toggle-row">
                        <div class="settings-toggle-info">
                            <span class="settings-toggle-label">Floating Shapes</span>
                            <span class="settings-toggle-desc">Animated background blobs</span>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="toggleShapes" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                    <div class="settings-toggle-row">
                        <div class="settings-toggle-info">
                            <span class="settings-toggle-label">Card Animations</span>
                            <span class="settings-toggle-desc">Hover &amp; entrance effects</span>
                        </div>
                        <label class="toggle-switch">
                            <input type="checkbox" id="toggleAnimations" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>

                <!-- ── Carousel Speed ── -->
                <div class="settings-section">
                    <h6 class="settings-section-title">Carousel Speed</h6>
                    <div class="speed-options">
                        <button class="speed-btn" data-speed="0.8s">Slow</button>
                        <button class="speed-btn active" data-speed="0.5s">Normal</button>
                        <button class="speed-btn" data-speed="0.25s">Fast</button>
                    </div>
                </div>

                <!-- ── Reset ── -->
                <div class="settings-section">
                    <button class="btn-reset" id="resetSettings">
                        <i class="bi bi-arrow-counterclockwise me-2"></i> Reset to Default
                    </button>
                </div>

            </div>
        </div>

        <!-- Hero Banner -->
        <section class="hero-banner" id="heroBanner">
            <div class="container">
                <div class="hero-badge">
                    <i class="bi bi-lightning-charge-fill me-1"></i> Unified Platform
                </div>
                <h1 class="hero-title">
                    Welcome to <span class="gradient-text">ONE FOPH</span>
                </h1>
                <p class="hero-subtitle">Access all your integrated web systems in one place</p>
            </div>
        </section>

        <!-- Filter Section -->
        <section class="filter-section">
            <div class="container">
                <div class="filter-tabs">
                    <button class="filter-tab active" data-filter="all">
                        All Systems <span class="count">12</span>
                    </button>
                    <button class="filter-tab" data-filter="hr">
                        <i class="bi bi-people me-1"></i> HR & Admin <span class="count">3</span>
                    </button>
                    <button class="filter-tab" data-filter="finance">
                        <i class="bi bi-cash-stack me-1"></i> Finance <span class="count">2</span>
                    </button>
                    <button class="filter-tab" data-filter="operations">
                        <i class="bi bi-gear me-1"></i> Operations <span class="count">5</span>
                    </button>
                    <button class="filter-tab" data-filter="analytics">
                        <i class="bi bi-graph-up me-1"></i> Analytics <span class="count">2</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Systems Carousel -->
        <section class="systems-section">
            <div class="container" style="height: 100%; display: flex; flex-direction: column;">
                <div class="carousel-container">
                    <div class="carousel-header">
                        <h3 class="carousel-title">
                            <i class="bi bi-collection me-2"></i>
                            Showing <span id="visibleCount">12</span> Systems
                        </h3>
                        <div class="carousel-nav-top">
                            <button class="btn-icon" id="prevBtnTop" title="Previous">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                            <button class="btn-icon" id="nextBtnTop" title="Next">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Navigation Arrows -->
                    <button class="carousel-nav-btn prev" id="prevBtn">
                        <i class="bi bi-chevron-left"></i>
                    </button>
                    <button class="carousel-nav-btn next" id="nextBtn">
                        <i class="bi bi-chevron-right"></i>
                    </button>

                    <div class="carousel-wrapper">
                        <div class="carousel-track" id="carouselTrack">
                            <!-- System Card 1 - HR Management -->
                            <div class="system-card" data-category="hr" data-system="hrms">
                                <div class="card-image">
                                    <img src="assets/img/GO FOPH - Dropbox.png" alt="HR Management">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">HR & Admin</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">GO FOPH - Dropbox</h3>
                                    <p class="card-desc">Have suggestions or questions? Share them here!</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v2.5</span>
                                            <span class="card-meta-item deploy">
                                                <i class="bi bi-calendar3"></i> Jan 2026
                                            </span>
                                        </div>
                                        <button class="card-btn"><i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 2 - Financial Management -->
                            <div class="system-card" data-category="finance" data-system="fms">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=400&h=300&fit=crop" alt="Financial Management">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">Finance</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Financial Management System</h3>
                                    <p class="card-desc">Streamlined financial operations including budgeting, expense tracking, and reporting.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v3.1</span>
                                            <span class="card-meta-item deploy">
                                                <i class="bi bi-calendar3"></i> Feb 2026
                                            </span>
                                        </div>
                                        <button class="card-btn"><i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 3 - Inventory Management -->
                            <div class="system-card" data-category="operations" data-system="ims">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1553413077-190dd305871c?w=400&h=300&fit=crop" alt="Inventory Management">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">Operations</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Inventory Management</h3>
                                    <p class="card-desc">Real-time inventory tracking, stock management, and automated reorder notifications.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v1.8</span>
                                            <span class="card-meta-item deploy">
                                                <i class="bi bi-calendar3"></i> Dec 2025
                                            </span>
                                        </div>
                                        <button class="card-btn"><i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 4 - Project Management -->
                            <div class="system-card" data-category="operations" data-system="pms">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?w=400&h=300&fit=crop" alt="Project Management">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-new">New</span>
                                    <span class="card-category">Operations</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Project Management</h3>
                                    <p class="card-desc">Collaborative project planning, task assignment, and progress monitoring tools.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v1.0</span>
                                            <span class="card-meta-item deploy">
                                                <i class="bi bi-calendar3"></i> Feb 2026
                                            </span>
                                        </div>
                                        <button class="card-btn"><i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 5 - Attendance -->
                            <div class="system-card" data-category="hr" data-system="attendance">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1611532736597-de2d4265fba3?w=400&h=300&fit=crop" alt="Attendance Tracking">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">HR & Admin</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Attendance & Time Tracking</h3>
                                    <p class="card-desc">Automated attendance recording, shift management, and overtime calculation.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v2.2</span>
                                            <span class="card-meta-item deploy">
                                                <i class="bi bi-calendar3"></i> Jan 2026
                                            </span>
                                        </div>
                                        <button class="card-btn"><i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 6 - Business Intelligence -->
                            <div class="system-card" data-category="analytics" data-system="bi">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=400&h=300&fit=crop" alt="Business Intelligence">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">Analytics</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Business Intelligence</h3>
                                    <p class="card-desc">Comprehensive analytics and reporting with interactive visualizations.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v4.0</span>
                                            <span class="card-meta-item deploy">
                                                <i class="bi bi-calendar3"></i> Feb 2026
                                            </span>
                                        </div>
                                        <button class="card-btn"><i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 7 - Document Management -->
                            <div class="system-card" data-category="operations" data-system="dms">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1568667256549-094345857637?w=400&h=300&fit=crop" alt="Document Management">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">Operations</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Document Management</h3>
                                    <p class="card-desc">Centralized document storage, version control, and secure file sharing.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v2.0</span>
                                            <span class="card-meta-item deploy">
                                                <i class="bi bi-calendar3"></i> Nov 2025
                                            </span>
                                        </div>
                                        <button class="card-btn"><i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 8 - Procurement -->
                            <div class="system-card" data-category="finance" data-system="procurement">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=400&h=300&fit=crop" alt="Procurement">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-development">In Dev</span>
                                    <span class="card-category">Finance</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Procurement System</h3>
                                    <p class="card-desc">End-to-end procurement workflow from requisition to purchase order.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v0.9</span>
                                            <span class="card-meta-item deploy">
                                                <i class="bi bi-calendar3"></i> Feb 2026
                                            </span>
                                        </div>
                                        <button class="card-btn"><i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 9 - Training & Learning -->
                            <div class="system-card" data-category="hr" data-system="lms">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=400&h=300&fit=crop" alt="Training & Learning">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-new">New</span>
                                    <span class="card-category">HR & Admin</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Training & Learning</h3>
                                    <p class="card-desc">Online training platform with course management and certification.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v1.0</span>
                                            <span class="card-meta-item deploy">
                                                <i class="bi bi-calendar3"></i> Jan 2026
                                            </span>
                                        </div>
                                        <button class="card-btn"><i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 10 - Helpdesk -->
                            <div class="system-card" data-category="operations" data-system="helpdesk">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=400&h=300&fit=crop" alt="Helpdesk">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">Operations</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Helpdesk & Ticketing</h3>
                                    <p class="card-desc">IT support ticketing, issue tracking, and knowledge base management.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v3.2</span>
                                            <span class="card-meta-item deploy">
                                                <i class="bi bi-calendar3"></i> Dec 2025
                                            </span>
                                        </div>
                                        <button class="card-btn"><i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 11 - Performance Analytics -->
                            <div class="system-card" data-category="analytics" data-system="performance">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&h=300&fit=crop" alt="Performance Analytics">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-development">In Dev</span>
                                    <span class="card-category">Analytics</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Performance Analytics</h3>
                                    <p class="card-desc">Advanced performance metrics, KPI dashboards, and predictive analytics.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v0.8</span>
                                            <span class="card-meta-item deploy">
                                                <i class="bi bi-calendar3"></i> Feb 2026
                                            </span>
                                        </div>
                                        <button class="card-btn"><i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- System Card 12 - Notification Center -->
                            <div class="system-card" data-category="operations" data-system="notification">
                                <div class="card-image">
                                    <img src="https://images.unsplash.com/photo-1557200134-90327ee9fafa?w=400&h=300&fit=crop" alt="Notification System">
                                    <div class="card-overlay"></div>
                                    <span class="card-badge badge-active">Active</span>
                                    <span class="card-category">Operations</span>
                                </div>
                                <div class="card-content">
                                    <h3 class="card-title">Notification Center</h3>
                                    <p class="card-desc">Centralized communication platform for announcements and notifications.</p>
                                    <div class="card-footer">
                                        <div class="card-meta">
                                            <span class="card-meta-item version">v1.5</span>
                                            <span class="card-meta-item deploy">
                                                <i class="bi bi-calendar3"></i> Jan 2026
                                            </span>
                                        </div>
                                        <button class="card-btn"><i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- No Results Message -->
                    <div class="no-results" id="noResults">
                        <i class="bi bi-inbox"></i>
                        <h4>No systems found</h4>
                        <p>Try selecting a different category</p>
                    </div>

                    <!-- Carousel Dots -->
                    <div class="carousel-dots" id="carouselDots"></div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="footer-content">
                    <div class="footer-links">
                        <a href="#">Documentation</a>
                        <a href="#">Support</a>
                        <a href="#">Privacy</a>
                        <a href="#">Terms</a>
                    </div>
                    <div class="footer-copy">
                        © 2026 ONE FOPH. All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Modal -->
    <div class="modal-overlay" id="systemModal">
        <div class="modal-content">
            <div class="modal-header-img">
                <img id="modalImage" src="" alt="">
                <button class="modal-close" id="modalClose">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-meta">
                    <span class="modal-badge badge-active" id="modalBadge">Active</span>
                    <span class="modal-version" id="modalVersion">v2.5</span>
                    <span class="modal-platform" id="modalPlatform">
                        <i class="bi bi-globe"></i> <span>Web</span>
                    </span>
                </div>
                <h2 class="modal-title" id="modalTitle">System Title</h2>
                <p class="modal-desc" id="modalDesc">System description goes here.</p>
                
                <div class="modal-info-grid" id="modalInfoGrid">
                    <div class="modal-info-item">
                        <i class="bi bi-calendar3"></i>
                        <div class="value" id="modalLastUpdate">Jan 2026</div>
                        <div class="label">Last Update</div>
                    </div>
                    <div class="modal-info-item">
                        <i class="bi bi-shield-check"></i>
                        <div class="value" id="modalAccess">All Staff</div>
                        <div class="label">Access Level</div>
                    </div>
                    <div class="modal-info-item">
                        <i class="bi bi-building"></i>
                        <div class="value" id="modalDepartment">IT</div>
                        <div class="label">Department</div>
                    </div>
                </div>

                <div class="modal-features">
                    <h6>Key Features</h6>
                    <div class="feature-list" id="modalFeatures"></div>
                </div>

                <div class="modal-actions">
                    <button class="btn-primary-glow">
                        <i class="bi bi-box-arrow-up-right"></i> Launch System
                    </button>
                    <button class="btn-secondary-outline">
                        <i class="bi bi-book"></i> Docs
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="login-overlay" id="loginOverlay">
        <div class="login-modal">

            <button class="login-close" id="loginClose">
                <i class="bi bi-x-lg"></i>
            </button>

            <!-- Header -->
            <div class="login-header">
                <div class="login-logo">
                    <i class="bi bi-grid-3x3-gap-fill"></i>
                </div>
                <h2 class="login-title">Welcome Back</h2>
                <p class="login-subtitle">Sign in to ONE FOPH</p>
            </div>

            <!-- Form -->
            <form class="login-form" id="loginForm" novalidate>

                <div class="login-field">
                    <label for="loginUsername">Username</label>
                    <div class="login-input-wrap">
                        <i class="bi bi-person-fill"></i>
                        <input type="text" id="loginUsername"
                            placeholder="Enter your username"
                            autocomplete="username">
                    </div>
                </div>

                <div class="login-field">
                    <label for="loginPassword">Password</label>
                    <div class="login-input-wrap">
                        <i class="bi bi-lock-fill"></i>
                        <input type="password" id="loginPassword"
                            placeholder="Enter your password"
                            autocomplete="current-password">
                        <button type="button" class="toggle-pwd" id="togglePassword">
                            <i class="bi bi-eye" id="eyeIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="login-options">
                    <label class="remember-me">
                        <input type="checkbox" id="rememberMe">
                        <span class="checkmark"></span>
                        Remember me
                    </label>
                    <a href="#" class="forgot-link">Forgot password?</a>
                </div>

                <button type="submit" class="btn-login-submit" id="loginSubmit">
                    <span class="btn-login-text">
                        <i class="bi bi-box-arrow-in-right me-1"></i> Sign In
                    </span>
                    <span class="btn-login-loader" style="display:none">
                        <i class="bi bi-arrow-repeat"></i> Signing in...
                    </span>
                </button>

                <div class="login-error" id="loginError" style="display:none">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <span id="loginErrorMsg">Incorrect username or password.</span>
                </div>

            </form>

            <!-- Success state -->
            <div class="login-success" id="loginSuccessState" style="display:none">
                <div class="login-success-icon">
                    <i class="bi bi-check-lg"></i>
                </div>
                <p class="login-success-text">Signed in successfully!</p>
                <p class="login-success-sub" id="loginSuccessName">Welcome back, John</p>
            </div>

            <!-- Demo hint -->
            <div class="login-demo-hint">
                <i class="bi bi-info-circle me-1"></i>
                Demo: <strong>admin</strong> / <strong>admin123</strong>
            </div>

        </div>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>