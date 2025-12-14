<?php
session_start();
include __DIR__ . '/db_config.php'; // الاتصال بقاعدة البيانات
include __DIR__ . '/header.php';     // الـ navbar

// جلب التصنيف من الرابط
$categorySlug = $_GET['cat'] ?? '';

// التحقق إذا التصنيف موجود
$stmt = $pdo->prepare("SELECT * FROM categories WHERE slug = ?");
$stmt->execute([$categorySlug]);
$category = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$category) {
    die("تصنيف غير صالح.");
}

// جلب بيانات الخدمة
$stmt2 = $pdo->prepare("
    SELECT services.*, users.username 
    FROM services
    JOIN users ON services.user_id = users.id
    WHERE services.category_id = ?
");
$stmt2->execute([$category['id']]);
$services = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title><?php echo $category['name']; ?> - سوق الخدمات</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="category.css">
</head>
<body>

<section class="category-hero">
    <h1><?php echo $category['name']; ?></h1>
    <p>اكتشف الخدمات المتاحة ضمن هذا التصنيف</p>
</section>

<section class="category-services">
    <?php if(count($services) > 0): ?>
        <?php foreach($services as $service): ?>

        <?php
            // جلب أول صورة للخدمة
            $imgStmt = $pdo->prepare("SELECT image_path FROM service_images WHERE service_id = ? LIMIT 1");
            $imgStmt->execute([$service['id']]);
            $firstImage = $imgStmt->fetchColumn() ?: "default.jpg";
        ?>

        <div class="service-card">
            <img src="images/<?php echo $firstImage; ?>" alt="service image" class="service-thumb">

            <div class="service-info">
                <h2><?php echo $service['name']; ?></h2>

                <p class="service-desc">
                    <?php 
                        echo mb_strimwidth($service['description'], 0, 120, "...", 'UTF-8');
                    ?>
                </p>

                <p class="service-price">
                    <strong>السعر:</strong> <?php echo $service['price']; ?> شيكل
                </p>

                <p class="posted-by">
                    <strong>تم النشر بواسطة:</strong> <?php echo $service['username']; ?>
                </p>

                <a href="service_detail.php?id=<?php echo $service['id']; ?>" class="view-btn">
                    عرض التفاصيل
                </a>
            </div>
        </div>

        <?php endforeach; ?>
    <?php else: ?>
        <p class="no-services">لا توجد خدمات ضمن هذا التصنيف.</p>
    <?php endif; ?>
</section>


<?php if(isset($_SESSION['username'])): ?>
<!-- زر popup لإضافة خدمة -->
<button id="addServiceBtn" class="btn">أضف خدمة جديدة</button>

<!-- modal الفورم -->
<div id="addServiceModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>أضف خدمة جديدة</h2>
        <form action="add_service.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="category_id" value="<?php echo $category['id']; ?>">
            <input type="text" name="name" placeholder="اسم الخدمة" required>
            <textarea name="description" placeholder="وصف الخدمة" required></textarea>
            <input type="number" name="price" placeholder="السعر" step="0.01" required>
            <input type="file" name="images[]" accept="image/*" multiple required>
            <button type="submit">إضافة الخدمة</button>
        </form>
    </div>
</div>
<?php endif; ?>

<script src="category.js"></script>
</body>
</html>
