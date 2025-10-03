<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['full_name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name && $email && $subject && $message) {
        $_SESSION['contact_data'] = [
            'name'    => $name,
            'email'   => $email,
            'subject' => $subject,
            'message' => $message
        ];
        echo "success";
    } else {
        echo "error";
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SESSION['contact_data'])) {
    $data = $_SESSION['contact_data'];

    echo "<h2>Your form is submitted, " . htmlspecialchars($data['name']) . "!</h2>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($data['email']) . "</p>";
    echo "<p><strong>Subject:</strong> " . htmlspecialchars($data['subject']) . "</p>";
    echo "<p><strong>Message:</strong> " . nl2br(htmlspecialchars($data['message'])) . "</p>";

    echo '<div><a href="../index.php" class="back_to_home">Back To Home</a></div>';

    unset($_SESSION['contact_data']);
} else {
    echo "<p>No data submitted.</p>";

    echo '<div>
            <a href="../index.php" class="back_to_home">Back To Home</a>
        </div>';
}

?>
