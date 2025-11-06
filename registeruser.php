<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt the password

    // Check if the username or email already exists in the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
    $stmt->execute(['username' => $username, 'email' => $email]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        $error = "Username or email already exists.";
    } else {
        // Insert new user into the database
        $stmt = $pdo->prepare("INSERT INTO users (username, email, phone, password, role) VALUES (:username, :email, :phone, :password, 'user')");
        $stmt->execute(['username' => $username, 'email' => $email, 'phone' => $phone, 'password' => $password]);
        $success = "Registration successful!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
</head>
<body>

<h1>Register</h1>

<?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
<?php if (isset($success)) { echo "<p style='color: green;'>$success</p>"; } ?>

<form action="register.php" method="POST">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="phone">Phone</label>
    <input type="tel" id="phone" name="phone" required>
    <br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Register</button>
</form>

</body>
</html>
