<?php
session_start();
include __DIR__ . '/db_config.php';

// تأكيد تسجيل الدخول
if (!isset($_SESSION['username'])) {
    die("يجب تسجيل الدخول لإضافة خدمة.");
}

$category_id = $_POST['category_id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$images = $_FILES['images'];

// التحقق الأساسي
if (!$category_id || !$name || !$description || !$price || !$images) {
    die("جميع الحقول مطلوبة.");
}

// 1) إضافة الخدمة أولاً
$stmt = $pdo->prepare("INSERT INTO services (name, description, price, category_id, user_id) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$name, $description, $price, $category_id, $_SESSION['user_id']]);

$service_id = $pdo->lastInsertId(); // ID الخدمة الجديدة

// 2) رفع جميع الصور
$targetDir = "images/";

for ($i = 0; $i < count($images['name']); $i++) {

    if ($images['error'][$i] === UPLOAD_ERR_OK) {

        $fileName = time() . "_" . basename($images['name'][$i]);
        $targetPath = $targetDir . $fileName;

        if (move_uploaded_file($images['tmp_name'][$i], $targetPath)) {

            // إدخال الصورة إلى جدول الصور
            $stmtImg = $pdo->prepare("INSERT INTO service_images (service_id, image_path) VALUES (?, ?)");
            $stmtImg->execute([$service_id, $fileName]);
        }
    }
}

// 3) جلب slug لإعادة التوجيه
$stmtSlug = $pdo->prepare("SELECT slug FROM categories WHERE id = ?");
$stmtSlug->execute([$category_id]);
$slug = $stmtSlug->fetchColumn();

header("Location: category.php?cat={$slug}&status=success");
exit();
?>
