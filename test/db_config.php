<?php
// إعدادات الاتصال بقاعدة البيانات (PDO)
define('DB_HOST', 'localhost');
define('DB_NAME', 'service_market'); 
define('DB_USER', 'root'); 
define('DB_PASS', ''); 

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // عرض رسالة خطأ في حال فشل الاتصال
    die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}