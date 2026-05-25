<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: ./index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign In - Pet Adoption Portal</title>
  <link rel="stylesheet" href="./assets/css/style.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Schoolbell&display=swap" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      font-family: 'Schoolbell', cursive;
      background-color: #fffaf5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .signin-container {
      background-color: #fff;
      padding: 30px 40px;
      border-radius: 20px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      text-align: center;
      width: 100%;
      max-width: 400px;
    }

    .signin-container h2 {
      margin-bottom: 20px;
      color: #444;
      font-size: 28px;
    }

    .signin-form input[type="email"],
    .signin-form input[type="password"] {
      width: 100%;
      padding: 12px 15px;
      margin: 10px 0;
      border: 1px solid #ddd;
      border-radius: 12px;
      font-size: 16px;
    }

    .signin-form button {
      width: 100%;
      padding: 12px;
      background-color: #ffa07a;
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .signin-form button:hover {
      background-color: #ff7f50;
    }

    a {
      display: block;
      margin-top: 12px;
      color: #ff7f50;
      text-decoration: none;
      font-weight: bold;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="signin-container">
    <h2>Sign In to Your Account</h2>
    <form action="./process_login.php" method="POST" class="signin-form">
      <input type="email" name="email" placeholder="Email" required />
      <input type="password" name="password" placeholder="Password" required />
      <button type="submit">Sign In</button>
    </form>
    <a href="./signup.html">Don't have an account? Sign Up</a>
  </div>

</body>
</html>
