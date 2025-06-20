-- SQL Schema for SystemMayos Minecraft Server
-- Create database if not exists
CREATE DATABASE IF NOT EXISTS miserver CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE miserver;

-- Whitelist applications table
CREATE TABLE IF NOT EXISTS whitelist_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL,
    discord VARCHAR(100),
    reason TEXT NOT NULL,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_nickname (nickname),
    INDEX idx_status (status),
    INDEX idx_created_at (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data for testing (optional)
-- INSERT INTO whitelist_applications (nickname, email, discord, reason, status) VALUES
-- ('TestPlayer1', 'test1@example.com', 'TestPlayer#1234', 'Хочу играть на этом сервере, потому что люблю технические моды и хочу изучать их в хорошей компании. У меня есть опыт с Industrial Craft и Applied Energistics.', 'pending'),
-- ('TestPlayer2', 'test2@example.com', 'TestPlayer2#5678', 'Я опытный игрок в Minecraft с 2011 года. Интересуюсь автоматизацией и строительством сложных механизмов. Хочу присоединиться к сообществу профессионалов.', 'approved'),
-- ('TestPlayer3', 'test3@example.com', '', 'Давно ищу хороший технический сервер. Имею опыт с BuildCraft, Thermal Expansion и другими модами. Планирую строить большие фабрики и участвовать в совместных проектах.', 'rejected');
