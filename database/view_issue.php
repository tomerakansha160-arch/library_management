<?php
$conn = mysqli_connect("localhost","root","","library_management");

$query = "SELECT
            issue_book.id,
            student.student_name,
            books.book_name,
            issue_book.issue_date,
            issue_book.return_date,
            issue_book.status
          FROM issue_book
          INNER JOIN student
              ON issue_book.student_id = student.id
          INNER JOIN books
              ON issue_book.book_id = books.id";

$result = mysqli_query($conn,$query);

if(!$result){
    die(mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Issued Books</title>
</head>
<body>

<h2>Issued Books</h2>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Student</th>
<th>Book</th>
<th>Issue Date</th>
<th>Return Date</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['student_name']; ?></td>
    <td><?php echo $row['book_name']; ?></td>
    <td><?php echo $row['issue_date']; ?></td>
    <td><?php echo $row['return_date']; ?></td>
    <td><?php echo $row['status']; ?></td>

    <td>
        <?php
        if (strtolower(trim($row['status'])) == "issued")
        {
            echo "<a href='return_book.php?id=".$row['id']."'>Return</a>";
        }
        else
        {
            echo "Returned";
        }
        ?>
    </td>
</tr>
<?php
}
?>

</table>

<br>

<a href="../admin/index.php">Back to Dashboard</a>

</body>
</html>