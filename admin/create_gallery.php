<?php
include('includes/settings.php');

	

 ?> 

<?php
	$msg='';
	if($_POST)
	{
		$caption=$_POST['gcaption'];
		$detail= $_POST['gdetail']; 
		

		
		$filename= date('ymdhis').$_FILES['gimage']['name'];

		
		$source=$_FILES['gimage']['tmp_name']; 
		$dest=$_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$filename; 

		move_uploaded_file($source, $dest);

		$con= mysqli_connect('localhost','root','','binayaktech'); 

		$sql= "INSERT INTO gallery(gallery_caption, gallery_image, gallery_detail) VALUES('$caption','$filename','gdetail')"; 

		$res = mysqli_query($con,$sql);

		if($res)
			{
				$msg='Sucessfully Uploaded';
			}
			else
			{
				$msg='Upload Failed'; 
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
   
      <h2 style = 'margin-top:20px;'>Upload Image</h2>
      <div class="table-responsive">

      	<?php echo $msg; ?>



	<form action='' method='POST' enctype="multipart/form-data"> 

		
		Gallery Image : <input type='file' class='form-control' name='gimage' /><br>
		Gallery Caption : <textarea name='gcaption'class='form-control'></textarea><br>
		Gallery Detail : <textarea class = 'form-control' name='gdetail'></textarea><br>
		
		<input type='submit' class='btn btn-primary' />

	</form>
</div>
</main>
</div>
</div>

</body>
</html>
