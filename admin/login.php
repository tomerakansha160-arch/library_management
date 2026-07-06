<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "library_management");

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['admin'] = $username;
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Invalid Username or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>

<h2>Admin Login</h2>

<form method="POST">
    Username:<br>
    <input type="text" name="username" required><br><br>

    Password:<br>
    <input type="password" name="password" required><br><br>

    <input type="submit" name="login" value="Login">
</form>

</body>
</html>