<?php

include('includes/settings.php');
?>

<?php
$msg = '';
if ($_POST)
{
	$pdname = $_POST['pdname'];
	$pdetail = $_POST['pdetail'];
	$flag = 0;

	if($pdname == '')
		{
			$flag = 1;
			$msg .= "Product Name cannot be empty. <br>";
		}
		if($pdetail == '')
		{
			$flag = 1;
			$msg .= 'Porfolio Details Cannot be empty. <br>';
		}

		if($flag == 0)
		{
		$filename = '';
		//upload the image
		if($_FILES['pimage']['name'] != '')
		{
	//uploading image or file
	$filename = date('ymdhis').$_FILES['pdimage']['name'];
	$source = $_FILES ['pdimage']['tmp_name'];
	$destination = $_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$filename;
	move_uploaded_file($source, $destination);
	}
	//storing in the database
	$sql = "INSERT INTO products (product_name,product_image,product_details)
	VALUES ('$pdname','$filename','$pdetail')";
	$res = mysqli_query($con,$sql);
	$msg = ($res == true)?'SUCCESS':'FAILURE';
}
?>

<?php include('includes/nav.php'); ?>

<div class="container-fluid">
<div class="row">
<?php include('includes/sidebar.php'); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<div class="user-dashboard">
<h2 style = 'margin-top:20px;'>Products</h2>

<?php echo $msg; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php echo $msg; ?>

	<form action = '' method = 'POST' enctype = "multipart/form-data" >
Product Name: <input class = 'form-control' type = 'text' name = 'pdname'><br>
Product Image: <input type = 'file' name = 'pdimage'><br><br>
Product Details: <textarea class = 'form-control' name = 'pdetail'> </textarea><br>
<input class = 'btn btn-primary' type ='submit'>
    </form>
</div>
</main>
</div>
</div>
    </body>
</html>



