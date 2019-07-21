<?php 
include('includes/settings.php');

?>
<?php
 $con=mysqli_connect('localhost','root','','binayaktech');

 $sql3="SELECT * FROM staffs";
 $res3 = mysqli_query($con,$sql3);
 $no_of_rows=mysqli_num_rows($res3);


 $limit = 3;
 $total_no_of_pages = ceil($no_of_rows/$limit);
 
 if (isset($_GET['page'])) {
 	//calculate offset from page number
 	$offset = $limit * ($_GET['page']-1);

 	//incase of page 1 3*(1-1) = 0
 	//incase of page 2 3*(2-1) = 3
 	//incase of page 3 3*(3-1) = 6

 }
 else {
 	$offset = 0;
 }

 $sql="SELECT * from staffs LIMIT $limit OFFSET $offset";
 $res=mysqli_query($con,$sql);
 $result=array();
 while($row=mysqli_fetch_assoc($res))
 {
    $result[]=$row;
 }
?>

<?php include('includes/nav.php')  ?>
<html>
<title>View Staffs</title>
<div class="container-fluid">
  <div class="row">
    <?php include('includes/sidebar.php')  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Staffs</h1>
      </div>
      <a href="create_staff.php" class="btn btn-success">+ New Staff</a>

       <table class="table table-striped" style="border:1; margin-top: 30px;"  >

		<tr>
		<td>Staff Name </td>
			<td>Designation </td>
			<td>Image  </td>
			<td>Linked in URL </td>
			<td>Action</td>
		</tr>	
		<?php foreach ($result as $key => $value) {
			?><tr>
				<td><?php echo $value["staff_name"]; ?></td>
				<td><?php echo $value["staff_designation"];?></td>
				<td><img src="../uploads/<?php echo $value["staff_image"]; ?>" style="height:100px;width:90px;"></td>
				<td><a href="<?php echo $value["linkedin_url"]; ?>"><?php echo $value['linkedin_url'] ?></a> </td>
				<td><a href="delete_staff.php?id=<?php echo $value['staff_id'];?>" class="btn btn-danger">Delete</a> | <a href="edit_staff.php?id=<?php echo $value['staff_id'];?>" class="btn btn-primary">Edit</a></td>
			  </tr>
		<?php 
	}
	?>
	</table>
	<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php for($i=1;$i<=$total_no_of_pages;$i++){?>
    <li class="page-item"><a class="page-link" href="staff.php?page=<?php echo $i ?>"><?php echo $i;?></a></li>
<?php }?>

  </ul>
</nav>

</div>
     
    </main>
  </div>
</div>
</html>
