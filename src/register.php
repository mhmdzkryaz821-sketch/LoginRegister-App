<?php
 $message = ""; 
 if ($_SERVER["REQUEST_METHOD"] === "POST") { 
 $username = trim($_POST["username"] ?? "");    
 $password = $_POST["password"] ?? "";    
 $confirmPassword = $_POST["confirm_password"] ?? ""; 
 
 if ($username === "" || $password === "" || $confirmPassword === "") {
 $message = "Please fill in all fields.";    
 } elseif ($password !== $confirmPassword) {
 $message = "Error: Passwords do not match.";  
 } else {     
 $file = __DIR__ . "/users.json";
 $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
 
 if (!is_array($users)) { 
 $users = [];     
 }          
 
 if (isset($users[$username])) {
 $message = "Username already exists.";  
 } else {   
 $users[$username] = password_hash( $password,PASSWORD_DEFAULT);
 
 if (file_put_contents($file,json_encode($users, JSON_PRETTY_PRINT),LOCK_EX)!== false) {
 $message = "Account created successfully!";         
 } else {        
 $message = "Error saving account.";
           }   
        }
    }
 } 
 ?>
 
 <!DOCTYPE html>
 <html lang="en"> 
 <head>
 <meta charset="UTF-8">
 <title>Create Account</title>
 </head>
 <body>
 <h2>Register</h2>
 <form method="POST" action="">
 <label>Username:</label>
 <input type="text" name="username" required>
 <br><br>
 <label>Password:</label>
 <input type="password" name="password" required>
 <br><br>
 <label>Confirm Password:</label>
 <input type="password" name="confirm_password" required>
 <br><br>
 <button type="submit">Create Account</button>
 </form>
 <p> 
 <?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>
 </p> 
 <a href="login.php">Go to Login</a> 
 </body>
 </html>