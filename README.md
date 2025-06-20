# 🎮 System.Mayos - Minecraft Server Website

Современный веб-сайт для приватного Minecraft сервера версии 1.12.2 с техническими модами.

![Minecraft](https://img.shields.io/badge/Minecraft-1.12.2-green?style=for-the-badge&logo=minecraft)
![PHP](https://img.shields.io/badge/PHP-7.4+-blue?style=for-the-badge&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-orange?style=for-the-badge&logo=mysql)

## 🚀 Особенности

- 📝 **Система заявок** - Автоматизированная обработка заявок на вайтлист
- 👑 **Админ панель** - Управление заявками игроков
- 🎨 **Анимированный дизайн** - Плавающие блоки в стиле Minecraft
- 📱 **Адаптивный дизайн** - Поддержка мобильных устройств
- ⚡ **AJAX интерфейс** - Без перезагрузки страницы
- 🛡️ **Безопасность** - Защита от SQL-инъекций и XSS

## 🛠 Технологии

- **Backend**: PHP 7.4+
- **Database**: MySQL 8.0+
- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Стиль**: Custom CSS с анимациями

## 📋 Требования

- PHP 7.4 или выше
- MySQL 8.0 или выше
- Apache/Nginx веб-сервер
- Поддержка mod_rewrite (для Apache)

## ⚙️ Установка

1. **Клонируйте репозиторий**
```bash
git clone https://github.com/DokaiiMob/system-mayos-website.git
cd system-mayos-website
```

2. **Настройте базу данных**
```bash
# Создайте базу данных MySQL
mysql -u root -p < sql/schema.sql
```

3. **Настройте конфигурацию**
```php
// Отредактируйте config/database.php
<?php
$host = 'localhost';
$dbname = 'miserver';
$username = 'your_username';
$password = 'your_password';
?>
```

4. **Настройте веб-сервер**
- Укажите корневую папку на файл `index.php`
- Убедитесь, что включена поддержка PHP

5. **Установите права доступа**
```bash
chmod 755 api/
chmod 755 config/
chmod 644 *.php
```

## 🗄️ Структура проекта

```
├── index.php              # Главная страница
├── api/                   # API endpoints
│   ├── whitelist-register.php
│   └── admin/
│       ├── get-applications.php
│       └── update-status.php
├── assets/                # Статические файлы
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── app.js
├── config/                # Конфигурационные файлы
│   └── database.php
├── includes/              # PHP модули
│   └── functions.php
└── sql/                   # SQL схемы
    └── schema.sql
```

## 🎮 Функционал

### Для игроков:
- Подача заявки на вайтлист
- Проверка статуса заявки
- Информация о сервере и модах
- Правила сервера

### Для администраторов:
- Просмотр всех заявок
- Одобрение/отклонение заявок
- Фильтрация по статусу
- Управление игроками

## 🔧 API Endpoints

| Endpoint | Метод | Описание |
|----------|-------|----------|
| `/api/whitelist-register.php` | POST | Подача заявки на вайтлист |
| `/api/admin/get-applications.php` | GET | Получение списка заявок |
| `/api/admin/update-status.php` | POST | Обновление статуса заявки |

## 🎨 Кастомизация

### Изменение цветовой схемы
Отредактируйте CSS переменные в `assets/css/style.css`:
```css
:root {
    --mc-green: #4CAF50;
    --mc-gold: #FFD700;
    --mc-red: #F44336;
    /* ... другие цвета */
}
```

### Настройка анимаций
Измените параметры анимации плавающих блоков в файле стилей.

## 🛡️ Безопасность

- Все входные данные фильтруются и экранируются
- Используются подготовленные SQL-запросы
- CSRF защита для форм
- Валидация данных на клиенте и сервере

## 📝 Лицензия

Этот проект распространяется под лицензией MIT. См. файл [LICENSE](LICENSE) для подробностей.

## 🤝 Участие в разработке

1. Сделайте Fork проекта
2. Создайте ветку для новой функции (`git checkout -b feature/amazing-feature`)
3. Зафиксируйте изменения (`git commit -m 'Add amazing feature'`)
4. Отправьте в ветку (`git push origin feature/amazing-feature`)
5. Откройте Pull Request

## 📞 Поддержка

Если у вас есть вопросы или предложения:

- 💬 Discord: mizusamp
- 🐛 Issues: [GitHub Issues](https://github.com/DokaiiMob/system-mayos-website/issues)

## ⭐ Благодарности

- Minecraft за вдохновение в дизайне
- Сообщество техно-модов за идеи
- Всем контрибьюторам проекта

---

**System.Mayos** - Где технологии встречают творчество! 🚀
![alt text](https://i.imgur.com/rOVqyfU.jpeg)
