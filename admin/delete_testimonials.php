<?php 

include('includes/settings.php');

	?>
<?php 

$id= $_GET['id'];


$sql = "DELETE FROM testimonials WHERE testimonial_id=$id"; 
mysqli_query($con,$sql);

header('location:testimonials.php'); 



?> 
