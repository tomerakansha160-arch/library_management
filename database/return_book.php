<?php
$conn = mysqli_connect("localhost","root","","library_management");

if(!$conn){
    die(mysqli_connect_error());
}

if(isset($_GET['id'])){

    $id = $_GET['id'];

    // Issue table se book_id nikalo
    $result = mysqli_query($conn, "SELECT book_id FROM issue_book WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);

    $book_id = $row['book_id'];

    // Status Returned karo
    mysqli_query($conn, "UPDATE issue_book SET status='Returned' WHERE id='$id'");

    // Quantity +1 karo
    mysqli_query($conn, "UPDATE books SET available = available + 1 WHERE id='$book_id'");

    header("Location:view_issue.php");
    exit();
}
?>