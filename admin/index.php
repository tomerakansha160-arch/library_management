<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
$conn = mysqli_connect("localhost","root","","library_management");
// Total Books
$result = mysqli_query($conn,"SELECT COUNT(*) AS total FROM books");
$books = mysqli_fetch_assoc($result);

// Total Students
$result = mysqli_query($conn,"SELECT COUNT(*) AS total FROM student");
$students = mysqli_fetch_assoc($result);

// Issued Books
$result = mysqli_query($conn,"SELECT COUNT(*) AS total FROM issue_book WHERE status='Issued'");
$issued = mysqli_fetch_assoc($result);

// Returned Books
$result = mysqli_query($conn,"SELECT COUNT(*) AS total FROM issue_book WHERE status='Returned'");
$returned = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

<h1>Library Management System</h1>

<div class="cards">

    <div class="card">
        <h2>Total Books</h2>
        <h1><?php echo $books['total']; ?></h1>
    </div>

    <div class="card">
        <h2>Students</h2>
        <h1><?php echo $students['total']; ?></h1>
    </div>

    <div class="card">
        <h2>Issued</h2>
        <h1><?php echo $issued['total']; ?></h1>
    </div>

    <div class="card">
        <h2>Returned</h2>
        <h1><?php echo $returned['total']; ?></h1>
    </div>

</div> <!-- cards end -->

<div class="menu">

    <a href="add_book.php">📚 Add Books</a>

    <a href="view_book.php">📖 View Books</a>

    <a href="search_book.php">🔍 Search Books</a>

    <a href="../student/add_student.php">👨‍🎓 Add Student</a>

    <a href="../student/view_student.php">👨‍🎓 View Students</a>

    <a href="../database/issue_book.php">📕 Issue Book</a>

    <a href="../database/view_issue.php">📋 View Issued Books</a>

    <a href="logout.php">🚪 Logout</a>

</div>

</body>
</html>