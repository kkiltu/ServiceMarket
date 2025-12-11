<?php
session_start();
include __DIR__ . '/db_config.php';

if (!isset($_SESSION['username'])) {
    die("يجب تسجيل الدخول لإضافة تقييم.");
}

$service_id = $_POST['service_id'];
$rating = $_POST['rating'];
$comment = $_POST['comment'] ?? "";


$stmtUser = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$stmtUser->execute([$_SESSION['username']]);
$user = $stmtUser->fetch(PDO::FETCH_ASSOC);

$user_id = $user['id'];


$stmt = $pdo->prepare("
    INSERT INTO reviews (service_id, user_id, rating, comment)
    VALUES (?, ?, ?, ?)
");
$stmt->execute([$service_id, $user_id, $rating, $comment]);

header("Location: service_detail.php?id=" . $service_id);
exit();
