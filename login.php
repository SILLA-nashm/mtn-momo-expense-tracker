<?php include 'config.php';
if(isset($_POST['login'])){
 $email=$_POST['email']; $pass=$_POST['password'];
 $res=$conn->query("SELECT * FROM users WHERE email='$email'");
 if($row=$res->fetch_assoc()){
  if(password_verify($pass,$row['password'])){
   $_SESSION['user_id']=$row['id']; $_SESSION['name']=$row['name'];
   header("Location: dashboard.php"); exit();
  } else { $error="Wrong password"; }
 } else { $error="Account not found"; }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="style.css">
<style>
.login-body{margin:0; background:linear-gradient(135deg,#121212 50%,#FFCC00 50%); height:100vh; display:flex; align-items:center; justify-content:center}
.login-card{background:#fff; width:400px; padding:35px; border-radius:20px; box-shadow:0 20px 40px rgba(0,0,0,0.2)}
.login-card h2{text-align:center; margin-bottom:5px} .login-card p{text-align:center; color:#888; margin-bottom:20px}
.error{background:#ffeaea; color:#d00; padding:10px; border-radius:8px; margin-bottom:10px; text-align:center}
</style>
</head>
<body class="login-body">
<div class="login-card">
<h2>Welcome Back 👋</h2>
<p>MoMo Expense Tracker</p>
<?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
<form method="post">
<input name="email" type="email" placeholder="Email Address" required>
<input name="password" type="password" placeholder="Password" required>
<p style="text-align:right; font-size:13px; margin-top:5px"><a href="forgot.php">Forgot password?</a></p>
<button class="btn" name="login">Login to Dashboard</button>
</form>
<p style="margin-top:15px; text-align:center">No account? <a href="register.php" style="color:#000; font-weight:bold">Register here</a></p>
</div>
</body>
</html>