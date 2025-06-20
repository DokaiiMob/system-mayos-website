<?php
session_start();
require_once '../../config/database.php';
require_once '../../includes/functions.php';

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

    if (!$input || !isset($input['id']) || !isset($input['status'])) {
        sendJsonResponse(['error' => 'Необходимы поля id и status'], 400);
    }

    $id = intval($input['id']);
    $status = sanitizeInput($input['status']);

    // Validate status
    if (!in_array($status, ['pending', 'approved', 'rejected'])) {
        sendJsonResponse(['error' => 'Некорректный статус'], 400);
    }

    // Database operations
    $database = new Database();
    $db = $database->getConnection();

    if (!$db) {
        sendJsonResponse(['error' => 'Ошибка подключения к базе данных'], 500);
    }

    // Update application status
    $query = "UPDATE whitelist_applications SET status = :status WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        if ($stmt->rowCount() === 0) {
            sendJsonResponse(['error' => 'Заявка не найдена'], 404);
        }

        sendJsonResponse(['message' => "Статус заявки обновлен на: $status"]);
    } else {
        sendJsonResponse(['error' => 'Ошибка при обновлении статуса'], 500);
    }

} catch (PDOException $e) {
    error_log("❌ Status update error: " . $e->getMessage());
    sendJsonResponse(['error' => 'Не удалось обновить статус заявки'], 500);
} catch (Exception $e) {
    error_log("❌ Status update error: " . $e->getMessage());
    sendJsonResponse(['error' => 'Внутренняя ошибка сервера'], 500);
}
?>
