<?php include 'config.php';
if(isset($_POST['reset'])){
 $email=$_POST['email']; $new=password_hash($_POST['newpass'], PASSWORD_DEFAULT);
 $check=$conn->query("SELECT id FROM users WHERE email='$email'");
 if($check->num_rows>0){
  $conn->query("UPDATE users SET password='$new' WHERE email='$email'");
  $msg="Password reset! Go to login.";
 } else { $msg="Email not found"; }
}
?>
<link rel="stylesheet" href="style.css">
<div class="login-body" style="margin:0; background:linear-gradient(135deg,#121212 50%,#FFCC00 50%); height:100vh; display:flex; align-items:center; justify-content:center; font-family:Arial">
<div class="login-card" style="background:#fff; width:400px; padding:35px; border-radius:20px;">
<h2>Reset Password 🔑</h2>
<?php if(isset($msg)) echo "<p style='background:#e8ffe8; padding:10px; border-radius:8px'>$msg</p>"; ?>
<form method="post">
<input name="email" type="email" placeholder="Your registered email" required>
<input name="newpass" type="password" placeholder="New Password" required>
<button class="btn" name="reset" style="background:#000; color:#FFCC00; padding:12px; width:100%; border:none; border-radius:10px; font-weight:bold">Reset Password</button>
</form>
<p style="text-align:center; margin-top:15px"><a href="login.php">Back to Login</a></p>
</div>
</div>