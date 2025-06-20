<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System.Mayos - Minecraft Сервер 1.12.2</title>
    <meta name="description" content="Приватный Minecraft сервер версии 1.12.2 с техническими модами. Присоединяйтесь к сообществу профессиональных игроков!">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <!-- Animated Background with Floating Blocks -->
    <div class="animated-bg">
        <div class="floating-block" style="top: 10%; left: 5%; animation-delay: 0s;"></div>
        <div class="floating-block" style="top: 20%; right: 10%; animation-delay: -1s;"></div>
        <div class="floating-block" style="top: 30%; left: 15%; animation-delay: -2s;"></div>
        <div class="floating-block" style="top: 40%; right: 20%; animation-delay: -3s;"></div>
        <div class="floating-block" style="top: 50%; left: 8%; animation-delay: -4s;"></div>
        <div class="floating-block" style="top: 60%; right: 15%; animation-delay: -5s;"></div>
        <div class="floating-block" style="top: 70%; left: 12%; animation-delay: -6s;"></div>
        <div class="floating-block" style="top: 80%; right: 8%; animation-delay: -7s;"></div>
    </div>

    <!-- Navigation Header -->
    <nav class="nav">
        <div class="container">
            <div class="flex items-center justify-between" style="height: 80px;">
                <div class="flex items-center">
                    <div>
                        <div class="nav-brand">System.Mayos</div>
                        <span class="text-sm" style="color: #90A4AE; margin-left: 4px;">Minecraft 1.12.2</span>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden-mobile">
                    <div class="flex items-center gap-4">
                        <a href="#home" class="nav-link active">🏠 Главная</a>
                        <a href="#mods" class="nav-link">⚒️ Моды</a>
                        <a href="#rules" class="nav-link">📜 Правила</a>
                        <a href="#contact" class="nav-link">💬 Контакты</a>
                        <button id="statusButton" class="nav-link" style="background: none; border: none; cursor: pointer;">📊 Статус заявки</button>
                        <button id="adminButton" class="nav-link" style="background: none; border: none; cursor: pointer; color: var(--mc-gold);">👑 Админ</button>
                        <button data-action="register" class="mc-button">Подать заявку</button>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="block-mobile">
                    <button id="mobileMenuButton" class="mc-button" style="padding: 8px;">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path id="menuIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobileMenu" class="block-mobile" style="display: none; background: rgba(0, 0, 0, 0.9); backdrop-filter: blur(20px); border-top: 2px solid var(--mc-grass); padding: 1.5rem 0;">
            <div class="container">
                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <a href="#home" class="nav-link active">🏠 Главная</a>
                    <a href="#mods" class="nav-link">⚒️ Моды</a>
                    <a href="#rules" class="nav-link">📜 Правила</a>
                    <a href="#contact" class="nav-link">💬 Контакты</a>
                    <button id="statusButtonMobile" class="nav-link text-left" style="background: none; border: none; cursor: pointer;">📊 Статус заявки</button>
                    <button id="adminButtonMobile" class="nav-link text-left" style="background: none; border: none; cursor: pointer; color: var(--mc-gold);">👑 Админ панель</button>
                    <button data-action="register" class="mc-button" style="width: 100%; margin-top: 1rem;">Подать заявку</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="text-center">
                <h1 class="hero-title mc-title">
                    <span class="system">System.</span><span class="mayos">Mayos</span>
                </h1>
                <p class="hero-subtitle modern-text">🎮 Приватный Minecraft сервер версии 1.12.2</p>
                <p class="hero-description modern-text">
                    ⚡ Уникальная сборка модов для истинных ценителей технических возможностей Minecraft.
                    Присоединяйтесь к нашему сообществу профессиональных игроков! 🚀
                </p>

                <!-- Server Connection Card -->
                <div class="server-card">
                    <h3 class="mc-title" style="font-size: 1.25rem; color: var(--mc-grass); margin-bottom: 1.5rem;">🎮 Подключение к серверу</h3>
                    <div class="server-ip">
                        system.mayos.server
                    </div>
                    <button id="copyButton" class="mc-button" style="width: 100%; font-size: 14px;">📋 Скопировать IP</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20">
        <div class="container">
            <div class="features-grid">
                <!-- Privacy Feature -->
                <div class="feature-card">
                    <div class="feature-icon grass">
                        🛡️
                    </div>
                    <h2 class="feature-title" style="color: var(--mc-grass);">Приватность</h2>
                    <ul class="feature-list">
                        <li>🔒 Закрытое сообщество</li>
                        <li>📝 Отбор по заявкам</li>
                        <li>👮 Активная модерация</li>
                        <li>⚡ Стабильность 24/7</li>
                    </ul>
                </div>

                <!-- Performance Feature -->
                <div class="feature-card">
                    <div class="feature-icon diamond">
                        ⚡
                    </div>
                    <h2 class="feature-title" style="color: var(--mc-diamond);">Производительность</h2>
                    <ul class="feature-list">
                        <li>🚀 Высокий TPS</li>
                        <li>⚙️ Оптимизированные моды</li>
                        <li>🖥️ Мощное железо</li>
                        <li>✨ Минимальные лаги</li>
                    </ul>
                </div>

                <!-- Community Feature -->
                <div class="feature-card">
                    <div class="feature-icon gold">
                        👥
                    </div>
                    <h2 class="feature-title" style="color: var(--mc-gold);">Сообщество</h2>
                    <ul class="feature-list">
                        <li>🎯 Опытные игроки</li>
                        <li>🤝 Взаимопомощь</li>
                        <li>🏗️ Совместные проекты</li>
                        <li>💬 Discord общение</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16">
        <div class="container">
            <div class="cta-section">
                <h2 class="cta-title">🎯 Хотите присоединиться?</h2>
                <p class="cta-description modern-text">
                    Наш сервер работает по системе вайтлиста. Подайте заявку и станьте частью нашего сообщества!
                </p>
                <button data-action="register" class="mc-button" style="font-size: 16px; padding: 16px 32px; transform: scale(1); transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    🎯 ПОДАТЬ ЗАЯВКУ НА ВАЙТЛИСТ
                </button>
            </div>
        </div>
    </section>

    <!-- Mods Section -->
    <section id="mods" class="py-20">
        <div class="container">
            <h2 class="mc-title text-center" style="font-size: 2.5rem; color: var(--mc-grass); margin-bottom: 1rem;">
                ⚒️ Моды сервера
            </h2>
            <p class="text-center modern-text" style="color: #90A4AE; font-size: 1.125rem; margin-bottom: 4rem;">
                Тщательно подобранная коллекция модов для максимального игрового опыта
            </p>

            <div class="mods-grid">
                <!-- Essential Mods -->
                <div class="mod-category essential">
                    <div class="mod-icon">⚙️</div>
                    <h3 class="mc-title text-center" style="font-size: 1.25rem; color: var(--mc-grass); margin-bottom: 1.5rem;">Основные моды</h3>
                    <ul class="mod-list">
                        <li>🔍 JEI (Just Enough Items)</li>
                        <li>🗺️ JourneyMap</li>
                        <li>📦 Iron Chests</li>
                        <li>💾 Applied Energistics 2</li>
                        <li>🔥 Thermal Expansion</li>
                    </ul>
                </div>

                <!-- Technical Mods -->
                <div class="mod-category technical">
                    <div class="mod-icon" style="background: linear-gradient(135deg, var(--mc-redstone) 0%, #C62828 100%); border-color: var(--mc-redstone);">🔧</div>
                    <h3 class="mc-title text-center" style="font-size: 1.25rem; color: var(--mc-redstone); margin-bottom: 1.5rem;">Технические моды</h3>
                    <ul class="mod-list">
                        <li>⚡ Industrial Craft 2</li>
                        <li>🚧 BuildCraft</li>
                        <li>🌲 Forestry</li>
                        <li>🚂 Railcraft</li>
                        <li>🔬 Mekanism</li>
                    </ul>
                </div>

                <!-- Adventure Mods -->
                <div class="mod-category adventure">
                    <div class="mod-icon" style="background: linear-gradient(135deg, var(--mc-diamond) 0%, #1976D2 100%); border-color: var(--mc-diamond);">🗺️</div>
                    <h3 class="mc-title text-center" style="font-size: 1.25rem; color: var(--mc-diamond); margin-bottom: 1.5rem;">Приключения</h3>
                    <ul class="mod-list">
                        <li>🌙 Twilight Forest</li>
                        <li>🌿 Biomes O' Plenty</li>
                        <li>🔨 Tinkers' Construct</li>
                        <li>🔮 Thaumcraft</li>
                        <li>🩸 Blood Magic</li>
                    </ul>
                </div>
            </div>

            <div class="text-center mt-4" style="margin-top: 3rem;">
                <a href="assets/modpack.txt" download class="mc-button" style="font-size: 14px; padding: 12px 24px; display: inline-flex; align-items: center; gap: 8px;">
                    📥 СКАЧАТЬ ИНФОРМАЦИЮ О МОДПАКЕ
                </a>
            </div>
        </div>
    </section>

    <!-- Rules Section -->
    <section id="rules" class="py-20">
        <div class="container">
            <h2 class="mc-title text-center" style="font-size: 2.5rem; color: var(--mc-redstone); margin-bottom: 4rem;">
                📜 Правила сервера
            </h2>

            <div class="rules-grid">
                <div class="rules-category basic">
                    <div class="rules-header">
                        <div class="rules-icon danger">!</div>
                        <h3 class="mc-title" style="font-size: 1.5rem; color: var(--mc-redstone);">Основные правила</h3>
                    </div>
                    <ul class="rules-list">
                        <li><span style="color: var(--mc-redstone);">🚫</span> Запрещен гриф и воровство</li>
                        <li><span style="color: var(--mc-redstone);">🤝</span> Уважайте других игроков</li>
                        <li><span style="color: var(--mc-redstone);">🏗️</span> Не стройте слишком близко к чужим базам</li>
                        <li><span style="color: var(--mc-redstone);">💬</span> Общайтесь корректно в чате</li>
                        <li><span style="color: var(--mc-redstone);">🔧</span> Не нарушайте экономику сервера</li>
                    </ul>
                </div>

                <div class="rules-category technical">
                    <div class="rules-header">
                        <div class="rules-icon warning">⚡</div>
                        <h3 class="mc-title" style="font-size: 1.5rem; color: var(--mc-gold);">Технические ограничения</h3>
                    </div>
                    <ul class="rules-list">
                        <li><span style="color: var(--mc-gold);">⚡</span> Ограничения на лаг-машины</li>
                        <li><span style="color: var(--mc-gold);">🔋</span> Лимит на энергетические сети</li>
                        <li><span style="color: var(--mc-gold);">🐄</span> Максимум 20 мобов на чанк</li>
                        <li><span style="color: var(--mc-gold);">🎯</span> Запрещены дюпы и читы</li>
                        <li><span style="color: var(--mc-gold);">🌍</span> Разумное использование загрузки чанков</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20">
        <div class="container">
            <h2 class="mc-title text-center" style="font-size: 2.5rem; color: var(--mc-diamond); margin-bottom: 4rem;">
                💬 Связь с нами
            </h2>

            <div class="contact-card">
                <!-- Discord Section -->
                <div class="text-center mb-12">
                    <div class="discord-icon">
                        💬
                    </div>
                    <h3 class="mc-title" style="font-size: 2rem; color: white; margin-bottom: 1rem;">Discord Сообщество</h3>
                    <p class="modern-text" style="font-size: 1.25rem; color: #E0E0E0; margin-bottom: 2rem; max-width: 32rem; margin-left: auto; margin-right: auto;">
                        Присоединяйтесь к нашему Discord серверу для общения, поддержки и получения последних новостей
                    </p>
                    <a href="https://discord.gg/GNXATR7GSP" target="_blank" rel="noopener noreferrer" class="mc-button" style="background: linear-gradient(135deg, #7289DA 0%, #5865F2 100%); border-color: #5865F2; font-size: 16px; padding: 16px 32px; display: inline-flex; align-items: center; gap: 8px;">
                        💬 ПРИСОЕДИНИТЬСЯ К DISCORD
                    </a>
                </div>

                <!-- Admin Info -->
                <div class="contact-grid">
                    <div class="text-center">
                        <h4 class="mc-title" style="font-size: 1.25rem; color: var(--mc-grass); margin-bottom: 1rem;">👑 Администрация</h4>
                        <p class="modern-text" style="color: #E0E0E0; margin-bottom: 0.5rem;">Главный администратор: <span style="color: white; font-weight: 600;">Mayos_Admin</span></p>
                        <p class="modern-text" style="color: #90A4AE; font-size: 0.875rem;">Онлайн: ежедневно 18:00-24:00 МСК</p>
                    </div>
                    <div class="text-center">
                        <h4 class="mc-title" style="font-size: 1.25rem; color: var(--mc-diamond); margin-bottom: 1rem;">🛠️ Поддержка</h4>
                        <p class="modern-text" style="color: #E0E0E0; margin-bottom: 0.5rem;">Техническая поддержка: 24/7</p>
                        <p class="modern-text" style="color: #90A4AE; font-size: 0.875rem;">Быстрый ответ в Discord</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="text-center">
                <h3 class="mc-title" style="font-size: 1.5rem; color: var(--mc-grass); margin-bottom: 1rem;">System.Mayos</h3>
                <p class="modern-text" style="color: #90A4AE; margin-bottom: 1rem;">&copy; 2025 System.Mayos Minecraft Server. Все права защищены.</p>
                <p class="modern-text" style="color: #6B7280; font-size: 0.875rem;">🎮 Minecraft 1.12.2 • 🔒 Приватный сервер с модами • 👥 Сообщество профессионалов</p>
            </div>
        </div>
    </footer>

    <!-- Registration Modal -->
    <div id="registrationModal" class="modal" style="display: none;">
        <div class="modal-content">
            <div class="flex justify-between items-center mb-6">
                <h2 class="mc-title" style="font-size: 1.875rem; color: white;">
                    📝 <span style="color: var(--mc-grass);">Заявка на вайтлист</span>
                </h2>
                <button data-action="close-modal" style="background: none; border: none; color: #9ca3af; cursor: pointer; transition: color 0.3s ease; font-size: 1.5rem;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#9ca3af'">
                    ✖️
                </button>
            </div>

            <div id="registrationSuccess" class="alert alert-success" style="display: none;"></div>

            <form id="registrationForm">
                <div class="mb-6">
                    <label class="block modern-text" style="font-size: 0.875rem; font-weight: 500; color: #E0E0E0; margin-bottom: 0.5rem;">🎮 Никнейм в Minecraft *</label>
                    <input type="text" name="nickname" required class="form-input" placeholder="Ваш игровой никнейм">
                </div>

                <div class="mb-6">
                    <label class="block modern-text" style="font-size: 0.875rem; font-weight: 500; color: #E0E0E0; margin-bottom: 0.5rem;">📧 Email *</label>
                    <input type="email" name="email" required class="form-input" placeholder="your.email@example.com">
                </div>

                <div class="mb-6">
                    <label class="block modern-text" style="font-size: 0.875rem; font-weight: 500; color: #E0E0E0; margin-bottom: 0.5rem;">💬 Discord (необязательно)</label>
                    <input type="text" name="discord" class="form-input" placeholder="Username#1234">
                </div>

                <div class="mb-6">
                    <label class="block modern-text" style="font-size: 0.875rem; font-weight: 500; color: #E0E0E0; margin-bottom: 0.5rem;">💭 Почему хотите присоединиться? *</label>
                    <textarea name="reason" required rows="4" class="form-textarea" placeholder="Расскажите о своем опыте в Minecraft, планах на сервере и почему именно наш сервер вас заинтересовал..."></textarea>
                </div>

                <div id="registrationError" class="alert alert-error" style="display: none;"></div>

                <div class="flex gap-4 pt-4">
                    <button type="button" data-action="close-modal" class="mc-button" style="flex: 1; background: linear-gradient(135deg, #666 0%, #444 100%); border-color: #666;">❌ ОТМЕНА</button>
                    <button type="submit" id="submitButton" class="mc-button" style="flex: 1;">📤 ОТПРАВИТЬ ЗАЯВКУ</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Admin Modal -->
    <div id="adminModal" class="modal" style="display: none;">
        <div class="modal-content" style="max-width: 80rem;">
            <div class="flex justify-between items-center mb-6" style="padding-bottom: 1.5rem; border-bottom: 2px solid var(--mc-grass);">
                <h2 class="mc-title" style="font-size: 1.875rem; color: white;">
                    👑 <span style="color: var(--mc-grass);">Админ панель</span>
                </h2>
                <button data-action="close-modal" style="background: none; border: none; color: #9ca3af; cursor: pointer; transition: color 0.3s ease; font-size: 1.5rem;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#9ca3af'">
                    ✖️
                </button>
            </div>

            <!-- Admin Authentication -->
            <div id="adminAuth" class="text-center py-8">
                <div style="width: 5rem; height: 5rem; background: linear-gradient(135deg, var(--mc-gold) 0%, #F57C00 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; border: 3px solid #E65100; box-shadow: var(--shadow-block);">
                    <span style="font-size: 2rem;">🔐</span>
                </div>
                <h3 class="mc-title" style="font-size: 1.25rem; color: white; margin-bottom: 1rem;">Вход в админ панель</h3>
                <form id="adminAuthForm" style="max-width: 24rem; margin: 0 auto;">
                    <input type="password" name="adminPassword" placeholder="Пароль администратора" class="form-input mb-4" required>
                    <div id="adminError" class="alert alert-error" style="display: none;"></div>
                    <button type="submit" class="mc-button" style="width: 100%;">🔓 ВОЙТИ</button>
                </form>
            </div>

            <!-- Admin Dashboard -->
            <div id="adminDashboard" style="display: none;">
                <div id="adminLoading" class="text-center py-12" style="display: none;">
                    <div class="spinner mb-4"></div>
                    <p class="modern-text" style="color: #90A4AE;">Загрузка заявок...</p>
                </div>
                <div id="adminApplications"></div>
            </div>
        </div>
    </div>

    <!-- Status Check Modal -->
    <div id="statusModal" class="modal" style="display: none;">
        <div class="modal-content" style="max-width: 28rem;">
            <div class="flex justify-between items-center mb-6">
                <h2 class="mc-title" style="font-size: 1.5rem; color: white;">
                    📊 <span style="color: var(--mc-grass);">Проверить статус заявки</span>
                </h2>
                <button data-action="close-modal" style="background: none; border: none; color: #9ca3af; cursor: pointer; transition: color 0.3s ease; font-size: 1.5rem;" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#9ca3af'">
                    ✖️
                </button>
            </div>

            <div class="text-center py-8">
                <div style="width: 4rem; height: 4rem; background: linear-gradient(135deg, var(--mc-diamond) 0%, #1976D2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; border: 3px solid #1565C0; box-shadow: var(--shadow-block);">
                    <span style="font-size: 1.5rem;">ℹ️</span>
                </div>
                <h3 class="mc-title" style="font-size: 1.25rem; color: white; margin-bottom: 1rem;">Функция в разработке</h3>
                <p class="modern-text" style="color: #E0E0E0; margin-bottom: 1.5rem;">
                    Возможность проверки статуса заявки через никнейм или email будет добавлена в ближайшее время.
                </p>
                <p class="modern-text" style="color: #90A4AE; font-size: 0.875rem; margin-bottom: 1.5rem;">
                    Пока что для уточнения статуса заявки обращайтесь в наш Discord сервер.
                </p>
                <a href="https://discord.gg/GNXATR7GSP" target="_blank" rel="noopener noreferrer" class="mc-button" style="background: linear-gradient(135deg, #7289DA 0%, #5865F2 100%); border-color: #5865F2; display: inline-flex; align-items: center; gap: 8px;">
                    💬 ПЕРЕЙТИ В DISCORD
                </a>
            </div>
        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>
</html>
