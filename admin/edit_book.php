<?php
$conn = mysqli_connect("localhost","root","","library_management");

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM books WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{
    $book_name = $_POST['book_name'];
    $author_name = $_POST['author_name'];
    $category = $_POST['category'];
    $book_no = $_POST['book_no'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    mysqli_query($conn,"UPDATE books SET
    book_name='$book_name',
    author_name='$author_name',
    category='$category',
    book_no='$book_no',
    price='$price',
    quantity='$quantity'
    WHERE id='$id'");

    header("Location: view_book.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
</head>
<body>

<h2>Edit Book</h2>

<form method="POST">

Book Name:<br>
<input type="text" name="book_name" value="<?php echo $row['book_name']; ?>" required><br><br>

Author Name:<br>
<input type="text" name="author_name" value="<?php echo $row['author_name']; ?>" required><br><br>

Category:<br>
<input type="text" name="category" value="<?php echo $row['category']; ?>" required><br><br>

Book No:<br>
<input type="text" name="book_no" value="<?php echo $row['book_no']; ?>" required><br><br>

Price:<br>
<input type="number" name="price" value="<?php echo $row['price']; ?>" required><br><br>

Quantity:<br>
<input type="number" name="quantity" value="<?php echo $row['quantity']; ?>" required><br><br>

<input type="submit" name="update" value="Update Book">

</form>

<br>

<a href="view_book.php">Back to View Books</a>

</body>
</html>