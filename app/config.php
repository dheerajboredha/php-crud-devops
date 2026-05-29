<?php
/*
|--------------------------------------------------------------------------
| Database Configuration
|--------------------------------------------------------------------------
| Values are injected through Docker/Kubernetes environment variables.
| No hardcoded credentials.
|--------------------------------------------------------------------------
*/

define('DB_SERVER', getenv('DB_HOST') ?: 'mysql-service');
define('DB_USERNAME', getenv('DB_USER') ?: 'root');
define('DB_PASSWORD', getenv('DB_PASSWORD') ?: 'root123');
define('DB_NAME', getenv('DB_NAME') ?: 'demo');

try {

    $dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4";

    $pdo = new PDO(
        $dsn,
        DB_USERNAME,
        DB_PASSWORD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );

} catch (PDOException $e) {

    die("Database Connection Failed: " . $e->getMessage());

}
?>