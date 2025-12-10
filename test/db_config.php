<?php
// إعدادات الاتصال بقاعدة البيانات (PDO)
define('DB_HOST', 'localhost'); // اسم المضيف، غالبًا ما يكون 'localhost'
define('DB_NAME', 'service_market'); // **غير هذا إلى اسم قاعدة بياناتك**
define('DB_USER', 'root'); // **غير هذا إلى اسم مستخدم قاعدة البيانات**
define('DB_PASS', ''); // **غير هذا إلى كلمة مرور قاعدة البيانات**

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
    // تعيين وضع الأخطاء (Exceptions)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // عرض رسالة خطأ في حال فشل الاتصال
    die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}