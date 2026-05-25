<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.html");
    exit;
}
$conn = new mysqli("127.0.0.1", "root", "", "halaDB");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $petName = $_POST['petName'];
    $petDescription =$_POST['petDescription'];
    $petAge = $_POST['petAge'];
    $short = substr($petDescription, 0, 30);
    $short_description = $short. '...';
    $imageUrl = $_POST['imageUrl'];
}

$sql = "INSERT INTO animals(name, age, short_description, full_description, image_url)
VALUES (
    '$petName',
    $petAge,
    '$short_description',
    '$petDescription',
    '$imageUrl'
);";
$result = $conn->query($sql);
header("Location: ./view_pet.php");
exit();
?>