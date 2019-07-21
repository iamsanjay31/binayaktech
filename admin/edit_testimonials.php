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
		$testimonial_title=$_POST['testimonial_title'];
		$testimonial_desc=$_POST['testimonial_desc'];
		$testimonial_by=$_POST['testimonial_by'];

		$flag = 0; 
		if($testimonial_title == '')
		{
			$flag = 1; 
			$msg .= "Testimonial Title Cannot be empty.<br>";
		}
		if($testimonial_desc == '')
		{
			$flag = 1; 
			$msg .= "Testimonial Description Cannot be empty.<br>"; 
		}

		if($flag == 0)
		{
			//update the row in the database with the id we collected
			$sql2="UPDATE testimonials SET testimonial_title='$testimonial_title', testimonial_desc ='$testimonial_desc', testimonial_by='$testimonial_by' WHERE testimonial_id=$id";
			
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

	
			$sql="SELECT * FROM testimonials WHERE testimonial_id=$id"; 
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
      <h2 style = 'margin-top:20px;'>Edit Testimonials</h2>
      <div class="table-responsive">



	<form action='' method="POST" enctype="multipart/form-data">

		<?php
			if($_POST)
			{
				$testimonial_title = $_POST['testimonial_title'];
			}
			else
			{
				$testimonial_title = $row['testimonial_title'];
			}
		?> 
		Testimonial Title : <input type='text' class='form-control' name='testimonial_title' value="<?php echo $testimonial_title;?>" /><br>
		
		<?php
			if($_POST)
			{
				$testimonial_desc = $_POST['testimonial_desc'];
			}
			else
			{
				$testimonial_desc = $row['testimonial_desc'];
			}
		?> 
		Testimonial Description : <textarea name='testimonial_desc' class='form-control'><?php echo $testimonial_desc;?></textarea><br>

	
		
		<?php
			if($_POST)
			{
				$testimonial_by = $_POST['testimonial_by'];
			}
			else
			{
				$testimonial_by = $row['testimonial_by'];
			}
		?> 
		Testimonial By : <input type='text' class='form-control' name='testimonial_by' value="<?php echo $testimonial_by;?>" /><br>
		<input type='submit' class='btn btn-primary'/>

	</form>
</div>
</main>
</div>
</div>
</body>
</html>












	






















