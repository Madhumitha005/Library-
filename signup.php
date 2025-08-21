<?php
session_start();
require 'db_connect.php'; // Use require so the script stops if DB fails

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $studentId = trim($_POST['studentId']);
    $password = trim($_POST['password']);

    if (!empty($studentId) && !empty($password)) {
        // Check if student already exists
        $check = $conn->prepare("SELECT studentId FROM ss WHERE studentId = ?");
        $check->bind_param("s", $studentId);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Student ID already exists! Please login.'); window.location='login.html';</script>";
        } else {
            // Secure password hashing
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO ss (studentId, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $studentId, $hashedPassword);

            if ($stmt->execute()) {
                echo "<script>alert('Signup successful! Please login.'); window.location='login.html';</script>";
            } else {
                echo "<script>alert('Error during signup. Please try again.'); window.location='signup.html';</script>";
            }
            $stmt->close();
        }
        $check->close();
    } else {
        echo "<script>alert('Please fill in all fields!'); window.location='signup.html';</script>";
    }

    $conn->close();
}
?>
