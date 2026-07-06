<?php
$conn = mysqli_connect("localhost","root","","library_management");

if(isset($_POST['save']))
{
    $student_name = $_POST['student_name'];
    $enrollment_no = $_POST['enrollment_no'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];

    $query = "INSERT INTO student(student_name,enrollment_no,course,semester,mobile,email)
              VALUES('$student_name','$enrollment_no','$course','$semester','$mobile','$email')";

    if(mysqli_query($conn,$query))
    {
        echo "<script>alert('Student Added Successfully');</script>";
    }
    else
    {
        echo "Error : ".mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>

<h2>Add Student</h2>

<form method="POST">

Student Name:<br>
<input type="text" name="student_name" required><br><br>

Enrollment No:<br>
<input type="text" name="enrollment_no" required><br><br>

Course:<br>
<input type="text" name="course" required><br><br>

Semester:<br>
<input type="text" name="semester" required><br><br>

Mobile:<br>
<input type="text" name="mobile" required><br><br>

Email:<br>
<input type="email" name="email" required><br><br>

<input type="submit" name="save" value="Add Student">

</form>

<br>

<a href="../admin/index.php">Back to Dashboard</a>

</body>
</html>