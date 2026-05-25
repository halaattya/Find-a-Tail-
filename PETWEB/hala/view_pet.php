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
$sql = "SELECT * FROM animals;";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Available Pets | Find a Tail</title>
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Schoolbell&display=swap" rel="stylesheet" />
</head>

<body>

  <header>
    <img src="./assets/images/pet1.jpg" alt="Pet Banner" class="hero-image" />
  </header>

  <section id="pet-gallery">
    <h1>Meet Our Adorable Pets</h1>
    <div class="pets-container">
      <?php
      if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <div class="pet-card">
              <img src="<?= $row['image_url'] ?>" alt="Dog1" />
              <h3><?= $row['name'] ?></h3>
              <p><?= $row['short_description'] ?></p>
              <form action="./view_za3tar.php" method="post">
              <input type="hidden" name="halaId" value="<?= $row['id']; ?>">
              <button class="button" style="width: 80px; padding : 7px">View</button>
              </form>
            
          </div>
          <?php
        }
      }
      ?>

    </div>
  </section>

  <div class="add-pet-button-wrapper">
    <?php
  if (isset($_SESSION['user_id'])){ ?>
    <a href="./myAdoption.php">My Adoption</a>
    <button onclick="openAdoptionForm()">Put a Pet Up for Adoption</button>
    <?php }?>
    <a href="./index.php" class="add-pet-button">Home</a>
    <?php if (isset($_SESSION['user_id'])){ ?>
    <form action="./signout.php">
    <button>Sign Out</button>
    </form>
    <?php } ?>
  </div>


  <div id="adoption-modal" class="modal hidden">
    <div class="modal-content">
      <span class="close-button" onclick="closeAdoptionForm()">&times;</span>
      <h2>Adoption Form</h2>
      <form id="adoption-form" action="./addPet.php" method="post">
        <label for="pet-name">Pet Name:</label>
        <input type="text" id="pet-name" name="petName" required />

        
        <label for="pet-age">Age:</label>
        <input type="number" id="pet-age" name="petAge" min="0" required />

        <label for="pet-description">Description:</label>
        <textarea id="pet-description" name="petDescription" rows="4" required></textarea>

        <label for="pet-image">Image URL:</label>
        <input type="url" name="imageUrl" id="pet-image">
        <label for="medical-record"><strong>Upload Medical/Vaccination Record (Optional):</strong></label>
        <input type="file" id="medical-record" name="medicalRecord" accept=".pdf,.jpg,.jpeg,.png"><br>
        <p class="login-warning">⚠ You must be logged in to submit this form.</p>

        <button type="submit">Submit</button>
      </form>
    </div>
  </div>

  <script>
    function openAdoptionForm() {
      document.getElementById("adoption-modal").classList.remove("hidden");
    }

    function closeAdoptionForm() {
      document.getElementById("adoption-modal").classList.add("hidden");
    }

    window.onclick = function (event) {
      const modal = document.getElementById("adoption-modal");
      if (event.target === modal) {
        modal.classList.add("hidden");
      }
    };
  </script>




</body >
</html >