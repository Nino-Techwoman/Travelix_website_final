<!-- document start -->
<?php include('./components/document-start.php'); ?>

<!-- data -->
<?php include('data.php'); ?>
<!-- function -->
<?php include('function.php'); ?>

<!-- header -->
<?php include('./components/header.php'); ?>

<!-- carusel -->
<?php include('./components/carousel.php'); ?>

<!-- content -->
<?php renderTrendingNow($trendingNow); ?>
<?php renderMaldivesDeluxe($maldivesPackages); ?>

<!-- footer -->
<?php include('./components/footer.php'); ?>

<!-- document end -->
<?php include('./components/document-end.php'); ?>