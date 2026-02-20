<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONE FOPH — Admin Dashboard</title>
    <link rel="icon" type="image/svg+xml" href="../assets/img/icon2.png">
    <link rel="stylesheet" href="../assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

    <!-- Background -->
    <div class="bg-image"></div>
    <div class="bg-overlay"></div>
    <div class="bg-gradient-animated"></div>
    <div class="floating-shapes">
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
        <div class="floating-shape"></div>
    </div>

    <!-- Header -->
    <header class="admin-header">
        <div class="admin-header-inner">
            <a href="index.html" class="admin-logo">
                <div class="admin-logo-icon"><i class="bi bi-grid-3x3-gap-fill"></i></div>
                <div class="admin-logo-text">
                    <span class="brand">ONE FOPH</span>
                    <span class="sub">Admin Panel</span>
                </div>
            </a>
            
            <div class="user-profile">
                <button class="profile-dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-card">
                        <div class="user-avatar-container">
                            <img src="../assets/img/user.png" alt="User Avatar" 
                                id="avatarImg" class="user-avatar-img">
                            <!-- <div class="user-avatar-fallback" id="avatarFallback">JD</div> -->
                        </div>
                        <div class="user-details">
                            <span class="user-name" id="userName">John Doe</span>
                            <span class="user-role" id="userRole">Administrator</span>
                        </div>
                    </div>
                    <i class="bi bi-chevron-down profile-dropdown-icon"></i>
                </button>
                
                <div class="profile-dropdown-menu" aria-labelledby="userProfile">
                    <div class="dropdown-item" id="profileLink">
                        <i class="bi bi-person"></i> Profile
                    </div>
                    <div class="dropdown-item" id="settingsLink">
                        <i class="bi bi-gear-fill"></i> Settings
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="dropdown-item" id="logoutLink">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Top Navigation Tabs -->
    <nav class="top-nav">
        <div class="top-nav-inner">
            <div class="nav-tabs">
                <button class="nav-tab active" data-tab="systems">
                    <i class="bi bi-grid-3x3-gap"></i>
                    Systems
                    <span class="nav-counter" id="systemsCount">12</span>
                </button>
                <button class="nav-tab" data-tab="accounts">
                    <i class="bi bi-people-fill"></i>
                    Accounts
                    <span class="nav-counter" id="accountsCount">48</span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <main class="admin-main">

        <!-- ═══════════════════════════════════════ -->
        <!-- ──         SYSTEMS TAB PANEL        ── -->
        <!-- ═══════════════════════════════════════ -->
        <div class="tab-panel active" id="panelSystems">

            <div class="page-title-row">
                <div>
                    <h1 class="page-title"><i class="bi bi-grid-3x3-gap me-3"></i>System Management</h1>
                    <p class="page-sub">Add, edit or remove integrated web systems from the dashboard.</p>
                </div>
                <button class="btn-add-new" id="openAddSystemModal">
                    <i class="bi bi-plus-lg"></i> Add System
                </button>
            </div>

            <!-- Stats -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon si-primary"><i class="bi bi-grid-3x3"></i></div>
                    <div><div class="stat-val" id="statTotal">0</div><div class="stat-lbl">Total</div></div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-success"><i class="bi bi-check-circle-fill"></i></div>
                    <div><div class="stat-val" id="statActive">0</div><div class="stat-lbl">Active</div></div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-warning"><i class="bi bi-code-slash"></i></div>
                    <div><div class="stat-val" id="statDev">0</div><div class="stat-lbl">In Dev</div></div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-accent"><i class="bi bi-stars"></i></div>
                    <div><div class="stat-val" id="statNew">0</div><div class="stat-lbl">New</div></div>
                </div>
            </div>

            <!-- Toolbar -->
            <div class="toolbar">
                <div class="toolbar-left">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" id="systemSearch" placeholder="Search systems...">
                    </div>
                    <select id="catFilter" class="adm-select">
                        <option value="all">All Categories</option>
                        <option value="hr">HR & Admin</option>
                        <option value="finance">Finance</option>
                        <option value="operations">Operations</option>
                        <option value="analytics">Analytics</option>
                    </select>
                    <select id="statusFilter" class="adm-select">
                        <option value="all">All Status</option>
                        <option value="Active">Active</option>
                        <option value="New">New</option>
                        <option value="In Dev">In Development</option>
                    </select>
                </div>
                <div class="toolbar-right">
                    <span class="result-count" id="systemResultCount">12 systems</span>
                    <div class="view-btns">
                        <button class="vbtn active" id="btnTableView" title="Table"><i class="bi bi-table"></i></button>
                        <button class="vbtn" id="btnGridView" title="Grid"><i class="bi bi-grid-fill"></i></button>
                    </div>
                </div>
            </div>

            <!-- Table View -->
            <div class="tbl-wrap" id="systemTableView">
                <table class="adm-table">
                    <thead>
                        <tr>
                            <th style="width:44px">#</th>
                            <th>System Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Version</th>
                            <th style="width:100px">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="systemTblBody"></tbody>
                </table>
            </div>

            <!-- Grid View -->
            <div class="adm-grid" id="systemGridView" style="display:none"></div>

        </div>

        <!-- ═══════════════════════════════════════ -->
        <!-- ──        ACCOUNTS TAB PANEL        ── -->
        <!-- ═══════════════════════════════════════ -->
        <div class="tab-panel" id="panelAccounts">

            <div class="page-title-row">
                <div>
                    <h1 class="page-title"><i class="bi bi-people-fill me-2"></i>Account Management</h1>
                    <p class="page-sub">Manage user accounts, roles and permissions.</p>
                </div>
                <button class="btn-add-new" id="openAddAccountModal">
                    <i class="bi bi-plus-lg"></i> Add Account
                </button>
            </div>

            <!-- Account Stats -->
            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-icon si-primary"><i class="bi bi-people"></i></div>
                    <div><div class="stat-val" id="statTotalAccounts">0</div><div class="stat-lbl">Total</div></div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-success"><i class="bi bi-person-check-fill"></i></div>
                    <div><div class="stat-val" id="statActiveAccounts">0</div><div class="stat-lbl">Active</div></div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-warning"><i class="bi bi-person-dash-fill"></i></div>
                    <div><div class="stat-val" id="statInactiveAccounts">0</div><div class="stat-lbl">Inactive</div></div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon si-accent"><i class="bi bi-shield-lock-fill"></i></div>
                    <div><div class="stat-val" id="statAdminAccounts">0</div><div class="stat-lbl">Admins</div></div>
                </div>
            </div>

            <!-- Account Toolbar -->
            <div class="toolbar">
                <div class="toolbar-left">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" id="accountSearch" placeholder="Search accounts...">
                    </div>
                    <select id="roleFilter" class="adm-select">
                        <option value="all">All Roles</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                </div>
                <div class="toolbar-right">
                    <span class="result-count" id="accountResultCount">48 accounts</span>
                    <div class="view-btns">
                        <button class="vbtn active" id="btnAccTableView" title="Table"><i class="bi bi-table"></i></button>
                        <button class="vbtn" id="btnAccGridView" title="Grid"><i class="bi bi-grid-fill"></i></button>
                    </div>
                </div>
            </div>

            <!-- Account Table View -->
            <div class="tbl-wrap" id="accountTableView">
                <table class="adm-table">
                    <thead>
                        <tr>
                            <th style="width:44px">#</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="hide-sm">Last Login</th>
                            <th style="width:100px">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="accountTblBody"></tbody>
                </table>
            </div>

            <!-- Account Grid View -->
            <div class="adm-grid" id="accountGridView" style="display:none"></div>

        </div>

    </main>

    <!-- ══════════════════════════════════════════════ -->
    <!-- ──         SYSTEM ADD / EDIT MODAL         ── -->
    <!-- ══════════════════════════════════════════════ -->
    <div class="adm-overlay" id="systemFormOverlay">
        <div class="adm-modal adm-modal-lg">
            <div class="adm-modal-head">
                <h3 id="systemFormModalTitle"><i class="bi bi-plus-circle me-2"></i>Add New System</h3>
                <button class="btn-x" id="closeSystemFormModal"><i class="bi bi-x-lg"></i></button>
            </div>
            <div class="adm-modal-body">
                <form id="systemForm" novalidate>
                    <input type="hidden" id="sysId">

                    <div class="frow">
                        <div class="fgroup">
                            <label>System Name <em>*</em></label>
                            <input type="text" id="fSysTitle" placeholder="e.g. Human Resource Management">
                        </div>
                        <div class="fgroup">
                            <label>Category <em>*</em></label>
                            <select id="fSysCategory">
                                <option value="">Select category</option>
                                <option value="hr">HR & Admin</option>
                                <option value="finance">Finance</option>
                                <option value="operations">Operations</option>
                                <option value="analytics">Analytics</option>
                            </select>
                        </div>
                    </div>

                    <div class="frow frow-3">
                        <div class="fgroup">
                            <label>Status <em>*</em></label>
                            <select id="fSysStatus">
                                <option value="">Select status</option>
                                <option value="Active">Active</option>
                                <option value="New">New</option>
                                <option value="In Dev">In Development</option>
                            </select>
                        </div>
                        <div class="fgroup">
                            <label>Version <em>*</em></label>
                            <input type="text" id="fSysVersion" placeholder="e.g. v1.0">
                        </div>
                        <div class="fgroup">
                            <label>Platform <em>*</em></label>
                            <select id="fSysPlatform">
                                <option value="">Select platform</option>
                                <option value="Web">Web</option>
                                <option value="Mobile">Mobile</option>
                                <option value="Desktop">Desktop</option>
                            </select>
                        </div>
                    </div>

                    <div class="frow frow-3">
                        <div class="fgroup">
                            <label>Department</label>
                            <input type="text" id="fSysDept" placeholder="e.g. Human Resources">
                        </div>
                        <div class="fgroup">
                            <label>Access Level</label>
                            <input type="text" id="fSysAccess" placeholder="e.g. All Staff">
                        </div>
                        <div class="fgroup">
                            <label>Last Update</label>
                            <input type="text" id="fSysUpdate" placeholder="e.g. Jan 2026">
                        </div>
                    </div>

                    <div class="fgroup">
                        <label>Description <em>*</em></label>
                        <textarea id="fSysDesc" rows="3" placeholder="What does this system do?"></textarea>
                    </div>

                    <div class="fgroup">
                        <label>Image URL</label>
                        <div class="img-row">
                            <input type="text" id="fSysImage" placeholder="https://images.unsplash.com/...">
                            <div class="img-prev" id="sysImgPrev"><i class="bi bi-image"></i></div>
                        </div>
                    </div>

                    <div class="fgroup">
                        <label>Key Features</label>
                        <div id="sysFeaturesList"></div>
                        <button type="button" class="btn-add-feat" id="addSysFeatBtn">
                            <i class="bi bi-plus-circle me-1"></i> Add Feature
                        </button>
                    </div>

                    <div class="form-footer">
                        <button type="button" class="btn-cancel" id="cancelSystemForm">Cancel</button>
                        <button type="submit" class="btn-save" id="saveSystemBtn">
                            <i class="bi bi-check-lg me-1"></i> Save System
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ══════════════════════════════════════════════ -->
    <!-- ──        ACCOUNT ADD / EDIT MODAL         ── -->
    <!-- ══════════════════════════════════════════════ -->
    <div class="adm-overlay" id="accountFormOverlay">
        <div class="adm-modal adm-modal-lg">
            <div class="adm-modal-head">
                <h3 id="accountFormModalTitle"><i class="bi bi-person-plus me-2"></i>Add New Account</h3>
                <button class="btn-x" id="closeAccountFormModal"><i class="bi bi-x-lg"></i></button>
            </div>
            <div class="adm-modal-body">
                <form id="accountForm" novalidate>
                    <input type="hidden" id="accId">

                    <div class="frow">
                        <div class="fgroup">
                            <label>Full Name <em>*</em></label>
                            <input type="text" id="fAccName" placeholder="e.g. Jane Smith">
                        </div>
                        <div class="fgroup">
                            <label>Email <em>*</em></label>
                            <input type="email" id="fAccEmail" placeholder="e.g. jane@onefoph.com">
                        </div>
                    </div>

                    <div class="frow frow-3">
                        <div class="fgroup">
                            <label>Role <em>*</em></label>
                            <select id="fAccRole">
                                <option value="">Select role</option>
                                <option value="Admin">Admin</option>
                                <option value="Editor">Editor</option>
                                <option value="Viewer">Viewer</option>
                            </select>
                        </div>
                        <div class="fgroup">
                            <label>Status <em>*</em></label>
                            <select id="fAccStatus">
                                <option value="">Select status</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                                <option value="Suspended">Suspended</option>
                            </select>
                        </div>
                        <div class="fgroup">
                            <label>Department</label>
                            <input type="text" id="fAccDept" placeholder="e.g. Finance">
                        </div>
                    </div>

                    <div class="frow">
                        <div class="fgroup">
                            <label>Phone</label>
                            <input type="text" id="fAccPhone" placeholder="e.g. +63 912 345 6789">
                        </div>
                        <div class="fgroup">
                            <label>Position</label>
                            <input type="text" id="fAccPosition" placeholder="e.g. Senior Developer">
                        </div>
                    </div>

                    <div class="fgroup">
                        <label>Avatar URL</label>
                        <div class="img-row">
                            <input type="text" id="fAccAvatar" placeholder="https://images.unsplash.com/...">
                            <div class="img-prev" id="accImgPrev"><i class="bi bi-person-circle"></i></div>
                        </div>
                    </div>

                    <div class="fgroup">
                        <label>Notes</label>
                        <textarea id="fAccNotes" rows="2" placeholder="Optional notes about this account..."></textarea>
                    </div>

                    <div class="form-footer">
                        <button type="button" class="btn-cancel" id="cancelAccountForm">Cancel</button>
                        <button type="submit" class="btn-save" id="saveAccountBtn">
                            <i class="bi bi-check-lg me-1"></i> Save Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ── DELETE MODAL (shared) ── -->
    <div class="adm-overlay" id="deleteOverlay">
        <div class="adm-modal adm-modal-sm">
            <div class="adm-modal-head">
                <h3 id="deleteModalTitle"><i class="bi bi-trash3 me-2"></i>Delete Item</h3>
                <button class="btn-x" id="closeDeleteModal"><i class="bi bi-x-lg"></i></button>
            </div>
            <div class="adm-modal-body">
                <div class="del-body">
                    <div class="del-icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
                    <p class="del-msg">You are about to delete</p>
                    <p class="del-name" id="delName">—</p>
                    <p class="del-warn">This action cannot be undone.</p>
                    <div class="del-actions">
                        <button class="btn-cancel" id="cancelDelete">Cancel</button>
                        <button class="btn-del-confirm" id="confirmDelete">
                            <i class="bi bi-trash3-fill me-1"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast -->
    <div class="adm-toast" id="toast">
        <i id="toastIcon"></i>
        <span id="toastMsg"></span>
    </div>

    <script src="../assets/js/admin.js"></script>
</body>
</html>