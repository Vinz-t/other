let currentFilter = 'all';
let currentSearch = '';

// System Data
const systemsData = {
    hrms: {
        title: "GO FOPH - Dropbox",
        desc: "Have suggestions or questions? Share them here!",
        image: "assets/img/GO FOPH - Dropbox.png",
        badge: "Active",
        badgeClass: "badge-active",
        version: "v2.5",
        deployDate: "Jan 2026",
        lastUpdate: "Jan 2026",
        access: "All Staff",
        department: "Human Resources",
        features: ["Employee Database", "Leave Management", "Performance Reviews", "Onboarding Portal", "Payroll Integration", "Reports & Analytics"]
    },
    fms: {
        title: "Financial Management System",
        desc: "Streamlined financial operations including budgeting, expense tracking, invoice management, and comprehensive financial reporting for better decision making.",
        image: "https://images.unsplash.com/photo-1554224155-6726b3ff858f?w=600&h=400&fit=crop",
        badge: "Active",
        badgeClass: "badge-active",
        version: "v3.1",
        deployDate: "Feb 2026",
        lastUpdate: "Feb 2026",
        access: "Finance Team",
        department: "Finance",
        features: ["Budget Planning", "Expense Tracking", "Invoice Management", "Financial Reports", "Cash Flow Analysis", "Tax Management"]
    },
    ims: {
        title: "Inventory Management System",
        desc: "Real-time inventory tracking, stock management, automated reorder notifications, and warehouse optimization tools for efficient supply chain management.",
        image: "https://images.unsplash.com/photo-1553413077-190dd305871c?w=600&h=400&fit=crop",
        badge: "Active",
        badgeClass: "badge-active",
        version: "v1.8",
        deployDate: "Dec 2025",
        lastUpdate: "Dec 2025",
        access: "Operations",
        department: "Supply Chain",
        features: ["Stock Tracking", "Barcode Scanning", "Reorder Alerts", "Warehouse Management", "Supplier Portal", "Inventory Reports"]
    },
    pms: {
        title: "Project Management System",
        desc: "Collaborative project planning, task assignment, milestone tracking, and team collaboration tools to deliver projects on time and within budget.",
        image: "https://images.unsplash.com/photo-1507925921958-8a62f3d1a50d?w=600&h=400&fit=crop",
        badge: "New",
        badgeClass: "badge-new",
        version: "v1.0",
        deployDate: "Feb 2026",
        lastUpdate: "Feb 2026",
        access: "All Staff",
        department: "Operations",
        features: ["Task Management", "Gantt Charts", "Team Collaboration", "Time Tracking", "Resource Planning", "Progress Reports"]
    },
    attendance: {
        title: "Attendance & Time Tracking",
        desc: "Automated attendance recording, biometric integration, shift scheduling, and overtime calculation for accurate workforce management.",
        image: "https://images.unsplash.com/photo-1611532736597-de2d4265fba3?w=600&h=400&fit=crop",
        badge: "Active",
        badgeClass: "badge-active",
        version: "v2.2",
        deployDate: "Jan 2026",
        lastUpdate: "Jan 2026",
        access: "All Staff",
        department: "Human Resources",
        features: ["Biometric Integration", "Shift Scheduling", "Overtime Calculation", "Leave Calendar", "Mobile Check-in", "Attendance Reports"]
    },
    bi: {
        title: "Business Intelligence Dashboard",
        desc: "Comprehensive analytics and reporting platform with interactive visualizations, custom dashboards, and data-driven insights for strategic decisions.",
        image: "https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&h=400&fit=crop",
        badge: "Active",
        badgeClass: "badge-active",
        version: "v4.0",
        deployDate: "Feb 2026",
        lastUpdate: "Feb 2026",
        access: "Management",
        department: "Analytics",
        features: ["Custom Dashboards", "Data Visualization", "Report Builder", "KPI Tracking", "Data Export", "Scheduled Reports"]
    },
    dms: {
        title: "Document Management System",
        desc: "Centralized document storage with version control, secure sharing, workflow automation, and compliance management capabilities.",
        image: "https://images.unsplash.com/photo-1568667256549-094345857637?w=600&h=400&fit=crop",
        badge: "Active",
        badgeClass: "badge-active",
        version: "v2.0",
        deployDate: "Nov 2025",
        lastUpdate: "Nov 2025",
        access: "All Staff",
        department: "Administration",
        features: ["Cloud Storage", "Version Control", "Access Control", "Document Search", "Workflow Automation", "Audit Trail"]
    },
    procurement: {
        title: "Procurement System",
        desc: "End-to-end procurement workflow management from requisition to purchase order, vendor management, and contract administration.",
        image: "https://images.unsplash.com/photo-1450101499163-c8848c66ca85?w=600&h=400&fit=crop",
        badge: "In Dev",
        badgeClass: "badge-development",
        version: "v0.9",
        deployDate: "Feb 2026",
        lastUpdate: "Feb 2026",
        access: "Procurement",
        department: "Finance",
        features: ["Purchase Requests", "Vendor Management", "Approval Workflow", "Contract Management", "RFQ Management", "Spend Analytics"]
    },
    lms: {
        title: "Training & Learning Management",
        desc: "Online training platform with course creation, content management, progress tracking, assessments, and certification management.",
        image: "https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=600&h=400&fit=crop",
        badge: "New",
        badgeClass: "badge-new",
        version: "v1.0",
        deployDate: "Jan 2026",
        lastUpdate: "Jan 2026",
        access: "All Staff",
        department: "Human Resources",
        features: ["Course Library", "Video Training", "Assessments", "Certifications", "Progress Tracking", "Learning Paths"]
    },
    helpdesk: {
        title: "Helpdesk & Ticketing System",
        desc: "IT support ticketing system with SLA management, knowledge base, and automated routing for efficient issue resolution.",
        image: "https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?w=600&h=400&fit=crop",
        badge: "Active",
        badgeClass: "badge-active",
        version: "v3.2",
        deployDate: "Dec 2025",
        lastUpdate: "Dec 2025",
        access: "All Staff",
        department: "IT Support",
        features: ["Ticket Management", "SLA Monitoring", "Knowledge Base", "Auto-routing", "Email Integration", "Performance Metrics"]
    },
    performance: {
        title: "Performance Analytics System",
        desc: "Advanced performance metrics, KPI monitoring, trend analysis, and predictive analytics for organizational excellence.",
        image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600&h=400&fit=crop",
        badge: "In Dev",
        badgeClass: "badge-development",
        version: "v0.8",
        deployDate: "Feb 2026",
        lastUpdate: "Feb 2026",
        access: "Management",
        department: "Analytics",
        features: ["KPI Dashboards", "Trend Analysis", "Predictive Analytics", "Benchmarking", "Goal Tracking", "Custom Metrics"]
    },
    notification: {
        title: "Notification & Announcement Center",
        desc: "Centralized communication platform for company-wide announcements, push notifications, and targeted messaging.",
        image: "https://images.unsplash.com/photo-1557200134-90327ee9fafa?w=600&h=400&fit=crop",
        badge: "Active",
        badgeClass: "badge-active",
        version: "v1.5",
        deployDate: "Jan 2026",
        lastUpdate: "Jan 2026",
        access: "All Staff",
        department: "Communications",
        features: ["Broadcast Messages", "Push Notifications", "Email Alerts", "Scheduled Posts", "Target Groups", "Read Receipts"]
    }
};

// Loading Tips
const loadingTips = [
    "Preparing your dashboard experience",
    "Loading system configurations",
    "Connecting to services",
    "Initializing user interface",
    "Almost there..."
];

// DOM Elements
const track = document.getElementById('carouselTrack');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const prevBtnTop = document.getElementById('prevBtnTop');
const nextBtnTop = document.getElementById('nextBtnTop');
const dotsContainer = document.getElementById('carouselDots');
const filterTabs = document.querySelectorAll('.filter-tab');
const allCards = document.querySelectorAll('.system-card');
const visibleCountEl = document.getElementById('visibleCount');
const noResults = document.getElementById('noResults');
const preloader = document.getElementById('preloader');
const mainContainer = document.getElementById('mainContainer');
const progressFill = document.getElementById('progressFill');
const progressPercent = document.getElementById('progressPercent');
const loadingTip = document.getElementById('loadingTip');
const mouseTrail = document.getElementById('mouseTrail');
const mouseDot = document.getElementById('mouseDot');

// Search DOM Elements
const searchBtn = document.getElementById('searchBtn');
const searchWrapper = document.getElementById('searchWrapper');
const searchInput = document.getElementById('searchInput');
const searchClose = document.getElementById('searchClose');

let currentIndex = 0;
let visibleCards = [];
let cardWidth = 344;
let progress = 0;
let tipIndex = 0;

// ==================== ENHANCED PRELOADER ====================

const preloaderParticles = document.getElementById('preloaderParticles');
for (let i = 0; i < 20; i++) {
    const particle = document.createElement('div');
    particle.className = 'preloader-particle';
    particle.style.left = Math.random() * 100 + '%';
    particle.style.animationDelay = Math.random() * 3 + 's';
    particle.style.animationDuration = (Math.random() * 2 + 2) + 's';
    particle.style.background = ['var(--primary)', 'var(--accent)', 'var(--secondary)'][Math.floor(Math.random() * 3)];
    preloaderParticles.appendChild(particle);
}

function simulateLoading() {
    const interval = setInterval(() => {
        progress += Math.random() * 15;
        if (progress >= 100) {
            progress = 100;
            clearInterval(interval);
            setTimeout(hidePreloader, 500);
        }
        updateProgress(progress);
    }, 200);
}

function updateProgress(value) {
    progressFill.style.width = value + '%';
    progressPercent.textContent = Math.round(value) + '%';

    const newTipIndex = Math.floor(value / 25);
    if (newTipIndex !== tipIndex && newTipIndex < loadingTips.length) {
        tipIndex = newTipIndex;
        loadingTip.style.opacity = '0';
        setTimeout(() => {
            loadingTip.textContent = loadingTips[tipIndex];
            loadingTip.style.opacity = '1';
        }, 200);
    }
}

// ← MODIFIED: added initParallax() and initMagneticButtons()
function hidePreloader() {
    preloader.classList.add('fade-out');
    setTimeout(() => {
        preloader.style.display = 'none';
        mainContainer.classList.add('visible');
        initCarousel();
        initMouseEffects();
        initParallax();
        initMagneticButtons();
    }, 800);
}

window.addEventListener('load', () => {
    setTimeout(simulateLoading, 500);
});

// ==================== MOUSE EFFECTS ====================

function initMouseEffects() {
    let mouseX = 0, mouseY = 0;
    let trailX = 0, trailY = 0;

    document.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        mouseDot.style.left = mouseX + 'px';
        mouseDot.style.top = mouseY + 'px';
        mouseDot.classList.add('active');
        mouseTrail.classList.add('active');
    });

    function animateTrail() {
        trailX += (mouseX - trailX) * 0.15;
        trailY += (mouseY - trailY) * 0.15;
        mouseTrail.style.left = trailX + 'px';
        mouseTrail.style.top = trailY + 'px';
        requestAnimationFrame(animateTrail);
    }
    animateTrail();

    document.addEventListener('mouseleave', () => {
        mouseDot.classList.remove('active');
        mouseTrail.classList.remove('active');
    });
}

// ==================== PARTICLES ====================

const particlesContainer = document.getElementById('particles');
for (let i = 0; i < 40; i++) {
    const particle = document.createElement('div');
    const type = Math.floor(Math.random() * 3) + 1;
    particle.className = `particle type-${type}`;
    particle.style.left = Math.random() * 100 + '%';
    particle.style.animationDelay = Math.random() * 20 + 's';
    particle.style.animationDuration = (Math.random() * 15 + 15) + 's';
    particlesContainer.appendChild(particle);
}

// ==================== CARD EFFECTS ====================
// ← MODIFIED: added 3D tilt on mousemove + reset on mouseleave

allCards.forEach(card => {
    card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();

        // Existing radial glow position
        const x = ((e.clientX - rect.left) / rect.width)  * 100;
        const y = ((e.clientY - rect.top)  / rect.height) * 100;
        card.style.setProperty('--mouse-x', x + '%');
        card.style.setProperty('--mouse-y', y + '%');

        // 3D tilt based on cursor position within the card
        const cx = rect.left + rect.width  / 2;
        const cy = rect.top  + rect.height / 2;
        const tiltX = ((e.clientY - cy) / (rect.height / 2)) * -6;
        const tiltY = ((e.clientX - cx) / (rect.width  / 2)) *  6;
        card.style.setProperty('--tilt-x', tiltX + 'deg');
        card.style.setProperty('--tilt-y', tiltY + 'deg');
    });

    card.addEventListener('mouseleave', () => {
        card.style.setProperty('--tilt-x', '0deg');
        card.style.setProperty('--tilt-y', '0deg');
    });
});

// ==================== CAROUSEL ====================

function calculateCardWidth() {
    const wrapper = document.querySelector('.carousel-wrapper');
    if (!wrapper) return;

    const cs              = getComputedStyle(wrapper);
    const availableWidth  = wrapper.clientWidth
                          - parseFloat(cs.paddingLeft)
                          - parseFloat(cs.paddingRight);

    const cardsToShow = getVisibleCount();
    const gap         = parseInt(getComputedStyle(track).gap) || 20;
    const cardW       = Math.floor(
        (availableWidth - (cardsToShow - 1) * gap) / cardsToShow
    );

    document.querySelectorAll('.system-card').forEach(card => {
        card.style.minWidth = cardW + 'px';
        card.style.maxWidth = cardW + 'px';
    });

    cardWidth = cardW + gap;
}

function initCarousel() {
    calculateCardWidth();
    applyFilters();
}

// ==================== SEARCH & FILTER ====================

function applyFilters() {
    visibleCards = [];

    allCards.forEach(card => {
        const cardCategory = card.getAttribute('data-category');
        const cardSystem   = card.getAttribute('data-system');
        const system       = systemsData[cardSystem];

        const matchesFilter = currentFilter === 'all' || cardCategory === currentFilter;

        let matchesSearch = true;
        if (currentSearch && system) {
            const haystack = [
                system.title,
                system.desc,
                system.department,
                cardCategory
            ].join(' ').toLowerCase();
            matchesSearch = haystack.includes(currentSearch);
        }

        if (matchesFilter && matchesSearch) {
            card.style.display     = 'flex';
            card.style.transition  = 'none';   // freeze — no width animation
            card.classList.remove('visible');   // reset entrance state
            visibleCards.push(card);
        } else {
            card.style.display = 'none';
        }
    });

    // Update counts / dots while everything is frozen
    visibleCountEl.textContent = visibleCards.length;
    noResults.classList.toggle('show', visibleCards.length === 0);
    currentIndex = 0;

    // Resize cards and position track — no visible animation yet
    calculateCardWidth();
    updateCarousel();
    createDots();

    // Double rAF:
    //   frame 1 → browser processes the resize & translateX
    //   frame 2 → layout is committed, now safe to re-enable transitions
    requestAnimationFrame(() => {
        requestAnimationFrame(() => {
            const animsOn = document.getElementById('toggleAnimations').checked;
            visibleCards.forEach((card, index) => {
                // Restore transition (respects the animations toggle)
                card.style.transition = animsOn
                    ? ''   // fall back to CSS: all 0.5s cubic-bezier(...)
                    : 'none';

                // Stagger the entrance
                setTimeout(() => card.classList.add('visible'), index * 80);
            });
        });
    });
}

// Filter Tab Click Handler
filterTabs.forEach(tab => {
    tab.addEventListener('click', () => {
        filterTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        currentFilter = tab.getAttribute('data-filter');
        applyFilters();
    });
});

// Search Handlers
searchBtn.addEventListener('click', () => {
    searchWrapper.classList.add('active');
    searchInput.focus();
});

searchClose.addEventListener('click', () => {
    searchWrapper.classList.remove('active');
    searchInput.value = '';
    currentSearch = '';
    applyFilters();
});

searchInput.addEventListener('input', (e) => {
    currentSearch = e.target.value.toLowerCase().trim();
    applyFilters();
});

// ==================== NAVIGATION ====================

function getVisibleCount() {
    if (window.innerWidth <= 480) return 1;
    if (window.innerWidth <= 768) return 2;
    return 3;
}

// function getVisibleCount() {
//     const wrapperWidth = document.querySelector('.carousel-wrapper').offsetWidth;
//     return Math.floor(wrapperWidth / cardWidth) || 1;
// }

function updateCarousel() {
    const offset = currentIndex * cardWidth;
    track.style.transform = `translateX(-${offset}px)`;
    updateButtons();
    updateDots();
}

function updateButtons() {
    const viewportCards = getVisibleCount();
    const maxIndex = Math.max(0, visibleCards.length - viewportCards);
    prevBtn.disabled = currentIndex <= 0;
    nextBtn.disabled = currentIndex >= maxIndex;
    prevBtnTop.disabled = currentIndex <= 0;
    nextBtnTop.disabled = currentIndex >= maxIndex;
}

function createDots() {
    dotsContainer.innerHTML = '';
    const viewportCards = getVisibleCount();
    const totalSlides = Math.ceil(visibleCards.length / viewportCards);

    if (totalSlides <= 1) {
        dotsContainer.style.display = 'none';
        return;
    }

    dotsContainer.style.display = 'flex';

    for (let i = 0; i < totalSlides; i++) {
        const dot = document.createElement('div');
        dot.classList.add('carousel-dot');
        if (i === 0) dot.classList.add('active');
        dot.addEventListener('click', () => {
            currentIndex = i * viewportCards;
            if (currentIndex > visibleCards.length - viewportCards) {
                currentIndex = visibleCards.length - viewportCards;
            }
            updateCarousel();
        });
        dotsContainer.appendChild(dot);
    }
}

function updateDots() {
    const viewportCards = getVisibleCount();
    const activeDotIndex = Math.floor(currentIndex / viewportCards);
    document.querySelectorAll('.carousel-dot').forEach((dot, i) => {
        dot.classList.toggle('active', i === activeDotIndex);
    });
}

function goToPrev() {
    if (currentIndex > 0) {
        currentIndex--;
        updateCarousel();
    }
}

function goToNext() {
    const viewportCards = getVisibleCount();
    const maxIndex = Math.max(0, visibleCards.length - viewportCards);
    if (currentIndex < maxIndex) {
        currentIndex++;
        updateCarousel();
    }
}

prevBtn.addEventListener('click', goToPrev);
nextBtn.addEventListener('click', goToNext);
prevBtnTop.addEventListener('click', goToPrev);
nextBtnTop.addEventListener('click', goToNext);

document.addEventListener('keydown', (e) => {
    if (e.key === 'ArrowLeft') goToPrev();
    if (e.key === 'ArrowRight') goToNext();
    if (e.key === 'Escape') closeModal();
});

// Touch/Swipe
let touchStartX = 0;
let touchEndX = 0;

track.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
}, { passive: true });

track.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    const diff = touchStartX - touchEndX;
    if (Math.abs(diff) > 50) diff > 0 ? goToNext() : goToPrev();
}, { passive: true });

// Resize
let resizeTimeout;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
        calculateCardWidth();
        const viewportCards = getVisibleCount();
        const maxIndex = Math.max(0, visibleCards.length - viewportCards);
        if (currentIndex > maxIndex) currentIndex = maxIndex;
        updateCarousel();
        createDots();
    }, 150);
});

// ==================== MODAL ====================

const modal = document.getElementById('systemModal');
const modalClose = document.getElementById('modalClose');

allCards.forEach(card => {
    card.addEventListener('click', (e) => {
        if (e.target.closest('.card-btn')) {
            e.stopPropagation();
            return;
        }

        const systemKey = card.getAttribute('data-system');
        const system = systemsData[systemKey];

        if (system) {
            document.getElementById('modalImage').src = system.image;
            document.getElementById('modalTitle').textContent = system.title;
            document.getElementById('modalDesc').textContent = system.desc;

            const badgeEl = document.getElementById('modalBadge');
            badgeEl.textContent = system.badge;
            badgeEl.className = 'modal-badge ' + system.badgeClass;

            document.getElementById('modalVersion').textContent = system.version;

            const platformEl = document.getElementById('modalPlatform');
            platformEl.innerHTML = `<i class="bi bi-calendar3"></i> <span>${system.deployDate}</span>`; 

            // const platformEl = document.getElementById('modalPlatform');
            // platformEl.innerHTML = `<i class="bi ${system.platformIcon}"></i> <span>${system.platform}</span>`;

            document.getElementById('modalLastUpdate').textContent = system.lastUpdate;
            document.getElementById('modalAccess').textContent = system.access;
            document.getElementById('modalDepartment').textContent = system.department;

            const featuresEl = document.getElementById('modalFeatures');
            featuresEl.innerHTML = system.features.map(f => `
                <div class="feature-item">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>${f}</span>
                </div>
            `).join('');

            modal.classList.add('active');
        }
    });
});

modalClose.addEventListener('click', closeModal);
modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
});

function closeModal() {
    modal.classList.remove('active');
}

// ==================== SETTINGS ====================

const settingsBtn      = document.getElementById('settingsBtn');
const settingsPanel    = document.getElementById('settingsPanel');
const settingsOverlay  = document.getElementById('settingsOverlay');
const settingsClose    = document.getElementById('settingsClose');

settingsBtn.addEventListener('click', () => {
    settingsPanel.classList.add('active');
    settingsOverlay.classList.add('active');
});

[settingsClose, settingsOverlay].forEach(el =>
    el.addEventListener('click', closeSettings)
);

function closeSettings() {
    settingsPanel.classList.remove('active');
    settingsOverlay.classList.remove('active');
}

// Helper: convert #hex → "r, g, b" for rgba()
function hexToRgb(hex) {
    const r = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
    return r
        ? `${parseInt(r[1], 16)}, ${parseInt(r[2], 16)}, ${parseInt(r[3], 16)}`
        : '102, 126, 234';
}

// Apply full theme including RGB vars
function applyTheme(primary, secondary, accent) {
    const root = document.documentElement;
    root.style.setProperty('--primary',   primary);
    root.style.setProperty('--secondary', secondary);
    root.style.setProperty('--accent',    accent);
    root.style.setProperty('--primary-gradient',
        `linear-gradient(135deg, ${primary} 0%, ${secondary} 100%)`);
    root.style.setProperty('--primary-rgb',   hexToRgb(primary));
    root.style.setProperty('--secondary-rgb', hexToRgb(secondary));
    root.style.setProperty('--accent-rgb',    hexToRgb(accent));
}

// Accent Color presets
document.querySelectorAll('.color-preset').forEach(preset => {
    preset.addEventListener('click', () => {
        document.querySelectorAll('.color-preset').forEach(p => p.classList.remove('active'));
        preset.classList.add('active');
        applyTheme(preset.dataset.primary, preset.dataset.secondary, preset.dataset.accent);
    });
});

// Particles toggle
document.getElementById('toggleParticles').addEventListener('change', e => {
    particlesContainer.style.transition = 'opacity 0.4s ease';
    particlesContainer.style.opacity = e.target.checked ? '1' : '0';
});

// Mouse trail toggle
document.getElementById('toggleMouseTrail').addEventListener('change', e => {
    const display = e.target.checked ? '' : 'none';
    mouseTrail.style.display = display;
    mouseDot.style.display   = display;
});

// Floating shapes toggle
document.getElementById('toggleShapes').addEventListener('change', e => {
    const shapes = document.querySelector('.floating-shapes');
    shapes.style.transition = 'opacity 0.4s ease';
    shapes.style.opacity = e.target.checked ? '1' : '0';
});

// Card animations toggle
document.getElementById('toggleAnimations').addEventListener('change', e => {
    document.querySelectorAll('.system-card').forEach(card => {
        card.style.transition = e.target.checked
            ? 'all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275)'
            : 'none';
    });
});

// Carousel speed
document.querySelectorAll('.speed-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.speed-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        track.style.transition =
            `transform ${btn.dataset.speed} cubic-bezier(0.25, 0.46, 0.45, 0.94)`;
    });
});

// Reset all settings
document.getElementById('resetSettings').addEventListener('click', () => {
    applyTheme('#667eea', '#764ba2', '#f093fb');

    document.querySelectorAll('.color-preset').forEach((p, i) =>
        p.classList.toggle('active', i === 0));

    document.getElementById('toggleParticles').checked  = true;
    document.getElementById('toggleMouseTrail').checked = true;
    document.getElementById('toggleShapes').checked     = true;
    document.getElementById('toggleAnimations').checked = true;

    particlesContainer.style.opacity = '1';
    mouseTrail.style.display = '';
    mouseDot.style.display   = '';
    document.querySelector('.floating-shapes').style.opacity = '1';
    document.querySelectorAll('.system-card').forEach(card => {
        card.style.transition = 'all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
    });

    document.querySelectorAll('.speed-btn').forEach((b, i) =>
        b.classList.toggle('active', i === 1));
    track.style.transition =
        'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
});

// ==================== PARALLAX ====================

function initParallax() {
    const bgImage = document.getElementById('bgImage');
    const aurora  = document.getElementById('auroraLight');

    let targetX = 0, targetY = 0;
    let currentX = 0, currentY = 0;
    let auroraX = 0,  auroraY = 0;
    let auroraTargetX = window.innerWidth  / 2;
    let auroraTargetY = window.innerHeight / 2;

    document.addEventListener('mousemove', (e) => {
        targetX = (e.clientX / window.innerWidth  - 0.5) * 18;
        targetY = (e.clientY / window.innerHeight - 0.5) * 18;
        auroraTargetX = e.clientX;
        auroraTargetY = e.clientY;
        aurora.classList.add('active');
    });

    document.addEventListener('mouseleave', () =>
        aurora.classList.remove('active')
    );

    function tick() {
        // Smooth lerp toward mouse target
        currentX += (targetX - currentX) * 0.04;
        currentY += (targetY - currentY) * 0.04;
        auroraX  += (auroraTargetX - auroraX) * 0.07;
        auroraY  += (auroraTargetY - auroraY) * 0.07;

        // Background drifts subtly (scale prevents edge gaps)
        bgImage.style.transform =
            `translate(${currentX}px, ${currentY}px) scale(1.06)`;

        // Aurora centered on cursor (800px / 2 = 400 offset)
        aurora.style.transform =
            `translate(${auroraX - 400}px, ${auroraY - 400}px)`;

        requestAnimationFrame(tick);
    }
    tick();
}

// ==================== MAGNETIC BUTTONS ====================

function initMagneticButtons() {
    document.querySelectorAll('.btn-icon').forEach(btn => {
        btn.addEventListener('mousemove', (e) => {
            const rect = btn.getBoundingClientRect();
            const dx = (e.clientX - (rect.left + rect.width  / 2)) * 0.35;
            const dy = (e.clientY - (rect.top  + rect.height / 2)) * 0.35;
            btn.style.transform = `translate(${dx}px, ${dy}px) translateY(-2px)`;
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = '';
        });
    });
}

// ==================== RIPPLE ====================

function addRipple(e, el) {
    const rect = el.getBoundingClientRect();
    const size = Math.max(rect.width, rect.height) * 1.6;
    const ripple = document.createElement('span');
    ripple.className = 'ripple';
    ripple.style.cssText = `
        width:  ${size}px;
        height: ${size}px;
        left:   ${e.clientX - rect.left - size / 2}px;
        top:    ${e.clientY - rect.top  - size / 2}px;
    `;
    el.appendChild(ripple);
    setTimeout(() => ripple.remove(), 700);
}

// Attach ripple to interactive elements
document.querySelectorAll('.filter-tab, .btn-icon, .card-btn').forEach(el => {
    el.addEventListener('click', e => addRipple(e, el));
});

allCards.forEach(card => {
    card.addEventListener('click', e => {
        if (!e.target.closest('.card-btn')) addRipple(e, card);
    });
});

// ==================== LOGIN ====================

const loginOverlay  = document.getElementById('loginOverlay');
const loginCloseBtn = document.getElementById('loginClose');
const openLoginBtn  = document.getElementById('openLoginBtn');
const loginFormEl   = document.getElementById('loginForm');
const loginErrorEl  = document.getElementById('loginError');
const loginErrorMsg = document.getElementById('loginErrorMsg');

// Mock credentials — swap out for real auth endpoint
const MOCK_USERS = [
    { username: 'admin',    password: 'admin123',    name: 'Admin User',   role: 'Administrator', initials: 'AU' },
    { username: 'john.doe', password: 'password123', name: 'John Doe',     role: 'HR Manager',    initials: 'JD' },
    { username: 'demo',     password: 'demo',        name: 'Demo Account', role: 'Viewer',        initials: 'DA' },
];

let currentUser = null;

function openLogin() {
    loginOverlay.classList.add('active');
    setTimeout(() => document.getElementById('loginUsername').focus(), 420);
}

function closeLogin() {
    loginOverlay.classList.remove('active');
}

// Open login: close settings first, then open after slide-out
openLoginBtn.addEventListener('click', () => {
    closeSettings();
    setTimeout(openLogin, 360);
});

loginCloseBtn.addEventListener('click', closeLogin);
loginOverlay.addEventListener('click', (e) => {
    if (e.target === loginOverlay) closeLogin();
});

// Escape key closes login too (piggy-backs existing keydown listener)
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeLogin();
});

// Password show / hide
document.getElementById('togglePassword').addEventListener('click', () => {
    const input   = document.getElementById('loginPassword');
    const eyeIcon = document.getElementById('eyeIcon');
    const show    = input.type === 'password';
    input.type    = show ? 'text' : 'password';
    eyeIcon.className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
});

// Form submit
loginFormEl.addEventListener('submit', (e) => {
    e.preventDefault();

    const username  = document.getElementById('loginUsername').value.trim();
    const password  = document.getElementById('loginPassword').value;
    const submitBtn = document.getElementById('loginSubmit');
    const btnText   = submitBtn.querySelector('.btn-login-text');
    const btnLoader = submitBtn.querySelector('.btn-login-loader');

    // Loading state
    btnText.style.display   = 'none';
    btnLoader.style.display = 'flex';
    loginErrorEl.style.display = 'none';
    submitBtn.disabled = true;

    // Simulate network delay (remove when using real auth)
    setTimeout(() => {
        const user = MOCK_USERS.find(
            u => u.username === username && u.password === password
        );

        if (user) {
            currentUser = user;
            handleLoginSuccess(user);
        } else {
            // Reset button
            btnText.style.display   = '';
            btnLoader.style.display = 'none';
            submitBtn.disabled      = false;

            // Show shake error
            loginErrorMsg.textContent =
                !username ? 'Please enter your username.'  :
                !password ? 'Please enter your password.'  :
                            'Incorrect username or password.';
            loginErrorEl.style.display   = 'flex';
            loginErrorEl.style.animation = 'none';
            requestAnimationFrame(() => {
                loginErrorEl.style.animation = '';
            });
        }
    }, 1200);
});

function handleLoginSuccess(user) {
    const formEl       = document.getElementById('loginForm');
    const successState = document.getElementById('loginSuccessState');

    document.getElementById('loginSuccessName').textContent =
        `Welcome back, ${user.name.split(' ')[0]}!`;

    // Fade form out
    formEl.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    formEl.style.opacity    = '0';
    formEl.style.transform  = 'translateY(-12px)';

    setTimeout(() => {
        formEl.style.display       = 'none';
        successState.style.display = 'flex';
    }, 320);

    // Close modal & update settings panel
    setTimeout(() => {
        closeLogin();
        updateAccountUI(user);

        // Reset form silently after modal has closed
        setTimeout(() => {
            formEl.style.transition = '';
            formEl.style.opacity    = '';
            formEl.style.transform  = '';
            formEl.style.display    = '';
            successState.style.display    = 'none';
            loginErrorEl.style.display    = 'none';

            const submitBtn = document.getElementById('loginSubmit');
            submitBtn.querySelector('.btn-login-text').style.display   = '';
            submitBtn.querySelector('.btn-login-loader').style.display = 'none';
            submitBtn.disabled = false;
            loginFormEl.reset();
        }, 450);
    }, 2400);
}

function updateAccountUI(user) {
    document.getElementById('accountLoggedOut').style.display = 'none';
    document.getElementById('accountLoggedIn').style.display  = 'flex';
    document.getElementById('displayName').textContent  = user.name;
    document.getElementById('displayRole').textContent  = user.role;
    document.getElementById('userInitials').textContent = user.initials;
}

// Logout
document.getElementById('logoutBtn').addEventListener('click', () => {
    currentUser = null;
    document.getElementById('accountLoggedIn').style.display  = 'none';
    document.getElementById('accountLoggedOut').style.display = 'flex';
});