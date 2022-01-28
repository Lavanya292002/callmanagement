<?php
session_start();
require('connection.php');

$id=$_REQUEST['id'];
$query = "SELECT * from `users` where id='".$id."'"; 
$result = mysqli_query($link, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<h3 class="text-center mb-4">Edit</h3>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];

$username =$_REQUEST['username'];
$password =$_REQUEST['password'];
$update="update users set 
username='".$username."', password='".$password."'
 where id='".$id."'";
mysqli_query($link, $update) or die(mysqli_error($link));
header("Location: read.php"); 
$status = "Record Updated Successfully. </br></br>
<a href='read.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
	
?>

<div>
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p>
<label class="mb-1"><strong>User Name</strong></label>	
<input type="text" name="username" class="form-control"
required value="<?php echo $row['username'];?>" /></p>
<p>
<label class="mb-1"><strong>Password</strong></label>	
<input type="text" name="password"  class="form-control" 
required value="<?php echo $row['password'];?>" /></p>
<p><input name="submit" type="submit" value="Update" class="btn btn-primary btn-block" /></p>
</form>
<?php } ?>
</div>
</div>
</body>
</html>
