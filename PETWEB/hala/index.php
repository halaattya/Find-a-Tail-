<?php
session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Adoption Portal </title>
    <link rel="stylesheet" href="assets/css/style.css">
       <link href="https://fonts.googleapis.com/css2?family=Schoolbell&family=Love+Ya+Like+A+Sister&display=swap" rel="stylesheet">

</head>
<body>
  
   
    <header>
        <img src="assets/images/pet1.jpg" alt="Pet Adoption Top Banner" class="hero-image">
    </header>
    
    <section id="First-title">
        <h1>Find a Tail!</h1>
           </section>
    
 <section id="about-us">
        <h2>About Us</h2>
       <p>Find a Tail will connect loving families with pets in need of a forever home. Whether you're looking for a playful dog or a curious cat.we're here to help you find your new best friend. Our goal is to ensure that every pet has a safe, caring home and every family finds the perfect companion.</p>
       <p>Browse our available pets, learn about their stories, and take the first step toward adopting your new pet today!</p>
    </section>
    
<div class="home-buttons">
  <a href="view_pet.php" class="button"><span>View Pets</span></a>
  <?php
  if (!isset($_SESSION['user_id'])){ ?>
    <a href="./login.php" class="button"><span>Log In</span></a>
   <?php 
}
?>
<?php 
if (isset($_SESSION['user_id'])) {
    $role = ($_SESSION['role']);

 
if ($role == 'admin') {?>
    <a href="./adminPage.php" class="button"><span>Admin Page</span></a>
<?php  } }?>
  
</div>



    
    
    <footer>
        <img src="assets/images/pet2.jpg" alt="Adopt a Pet Bottom Banner" class="footer-image">
    </footer>
    
  </body>
</html>
