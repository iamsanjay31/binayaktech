<?php

include('includes/settings.php');
	

 ?> 
<?php
	$msg='';
	if($_POST)
	{
		$pname=$_POST['pname'];
		$pdetail=$_POST['pdetail'];
		$purl=$_POST['purl'];
		$flag = 0; 

		if($pname == '')
		{
			$flag = 1; 
			$msg .= "Client Name Cannot be empty.<br>";
		}
		if($purl == '')
		{
			$flag = 1; 
			$msg .= "Client Link Cannot be empty.<br>"; 
		}

		if($flag == 0)
		{

 
		$filename = ''; 
		/*echo '<pre>';
		print_r($_FILES);
		die;*/ 
		if($_FILES['pimage']['name'] !='')	
		{	
		$filename= date('ymdhis').$_FILES['pimage']['name'];
		$source=$_FILES['pimage']['tmp_name']; 
		$dest=$_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$filename; 

		move_uploaded_file($source, $dest);
		}



		$sql= "INSERT INTO clients(client_name, client_detail, client_image, client_url) VALUES('$pname', '$pdetail', '$filename', '$purl')"; 

		$res = mysqli_query($con,$sql);

		$msg = ($res == true)?'Success':'Failure'; 


	}
}






?> 

<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body> -->
	<?php include('includes/nav.php') ?>

<div class="container-fluid">
  <div class="row">
 <?php include('includes/sidebar.php'); ?>
 
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
   
      <h2 style = 'margin-top:20px;'>Add Clients</h2>
      <div class="table-responsive">

      	<?php echo $msg; ?>

	<form action='' method='POST' enctype="multipart/form-data"> 

		Client Name * : <input type='text' class = 'form-control' name='pname' value = '<?php if($_POST){ echo $_POST['pname'];} ?>'/><br>
		Client Detail : <textarea class = 'form-control' name='pdetail'><?php if($_POST){echo $_POST['pdetail'];} ?></textarea><br>
		Client Image : <input type='file' class = 'form-control' name='pimage' /><br>
		Client URL * : <input type='text' class = 'form-control' name='purl' value = '<?php if($_POST){echo $_POST['purl'];} ?>'/><br>
		<input type='submit' class='btn btn-primary' />

	</form>
</div>
</main>
</div>
</div>

</body>
</html>
