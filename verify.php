<?php 
if (isset($_GET['check'])) {
$vkey=$_GET['check'];
include 'conn.php';

$sel=$conn->query("SELECT verify,vkey FROM users WHERE vkey='$vkey'");
$view=mysqli_num_rows($sel);
if ($view) {
	$feth=mysqli_fetch_array($sel);
	$ver=$feth['verify'];
	if ($ver==0) {
$update=$conn->query("UPDATE users SET verify='1' where vkey='$vkey'");

if ($update) {
	?>
<h3 style="text-align: center;">Now you are allowed to login to your account
<a href="backemail.php">Login now</a>
</h3>

	<?php
	// code...
}
}
else{
	?>
<h2>Sorry! This link has been Expired.</h2>
<?php
}	// code...
}
	// code...
}

 ?>