<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "library_management");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['save'])) {

    $book_name = $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $category = $_POST['category'];
    $book_no = $_POST['book_no'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $query = "INSERT INTO books(book_name, author_name, category, book_no, price, quantity)
              VALUES('$book_name','$author_name','$category','$book_no','$price','$quantity')";

    if(mysqli_query($conn,$query)){
        echo "<script>alert('Book Added Successfully');</script>";
    } else {
        echo "Error: ".mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>
<body>

<h2>Add New Book</h2>

<form method="POST">

Book Name:<br>
<input type="text" name="book_name" required><br><br>

Author Name:<br>
<input type="text" name="author_name" required><br><br>

Category:<br>
<input type="text" name="category" required><br><br>

Book No:<br>
<input type="text" name="book_no" required><br><br>

Price:<br>
<input type="number" name="price" required><br><br>

Quantity:<br>
<input type="number" name="quantity" required><br><br>

<input type="submit" name="save" value="Add Book">

</form>

<br>
<a href="index.php">Back to Dashboard</a>

</body>
</html