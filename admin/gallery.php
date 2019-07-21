<?php 
include('includes/settings.php');

	?>
<?php 

$sql1 = "SELECT * FROM gallery"; 
$res1 = mysqli_query($con, $sql1); 
$no_of_rows = mysqli_num_rows($res1); 

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


$sql="SELECT * FROM gallery LIMIT $limit OFFSET $offset"; 

$res=mysqli_query($con,$sql); 

$result=array(); 
while($row=mysqli_fetch_assoc($res))
{
	$result[]=$row; 
}

/*echo '<pre>';
print_r($result); 
  */

?> 


<!-- <!DOCTYPE html>
<html>
<head> 
	<title></title>
</head>
<link rel='stylesheet' type='text/css' href='bootstrap.css'>
<body> 
	
		<div class="container">
 			 <div class="row">   </div>
				 <div class="col-md-12"> </div> -->
					
<?php include('includes/nav.php') ?>

<div class="container-fluid">
  <div class="row">
 <?php include('includes/sidebar.php'); ?>
 <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	    <h2 style = 'margin-top:20px;'>Sliders</h2>
      <div class="table-responsive">
       <a href = 'create_gallery.php' class = 'btn btn-success' />Insert Slide</a><br><br>
	
	<table class="table table-striped" md-5> 
		
		<tr> 
			<td>Caption</td>
			<td>Slide</td>
			<td>Detail</td>
			<td>Action</td>
		</tr>
	
	
		<?php foreach ($result as $key => $value) {
			?>

				<tr>
					<td><?php echo $value['gallery_caption']; ?></td>
					<td><img style='height:100px' src="../uploads/<?php echo $value['gallery_image'];?>"></td>
					<td><?php echo $value['gallery_detail']; ?></td>
					<td><a href="edit_gallery.php?id=<?php echo $value['gallery_id']; ?>" class='btn btn-success'>Edit</a> <a href="delete_gallery.php?id=<?php echo $value['gallery_id']; ?>" class='btn btn-danger'>Delete</a></td>
				</tr>
			


		<?php	
		}
		?>

			

	</table>
	<nav aria-label="Page navigation example">
  <ul class="pagination">
	<?php for($i = 1; $i<=$totalnoofpages; $i++){?>
		
		 <li class="page-item"><a class = 'page-link' href = "gallery.php?page=<?php echo $i; ?>"><?php echo $i;?></a></li>
	<?php }?>
	 </ul>
	</nav>
</div>
</main>
</div>
</div>

</body>
</html>

			
