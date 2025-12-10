<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (!empty($name) && !empty($email)) {
        $stmt = $pdo->prepare("INSERT INTO newsletter_subscribers (name, email) VALUES (?, ?)");

        try {
            $stmt->execute([$name, $email]);
            header("Location: contact.php?success=1");
            exit;
        } catch (PDOException $e) {
            header("Location: contact.php?error=email_exists");
            exit;
        }
    }
}
