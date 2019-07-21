<?php 

include('includes/settings.php');
session_start();
if(isset($_SESSION['username']))
{
	header('location:dashboard.php');
}
?>
<?php
$msg = '';
	if($_POST)
	{
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		
		$res = mysqli_query($con, $sql);
		$count = mysqli_num_rows($res);
	

		if($count > 0)
		{
			session_start();
			$_SESSION['username'] = $username;
			header('location:dashboard.php');
		}
		else
		{
			$msg = 'Incorrect Username/Password';
		}
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin Template · Bootstrap</title>
    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" >
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

 <form class="form-signin" action = '' method = 'POST'>
  <img class="mb-4" src="/docs/4.2/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">

<p><?php echo $msg; ?></p>
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="inputEmail" class="sr-only">Username</label>
  <input type="text" id="inputEmail" name = 'username' class="form-control" placeholder="Email address" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" name = 'password' class="form-control" placeholder="Password" required>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
</body>
</html>