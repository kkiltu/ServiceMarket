
<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.html');
    exit();
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// 1. البحث عن المستخدم بواسطة البريد الإلكتروني
$stmt = $conn->prepare("SELECT id, username, password_hash FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    
    // 2. التحقق من كلمة المرور
    if (password_verify($password, $user['password_hash'])) {
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        header('Location: index.php');
        exit();
        
    } else {
        die("خطأ: كلمة المرور غير صحيحة.");
    }
} else {
    die("خطأ: البريد الإلكتروني غير مسجل.");
}

$stmt->close();
$conn->close();
?>