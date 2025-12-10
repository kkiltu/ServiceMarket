
<?php
// تفعيل إدارة الجلسات
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
    
    // 2. التحقق من كلمة المرور المهشّرة
    if (password_verify($password, $user['password_hash'])) {
        
        // 3. تسجيل الدخول بنجاح - إنشاء الجلسة
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        
        // التوجيه إلى الصفحة الرئيسية
        header('Location: index.php');
        exit();
        
    } else {
        // كلمة المرور غير صحيحة
        die("خطأ: كلمة المرور غير صحيحة.");
    }
} else {
    // لم يتم العثور على بريد إلكتروني مطابق
    die("خطأ: البريد الإلكتروني غير مسجل.");
}

$stmt->close();
$conn->close();
?>