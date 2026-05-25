<?php 
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ./index.php");
    exit();
}

$servername = "localhost";
$username = "root";     
$password = "";         
$dbname = "halaDB";  


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$role = ($_SESSION['role']);
if ($role != 'admin') {
    header("Location: ./index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

}

$sql = "UPDATE adoption
SET status = 'approved'
WHERE id = $id;";
$result = $conn->query($sql);

header("Location: ./adminPage.php");
exit();

?>