<?php

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

if (!function_exists('addUser')) {
    function addUser($userData) {
        $_SESSION['users'][] = $userData;
    }
}

if (!function_exists('findUser')) {
    function findUser($username, $password) {
        foreach ($_SESSION['users'] as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                return $user;
            }
        }
        return null;
    }
}

if (!function_exists('isLoggedIn')) {
    function isLoggedIn() {
        return isset($_SESSION['current_user']);
    }
}

if (!function_exists('currentUser')) {
    function currentUser() {
        return $_SESSION['current_user'] ?? null;
    }
}

if (!function_exists('displayUserPanel')) {
    function displayUserPanel() {
        $currentUser = currentUser();
        $users = $_SESSION['users'];

        echo "<div class='container-form' style='
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        '>";
        echo "<h1>Welcome, " . htmlspecialchars($currentUser) . "!</h1>";

        echo "<h3>All Registered Users:</h3>";
        echo "<ul>";
        foreach ($users as $user) {
            $fullName = '';
            if (isset($user['first_name']) && isset($user['last_name'])) {
                $fullName = $user['first_name'] . ' ' . $user['last_name'];
            } else {
                $fullName = $user['username'];
            }

            $ageText = isset($user['age']) ? ' - Age: ' . htmlspecialchars($user['age']) : '';

            echo "<li>" . htmlspecialchars($fullName) . " (" . htmlspecialchars($user['username']) . ")$ageText</li>";
        }
        echo "</ul>";
        echo "</div>";

        echo "<script>";
        echo "let users = " . json_encode($users) . ";";
        echo "console.log('Users:', users);";
        echo "let currentUser = '" . htmlspecialchars($currentUser) . "';";
        echo "console.log('Logged in as:', currentUser);";
        echo "</script>";
    }
}
?>