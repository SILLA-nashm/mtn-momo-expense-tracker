<?php include 'config.php';
if(!isset($_SESSION['user_id'])) header("Location: login.php");
$user_id=$_SESSION['user_id'];
$user = $conn->query("SELECT * FROM users WHERE id=$user_id")->fetch_assoc();
?>
<link rel="stylesheet" href="style.css">
<div class="sidebar">
<h2>MoMo Tracker</h2>
<a href="dashboard.php">📊 Dashboard</a>
<a href="transactions.php">💸 Transactions</a>
<a href="analytics.php">📈 Analytics</a>
<a class="active" href="settings.php">⚙️ Settings</a>
<a class="logout-btn" href="logout.php">🚪 Logout</a>
</div>
<div class="main">
<h1>Settings</h1>
<div class="form-box" style="max-width:500px">
<h3>Profile Information</h3>
<p style="margin:15px 0"><b>Name:</b> <?php echo $user['name']; ?></p>
<p style="margin:15px 0"><b>Email:</b> <?php echo $user['email']; ?></p>
<p style="margin:15px 0"><b>Member Since:</b> <?php echo date('M Y'); ?></p>
<hr style="margin:20px 0">
<h3>About This Project</h3>
<p style="color:#666; font-size:14px; line-height:1.6">
Built by Silla Charles Malaba using PHP, MySQL, CSS<br>
For MTN Fintech Graduate Programme Application<br>
Features: MoMo payment tracking, analytics, secure login
</p>
</div>
</div>