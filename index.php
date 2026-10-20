<?php 
include '../config.php';
if(isset($_POST['adminlogin'])){
 $email = $conn->real_escape_string($_POST['email']);
 $pass = $_POST['pass'];
 $res = $conn->query("SELECT * FROM users WHERE email='$email' AND is_admin=1");
 if($row=$res->fetch_assoc()){
  if(password_verify($pass, $row['password'])){
   $_SESSION['is_admin']=true;
   $_SESSION['admin_name']=$row['name'];
   header("Location: dashboard.php"); exit();
  } else { $error="Invalid credentials"; }
 } else { $error="Access denied - Admin only"; }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../style.css">
<style>
/* CHANGE THIS COLOR TO ANYTHING YOU LIKE */
.login-body{
  margin:0; 
  background: linear-gradient(135deg, #FFCC00 0%, #FFA500 100%); /* MTN Yellow */
  /* Other options you can try: */
  /* background: #f5f7fb;  - Light grey professional */
  /* background: linear-gradient(135deg, #667eea, #764ba2); - Purple */
  /* background: #eef2ff; - Very light blue */
  height:100vh; display:flex; align-items:center; justify-content:center; font-family: Arial;
}
.login-card{background:#fff; width:420px; padding:35px; border-radius:20px; box-shadow:0 20px 50px rgba(0,0,0,0.15);}
.error{background:#ffeaea; color:#d00; padding:10px; border-radius:8px; margin-bottom:15px; text-align:center; font-size:14px}
</style>
</head>
<body class="login-body">
<div class="login-card">
<h2 style="text-align:center">🛡️ Admin Panel</h2>
<p style="text-align:center; color:#888; margin-bottom:20px; font-size:13px">Authorized Personnel Only</p>
<?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>
<form method="post">
<input name="email" type="email" placeholder="Admin Email" required style="width:100%; padding:12px; margin:8px 0; border-radius:10px; border:1.5px solid #eee">
<input name="pass" type="password" placeholder="Admin Password" required style="width:100%; padding:12px; margin:8px 0; border-radius:10px; border:1.5px solid #eee">
<button name="adminlogin" style="background:#121212; color:#FFCC00; padding:12px; width:100%; border:none; border-radius:10px; font-weight:bold; margin-top:10px; cursor:pointer">Secure Login</button>
</form>
<p style="text-align:center; margin-top:20px; font-size:12px"><a href="../login.php" style="color:#666">← Back to User Login</a></p>
</div>
</body>
</html>