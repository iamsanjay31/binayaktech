<?php
include('includes/settings.php');
 ?> 
<?php
	$msg='';
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
		$sql= "INSERT INTO testimonials(testimonial_title, testimonial_desc, testimonial_by) VALUES('$testimonial_title', '$testimonial_desc', '$testimonial_by')"; 

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
   
      <h2 style = 'margin-top:20px;'>Add Testimonials</h2>
      <div class="table-responsive">

      	<?php echo $msg; ?>

	<form action='' method='POST' enctype="multipart/form-data"> 

		Testimonial Title  : <input type='text' class = 'form-control' name='testimonial_title' value = '<?php if($_POST){ echo $_POST['testimonial_title'];} ?>'/><br>
		Testimonial Description : <textarea class = 'form-control' name='testimonial_desc'><?php if($_POST){echo $_POST['testimonial_desc'];} ?></textarea><br>
		
		Testimonial By : <input type='text' class = 'form-control' name='testimonial_by' value = '<?php if($_POST){echo $_POST['testimonial_by'];} ?>'/><br>
		<input type='submit' class='btn btn-primary' />

	</form>
</div>
</main>
</div>
</div>

</body>
</html>
