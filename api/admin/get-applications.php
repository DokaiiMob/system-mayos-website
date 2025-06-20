<?php
session_start();
require_once '../../config/database.php';
require_once '../../includes/functions.php';

// Enable CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Only allow GET requests
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    sendJsonResponse(['error' => 'Разрешены только GET запросы'], 405);
}

try {
    // Database operations
    $database = new Database();
    $db = $database->getConnection();

    if (!$db) {
        sendJsonResponse(['error' => 'Ошибка подключения к базе данных'], 500);
    }

    // Get all applications
    $query = "SELECT id, nickname, email, discord, reason, status, created_at, updated_at
              FROM whitelist_applications
              ORDER BY created_at DESC";

    $stmt = $db->prepare($query);
    $stmt->execute();

    $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);

    sendJsonResponse([
        'applications' => $applications,
        'total' => count($applications)
    ]);

} catch (PDOException $e) {
    error_log("❌ Admin fetch error: " . $e->getMessage());
    sendJsonResponse(['error' => 'Не удалось получить список заявок'], 500);
} catch (Exception $e) {
    error_log("❌ Admin fetch error: " . $e->getMessage());
    sendJsonResponse(['error' => 'Внутренняя ошибка сервера'], 500);
}
?>
