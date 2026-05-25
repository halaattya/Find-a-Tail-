<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ./index.php");
    exit();
}

$servername = "localhost";
$username = "root";     // default XAMPP username
$password = "";         // default XAMPP password is empty
$dbname = "halaDB";  // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$role = ($_SESSION['role']);
if ($role != 'admin') {
    header("Location: ./index.php");
    exit;
}
$sql = "SELECT * FROM adoption;";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
        
<style>
  body {
    font-family: 'Arial', sans-serif;
    background-color: #FFBDA3;
    margin: 0;
    padding: 20px;
    color: #333;
  }

  /* الحاوية العامة التي تحتوي كل البطاقات */
  .cards-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
  }

  /* تصميم البطاقة */
  .pet-info-box {
    background-color: #FEF3EF;
    padding: 30px 25px;
    border-radius: 60px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .pet-info-box h2 {
    font-family: 'Schoolbell', cursive;
    color: #EC5800;
    margin: 0 0 20px 0;
    font-size: 1.8em;
  }

  .pet-info-box p {
    font-family: 'Love Ya Like A Sister', cursive;
    color: #555;
    font-size: 1.1em;
    margin: 6px 0;
    width: 100%;
    text-align: left;
  }

  .pet-info-box p span.label {
    font-weight: bold;
    color: #EC5800;
  }
</style>
</head>
<body>
    <?php 
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
    ?>

<div class="cards-container">
  <!-- مثال بطاقة 1 -->
  <div class="pet-info-box">
    <h2>Pet Adoption Information</h2>
    <p><span class="label">Pet Name:</span> <?= $row['petName'] ?></p>
    <p><span class="label">User Name:</span> <?= $row['userName'] ?></p>
    <p><span class="label">User Age:</span> <?= $row['userAge'] ?></p>
    <p><span class="label">User Gender:</span> <?= $row['userGender'] ?></p>
    <p><span class="label">Previous Experience:</span> <?= $row['previousExperience'] ?></p>
    <p><span class="label">Additional Info:</span> <?= $row['additionalInfo'] ?></p>
    <p><span class="label">Status:</span> <?= $row['status'] ?></p>
    <?php  if($row['status'] == 'pending') {?>
    <form action="./accept.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <button class="button">Accept</button>
    </form>
    <form action="./reject.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <button class="button">Reject</button>
    </form>
<?php }else { ?>
<form action="./delete.php" method="post">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <button class="button">Clear</button>
    </form>
    <?php }?>


  </div>
        <?php
        }
     } 
        ?>
</div>


</body>

</html>