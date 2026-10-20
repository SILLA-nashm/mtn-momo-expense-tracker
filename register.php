<?php include 'config.php';
if(isset($_POST['register'])){
 $name=$_POST['name']; $email=$_POST['email']; 
 $pass=password_hash($_POST['password'], PASSWORD_DEFAULT);
 $check=$conn->query("SELECT id FROM users WHERE email='$email'");
 if($check->num_rows>0){ $error="Email already exists"; }
 else {
  $conn->query("INSERT INTO users (name,email,password) VALUES ('$name','$email','$pass')");
  header("Location: login.php"); exit();
 }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css">
<style>
.login-body{margin:0; background:linear-gradient(135deg,#FFCC00 50%,#121212 50%); height:100vh; display:flex; align-items:center; justify-content:center}
.login-card{background:#fff; width:400px; padding:35px; border-radius:20px; box-shadow:0 20px 40px rgba(0,0,0,0.2)}
.error{background:#ffeaea; color:#d00; padding:10px; border-radius:8px; margin-bottom:10px; text-align:center}
</style>
</head>
<body class="login-body">
<div class="login-card">
<h2>Create Account 🚀</h2>
<p style="text-align:center; color:#888; margin-bottom:20px">Join MoMo Tracker</p>
<?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
<form method="post">
<input name="name" placeholder="Full Name - e.g. Silla Charles Malaba" required>
<input name="email" type="email" placeholder="Email Address" required>
<input name="password" type="password" placeholder="Create Password (min 6 chars)" required>
<button class="btn" name="register">Create Account</button>
</form>
<p style="margin-top:15px; text-align:center">Already have account? <a href="login.php" style="color:#000; font-weight:bold">Login</a></p>
</div>
</body>
</html>