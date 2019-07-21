<?php 
include('includes/settings.php');

?>
<?php 
	$sql3 = "SELECT * FROM portfolio";
	$res3 = mysqli_query($con, $sql3);
	$no_of_rows = mysqli_num_rows($res3);
	$limit = 2;
	$totalnoofpages = ceil($no_of_rows/$limit);
	if(isset($_GET['page']))
	{
		//calculate offset from pageno
		$offset = $limit * ($_GET['page'] - 1);
	}
	else
	{
		$offset = 0;
	}


	$sql = "SELECT * FROM portfolio LIMIT $limit OFFSET $offset";
	
	$res = mysqli_query($con, $sql);
	$result = array();
	while($row = mysqli_fetch_assoc($res))
	{
		$result[] = $row;
	}

?>
<?php include('includes/nav.php'); ?>

<div class="container-fluid">
  <div class="row">
 <?php include('includes/sidebar.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
   
      <h2 style = 'margin-top:20px;'>Portfolio</h2>
      <div class="table-responsive">
       <a href = 'create_portfolio.php' class = 'btn btn-success'/>Create Portfolio</a><br><br> 
      	<table class = 'table table-striped'>
		<tr>
			<td>Portfolio Name</td>
			<td>Portfolio Image</td>
			<td>Portfolio Detail</td>
			<td>Portfolio Link</td>
			<td>Action</td>
		</tr>
		<?php foreach ($result as $key => $value) {
		?>
			<tr>
				<td><?php echo $value['portfolio_name']; ?></td>
				<td><img style = 'height:100px' src = "../uploads/<?php echo $value['portfolio_image'];?>" </td>
				<td><?php echo $value['portfolio_detail'];?></td>
				<td><a href = "<?php echo $value['portfolio_link']?>"><?php echo $value['portfolio_link']; ?></a> </td>
				<td><a class = 'btn btn-primary' href = "edit_portfolio.php?id=<?php echo $value['portfolio_id']; ?>">Edit</a>
				<a href = "delete_portfolio.php?id=<?php echo $value['portfolio_id']; ?>" class = 'btn btn-danger'>Delete</a> </td>
			</tr>
		<?php
		}?>

	</table>

<nav aria-label="Page navigation example">
  <ul class="pagination">
	<?php for($i = 1; $i<=$totalnoofpages; $i++){?>
		
		 <li class="page-item"><a class = 'page-link' href = "portfolios.php?page=<?php echo $i; ?>"><?php echo $i;?></a></li>
	<?php }?>
	 </ul>
</nav>

   
        </div>
    </main>
  </div>
</div>
</body>
</html>














