# 🤝 Участие в разработке System.Mayos

Спасибо за интерес к участию в развитии проекта System.Mayos! Мы ценим любой вклад в улучшение сайта.

## 📋 Как участвовать

### 🐛 Сообщение об ошибках

Если вы нашли ошибку:

1. Проверьте, что ошибка уже не зарегистрирована в [Issues](https://github.com/DokaiiMob/system-mayos-website/issues)
2. Создайте новый Issue с подробным описанием:
   - Шаги для воспроизведения
   - Ожидаемое поведение
   - Фактическое поведение
   - Версия браузера и ОС
   - Скриншоты (если применимо)

### 💡 Предложение новых функций

Для предложения новых функций:

1. Создайте Issue с тегом `enhancement`
2. Опишите:
   - Какую проблему решает функция
   - Как она должна работать
   - Примеры использования

### 🔧 Внесение изменений в код

1. **Fork репозитория**
2. **Создайте ветку** для новой функции:
   ```bash
   git checkout -b feature/amazing-feature
   ```

3. **Следуйте стандартам кодирования**:
   - PHP: PSR-12
   - JavaScript: ES6+
   - CSS: BEM методология
   - Отступы: 4 пробела

4. **Тестируйте изменения**:
   - Проверьте работу на разных браузерах
   - Убедитесь, что не нарушили существующий функционал
   - Проверьте адаптивность на мобильных устройствах

5. **Зафиксируйте изменения**:
   ```bash
   git commit -m "Add amazing feature"
   ```

6. **Отправьте изменения**:
   ```bash
   git push origin feature/amazing-feature
   ```

7. **Создайте Pull Request**

## 📝 Стандарты кодирования

### PHP
```php
<?php
/**
 * Описание функции
 *
 * @param string $param Описание параметра
 * @return array Описание возвращаемого значения
 */
function exampleFunction($param) {
    // Код функции
    return $result;
}
?>
```

### JavaScript
```javascript
/**
 * Описание функции
 * @param {string} param - Описание параметра
 * @returns {Object} Описание возвращаемого значения
 */
function exampleFunction(param) {
    // Код функции
    return result;
}
```

### CSS
```css
/* Используйте BEM методологию */
.block__element--modifier {
    property: value;
}

/* Группируйте свойства логически */
.example {
    /* Позиционирование */
    position: relative;
    top: 0;

    /* Модель коробки */
    width: 100%;
    height: auto;

    /* Оформление */
    background: #fff;
    border: 1px solid #000;
}
```

## 🔍 Процесс ревью

1. Все Pull Request проходят ревью
2. Код должен соответствовать стандартам проекта
3. Новый функционал должен быть протестирован
4. Изменения должны быть документированы

## 🚀 Локальная разработка

### Требования
- PHP 7.4+
- MySQL 8.0+
- Apache/Nginx

### Установка
```bash
# Клонируйте форк
git clone https://github.com/DokaiiMob/system-mayos-website.git
cd system-mayos-website

# Настройте базу данных
mysql -u root -p < sql/schema.sql

# Скопируйте конфигурацию
cp config/database.example.php config/database.php

# Отредактируйте настройки в config/database.php
```

### Тестирование
- Проверьте все основные функции
- Протестируйте на разных разрешениях экрана
- Убедитесь в корректной работе API

## 📚 Полезные ресурсы

- [PHP Documentation](https://www.php.net/docs.php)
- [MySQL Documentation](https://dev.mysql.com/doc/)
- [MDN Web Docs](https://developer.mozilla.org/)
- [BEM Methodology](http://getbem.com/)

## ❓ Вопросы

Если у вас есть вопросы:

- Создайте Issue с тегом `question`
- Свяжитесь в Discord: mizusamp

## 🎉 Благодарности

Большое спасибо всем участникам, которые делают этот проект лучше!

---

**Помните**: Каждый вклад важен, даже самый маленький! 🌟
