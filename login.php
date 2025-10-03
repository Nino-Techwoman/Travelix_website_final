<?php

session_start();
include('./components/document-start.php');

include('data.php');
include('function.php');
include('./components/users.php');
include('./components/forms.php');
?>

<!-- header -->
<?php include('./components/header.php'); ?>

<?php
// Login form logic
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $user = findUser($username, $password);

    if ($user) {
        $_SESSION['current_user'] = $username;
        header('Location: account.php');
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}

// Render form
displayLoginForm($error);
?>

<!-- footer -->
<?php include('./components/footer.php'); ?>

<!-- document end -->
<?php include('./components/document-end.php'); ?>
