<?php
session_start();
$servername = "localhost";
$username = "root";   
$password = "";        
$dbname = "halaDB";  


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $petName = $_POST['petName']; 
  $userId = ($_SESSION['user_id']);
  $userName = $_POST['userName'];
  $userAge = $_POST['userAge'];
  $userGender = $_POST['userGender'];
  $previousExperience = $_POST['previousExperience'];
  $additionalInfo = $_POST['additionalInfo'];
}
$sql = "INSERT INTO adoption(userid,petName,userName, userAge, userGender, previousExperience, additionalInfo,status)
VALUES (
    '$userId',
    '$petName',
    '$userName', 
    $userAge, 
    '$userGender', 
    '$previousExperience', 
    '$additionalInfo',
    'pending'
);";
$result = $conn->query($sql);

header("Location: ./view_pet.php");
exit();

?>