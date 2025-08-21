<?php
session_start();
require "db_connect.php"; // DB connection

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentId = trim($_POST['studentId']);
    $password = trim($_POST['password']);

    // Check if both fields are filled
    if (empty($studentId) || empty($password)) {
        echo "<script>alert('Please fill all fields'); window.location.href='login.html';</script>";
        exit();
    }

    // Prepare and execute query safely
    $stmt = $conn->prepare("SELECT studentId, password FROM ss WHERE studentId = ?");
    $stmt->bind_param("s", $studentId);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($db_studentId, $db_password);
        $stmt->fetch();

        // Verify password (hash check)
        if (password_verify($password, $db_password)) {
            $_SESSION['studentId'] = $db_studentId;
            header("Location: dashboard.php"); // Redirect to dashboard
            exit();
        } else {
            echo "<script>alert('Invalid password'); window.location.href='login.html';</script>";
        }
    } else {
        echo "<script>alert('Student ID not found'); window.location.href='login.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
