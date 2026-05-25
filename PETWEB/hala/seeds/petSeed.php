<?php
$servername = "localhost";
$username = "root";     
$password = "";         // default XAMPP password is empty
$dbname = "halaDB";  // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE adoption (
 id INT AUTO_INCREMENT PRIMARY KEY,
userid VARCHAR(100),
petName VARCHAR(100),
userName VARCHAR(100),
userAge INT,
userGender ENUM('female', 'male'),
previousExperience TEXT,
additionalInfo TEXT,
status VARCHAR(100)
);";

/*$sql = "INSERT INTO animals (name, age, short_description, full_description, image_url)
VALUES ('Hala',21,'short_description','full_description','image_url'),
        ('Hala',21,'short_description','full_description','image_url'),
        ('Hala',21,'short_description','full_description','image_url'),
        ('Hala',21,'short_description','full_description','image_url'),
;";*/
$result = $conn->query($sql);

?>