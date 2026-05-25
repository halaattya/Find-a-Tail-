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
 $role = ($_SESSION['role']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $petId = $_POST['halaId'];
}




$sql = "SELECT * FROM animals where id = $petId ;";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Za3tar | Find a Tail</title>
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link href="https://fonts.googleapis.com/css2?family=Schoolbell&display=swap" rel="stylesheet" />

</head>

<body>
  <header>
    <img src="./assets/images/pet1.jpg" alt="Pet Banner" class="hero-image" />
  </header>

  <div class="pet-info-box">
    <img src="<?= $row['image_url'] ?>" />
    <h2><?= $row['name'] ?></h2>
    <p>Age: <?= $row['age'] ?> years</p>
    <p>
      <?= $row['full_description'] ?>
    </p>

    <div class="button-group">
      <button class="adopt-button" onclick="openAdoptionForm()">Adopt <?= $row['name'] ?></button>
      <button id="favorite-button" onclick="toggleFavorite()">♡ Add to Favorites</button>
      <?php if ($role == 'admin') {?>?>
      <form action="./deletePet.php" method="post">
      <input type="hidden" name="pett" value="<?= $row['id'] ?>">
      <button class="back-button">Delete</button>
    </form>
    <?php }?>
    </div>



    <div id="adoption-modal" class="modal hidden">
      <div class="modal-content">
        <span class="close-button" onclick="closeAdoptionForm()">&times;</span>
        <h2>Adoption Form</h2>
        <form id="adoption-form" action="./adoption.php" method="post">
          <input type="hidden" name="petId" value="<?= $row['id'] ?>">
          <h3>Pet Information</h3>
          <label for="pet-name">Pet Name:</label>
          <input type="text" id="pet-name" name="petName" value="<?= $row['name'] ?>" readonly>

          <h3>Your Information</h3>
          <label for="user-name">Full Name:</label>
          <input type="text" id="user-name" name="userName" required>

          <label for="user-age">Your Age:</label>
          <input type="number" id="user-age" name="userAge" min="0" required>

          <label for="user-gender">Gender:</label>
          <select id="user-gender" name="userGender" required>
            <option value="">Select Gender</option>
            <option value="female">Female</option>
            <option value="male">Male</option>
          </select>

          <label>Have you previously adopted a pet?</label>
          <div class="radio-group">
            <label><input type="radio" id="exp-yes" name="previousExperience" value="yes" required> Yes</label>
            <label><input type="radio" id="exp-no" name="previousExperience" value="no"> No</label>
          </div>

          <label for="additional-info">Additional Information:</label>
          <textarea id="additional-info" name="additionalInfo" rows="4"
            placeholder="Tell us a bit about why you'd like to adopt <?= $row['name'] ?>..."></textarea>

          <p class="login-warning">⚠ You must be logged in to submit this form.</p>

          <button type="submit">Submit Adoption Request</button>
        </form>
      </div>
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
    }
  </script>

  <div class="back-button-container">
    <button class="back-button" onclick="goBackToPets()">Back to Pets List</button>
    <button class="download-button" onclick="downloadPetInfo()">Download Pet Info</button>
  </div>


  <script>
    function goBackToPets() {
      window.location.href = 'view_pet.php'; 
    }
  </script>
  <script>
    const petName = "<?= $row['name'] ?>";  
    window.onload = () => {
      updateFavoriteButton();
    };

    function updateFavoriteButton() {
      const favorites = JSON.parse(localStorage.getItem("favorites") || "[]");
      const isFavorite = favorites.includes(petName);
      const favBtn = document.getElementById("favorite-button");
      if (isFavorite) {
        favBtn.textContent = "❤ Remove from Favorites";
        favBtn.style.color = "red";
      } else {
        favBtn.textContent = "♡ Add to Favorites";
        favBtn.style.color = "";
      }
    }

    function toggleFavorite() {
      let favorites = JSON.parse(localStorage.getItem("favorites") || "[]");
      const index = favorites.indexOf(petName);

      if (index > -1) {
        
        favorites.splice(index, 1);
      } else {
       
        favorites.push(petName);
      }

      localStorage.setItem("favorites", JSON.stringify(favorites));
      updateFavoriteButton();
    }
  </script>




  <script>
function downloadPetInfo() {
  const petInfo = `
Name: Za3tar
Age: 3 years
Breed: Domestic Shorthair
Size: Medium
Vaccination Status: Up-to-date
Temperament: Friendly, playful, and affectionate
Favorite Activities: Chasing toys, cuddling, sunbathing
Adoption Fee: $50 (includes initial vaccinations and microchipping)
Contact: Happy Tails Shelter, (555) 123-4567
  `;

  const blob = new Blob([petInfo], { type: 'text/plain' });
  const url = URL.createObjectURL(blob);

  const a = document.createElement('a');
  a.href = url;
  a.download = 'za3tar-info.txt';
  document.body.appendChild(a);
  a.click();

  document.body.removeChild(a);
  URL.revokeObjectURL(url);
}

</script> 


</body>

</html>