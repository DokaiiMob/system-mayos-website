// SystemMayos Minecraft Server - JavaScript

// Global variables
let isRegistering = false;
let isAdminPanelOpen = false;
let isCheckingStatus = false;
let isMobileMenuOpen = false;
let copied = false;
let registrationStatus = 'idle'; // 'idle', 'loading', 'success', 'error'
let statusMessage = '';

// DOM elements
const serverIP = "system.mayos.server";

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    setupEventListeners();
    setupAnimatedBackground();
});

// Setup event listeners
function setupEventListeners() {
    // Copy IP button
    const copyButton = document.getElementById('copyButton');
    if (copyButton) {
        copyButton.addEventListener('click', copyToClipboard);
    }

    // Navigation menu toggle
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    if (mobileMenuButton) {
        mobileMenuButton.addEventListener('click', toggleMobileMenu);
    }

    // Registration modal buttons
    const registerButtons = document.querySelectorAll('[data-action="register"]');
    registerButtons.forEach(button => {
        button.addEventListener('click', openRegistrationModal);
    });

    // Admin panel button
    const adminButton = document.getElementById('adminButton');
    if (adminButton) {
        adminButton.addEventListener('click', openAdminPanel);
    }

    // Status check button
    const statusButton = document.getElementById('statusButton');
    if (statusButton) {
        statusButton.addEventListener('click', openStatusCheck);
    }

    // Close modal buttons
    const closeButtons = document.querySelectorAll('[data-action="close-modal"]');
    closeButtons.forEach(button => {
        button.addEventListener('click', closeAllModals);
    });

    // Registration form
    const registrationForm = document.getElementById('registrationForm');
    if (registrationForm) {
        registrationForm.addEventListener('submit', handleRegistration);
    }

    // Admin auth form
    const adminAuthForm = document.getElementById('adminAuthForm');
    if (adminAuthForm) {
        adminAuthForm.addEventListener('submit', handleAdminAuth);
    }

    // Smooth scrolling for navigation links
    const navLinks = document.querySelectorAll('a[href^="#"]');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({ behavior: 'smooth' });
                closeMobileMenu();
            }
        });
    });
}

// Setup animated background elements
function setupAnimatedBackground() {
    const animatedElements = [
        { x: 10, y: 20, size: 32, color: 'green-400', delay: 0 },
        { x: 80, y: 60, size: 24, color: 'purple-400', delay: 1000 },
        { x: 25, y: 80, size: 40, color: 'blue-400', delay: 2000 }
    ];

    const container = document.querySelector('.animated-bg');
    if (container) {
        animatedElements.forEach(el => {
            const div = document.createElement('div');
            div.className = `absolute w-${el.size} h-${el.size} bg-${el.color}/10 rounded-full blur-xl animate-pulse`;
            div.style.left = `${el.x}%`;
            div.style.top = `${el.y}%`;
            div.style.animationDelay = `${el.delay}ms`;
            container.appendChild(div);
        });
    }
}

// Copy server IP to clipboard
async function copyToClipboard() {
    try {
        await navigator.clipboard.writeText(serverIP);
        setCopiedState(true);
        setTimeout(() => setCopiedState(false), 2000);
    } catch (err) {
        console.error('Failed to copy: ', err);
        // Fallback for older browsers
        const textArea = document.createElement('textarea');
        textArea.value = serverIP;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        setCopiedState(true);
        setTimeout(() => setCopiedState(false), 2000);
    }
}

function setCopiedState(isCopied) {
    copied = isCopied;
    const button = document.getElementById('copyButton');
    if (button) {
        button.textContent = copied ? '✓ Скопировано!' : '📋 Скопировать IP';
        button.className = copied ?
            'btn btn-success w-full' :
            'btn btn-primary w-full';
    }
}

// Mobile menu functions
function toggleMobileMenu() {
    isMobileMenuOpen = !isMobileMenuOpen;
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');

    if (mobileMenu) {
        mobileMenu.style.display = isMobileMenuOpen ? 'block' : 'none';
    }

    if (menuIcon) {
        menuIcon.innerHTML = isMobileMenuOpen ?
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />' :
            '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
    }
}

function closeMobileMenu() {
    isMobileMenuOpen = false;
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');

    if (mobileMenu) {
        mobileMenu.style.display = 'none';
    }

    if (menuIcon) {
        menuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
    }
}

// Modal functions
function openRegistrationModal() {
    isRegistering = true;
    showModal('registrationModal');
    resetRegistrationForm();
}

function openAdminPanel() {
    isAdminPanelOpen = true;
    showModal('adminModal');
}

function openStatusCheck() {
    isCheckingStatus = true;
    showModal('statusModal');
}

function showModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }
}

function closeAllModals() {
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.style.display = 'none';
    });

    document.body.style.overflow = 'auto';
    isRegistering = false;
    isAdminPanelOpen = false;
    isCheckingStatus = false;
    resetRegistrationForm();
}

// Registration form functions
function resetRegistrationForm() {
    registrationStatus = 'idle';
    statusMessage = '';
    updateRegistrationUI();

    const form = document.getElementById('registrationForm');
    if (form) {
        form.reset();
    }
}

async function handleRegistration(e) {
    e.preventDefault();

    const formData = new FormData(e.target);
    const data = {
        nickname: formData.get('nickname'),
        email: formData.get('email'),
        discord: formData.get('discord'),
        reason: formData.get('reason')
    };

    // Basic validation
    if (!data.nickname || !data.email || !data.reason) {
        setRegistrationError('Пожалуйста, заполните все обязательные поля');
        return;
    }

    if (data.reason.length < 50) {
        setRegistrationError('Описание должно содержать минимум 50 символов');
        return;
    }

    registrationStatus = 'loading';
    updateRegistrationUI();

    try {
        const response = await fetch('api/whitelist-register.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        });

        const contentType = response.headers.get('content-type');

        if (!response.ok) {
            if (response.status === 404) {
                throw new Error('API_NOT_AVAILABLE');
            }
            throw new Error(`Ошибка сервера: ${response.status}`);
        }

        let result;
        if (contentType && contentType.includes('application/json')) {
            result = await response.json();
        } else {
            throw new Error('API_NOT_AVAILABLE');
        }

        registrationStatus = 'success';
        statusMessage = 'Заявка успешно отправлена! Ожидайте рассмотрения в Discord.';
        updateRegistrationUI();

        setTimeout(() => {
            closeAllModals();
        }, 3000);

    } catch (error) {
        registrationStatus = 'error';

        if (error.message === 'API_NOT_AVAILABLE') {
            statusMessage = 'Сервер временно недоступен. Пожалуйста, отправьте заявку через Discord: https://discord.gg/GNXATR7GSP';
        } else if (error.name === 'TypeError' && error.message.includes('fetch')) {
            statusMessage = 'Проблемы с подключением к серверу. Попробуйте позже или свяжитесь через Discord.';
        } else {
            statusMessage = error.message || 'Произошла ошибка при отправке заявки';
        }

        updateRegistrationUI();
    }
}

function setRegistrationError(message) {
    registrationStatus = 'error';
    statusMessage = message;
    updateRegistrationUI();
}

function updateRegistrationUI() {
    const errorDiv = document.getElementById('registrationError');
    const successDiv = document.getElementById('registrationSuccess');
    const submitButton = document.getElementById('submitButton');
    const formInputs = document.querySelectorAll('#registrationForm input, #registrationForm textarea');

    // Hide all status divs first
    if (errorDiv) errorDiv.style.display = 'none';
    if (successDiv) successDiv.style.display = 'none';

    // Update submit button
    if (submitButton) {
        submitButton.disabled = registrationStatus === 'loading';
        submitButton.textContent = registrationStatus === 'loading' ? 'Отправка...' : 'Отправить заявку';
    }

    // Disable form inputs during loading
    formInputs.forEach(input => {
        input.disabled = registrationStatus === 'loading';
    });

    // Show appropriate status message
    if (registrationStatus === 'error' && errorDiv) {
        errorDiv.textContent = statusMessage;
        errorDiv.style.display = 'block';
    } else if (registrationStatus === 'success' && successDiv) {
        successDiv.textContent = statusMessage;
        successDiv.style.display = 'block';
    }
}

// Admin panel functions
async function handleAdminAuth(e) {
    e.preventDefault();

    const formData = new FormData(e.target);
    const password = formData.get('adminPassword');

    if (password === 'mayos_admin_2025') {
        showAdminDashboard();
        loadAdminApplications();
    } else {
        showAdminError('Неверный пароль администратора');
    }
}

function showAdminDashboard() {
    const authDiv = document.getElementById('adminAuth');
    const dashboardDiv = document.getElementById('adminDashboard');

    if (authDiv) authDiv.style.display = 'none';
    if (dashboardDiv) dashboardDiv.style.display = 'block';
}

function showAdminError(message) {
    const errorDiv = document.getElementById('adminError');
    if (errorDiv) {
        errorDiv.textContent = message;
        errorDiv.style.display = 'block';
    }
}

async function loadAdminApplications() {
    const loadingDiv = document.getElementById('adminLoading');
    const applicationsDiv = document.getElementById('adminApplications');

    if (loadingDiv) loadingDiv.style.display = 'block';
    if (applicationsDiv) applicationsDiv.innerHTML = '';

    try {
        const response = await fetch('api/admin/get-applications.php');

        if (!response.ok) {
            throw new Error(`Ошибка сервера: ${response.status}`);
        }

        const data = await response.json();
        displayAdminApplications(data.applications || []);

    } catch (error) {
        showAdminError('API сервер не настроен. Для полной функциональности требуется подключение базы данных.');
    } finally {
        if (loadingDiv) loadingDiv.style.display = 'none';
    }
}

function displayAdminApplications(applications) {
    const container = document.getElementById('adminApplications');
    if (!container) return;

    if (applications.length === 0) {
        container.innerHTML = '<div class="text-center py-12"><p class="text-gray-400">Заявки не найдены</p></div>';
        return;
    }

    const html = applications.map(app => `
        <div class="card mb-4">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <div class="flex items-center gap-4 mb-4">
                        <h3 class="text-xl text-white font-semibold">${app.nickname}</h3>
                        <span class="status-${app.status}">
                            ${app.status === 'pending' ? 'На рассмотрении' :
                              app.status === 'approved' ? 'Одобрено' : 'Отклонено'}
                        </span>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-400">Email:</p>
                            <p class="text-white">${app.email}</p>
                        </div>
                        ${app.discord ? `
                        <div>
                            <p class="text-sm text-gray-400">Discord:</p>
                            <p class="text-white">${app.discord}</p>
                        </div>
                        ` : ''}
                    </div>
                    <div class="mb-4">
                        <p class="text-sm text-gray-400 mb-2">Причина:</p>
                        <p class="text-gray-300 bg-black-40 rounded-lg p-3 border border-gray-700">${app.reason}</p>
                    </div>
                    <div class="text-xs text-gray-500">
                        Подана: ${formatDate(app.created_at)}
                        ${app.updated_at !== app.created_at ? `<span class="ml-4">Обновлена: ${formatDate(app.updated_at)}</span>` : ''}
                    </div>
                </div>
                ${app.status === 'pending' ? `
                <div class="flex gap-2 ml-4">
                    <button onclick="updateApplicationStatus(${app.id}, 'approved')" class="btn btn-success">✓ Одобрить</button>
                    <button onclick="updateApplicationStatus(${app.id}, 'rejected')" class="btn btn-danger">✗ Отклонить</button>
                </div>
                ` : ''}
            </div>
        </div>
    `).join('');

    container.innerHTML = html;
}

async function updateApplicationStatus(id, status) {
    try {
        const response = await fetch('api/admin/update-status.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id, status })
        });

        if (!response.ok) {
            throw new Error(`Ошибка сервера: ${response.status}`);
        }

        // Reload applications
        loadAdminApplications();

    } catch (error) {
        showAdminError('API сервер не настроен. Функция обновления статуса недоступна.');
    }
}

// Utility functions
function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleString('ru-RU');
}

// Handle clicks outside modals to close them
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal')) {
        closeAllModals();
    }
});

// Handle escape key to close modals
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeAllModals();
        closeMobileMenu();
    }
});
