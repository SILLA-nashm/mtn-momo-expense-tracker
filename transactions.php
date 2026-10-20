<?php include 'config.php';
if(!isset($_SESSION['user_id'])) header("Location: login.php");
$user_id=$_SESSION['user_id'];
if(isset($_GET['delete'])){
  $conn->query("DELETE FROM expenses WHERE id=".$_GET['delete']." AND user_id=$user_id");
  header("Location: transactions.php");
}
?>
<link rel="stylesheet" href="style.css">
<div class="sidebar">
<h2>MoMo Tracker</h2>
<a href="dashboard.php">📊 Dashboard</a>
<a class="active" href="transactions.php">💸 Transactions</a>
<a href="analytics.php">📈 Analytics</a>
<a href="settings.php">⚙️ Settings</a>
<a class="logout-btn" href="logout.php">🚪 Logout</a>
</div>
<div class="main">
<h1>All Transactions</h1>
<div class="table-box">
<table>
<tr><th>Title</th><th>Category</th><th>Amount</th><th>Method</th><th>Date</th><th>Action</th></tr>
<?php
$res=$conn->query("SELECT * FROM expenses WHERE user_id=$user_id ORDER BY expense_date DESC");
while($r=$res->fetch_assoc()){
 echo "<tr>
 <td><b>{$r['title']}</b></td>
 <td>{$r['category']}</td>
 <td>UGX ".number_format($r['amount'])."</td>
 <td><span class='badge'>{$r['payment_method']}</span></td>
 <td>{$r['expense_date']}</td>
 <td><a href='?delete={$r['id']}' onclick='return confirm(\"Delete?\")' style='color:red'>Delete</a></td>
 </tr>";
}
?>
</table>
</div>
</div>