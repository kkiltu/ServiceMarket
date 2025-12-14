<?php
session_start();
?>


<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <title>سوق الخدمات</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <?php include 'header.php'; ?>


  <section class="hero">
    <img src="images/hero-img.jpg" alt="خدمات" class="hero-img">
    <div class="hero-text">
      <h2>مرحبًا بكم في سوق الخدمات</h2>
      <p>اكتشف مجموعة متنوعة من الخدمات المتاحة لك، سواء كنت تبحث عن تقديم خدماتك أو حجز خدمات من الآخرين.</p>
      <a href="services.php" class="btn">احجز الآن</a>
    </div>
  </section>


  <section class="services-section">
    <h2>خدماتنا المتنوعة</h2>
    <p class="sub-text">نحن نقدم مجموعة واسعة من الخدمات التي تلبي احتياجات كافة العملاء.</p>

    <div class="services-grid">
      <div class="service-card">
        <img src="images/home.jpg" alt="">
        <h3>خدمات منزلية</h3>
        <p>استمتع بخدمات تنظيف، صيانة، وترتيب المنازل من محترفين ذوي خبرة. نحن نضمن لك الجودة والاحترافية.</p>
      </div>

      <div class="service-card">
        <img src="images/tech.jpg" alt="">
        <h3>خدمات تقنية</h3>
        <p>نوفر لك خدمات الدعم الفني والصيانة للأجهزة الإلكترونية والبرمجيات. احصل على المساعدة من خبراء في المجال.</p>
      </div>

      <div class="service-card">
        <img src="images/edu.jpg" alt="">
        <h3>خدمات تعليمية</h3>
        <p>احصل على دروس خصوصية ومساعدة أكاديمية من معلمين محترفين. نحن نساعدك على تحقيق أهدافك التعليمية.</p>
      </div>
    </div>
  </section>


  <section class="reviews">
    <h2>آراء عملائنا الكرام</h2>
    <p class="sub-text">نحن نعتز بتقييمات عملائنا ونستخدمها لتحسين خدماتنا باستمرار.</p>

    <div class="reviews-grid">
      <div class="review-card">
        <img src="images/rev1.jpg">
        <h3>تجربة مميزة</h3>
        <p>كانت تجربتي مع سوق الخدمات رائعة. حصلت على خدمة تنظيف احترافية في وقت قياسي.</p>
      </div>

      <div class="review-card">
        <img src="images/rev2.jpg">
        <h3>تواصل سريع</h3>
        <p>تواصلت مع مزود خدمة الدعم الفني، وكان سريع الاستجابة. حلوا مشكلتي في دقائق.</p>
      </div>

      <div class="review-card">
        <img src="images/rev3.jpg">
        <h3>خدمات تعليمية ممتازة</h3>
        <p>الدروس الخصوصية التي حصلت عليها ساعدتني كثيرًا في تحسين مستواي الدراسي. أنصح الجميع بتجربتها.</p>
      </div>
    </div>
  </section>


  <section class="features">
    <h2>لماذا تختار خدماتنا؟</h2>
    <p class="sub-text">نحن نقدم مجموعة من المميزات التي تجعل تجربتك معنا فريدة ومميزة.</p>

    <div class="feature-row">
      <img src="images/quality.jpg">
      <div>
        <h3>جودة عالية</h3>
        <p>نحن نضمن لك الحصول على خدمات بجودة عالية من مقدمي الخدمة المعتمدين. كل خدمة تخضع لمعايير صارمة لضمان رضا العميل.</p>
      </div>
    </div>

    <div class="feature-row">
      <img src="images/easy.jpg">
      <div>
        <h3>سهولة الاستخدام</h3>
        <p>يمكنك تصفح الخدمات المتاحة وحجزها بسهولة من خلال واجهتنا البسيطة. كل ما تحتاجه هو بضع نقرات.</p>
      </div>
    </div>

    <div class="feature-row">
      <img src="images/support.jpg">
      <div>
        <h3>دعم عملاء متواصل</h3>
        <p>فريق الدعم لدينا متاح دائمًا لمساعدتك في أي استفسار أو مشكلة. نحن هنا لضمان تجربة سلسة ومريحة لك.</p>
      </div>
    </div>
  </section>


  <section class="contact">
    <h2>تواصل معنا</h2>
    <p class="sub-text">فريق الدعم لدينا جاهز للإجابة على استفساراتك ومساعدتك في جميع احتياجاتك.</p>

    <form action="send.php" method="POST" class="contact-form">
      <label>الاسم:</label>
      <input type="text" name="name" required>

      <label>الإيميل:</label>
      <input type="email" name="email" required>

      <label>الرسالة:</label>
      <textarea name="message" required></textarea>

      <button type="submit" class="btn">إرسال</button>
    </form>
  </section>

</body>
</html>
