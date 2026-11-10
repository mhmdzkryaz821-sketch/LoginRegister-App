<?php 
$message = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
     $username = trim($_POST["username"] ?? "");
     $password = $_POST["password"] ?? "";
	 $file = __DIR__ . "/users.json";
     $users = file_exists($file)? json_decode(file_get_contents($file), true) : [];   
	 if (!is_array($users)) {
	 $users = [];     
	 }      
	 if (isset($users[$username])&& password_verify($password, $users[$username])) {
	 $message = "Login successful – Correct password";
     } else {
	 $message = "Login failed – Wrong password";
        }
	 } 
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
	<form method="POST" action="">
	<label>Username:</label>
	<input type="text" name="username" required>
	<br><br>
	<label>Password:</label>
	<input type="password" name="password" required>
	<br><br>
	<button type="submit">Login</button>
    </form>
	<p>
	<?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
    </p>
	<a href="register.php">Create an Account</a> 
</body> 
</html>