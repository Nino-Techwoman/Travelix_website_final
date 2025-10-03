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
// Register form logic
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['first_name']);
    $lastName = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        $error = "Passwords do not match!";
    } else {
        addUser([
            'first_name' => $firstName,
            'last_name'  => $lastName,
            'email'      => $email,
            'username'   => $username,
            'password'   => $password
        ]);
        $_SESSION['current_user'] = $username;
        header('Location: account.php');
        exit();
    }
}

// Render form
displaySignupForm($error);
?>

<!-- footer -->
<?php include('./components/footer.php'); ?>

<!-- document end -->
<?php include('./components/document-end.php'); ?>