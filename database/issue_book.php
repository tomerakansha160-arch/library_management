<?php
$conn = mysqli_connect("localhost","root","","library_management");

if(isset($_POST['issue']))
{
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $issue_date = $_POST['issue_date'];
    $return_date = $_POST['return_date'];

    $query = "INSERT INTO issue_book(student_id,book_id,issue_date,return_date,status)
              VALUES('$student_id','$book_id','$issue_date','$return_date','Issued')";

    if(mysqli_query($conn,$query))
    {
        mysqli_query($conn,"UPDATE books
                            SET available = available - 1
                            WHERE id='$book_id'");

        echo "<script>alert('Book Issued Successfully');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Issue Book</title>
</head>
<body>

<h2>Issue Book</h2>

<form method="POST">

Student :
<select name="student_id" required>
<option value="">Select Student</option>

<?php
$result = mysqli_query($conn,"SELECT * FROM student");

while($row = mysqli_fetch_assoc($result))
{
?>
<option value="<?php echo $row['id']; ?>">
    <?php echo $row['student_name']; ?>
</option>
<?php
}
?>

</select>

<br><br>

Book :
<select name="book_id" required>
<option value="">Select Book</option>

<?php
$result = mysqli_query($conn,"SELECT * FROM books WHERE available > 0");

while($row = mysqli_fetch_assoc($result))
{
?>
<option value="<?php echo $row['id']; ?>">
    <?php echo $row['book_name']; ?>
</option>
<?php
}
?>

</select>

<br><br>

Issue Date :
<input type="date" name="issue_date" required>

<br><br>

Return Date :
<input type="date" name="return_date" required>

<br><br>

<input type="submit" name="issue" value="Issue Book">

</form>

<br>

<a href="../admin/index.php">Back to Dashboard</a>

</body>
</html>