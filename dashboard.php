<?php include '../config.php';
if(!isset($_SESSION['is_admin'])) header("Location: index.php");
if(isset($_GET['reset_id'])){
 $new=password_hash('123456', PASSWORD_DEFAULT);
 $conn->query("UPDATE users SET password='$new' WHERE id=".intval($_GET['reset_id']));
 $msg="Password reset to 123456";
}
if(isset($_GET['del_id'])){
 $conn->query("DELETE FROM users WHERE id=".intval($_GET['del_id']));
}
$users=$conn->query("SELECT * FROM users");
$totalUsers=$conn->query("SELECT COUNT(*) as c FROM users")->fetch_assoc()['c'];
$totalExp=$conn->query("SELECT COUNT(*) as c FROM expenses")->fetch_assoc()['c'];
?>
<link rel="stylesheet" href="../style.css">
<div class="sidebar">
<h2>MoMo Admin</h2>
<a class="active" href="dashboard.php">👥 Users</a>
<a href="../dashboard.php">📊 User View</a>
<a class="logout-btn" href="../logout.php">🚪 Logout</a>
</div>
<div class="main">
<h1>Admin Control Panel</h1>
<?php if(isset($msg)) echo "<div style='background:#e8ffe8; padding:12px; border-radius:10px; margin:15px 0'>$msg</div>"; ?>
<div class="top-cards">
<div class="card"><h4>Total Users</h4><h2><?php echo $totalUsers; ?></h2></div>
<div class="card"><h4>Total Expenses</h4><h2><?php echo $totalExp; ?></h2></div>
<div class="card"><h4>Admin</h4><h2><?php echo $_SESSION['admin_name']; ?></h2></div>
</div>
<div class="table-box">
<h3>All Registered Users</h3>
<table>
<tr><th>ID</th><th>Name</th><th>Email</th><th>Role</th><th>Actions</th></tr>
<?php while($u=$users->fetch_assoc()){ ?>
<tr>
<td><?php echo $u['id']; ?></td>
<td><b><?php echo $u['name']; ?></b></td>
<td><?php echo $u['email']; ?></td>
<td><?php echo $u['is_admin'] ? '<span class="badge">ADMIN</span>' : 'User'; ?></td>
<td>
<a href="?reset_id=<?php echo $u['id']; ?>" style="background:#FFCC00; padding:5px 10px; border-radius:6px; text-decoration:none; color:#000; font-size:12px">Reset PW</a>
<a href="?del_id=<?php echo $u['id']; ?>" onclick="return confirm('Delete this user?')" style="color:red; margin-left:10px; font-size:12px">Delete</a>
</td>
</tr>
<?php } ?>
</table>
</div>
</div>