<?php
session_start();
require_once '../config/database.php';
require_once '../includes/functions.php';

// Enable CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendJsonResponse(['error' => 'Разрешены только POST запросы'], 405);
}

try {
    // Get and validate input
    $input = getJsonInput();

    if (!$input) {
        sendJsonResponse(['error' => 'Некорректные данные запроса'], 400);
    }

    $nickname = isset($input['nickname']) ? sanitizeInput($input['nickname']) : '';
    $email = isset($input['email']) ? sanitizeInput($input['email']) : '';
    $discord = isset($input['discord']) ? sanitizeInput($input['discord']) : '';
    $reason = isset($input['reason']) ? sanitizeInput($input['reason']) : '';

    // Validation
    if (empty($nickname) || empty($email) || empty($reason)) {
        sendJsonResponse(['error' => 'Nickname, email и reason обязательны для заполнения'], 400);
    }

    if (!validateNickname($nickname)) {
        sendJsonResponse(['error' => 'Никнейм должен содержать только буквы, цифры и подчеркивания (3-16 символов)'], 400);
    }

    if (!validateEmail($email)) {
        sendJsonResponse(['error' => 'Некорректный формат email'], 400);
    }

    if (!empty($discord) && !validateDiscord($discord)) {
        sendJsonResponse(['error' => 'Некорректный формат Discord (Username#1234 или новый формат @username)'], 400);
    }

    if (strlen($reason) < 50) {
        sendJsonResponse(['error' => 'Описание должно содержать минимум 50 символов'], 400);
    }

    if (strlen($reason) > 1000) {
        sendJsonResponse(['error' => 'Описание не должно превышать 1000 символов'], 400);
    }

    // Database operations
    $database = new Database();
    $db = $database->getConnection();

    if (!$db) {
        sendJsonResponse(['error' => 'Ошибка подключения к базе данных'], 500);
    }

    // Check if nickname or email already exists
    $checkQuery = "SELECT nickname, email FROM whitelist_applications WHERE nickname = :nickname OR email = :email";
    $stmt = $db->prepare($checkQuery);
    $stmt->bindParam(':nickname', $nickname);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($existingUser) {
        if ($existingUser['nickname'] === $nickname) {
            sendJsonResponse(['error' => 'Игрок с таким никнеймом уже подавал заявку'], 409);
        }
        if ($existingUser['email'] === $email) {
            sendJsonResponse(['error' => 'Игрок с таким email уже подавал заявку'], 409);
        }
    }

    // Insert new application
    $insertQuery = "INSERT INTO whitelist_applications (nickname, email, discord, reason) VALUES (:nickname, :email, :discord, :reason)";
    $stmt = $db->prepare($insertQuery);
    $stmt->bindParam(':nickname', $nickname);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':discord', $discord);
    $stmt->bindParam(':reason', $reason);

    if ($stmt->execute()) {
        error_log("✅ New whitelist application: $nickname ($email)");
        sendJsonResponse([
            'message' => 'Заявка успешно отправлена! Ожидайте рассмотрения в Discord.',
            'applicationId' => $nickname . '_' . time()
        ], 201);
    } else {
        sendJsonResponse(['error' => 'Ошибка при сохранении заявки'], 500);
    }

} catch (PDOException $e) {
    error_log("❌ Database error: " . $e->getMessage());

    if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        sendJsonResponse(['error' => 'Пользователь с таким никнеймом или email уже существует'], 409);
    }

    sendJsonResponse(['error' => 'Внутренняя ошибка сервера. Попробуйте позже.'], 500);
} catch (Exception $e) {
    error_log("❌ Registration error: " . $e->getMessage());
    sendJsonResponse(['error' => 'Внутренняя ошибка сервера. Попробуйте позже.'], 500);
}
?>
