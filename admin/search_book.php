<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost","root","","library_management");

$search = "";

if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT * FROM books 
              WHERE book_name LIKE '%$search%' 
              OR author_name LIKE '%$search%' 
              OR category LIKE '%$search%'";
} else {
    $query = "SELECT * FROM books";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Books</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Search Books</h1>

<form method="GET">
    <input type="text" name="search" placeholder="Enter Book Name / Author / Category"
           value="<?php echo $search; ?>" required>
    <button type="submit">Search</button>
</form>

<br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Book Name</th>
        <th>Author Name</th>
        <th>Category</th>
        <th>Book No</th>
        <th>Price</th>
        <th>Quantity</th>
    </tr>

<?php
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['book_name']; ?></td>
    <td><?php echo $row['author_name']; ?></td>
    <td><?php echo $row['category']; ?></td>
    <td><?php echo $row['book_no']; ?></td>
    <td><?php echo $row['price']; ?></td>
    <td><?php echo $row['quantity']; ?></td>
</tr>
<?php } ?>

</table>

<br>
<a href="index.php">⬅ Back to Dashboard</a>

</body>
</html>