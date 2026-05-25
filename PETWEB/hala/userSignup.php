<?php
$conn = new mysqli("127.0.0.1", "root", "", "halaDB");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $password = password_hash($pass, PASSWORD_DEFAULT);
    $role = "user";
}
$sql = "INSERT INTO users (full_name, email, role ,password) VALUES ('$fullName','$email','$role','$password');";
$result = $conn->query($sql);
if (!$result) {
    echo "error Try again";
}

$conn->close();
header("Location: ./login.php");
exit();

?>