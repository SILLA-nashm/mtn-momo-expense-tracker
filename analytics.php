<?php include 'config.php';
if(!isset($_SESSION['user_id'])) header("Location: login.php");
$user_id=$_SESSION['user_id'];
$byCat = $conn->query("SELECT category, SUM(amount) as total FROM expenses WHERE user_id=$user_id GROUP BY category");
?>
<link rel="stylesheet" href="style.css">
<div class="sidebar">
<h2>MoMo Tracker</h2>
<a href="dashboard.php">📊 Dashboard</a>
<a href="transactions.php">💸 Transactions</a>
<a class="active" href="analytics.php">📈 Analytics</a>
<a href="settings.php">⚙️ Settings</a>
<a class="logout-btn" href="logout.php">🚪 Logout</a>
</div>
<div class="main">
<h1>Analytics</h1>
<p style="color:#777; margin-bottom:20px">Where your money goes</p>
<div class="top-cards">
<?php while($row=$byCat->fetch_assoc()){ ?>
<div class="card"><h4><?php echo $row['category']; ?></h4><h2>UGX <?php echo number_format($row['total']); ?></h2></div>
<?php } ?>
</div>
<div class="table-box">
<h3>Spending by Category</h3>
<p style="color:#666; font-size:14px; margin-top:10px">This helps MTN Fintech understand user behavior - perfect for your interview story!</p>
</div>
</div>