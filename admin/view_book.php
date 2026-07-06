<?php
session_start();

$conn = mysqli_connect("localhost","root","","library_management");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn,"SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Books</title>
</head>
<body>

<h2>All Books</h2>

<table border="1" cellpadding="10" cellspacing="0">
<tr>
    <th>ID</th>
    <th>Book Name</th>
    <th>Author Name</th>
    <th>Category</th>
    <th>Book No</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['book_name']; ?></td>
    <td><?php echo $row['author_name']; ?></td>
    <td><?php echo $row['category']; ?></td>
    <td><?php echo $row['book_no']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
 <td>
    <a href="edit_book.php?id=<?php echo $row['id']; ?>">Edit</a> |
    <a href="delete_book.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>   
</tr>
<?php
}
?>

</table>

<br><br>

<a href="index.php">Back to Dashboard</a>

</body>
</html>