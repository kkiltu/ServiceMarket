<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <title>خدماتنا - سوق الخدمات</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="services.css">
</head>
<body>
  <?php include 'header.php'; ?>


  <section class="hero-services">
    <img src="images/services-hero.jpg" alt="خدماتنا" class="hero-img">
    <div class="hero-text">
      <h1>اكتشف خدماتنا المتنوعة</h1>
      <p>نحن هنا لتلبية جميع احتياجاتك</p>
    </div>
  </section>

  <section class="services-list">
     <div class="service-item">
      <img src="images/carpentry.jpg" alt="خدمة النجارة">
      <div class="service-text">
       <h2> <a href="category.php?cat=carpentry">خدمة النجارة</a> </h2>
        <p>نحن ندرك أن الأثاث ليس مجرد قطع تملأ الفراغ، بل هو جزء من هويتك وملاذ راحتك. لهذا، نقدم لك خدمات نجارة مخصصة بالكامل تضمن لك الحصول على ما تصورت تماماً.</p>
      </div>
</div>

    <div class="service-item">
      <img src="images/plumbing.jpg" alt="خدمة السباكة">
      <div class="service-text">
        <h2><a href="category.php?cat=plumbing"> خدمة السباكة</a></h2>
        <p>لا تدع مشكلات السباكة تفسد يومك! الحل السريع والموثوق لجميع أعمال السباكة، من التسريبات إلى التركيبات الجديدة.</p>
      </div>
    </div>

   <div class="service-item">
      <img src="images/electricity.jpg" alt="الكهرباء المنزلية">
      <div class="service-text">
        <h2><a href="category.php?cat=electricity"> الكهرباء المنزلية</a></h2>
        <p>الأمان الكهربائي لا يقبل المساومة. نقدم حلول كهربائية منزلية آمنة وموثوقة، من تركيب الإضاءة الذكية إلى إصلاح الأعطال. فنيون معتمدون لراحة بالك.</p>
      </div>
    </div>

   <div class="service-item">
      <img src="images/ac.jpg" alt="التكييف والتبريد">
      <div class="service-text">
        <h2><a href="category.php?cat=ac">التكييف والتبريد</a></h2>
        <p>لا تعرّض راحتك للخطر! نقدم تركيب وصيانة وإصلاح جميع أنواع أنظمة التكييف بكفاءة وسرعة. تأكد من أن جهازك يعمل بأقصى كفاءة ويوفر الطاقة.</p>
      </div>
    </div>

    <div class="service-item">
      <img src="images/cleaning.jpg" alt="تنظيف المنازل والمكاتب">
      <div class="service-text">
        <h2><a href="category.php?cat=cleaning">تنظيف المنازل والمكاتب</a></h2>
        <p>تقدم خدمات تنظيف احترافية للمنازل والمكاتب. نضمن لك نظافة لامعة وبيئة صحية. احجز الآن واسترد وقتك الثمين!</p>
      </div>
    </div>

    <div class="service-item">
      <img src="images/tutoring.jpg" alt="التدريس الخصوصي">
      <div class="service-text">
        <h2><a href="category.php?cat=tutoring">التدريس الخصوصي</a></h2>
        <p>حوِّل الصعوبات إلى نجاح أكاديمي! مدرب خصوصي متخصص يقدم جلسات مكثفة ومصممة خصيصاً لتحقيق أفضل الدرجات. ابدأ رحلة التفوق الآن. اتصل بنا لترى الفرق في الأداء والثقة!</p>
      </div>
    </div>

    <div class="service-item">
      <img src="images/tiling.jpg" alt="تركيب السيراميك والبلاط">
      <div class="service-text">
        <h2><a href="category.php?cat=tiling">تركيب السيراميك والبلاط</a></h2>
        <p>نحن ندرك أن تركيب البلاط والسيراميك يتطلب أكثر من مجرد مهارة يدوية؛ إنه يتطلب دقة هندسية لضمان استواء السطح وتطابق النقوش، وحساً فنياً في قص الزوايا والتشطيب.</p>
      </div>
    </div>

    <div class="service-item">
      <img src="images/painting.jpg" alt="أعمال الدهان">
      <div class="service-text">
        <h2><a href="category.php?cat=painting">أعمال الدهان</a></h2>
        <p>غيّر جو منزلك بلمسة لون! متخصصون في دهان المنازل والمكاتب بدقة ونظافة وسرعة فائقة. نضمن لك نتائج احترافية وتغطية مثالية. استشرنا اليوم وابنِ عالمك بالألوان!</p>
      </div>
    </div>
  </section>

  <section class="service-request">
    <h1>لم تجد ما تبحث عنه؟</h1>
    <p>عبئ النموذج التالي لإضافة ما تبحث عنه!</p>
    <form action="store_service.php" method="POST">
      <input type="text" name="service_name" placeholder="اسم الخدمة" required>
      <textarea name="service_desc" placeholder="وصف الخدمة" required></textarea>
      <label>
        <input type="radio" name="service_type" value="provider" required> مزود الخدمة
      </label>
      <label>
        <input type="radio" name="service_type" value="user" required> مستعمل للخدمة
      </label>
      <button type="submit">ارسال</button>
    </form>
  </section>
</body>
</html>
