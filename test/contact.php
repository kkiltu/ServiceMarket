<?php
session_start();
?>

<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>تواصل معنا</title>
  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="contact.css">
</head>

<!-- SECTION 1: HERO  -->
<section class="contact-hero">
    <img src="images/contact-hero.jpg" alt="contact hero" class="hero-img">

    <div class="overlay"></div>


         <div class="hero-text">
        <h1>انضم إلى مجتمع خدماتنا اليوم!</h1>
        <p>تأكد من عدم تفويت أي فرصة جديدة عبر التسجيل في نشرتنا الإخبارية.</p>

        <form class="newsletter-form" method="POST" action="save_newsletter.php">
            <input type="text" name="name" placeholder="الاسم" required>
            <input type="email" name="email" placeholder="البريد الإلكتروني" required>
            <button type="submit">إرسال</button>
        </form>
    </div>
</section>

<!-- SECTION 2: CONTACT FORM -->
<section class="contact-section">

    <div class="contact-wrapper">

        <div class="left">
            <h2>تواصل معنا بكل سهولة!</h2>
            <p>يسعدنا سماع آرائكم واستفساراتكم، لا تترددوا في الاتصال بنا.</p>

            <form class="contact-form" action="save_contact.php" method="POST">
                <input type="text" name="name" placeholder="الاسم الكامل" required>
                <input type="email" name="email" placeholder="البريد الإلكتروني" required>
                <textarea name="message" placeholder="رسالتك" required></textarea>
                <button type="submit">ارسال</button>
            </form>
        </div>

        <div class="right">
          <div class="right">

    <div class="info-box">
        <svg viewBox="0 0 24 24">
            <path d="M2 4v16h20V4H2zm18 2v.511l-8 5.333-8-5.333V6h16zm-16 12V8.489l8 5.333 8-5.333V18H4z"/>
        </svg>
        <p>s12218701@stu.najah.edu</p>
    </div>

    <div class="info-box">
        <svg viewBox="0 0 24 24">
            <path d="M6.62 10.79a15.053 15.053 0 006.59 6.59l2.2-2.2a1 1 0 01.95-.27 11.72 11.72 0 003.68.59 1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1 11.72 11.72 0 00.59 3.68 1 1 0 01-.27.95l-2.2 2.16z"/>
        </svg>
        <p>+970566862007</p>
    </div>

</div>

    </div>

</section>
