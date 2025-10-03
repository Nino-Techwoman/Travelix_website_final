<!-- document start -->
<?php include('./components/document-start.php'); ?>

<?php
    session_start();

    include("./data.php");
    include("./function.php");
    include("./components/users.php");

    if (!isLoggedIn()) {
        header('Location: login.php');
        exit();
    }
?>

<!-- header -->
<?php include('./components/header.php'); ?>

<?php displayUserPanel(); ?>

<!-- footer section -->
<?php include('./components/footer.php'); ?>

<!-- document end -->
<?php include('./components/document-end.php'); ?>