<nav class="navbar">
  <div class="logo">Service Market</div>

  <ul class="nav-links">
    <li><a href="index.php">الصفحة الرئيسية</a></li>
    <li><a href="services.php">خدماتنا</a></li>
    <li><a href="whoarewe.php">من نحن</a></li>
    <li><a href="Article.html">المقالات</a></li>
    <li><a href="contact.php">تواصل معنا</a></li>

    <?php if(isset($_SESSION['username'])): ?>
        <li><a href="logout.php" class="login-link">
            تسجيل خروج (<?php echo $_SESSION['username']; ?>)
        </a></li>
    <?php else: ?>
   <li><a href="login.html" class="login-link">سجّل دخول</a></li>
    <?php endif; ?>
  </ul>
</nav>
