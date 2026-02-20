/* ══════════════════════════════════════════════════════
   ONE FOPH — Admin Dashboard  (Unified Tabs)
   ══════════════════════════════════════════════════════ */

// ── Helpers ──
const $ = (s, p = document) => p.querySelector(s);
const $$ = (s, p = document) => [...p.querySelectorAll(s)];
const LS = {
    get(k) { try { return JSON.parse(localStorage.getItem(k)); } catch { return null; } },
    set(k, v) { localStorage.setItem(k, JSON.stringify(v)); }
};

// ── Toast ──
function toast(msg, type = 'success') {
    const t = $('#toast');
    const icon = $('#toastIcon');
    const txt = $('#toastMsg');
    t.className = 'adm-toast ' + type;
    icon.className = type === 'success' ? 'bi bi-check-circle-fill' : 'bi bi-x-circle-fill';
    txt.textContent = msg;
    t.classList.add('show');
    clearTimeout(toast._t);
    toast._t = setTimeout(() => t.classList.remove('show'), 3200);
}

// ══════════════════════════════════════
//   TAB SWITCHING
// ══════════════════════════════════════
let currentTab = 'systems';

$$('.nav-tab').forEach(btn => {
    btn.addEventListener('click', () => {
        const tab = btn.dataset.tab;
        if (tab === currentTab) return;
        currentTab = tab;

        $$('.nav-tab').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        $$('.tab-panel').forEach(p => p.classList.remove('active'));
        const panel = $(`#panel${tab.charAt(0).toUpperCase() + tab.slice(1)}`);
        // re-trigger animation
        panel.style.animation = 'none';
        panel.offsetHeight; // reflow
        panel.style.animation = '';
        panel.classList.add('active');
    });
});

// ══════════════════════════════════════
//   PROFILE DROPDOWN
// ══════════════════════════════════════
const profileBtn = $('.profile-dropdown');
const profileMenu = $('.profile-dropdown-menu');

profileBtn?.addEventListener('click', e => {
    e.stopPropagation();
    profileMenu.classList.toggle('show');
});
document.addEventListener('click', () => profileMenu?.classList.remove('show'));

// ══════════════════════════════════════
//   SYSTEMS DATA & CRUD
// ══════════════════════════════════════
const DEFAULT_SYSTEMS = [
    { id: 1, title: 'Human Resource Management', category: 'hr', status: 'Active', version: 'v2.4', platform: 'Web', dept: 'Human Resources', access: 'All Staff', update: 'Jan 2026', desc: 'Complete HR management system', image: '', features: ['Employee records', 'Leave management', 'Payroll integration'] },
    { id: 2, title: 'Financial Reporting Tool', category: 'finance', status: 'Active', version: 'v3.1', platform: 'Web', dept: 'Finance', access: 'Finance Team', update: 'Dec 2025', desc: 'Real-time financial reports and dashboards', image: '', features: ['Income statements', 'Balance sheets', 'Cash flow'] },
    { id: 3, title: 'Inventory Tracker', category: 'operations', status: 'In Dev', version: 'v0.9', platform: 'Web', dept: 'Operations', access: 'Warehouse', update: 'Feb 2026', desc: 'Track and manage inventory across warehouses', image: '', features: ['Barcode scanning', 'Stock alerts'] },
    { id: 4, title: 'Analytics Dashboard', category: 'analytics', status: 'New', version: 'v1.0', platform: 'Web', dept: 'Data Team', access: 'Managers', update: 'Feb 2026', desc: 'Data visualization and KPI tracking', image: '', features: ['Charts', 'Exports', 'Scheduled reports'] },
];

let systems = LS.get('adm_systems') || DEFAULT_SYSTEMS;
let sysNextId = systems.reduce((m, s) => Math.max(m, s.id), 0) + 1;

function saveSystems() { LS.set('adm_systems', systems); }

// ── Render helpers ──
const catLabel = c => ({ hr: 'HR & Admin', finance: 'Finance', operations: 'Operations', analytics: 'Analytics' }[c] || c);
const catClass = c => ({ hr: 'cat-hr', finance: 'cat-finance', operations: 'cat-operations', analytics: 'cat-analytics' }[c] || '');
const statusClass = s => ({ Active: 'sp-active', New: 'sp-new', 'In Dev': 'sp-dev' }[s] || '');

function getFilteredSystems() {
    const q = ($('#systemSearch')?.value || '').toLowerCase();
    const cat = $('#catFilter')?.value || 'all';
    const st = $('#statusFilter')?.value || 'all';
    return systems.filter(s => {
        if (q && !s.title.toLowerCase().includes(q) && !(s.dept || '').toLowerCase().includes(q)) return false;
        if (cat !== 'all' && s.category !== cat) return false;
        if (st !== 'all' && s.status !== st) return false;
        return true;
    });
}

function updateSystemStats() {
    $('#statTotal').textContent = systems.length;
    $('#statActive').textContent = systems.filter(s => s.status === 'Active').length;
    $('#statDev').textContent = systems.filter(s => s.status === 'In Dev').length;
    $('#statNew').textContent = systems.filter(s => s.status === 'New').length;
    $('#systemsCount').textContent = systems.length;
}

function renderSystemTable(list) {
    const tbody = $('#systemTblBody');
    if (!list.length) {
        tbody.innerHTML = `<tr><td colspan="7"><div class="empty-state"><i class="bi bi-inbox"></i><h4>No systems found</h4><p>Try adjusting your filters</p></div></td></tr>`;
        return;
    }
    tbody.innerHTML = list.map((s, i) => `
        <tr>
            <td class="td-num">${i + 1}</td>
            <td>
                <div class="td-name">${s.title}</div>
                <div class="td-dept">${s.dept || '—'}</div>
            </td>
            <td class="hide-sm" style="font-size:.84rem;">${s.desc || '—'}</td>
            <td><span class="cat-pill ${catClass(s.category)}">${catLabel(s.category)}</span></td>
            <td><span class="status-pill ${statusClass(s.status)}">${s.status}</span></td>
            <td><span class="td-ver">${s.version}</span></td>
            <td>
                <div class="td-actions">
                    <button class="btn-edit" title="Edit" onclick="editSystem(${s.id})"><i class="bi bi-pencil-fill"></i></button>
                    <button class="btn-del" title="Delete" onclick="openDeleteModal('system',${s.id},'${s.title.replace(/'/g, "\\'")}')"><i class="bi bi-trash3-fill"></i></button>
                </div>
            </td>
        </tr>`).join('');
}

function renderSystemGrid(list) {
    const grid = $('#systemGridView');
    if (!list.length) {
        grid.innerHTML = `<div class="empty-state" style="grid-column:1/-1"><i class="bi bi-inbox"></i><h4>No systems found</h4></div>`;
        return;
    }
    grid.innerHTML = list.map(s => `
        <div class="grid-card">
            <div class="gc-img">
                ${s.image ? `<img src="${s.image}" alt="">` : `<div style="width:100%;height:100%;background:rgba(var(--primary-rgb),.08);display:flex;align-items:center;justify-content:center"><i class="bi bi-grid-3x3-gap" style="font-size:2rem;color:rgba(var(--primary-rgb),.25)"></i></div>`}
                <div class="gc-img-overlay"></div>
                <div class="gc-badges">
                    <span class="cat-pill ${catClass(s.category)}">${catLabel(s.category)}</span>
                    <span class="status-pill ${statusClass(s.status)}">${s.status}</span>
                </div>
            </div>
            <div class="gc-body">
                <div class="gc-title">${s.title}</div>
                <div class="gc-dept">${s.dept || '—'}</div>
                <div class="gc-meta">
                    <span class="td-ver">${s.version}</span>
                    <span class="td-platform"><i class="bi bi-globe2"></i>${s.platform || 'Web'}</span>
                </div>
                <div class="gc-actions">
                    <button class="btn-gc-edit" onclick="editSystem(${s.id})"><i class="bi bi-pencil-fill"></i> Edit</button>
                    <button class="btn-gc-del" onclick="openDeleteModal('system',${s.id},'${s.title.replace(/'/g, "\\'")}')"><i class="bi bi-trash3-fill"></i> Delete</button>
                </div>
            </div>
        </div>`).join('');
}

function renderSystems() {
    const list = getFilteredSystems();
    updateSystemStats();
    renderSystemTable(list);
    renderSystemGrid(list);
    $('#systemResultCount').textContent = `${list.length} system${list.length !== 1 ? 's' : ''}`;
}

// System view toggle
$('#btnTableView')?.addEventListener('click', () => {
    $('#btnTableView').classList.add('active'); $('#btnGridView').classList.remove('active');
    $('#systemTableView').style.display = ''; $('#systemGridView').style.display = 'none';
});
$('#btnGridView')?.addEventListener('click', () => {
    $('#btnGridView').classList.add('active'); $('#btnTableView').classList.remove('active');
    $('#systemGridView').style.display = ''; $('#systemTableView').style.display = 'none';
});

// System filters
$('#systemSearch')?.addEventListener('input', renderSystems);
$('#catFilter')?.addEventListener('change', renderSystems);
$('#statusFilter')?.addEventListener('change', renderSystems);

// ── System Form Modal ──
function openSystemModal(sys = null) {
    const overlay = $('#systemFormOverlay');
    const title = $('#systemFormModalTitle');
    if (sys) {
        title.innerHTML = '<i class="bi bi-pencil me-2"></i>Edit System';
        $('#sysId').value = sys.id;
        $('#fSysTitle').value = sys.title;
        $('#fSysCategory').value = sys.category;
        $('#fSysStatus').value = sys.status;
        $('#fSysVersion').value = sys.version;
        $('#fSysPlatform').value = sys.platform || '';
        $('#fSysDept').value = sys.dept || '';
        $('#fSysAccess').value = sys.access || '';
        $('#fSysUpdate').value = sys.update || '';
        $('#fSysDesc').value = sys.desc || '';
        $('#fSysImage').value = sys.image || '';
        renderSysFeatures(sys.features || []);
        updateSysImgPreview();
    } else {
        title.innerHTML = '<i class="bi bi-plus-circle me-2"></i>Add New System';
        $('#systemForm').reset();
        $('#sysId').value = '';
        renderSysFeatures([]);
        $('#sysImgPrev').innerHTML = '<i class="bi bi-image"></i>';
    }
    overlay.classList.add('active');
}

function closeSystemModal() { $('#systemFormOverlay').classList.remove('active'); }

function renderSysFeatures(feats) {
    const cont = $('#sysFeaturesList');
    cont.innerHTML = '';
    feats.forEach(f => addSysFeatureRow(f));
}

function addSysFeatureRow(val = '') {
    const cont = $('#sysFeaturesList');
    const row = document.createElement('div');
    row.className = 'feat-row';
    row.innerHTML = `<input type="text" placeholder="Feature description" value="${val}"><button type="button" class="btn-rm-feat" onclick="this.parentElement.remove()"><i class="bi bi-x-lg"></i></button>`;
    cont.appendChild(row);
}

function updateSysImgPreview() {
    const url = $('#fSysImage')?.value;
    const prev = $('#sysImgPrev');
    if (url) { prev.innerHTML = `<img src="${url}" alt="Preview">`; }
    else { prev.innerHTML = '<i class="bi bi-image"></i>'; }
}

$('#fSysImage')?.addEventListener('input', updateSysImgPreview);
$('#addSysFeatBtn')?.addEventListener('click', () => addSysFeatureRow());
$('#openAddSystemModal')?.addEventListener('click', () => openSystemModal());
$('#closeSystemFormModal')?.addEventListener('click', closeSystemModal);
$('#cancelSystemForm')?.addEventListener('click', closeSystemModal);

$('#systemForm')?.addEventListener('submit', e => {
    e.preventDefault();
    const title = $('#fSysTitle').value.trim();
    const category = $('#fSysCategory').value;
    const status = $('#fSysStatus').value;
    const version = $('#fSysVersion').value.trim();
    const platform = $('#fSysPlatform').value;
    const desc = $('#fSysDesc').value.trim();

    // Validation
    let valid = true;
    [['fSysTitle', title], ['fSysCategory', category], ['fSysStatus', status], ['fSysVersion', version], ['fSysPlatform', platform], ['fSysDesc', desc]].forEach(([id, val]) => {
        const el = $(`#${id}`);
        if (!val) { el.classList.add('err'); valid = false; } else { el.classList.remove('err'); }
    });
    if (!valid) return;

    const features = $$('#sysFeaturesList input').map(i => i.value.trim()).filter(Boolean);
    const data = {
        title, category, status, version, platform, desc, features,
        dept: $('#fSysDept').value.trim(),
        access: $('#fSysAccess').value.trim(),
        update: $('#fSysUpdate').value.trim(),
        image: $('#fSysImage').value.trim(),
    };

    const editId = $('#sysId').value;
    if (editId) {
        const idx = systems.findIndex(s => s.id == editId);
        if (idx !== -1) { systems[idx] = { ...systems[idx], ...data }; }
        toast('System updated successfully');
    } else {
        data.id = sysNextId++;
        systems.push(data);
        toast('System added successfully');
    }
    saveSystems();
    renderSystems();
    closeSystemModal();
});

window.editSystem = function(id) {
    const sys = systems.find(s => s.id === id);
    if (sys) openSystemModal(sys);
};

// ══════════════════════════════════════
//   ACCOUNTS DATA & CRUD
// ══════════════════════════════════════
const DEFAULT_ACCOUNTS = [
    { id: 1, name: 'John Doe', email: 'john@onefoph.com', role: 'Admin', status: 'Active', dept: 'IT', phone: '+63 912 000 0001', position: 'System Administrator', avatar: '', notes: '', lastLogin: 'Feb 18, 2026' },
    { id: 2, name: 'Jane Smith', email: 'jane@onefoph.com', role: 'Editor', status: 'Active', dept: 'Finance', phone: '+63 912 000 0002', position: 'Finance Manager', avatar: '', notes: '', lastLogin: 'Feb 17, 2026' },
    { id: 3, name: 'Mark Reyes', email: 'mark@onefoph.com', role: 'Viewer', status: 'Inactive', dept: 'Operations', phone: '', position: 'Staff', avatar: '', notes: '', lastLogin: 'Jan 05, 2026' },
    { id: 4, name: 'Anna Cruz', email: 'anna@onefoph.com', role: 'Admin', status: 'Active', dept: 'HR', phone: '+63 912 000 0004', position: 'HR Director', avatar: '', notes: '', lastLogin: 'Feb 18, 2026' },
    { id: 5, name: 'Carlos Tan', email: 'carlos@onefoph.com', role: 'Editor', status: 'Suspended', dept: 'Marketing', phone: '', position: 'Marketing Lead', avatar: '', notes: 'Under review', lastLogin: 'Dec 20, 2025' },
];

let accounts = LS.get('adm_accounts') || DEFAULT_ACCOUNTS;
let accNextId = accounts.reduce((m, a) => Math.max(m, a.id), 0) + 1;

function saveAccounts() { LS.set('adm_accounts', accounts); }

const roleClass = r => ({ Admin: 'role-admin', Editor: 'role-editor', Viewer: 'role-viewer' }[r] || '');
const accStatusClass = s => ({ Active: 'sp-active', Inactive: 'sp-inactive', Suspended: 'sp-suspended' }[s] || '');
const initials = name => name.split(' ').map(w => w[0]).join('').toUpperCase().slice(0, 2);

function getFilteredAccounts() {
    const q = ($('#accountSearch')?.value || '').toLowerCase();
    const role = $('#roleFilter')?.value || 'all';
    const st = $('#accountStatusFilter')?.value || 'all';
    return accounts.filter(a => {
        if (q && !a.name.toLowerCase().includes(q) && !a.email.toLowerCase().includes(q)) return false;
        if (role !== 'all' && a.role !== role) return false;
        if (st !== 'all' && a.status !== st) return false;
        return true;
    });
}

function updateAccountStats() {
    $('#statTotalAccounts').textContent = accounts.length;
    $('#statActiveAccounts').textContent = accounts.filter(a => a.status === 'Active').length;
    $('#statInactiveAccounts').textContent = accounts.filter(a => a.status === 'Inactive').length;
    $('#statAdminAccounts').textContent = accounts.filter(a => a.role === 'Admin').length;
    $('#accountsCount').textContent = accounts.length;
}

function renderAccountTable(list) {
    const tbody = $('#accountTblBody');
    if (!list.length) {
        tbody.innerHTML = `<tr><td colspan="7"><div class="empty-state"><i class="bi bi-person-x"></i><h4>No accounts found</h4><p>Try adjusting your filters</p></div></td></tr>`;
        return;
    }
    tbody.innerHTML = list.map((a, i) => `
        <tr>
            <td class="td-num">${i + 1}</td>
            <td>
                <div class="td-user-cell">
                    ${a.avatar ? `<img src="${a.avatar}" class="td-user-avatar" alt="">` : `<div class="td-user-avatar-fallback">${initials(a.name)}</div>`}
                    <div class="td-user-info">
                        <span class="td-user-name">${a.name}</span>
                        <span class="td-user-position">${a.position || '—'}</span>
                    </div>
                </div>
            </td>
            <td style="font-size:.84rem;">${a.email}</td>
            <td><span class="role-pill ${roleClass(a.role)}">${a.role}</span></td>
            <td class="hide-sm" style="font-size:.8rem;">${a.lastLogin || '—'}</td>
            <td>
                <div class="td-actions">
                    <button class="btn-edit" title="Edit" onclick="editAccount(${a.id})"><i class="bi bi-pencil-fill"></i></button>
                    <button class="btn-del" title="Delete" onclick="openDeleteModal('account',${a.id},'${a.name.replace(/'/g, "\\'")}')"><i class="bi bi-trash3-fill"></i></button>
                </div>
            </td>
        </tr>`).join('');
}

function renderAccountGrid(list) {
    const grid = $('#accountGridView');
    if (!list.length) {
        grid.innerHTML = `<div class="empty-state" style="grid-column:1/-1"><i class="bi bi-person-x"></i><h4>No accounts found</h4></div>`;
        return;
    }
    grid.innerHTML = list.map(a => `
        <div class="grid-card">
            <div class="gc-img" style="height:70px;background:linear-gradient(135deg,rgba(var(--primary-rgb),.15),rgba(var(--secondary-rgb),.15))">
                <div class="gc-img-overlay" style="background:linear-gradient(to top,rgba(15,15,35,1) 0%,transparent 100%)"></div>
            </div>
            <div class="gc-body-centered">
                ${a.avatar ? `<img src="${a.avatar}" class="gc-avatar" alt="">` : `<div class="gc-avatar-fallback">${initials(a.name)}</div>`}
                <div class="gc-title">${a.name}</div>
                <div class="gc-email">${a.email}</div>
                <div class="gc-meta" style="justify-content:center">
                    <span class="role-pill ${roleClass(a.role)}">${a.role}</span>
                    <span class="status-pill ${accStatusClass(a.status)}">${a.status}</span>
                </div>
                <div class="gc-dept" style="margin:8px 0 12px">${a.dept || '—'} · ${a.position || '—'}</div>
                <div class="gc-actions">
                    <button class="btn-gc-edit" onclick="editAccount(${a.id})"><i class="bi bi-pencil-fill"></i> Edit</button>
                    <button class="btn-gc-del" onclick="openDeleteModal('account',${a.id},'${a.name.replace(/'/g, "\\'")}')"><i class="bi bi-trash3-fill"></i> Delete</button>
                </div>
            </div>
        </div>`).join('');
}

function renderAccounts() {
    const list = getFilteredAccounts();
    updateAccountStats();
    renderAccountTable(list);
    renderAccountGrid(list);
    $('#accountResultCount').textContent = `${list.length} account${list.length !== 1 ? 's' : ''}`;
}

// Account view toggle
$('#btnAccTableView')?.addEventListener('click', () => {
    $('#btnAccTableView').classList.add('active'); $('#btnAccGridView').classList.remove('active');
    $('#accountTableView').style.display = ''; $('#accountGridView').style.display = 'none';
});
$('#btnAccGridView')?.addEventListener('click', () => {
    $('#btnAccGridView').classList.add('active'); $('#btnAccTableView').classList.remove('active');
    $('#accountGridView').style.display = ''; $('#accountTableView').style.display = 'none';
});

// Account filters
$('#accountSearch')?.addEventListener('input', renderAccounts);
$('#roleFilter')?.addEventListener('change', renderAccounts);
$('#accountStatusFilter')?.addEventListener('change', renderAccounts);

// ── Account Form Modal ──
function openAccountModal(acc = null) {
    const overlay = $('#accountFormOverlay');
    const title = $('#accountFormModalTitle');
    if (acc) {
        title.innerHTML = '<i class="bi bi-pencil me-2"></i>Edit Account';
        $('#accId').value = acc.id;
        $('#fAccName').value = acc.name;
        $('#fAccEmail').value = acc.email;
        $('#fAccRole').value = acc.role;
        $('#fAccStatus').value = acc.status;
        $('#fAccDept').value = acc.dept || '';
        $('#fAccPhone').value = acc.phone || '';
        $('#fAccPosition').value = acc.position || '';
        $('#fAccAvatar').value = acc.avatar || '';
        $('#fAccNotes').value = acc.notes || '';
        updateAccImgPreview();
    } else {
        title.innerHTML = '<i class="bi bi-person-plus me-2"></i>Add New Account';
        $('#accountForm').reset();
        $('#accId').value = '';
        $('#accImgPrev').innerHTML = '<i class="bi bi-person-circle"></i>';
    }
    overlay.classList.add('active');
}

function closeAccountModal() { $('#accountFormOverlay').classList.remove('active'); }

function updateAccImgPreview() {
    const url = $('#fAccAvatar')?.value;
    const prev = $('#accImgPrev');
    if (url) { prev.innerHTML = `<img src="${url}" alt="Preview">`; }
    else { prev.innerHTML = '<i class="bi bi-person-circle"></i>'; }
}

$('#fAccAvatar')?.addEventListener('input', updateAccImgPreview);
$('#openAddAccountModal')?.addEventListener('click', () => openAccountModal());
$('#closeAccountFormModal')?.addEventListener('click', closeAccountModal);
$('#cancelAccountForm')?.addEventListener('click', closeAccountModal);

$('#accountForm')?.addEventListener('submit', e => {
    e.preventDefault();
    const name = $('#fAccName').value.trim();
    const email = $('#fAccEmail').value.trim();
    const role = $('#fAccRole').value;
    const status = $('#fAccStatus').value;

    let valid = true;
    [['fAccName', name], ['fAccEmail', email], ['fAccRole', role], ['fAccStatus', status]].forEach(([id, val]) => {
        const el = $(`#${id}`);
        if (!val) { el.classList.add('err'); valid = false; } else { el.classList.remove('err'); }
    });
    if (!valid) return;

    const data = {
        name, email, role, status,
        dept: $('#fAccDept').value.trim(),
        phone: $('#fAccPhone').value.trim(),
        position: $('#fAccPosition').value.trim(),
        avatar: $('#fAccAvatar').value.trim(),
        notes: $('#fAccNotes').value.trim(),
        lastLogin: new Date().toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }),
    };

    const editId = $('#accId').value;
    if (editId) {
        const idx = accounts.findIndex(a => a.id == editId);
        if (idx !== -1) { accounts[idx] = { ...accounts[idx], ...data }; }
        toast('Account updated successfully');
    } else {
        data.id = accNextId++;
        accounts.push(data);
        toast('Account added successfully');
    }
    saveAccounts();
    renderAccounts();
    closeAccountModal();
});

window.editAccount = function(id) {
    const acc = accounts.find(a => a.id === id);
    if (acc) openAccountModal(acc);
};

// ══════════════════════════════════════
//   SHARED DELETE MODAL
// ══════════════════════════════════════
let deleteTarget = { type: '', id: 0 };

window.openDeleteModal = function(type, id, name) {
    deleteTarget = { type, id };
    $('#delName').textContent = name;
    $('#deleteModalTitle').innerHTML = type === 'system'
        ? '<i class="bi bi-trash3 me-2"></i>Delete System'
        : '<i class="bi bi-trash3 me-2"></i>Delete Account';
    $('#deleteOverlay').classList.add('active');
};

function closeDeleteModal() { $('#deleteOverlay').classList.remove('active'); }

$('#closeDeleteModal')?.addEventListener('click', closeDeleteModal);
$('#cancelDelete')?.addEventListener('click', closeDeleteModal);

$('#confirmDelete')?.addEventListener('click', () => {
    if (deleteTarget.type === 'system') {
        systems = systems.filter(s => s.id !== deleteTarget.id);
        saveSystems();
        renderSystems();
        toast('System deleted', 'success');
    } else {
        accounts = accounts.filter(a => a.id !== deleteTarget.id);
        saveAccounts();
        renderAccounts();
        toast('Account deleted', 'success');
    }
    closeDeleteModal();
});

// ── Close modals on overlay click ──
$$('.adm-overlay').forEach(overlay => {
    overlay.addEventListener('click', e => {
        if (e.target === overlay) overlay.classList.remove('active');
    });
});

// ── ESC key closes modals ──
document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
        $$('.adm-overlay.active').forEach(o => o.classList.remove('active'));
    }
});

// ══════════════════════════════════════
//   INIT
// ══════════════════════════════════════
renderSystems();
renderAccounts();