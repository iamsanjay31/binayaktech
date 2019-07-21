<?php
include('includes/settings.php');
$msg = ''; ?>
<?php 
//post the form
if($_POST)
{
	//get the values from the inputs
	$opass = $_POST['opass'];
	$npass = $_POST['npass'];
	$ncpass = $_POST['ncpass'];
	$flag = 0;
	//check whether the npass and confirm pass are same or not
	if($npass != $ncpass)
	{
		$flag = 1;
		$msg .= "Password change gardina, Confirm milau<br>";
		//password change gardina
	}


	//check whether the old password is correct or not

	$encpass = md5($opass);
	$username = $_SESSION['username'];
	$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$encpass'";
	$res = mysqli_query($con, $sql);
	$count = mysqli_num_rows($res);
	if($count == 0)
	{
		$flag = 1;
		$msg.= 'Purano Password Milena<br>';
	}


	if($flag == 0)
	{
		$encnpass = md5($npass);
		$sql1 = "UPDATE users SET password = '$encnpass' WHERE username = '$username'";
		
		$res = mysqli_query($con, $sql1);
		if($res)
		{
			$msg = 'Password Changed Successfully';
		}
		else
		{
			$msg = 'Try Again.';
		}
	}
	//if both the conditions match update the password in the database
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
</head>
<body>



<?php include('includes/nav.php') ?>

<div class="container-fluid">
  <div class="row">
 <?php include('includes/sidebar.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
   
      <h2 style = 'margin-top:20px;'>Change Password</h2>
      <div class="table-responsive">
  
	<?php echo $msg; ?>
<form action = '' method="POST" enctype="multipart/form-data">
	Old Password: <input class = 'form-control' type = 'password' name = 'opass' /><br>
	New Password: <input type = 'password' name = 'npass' class = 'form-control'/><br>
	Confirm Password : <input class = 'form-control' type = 'password' name = 'ncpass'></br>
	<input type = 'submit' class = 'btn btn-primary' />
</form>
   
        </div>
    </main>
  </div>
</div>
</body>
</html>




</body>
</html>