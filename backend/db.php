<?php
// backend/db.php
declare(strict_types=1);

/**
 * Database config - change to match your environment
 * For production use environment variables instead of hardcoded values.
 */
$DB_HOST = '127.0.0.1';
$DB_NAME = 'burger_db';
$DB_USER = 'burger_user';
$DB_PASS = 'StrongPasswordHere!';

$dsn = "mysql:host={$DB_HOST};dbname={$DB_NAME};charset=utf8mb4";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $DB_USER, $DB_PASS, $options);
} catch (PDOException $e) {
    error_log('DB Connection error: ' . $e->getMessage());
    http_response_code(500);
    exit('Database connection failed.');
}
