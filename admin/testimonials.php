<?php

include('includes/settings.php');
	?>
<?php 

$sql3 = "SELECT * FROM testimonials"; 
$res3 = mysqli_query($con, $sql3);
$no_of_rows =  mysqli_num_rows($res3); 


$limit = 2; 

$totalnoofpages = ceil($no_of_rows/$limit);

if(isset($_GET['page']))
{
	//calc offset from pageno 
	$offset = $limit * ($_GET['page'] - 1); 

}
else
{
	$offset = 0; 
}

$sql = "SELECT * FROM testimonials LIMIT $limit OFFSET $offset"; 

$res = mysqli_query($con,$sql); 

$result = array(); 
while($row=mysqli_fetch_assoc($res))
{
	$result[] = $row; 
	
}
/*echo '<pre>'; 
	print_r($result);
	echo '<hr>';*/


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
	    <h2 style = 'margin-top:20px;'>Testimonials</h2>
      <div class="table-responsive">
       <a href = 'create_testimonials.php' class = 'btn btn-success' />Add Testimonials</a><br><br> 
	<table class="table table-striped" md-5> 
		<tr>
			<td>Testimonial Title</td>
			<td>Testimonial Description</td>
			<td>Testimonial By</td>
			<td>Action</td>
		</tr>

		<?php foreach ($result as $key => $value) {
		?>

			<tr>
				<td><?php echo $value['testimonial_title'];?></td>
				<td><?php echo $value['testimonial_desc'];?></td>
				<td><?php echo $value['testimonial_by'];?></td>
				
				<td><a href="edit_testimonials.php?id=<?php echo $value['testimonial_id']; ?>"class = 'btn btn-primary' >Edit</a> <a href="delete_testimonials.php?id=<?php echo $value['testimonial_id']; ?>" class='btn btn-danger'>Delete</a></td>
			</tr>

		<?php
			}
		?> 

	
					 


	</table>
	
	<nav aria-label="Page navigation example">
  <ul class="pagination">
	<?php for($i = 1; $i<=$totalnoofpages; $i++){?>
		
		 <li class="page-item"><a class = 'page-link' href = "testimonials.php?page=<?php echo $i; ?>"><?php echo $i;?></a></li>
	<?php }?>
	 </ul>
</nav>
</div>
</main>
</div>
</div>

</body>
</html>
