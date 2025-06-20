<?php
// Validation functions
function validateNickname($nickname) {
    return preg_match('/^[a-zA-Z0-9_]{3,16}$/', $nickname);
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function validateDiscord($discord) {
    if (empty($discord)) return true;
    return preg_match('/^.{2,32}#[0-9]{4}$/', $discord) || preg_match('/^[a-zA-Z0-9_.]{2,32}$/', $discord);
}

function sanitizeInput($data) {
    return htmlspecialchars(trim(stripslashes($data)));
}

function sendJsonResponse($data, $statusCode = 200) {
    http_response_code($statusCode);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

function getJsonInput() {
    return json_decode(file_get_contents('php://input'), true);
}

function formatDate($dateString) {
    return (new DateTime($dateString))->format('d.m.Y H:i');
}

function isAdminAuthenticated() {
    return isset($_SESSION['admin_authenticated']) && $_SESSION['admin_authenticated'] === true;
}

function authenticateAdmin($password) {
    if ($password === 'mayos_admin_2025') {
        $_SESSION['admin_authenticated'] = true;
        return true;
    }
    return false;
}
?>
