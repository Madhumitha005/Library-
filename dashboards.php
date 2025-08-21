<?php
session_start();
if (!isset($_SESSION['student_id'])) {
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>LMS Dashboard</title>
</head>
<body>
    <h2>Welcome to the Library Management System</h2>
    <p>Hello, Student ID: <?php echo $_SESSION['student_id']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>
