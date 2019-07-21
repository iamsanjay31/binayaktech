<?php 

include('includes/settings.php');

	?>
<?php 
$msg=''; 
	//get id from get 
	$id=$_GET['id']; 
	//post form 
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
			 
			if($_FILES['pimage']['name'] != '')
			{
			$sql1="SELECT * FROM clients WHERE client_id=$id"; 
			$res1=mysqli_query($con,$sql1); 
			$row1=mysqli_fetch_assoc($res1);

			$filename=date('ymdhis').$_FILES['pimage']['name'];
			$source=$_FILES['pimage']['tmp_name'];
			$dest=$_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$filename;

			move_uploaded_file($source, $dest); 

			$oldfile=$_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$row1['client_image']; 
				if(file_exists($oldfile))
				{
					unlink($oldfile);
				}
			/*unlink($oldfile);*/

			$sql2="UPDATE clients SET client_name='$pname', client_detail='$pdetail', client_image='$filename', client_url='$purl' WHERE client_id=$id"; 	
			}	 
				else
			{
			//update the row in the database with the id we collected
			$sql2="UPDATE clients SET client_name='$pname', client_detail='$pdetail', client_image='$filename', client_url='$purl' WHERE client_id=$id";
			}
			$res=mysqli_query($con,$sql2);
			if($res)
			{
				$msg='Update Successful';
			}
			else
			{
				$msg='Update Failed'; 
			}
}
}

			//pull old data from the table where  id is what we collected 

	
			$sql="SELECT * FROM clients WHERE client_id=$id"; 
			$res=mysqli_query($con,$sql); 
			$row=mysqli_fetch_assoc($res);
		
	
?> 
	
	 
<!-- <!DOCTYPE html> 
<html>
<head>
<title></title>
</head>
<body> 
	<h3><?php echo $msg; ?> </h3> -->

	<?php include('includes/nav.php') ?>

<div class="container-fluid">
  <div class="row">
 <?php include('includes/sidebar.php'); ?>
 
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
   
<h5 style=""><?php echo $msg; ?> </h5>
      <h2 style = 'margin-top:20px;'>Edit Clients</h2>
      <div class="table-responsive">



	<form action='' method="POST" enctype="multipart/form-data">

		<?php
			if($_POST)
			{
				$portname = $_POST['pname'];
			}
			else
			{
				$portname = $row['client_name'];
			}
		?> 
		Client Name : <input type='text' class='form-control' name='pname' value="<?php echo $portname;?>" /><br>
		
		<?php
			if($_POST)
			{
				$portdetail = $_POST['pdetail'];
			}
			else
			{
				$portdetail = $row['client_detail'];
			}
		?> 
		Client Detail : <textarea name='pdetail' class='form-control'><?php echo $portdetail;?></textarea><br>

		Client Image : <input type='file' class='form-control' name='pimage' value="<?php echo $row['client_image'];?>" /><br>
		
		<?php
			if($_POST)
			{
				$porturl = $_POST['purl'];
			}
			else
			{
				$porturl = $row['client_url'];
			}
		?> 
		Client URL : <input type='text' class='form-control' name='purl' value="<?php echo $porturl;?>" /><br>
		<input type='submit' class='btn btn-primary'/>

	</form>
</div>
</main>
</div>
</div>
</body>
</html>












	






















