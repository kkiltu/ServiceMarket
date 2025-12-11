<?php
session_start();
include __DIR__ . '/db_config.php';
include __DIR__ . '/header.php';

$service_id = $_GET['id'] ?? 0;

$stmt = $pdo->prepare("
    SELECT services.*, users.username 
    FROM services 
    JOIN users ON services.user_id = users.id
    WHERE services.id = ?
");
$stmt->execute([$service_id]);
$service = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$service) {
    die("الخدمة غير موجودة.");
}


$imgStmt = $pdo->prepare("SELECT * FROM service_images WHERE service_id = ?");
$imgStmt->execute([$service_id]);
$images = $imgStmt->fetchAll(PDO::FETCH_ASSOC);


$reviewStmt = $pdo->prepare("
    SELECT reviews.*, users.username 
    FROM reviews 
    JOIN users ON reviews.user_id = users.id
    WHERE service_id = ?
    ORDER BY created_at DESC
");
$reviewStmt->execute([$service_id]);
$reviews = $reviewStmt->fetchAll(PDO::FETCH_ASSOC);

// حساب متوسط التقييم
$avgStmt = $pdo->prepare("SELECT AVG(rating) as avg_rate, COUNT(*) as total_reviews FROM reviews WHERE service_id = ?");
$avgStmt->execute([$service_id]);
$ratingData = $avgStmt->fetch(PDO::FETCH_ASSOC);

$avgRate = round($ratingData['avg_rate'], 1);
$totalReviews = $ratingData['total_reviews'];
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title><?php echo $service['name']; ?> | سوق الخدمات</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="service_detail.css">
</head>
<body>

<div class="service-container">

    <div class="image-gallery">

    <div class="main-image">
        <img id="currentImage" src="images/<?php echo $images[0]['image_path']; ?>">
    </div>

    <div class="thumbnails">
        <?php foreach($images as $img): ?>
            <img class="thumb" 
                 src="images/<?php echo $img['image_path']; ?>" 
                 onclick="changeImage('images/<?php echo $img['image_path']; ?>')">
        <?php endforeach; ?>
    </div>

</div>


    <!-- SERVICE DETAILS -->
    <div class="service-info-box">
        <h1><?php echo $service['name']; ?></h1>

        <p class="service-price">السعر: <strong><?php echo $service['price']; ?> شيكل</strong></p>

        <p class="posted-by">
            <strong>تم النشر بواسطة:</strong> <?php echo $service['username']; ?>
        </p>

        <p class="service-desc-full"><?php echo nl2br($service['description']); ?></p>

        <hr>

        <div class="rating-summary">
            <h3>التقييمات</h3>

            <p class="avg-rating">
                ⭐ <?php echo $avgRate ?: 0; ?>  
                <span class="review-count">(<?php echo $totalReviews; ?> تقييمات)</span>
            </p>
        </div>
    </div>

</div>


<!-- REVIEWS SECTION -->
<section class="reviews-section">

    <h2>آراء المستخدمين</h2>

    <?php if($totalReviews > 0): ?>
        <?php foreach($reviews as $rev): ?>
            <div class="review-box">
                <div class="review-header">
                    <strong><?php echo $rev['username']; ?></strong>
                    <span class="stars">⭐ <?php echo $rev['rating']; ?></span>
                </div>
                <p><?php echo nl2br($rev['comment']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>لا توجد تقييمات بعد.</p>
    <?php endif; ?>

    <?php if(isset($_SESSION['username'])): ?>
    <div class="add-review">
        <h3>أضف تقييمك</h3>

        <form action="submit_review.php" method="POST">
            <input type="hidden" name="service_id" value="<?php echo $service_id; ?>">

            <label>التقييم:</label>
            <select name="rating" required>
                <option value="5">5 ⭐⭐⭐⭐⭐</option>
                <option value="4">4 ⭐⭐⭐⭐</option>
                <option value="3">3 ⭐⭐⭐</option>
                <option value="2">2 ⭐⭐</option>
                <option value="1">1 ⭐</option>
            </select>

            <textarea name="comment" placeholder="اكتب رأيك..." required></textarea>

            <button type="submit">إرسال التقييم</button>
        </form>
    </div>
    <?php endif; ?>

</section>

<script>
let currentIndex = 0;
let thumbnails = document.querySelectorAll(".thumb");
let mainImage = document.getElementById("currentImage");

function changeImageByIndex(index) {
    currentIndex = index;
    mainImage.src = thumbnails[index].src;
}

thumbnails.forEach((thumb, i) => {
    thumb.addEventListener("click", () => changeImageByIndex(i));
});

</script>
</body>
</html>
