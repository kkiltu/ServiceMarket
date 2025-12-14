<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.html');
    exit();
}

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($username) || empty($email) || empty($password)) {
    die("الرجاء تعبئة جميع الحقول.");
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("صيغة البريد الإلكتروني غير صالحة.");
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password_hash);

if ($stmt->execute()) {
    $_SESSION['user_id'] = $stmt->insert_id;
    $_SESSION['username'] = $username;
    
    header('Location: index.php'); // تأكد من استخدام index.php
    exit(); 

} else {

    if ($conn->errno == 1062) {
        die("هذا البريد الإلكتروني أو اسم المستخدم مُستخدم بالفعل.");
    } else {
        die("حدث خطأ أثناء إنشاء الحساب: " . $conn->error);
    }
}

$stmt->close();
$conn->close();