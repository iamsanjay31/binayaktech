<?php
 	include('includes/settings.php');
 ?>
 
 <?php

	$sql2 = "SELECT * FROM products";
	$res2 = mysqli_query($con,$sql2);
	$no_rows = mysqli_num_rows($res2);
	$limit = 2;
	$total_no_pages = ceil($no_rows/$limit);


	if(isset($_GET['page']))
	{
		$offset = $limit * ($_GET['page'] - 1);
	}
	else
	{
		$offset = 0;
	}


	$sql1 = "SELECT * FROM products LIMIT $limit OFFSET $offset";

	$res1 = mysqli_query($con,$sql1);
	$result = array();
	while($row = mysqli_fetch_assoc($res1))
{
	$result[] = $row;
}

	?>

<?php include('includes/nav.php'); ?>

    <div class="container-fluid">
    <div class = "row">
       		<?php include('includes/sidebar.php'); ?>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                	<h2>Products</h2>
                	<div class="table-responsive">
                	<a href = "create_product.php" class = 'btn btn-success'>Create Product</a><br><br>
                   <table class = 'table table-striped'>
			<tr>
				<td>Product Name</td>
				<td>Product Image</td>
				<td>Product Details</td>
				<td>Action</td>
			</tr>

			<?php foreach($result as $key => $value)
			{

			?>
			<tr>
				<td><?php echo $value['product_name']; ?></td>
				<td> <img style = 'height:100px' src = "../uploads/<?php echo $value['product_image']; ?>"> </td>
				<td><?php echo $value['product_details']; ?></td>
				<td><a href = "edit_product.php?id=<?php echo $value['product_id']; ?>" class = 'btn btn-primary'>Edit</a> |
					<a href = "delete_product.php?id=<?php echo $value['product_id']; ?>"class = 'btn btn-danger'>Delete</a>
				</td>
				
			</tr>
			<?php
		}
			?>
		</table>

		<nav aria-label="Page navigation example">
 		<ul class="pagination">

		<?php for($i=1; $i<=$total_no_pages; $i++){
			?><a href = "products.php?page=<?php echo $i; ?>"> <?php echo $i; ?> </a>				
		<?php } ?>
                    </div>
                    </main>  
                    </div>
                </div>
            </div>

</body>
</body>
</html>
