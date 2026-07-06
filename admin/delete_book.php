<?php
$conn = mysqli_connect("localhost","root","","library_management");

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM books WHERE id='$id'");

header("Location: view_book.php");
exit();
?>