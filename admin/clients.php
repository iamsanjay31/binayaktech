<?php

include('includes/settings.php');
	?>
<?php 

$sql3 = "SELECT * FROM clients"; 
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

$sql = "SELECT * FROM clients LIMIT $limit OFFSET $offset"; 

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
	    <h2 style = 'margin-top:20px;'>Clients</h2>
      <div class="table-responsive">
       <a href = 'create_clients.php' class = 'btn btn-success' />Add Clients</a><br><br> 
	<table class="table table-striped" md-5> 
		<tr>
			<td>Client Name</td>
			<td>Client Detail</td>
			<td>Client Image</td>
			<td>Client URL</td>
			<td>Action</td>
		</tr>

		<?php foreach ($result as $key => $value) {
		?>

			<tr>
				<td><?php echo $value['client_name'];?></td>
				<td><?php echo $value['client_detail'];?></td>
				<td><img style='height:100px' src = "../uploads/<?php echo $value['client_image'];?>"></td>
				<td><a href = "<?php echo $value['client_url'];?>"><?php echo $value['client_url'];?></a></td>
				<td><a href="edit_clients.php?id=<?php echo $value['client_id']; ?>"class = 'btn btn-primary' >Edit</a> <a href="delete_clients.php?id=<?php echo $value['client_id']; ?>" class='btn btn-danger'>Delete</a></td>
			</tr>

		<?php
			}
		?> 

	
					 


	</table>
	
	<nav aria-label="Page navigation example">
  <ul class="pagination">
	<?php for($i = 1; $i<=$totalnoofpages; $i++){?>
		
		 <li class="page-item"><a class = 'page-link' href = "clients.php?page=<?php echo $i; ?>"><?php echo $i;?></a></li>
	<?php }?>
	 </ul>
</nav>
</div>
</main>
</div>
</div>

</body>
</html>
