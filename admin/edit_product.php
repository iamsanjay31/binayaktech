<?php
	include('includes/settings.php');

	$msg = '';
	$id = $_GET['id'];

	if($_POST)
	{

		$pname = $_POST['pdname'];
		$pdetail = $_POST['pdetail'];
		$flag = 0;
		if($pname == '')
		{
			$flag = 1;
			$msg .= "Product Name cannot be empty. <br>";
		}
			if($pdetail == '')
		{
			$flag = 1;
			$msg .= 'Porfolio Details Cannot be empty. <br>';
		}
			if($flag == 0)
		{

		$sql1 = "SELECT * FROM products WHERE product_id = $id";
		$res1 = mysqli_query($con,$sql1);
		$row1 = mysqli_fetch_assoc($res1);

		if($_FILES['pdimage']['name'] != '')
		{

		$file = date('ymdhis').$_FILES['pdimage']['name'];
		$source = $_FILES['pdimage']['tmp_name'];
		$destination = $_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$file;

		//if photo is selected update new photo
		move_uploaded_file($source, $destination);
		//delete old photo
		$oldfile = $_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$row1['product_image'];
		unlink($oldfile);
		//update the row in the database with the id we collected
		$sql2 = "UPDATE products SET product_name = '$pname', product_image = '$file', product_details = '$pdetail' WHERE product_id = '$id'";

		}
		else
		{

		$sql2 = "UPDATE products SET product_name = '$pname', product_details = '$pdetail' WHERE product_id = '$id'";

		}
		$res = mysqli_query($con,$sql2);
		if($res)
		{
			$msg = 'Update Success';
		}
		else
		{
			$msg = 'Update Failure';	
		}


	}

}

	$sql = "SELECT * FROM products WHERE product_id = $id";
	$res = mysqli_query($con,$sql);
	$row = mysqli_fetch_assoc($res);
?>

<?php include('includes/nav.php') ?>

<div class="container-fluid">
  <div class="row">
 <?php include('includes/sidebar.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
   
      <h2 style = 'margin-top:20px;'>Edit Portfolio</h2>
    <?php echo $msg; ?>           
<form action = '' method = 'POST' enctype = "multipart/form-data" >
	Product Name: <input class = 'form-control' type = 'text' name = 'pdname' value = "<?php echo $row['product_name'];?>"><br>
	Product Image: <input type = 'file' name = 'pdimage'><br>
	Product Details: <textarea class = 'form-control' name = 'pdetail'><?php echo $row['product_details'];?> </textarea><br>
<input class= 'btn btn-primary' type ='submit'>
	</form>
                        </div>
           				</main>           
                    </div>
                </div>