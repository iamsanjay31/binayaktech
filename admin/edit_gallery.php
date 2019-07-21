<?php

include('includes/settings.php');

	?>

<?php 
$msg=''; 
	//get id from get 
	$id=$_GET['id']; 
	//post form 
	$con=mysqli_connect('localhost','root','', 'binayaktech');
	if($_POST)
	{
		$gname=$_POST['gname'];
		$gdetail = $_POST['gdetail']; 
		

			if($_FILES['gimage']['name'] != '')
		{
			$sql1="SELECT * FROM gallery WHERE gallery_id=$id"; 
			$res1=mysqli_query($con,$sql1); 
			$row1=mysqli_fetch_assoc($res1);

			$filename=date('ymdhis').$_FILES['gimage']['name'];
			$source=$_FILES['gimage']['tmp_name'];
			$dest=$_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$filename;

			move_uploaded_file($source, $dest); 

			$oldfile=$_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$row1['gallery_image'];

	if(file_exists($oldfile))
	{
		unlink($oldfile);
	}
			//unlink($oldfile);

			$sql2="UPDATE gallery SET gallery_caption='$gname', gallery_image='$filename', gallery_detail='gdetail' WHERE gallery_id=$id"; 	
			}	 
				else
			{
			//update the row in the database with the id we collected
			$sql2="UPDATE gallery SET gallery_caption='$gname', gallery_image='$filename' gallery_detail='gdetail' WHERE gallery_id=$id";
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

			//pull old data from the table where  id is what we collected 

	
			$sql="SELECT * FROM gallery WHERE gallery_id=$id"; 
			$res=mysqli_query($con,$sql); 
			$row=mysqli_fetch_assoc($res);

			header('locaton:gallery.php'); 
?> 
	
	 
<!-- <!DOCTYPE html> 
<html>
<head>
<title></title>
</head>
<body>  -->
	

	<?php include('includes/nav.php') ?>

<div class="container-fluid">
  <div class="row">
 <?php include('includes/sidebar.php'); ?>
 
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
   
      <h2 style = 'margin-top:20px;'>Edit Gallery</h2>
      <div class="table-responsive">

<?php echo $msg; ?> 
	<form action='' method="POST" enctype="multipart/form-data">
		
		Image : <input type='file' class='form-control' name='gimage' value="<?php echo $row['gallery_image'];?>" /><br><br>
		
		Gallery Caption : <textarea name='gname' class='form-control'><?php echo $row['gallery_caption'];?></textarea><br>

		Gallery Detail : <textarea name='gdetail' class='form-control'><?php echo $row['gallery_detail'];?></textarea><br>
		
		<input type='submit' class="btn btn-primary" /><br>
	

</form>
</div>
</main>
</div>
</div>

</body>
</html>












	






















