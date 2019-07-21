
<?php
include('includes/settings.php');
?>
<?php include('includes/nav.php') ?>

<?php 
$msg = '';
	if($_POST)
	{
		$pname = sanitize($_POST['pname']);
		$pdetail = sanitize($_POST['pdetail']);
		$plink = sanitize($_POST['plink']);
		$flag = 0;

		if($pname == '')
		{
			$flag = 1;
			$msg .= "Portfolio Name cannot be empty. <br>";
		}

		if($plink == '')
		{
			$flag = 1;
			$msg .= 'Porfolio Link Cannot be empty. <br>';
		}

		if($flag == 0)
		{
		$filename = '';
		//upload the image
		if($_FILES['pimage']['name'] != '')
		{
			$filename = date('ymdhis').$_FILES['pimage']['name'];
			$source = $_FILES['pimage']['tmp_name'];
			$destination = $_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$filename;

			move_uploaded_file($source, $destination);
		}
		//save the record in the database


		$sql = "INSERT INTO portfolio(portfolio_name,portfolio_image, portfolio_detail, portfolio_link) VALUES('$pname','$filename','$pdetail','$plink')";

		$res = mysqli_query($con, $sql);
		$msg= ($res == true)?'Success':'Failure';
		}	
	}
?>





<div class="container-fluid">
  <div class="row">
 <?php include('includes/sidebar.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
   
      <h2 style = 'margin-top:20px;'>Create Portfolio</h2>
      <div class="table-responsive">
  
	<?php echo $msg; ?>
<form action = '' method="POST" enctype="multipart/form-data">
	Portfolio Name : <input class = 'form-control' type = 'text' name = 'pname' value = "<?php if($_POST){echo $_POST['pname'];} ?>"/><br>
	Portfolio Image : <input class = 'form-control' type = 'file' name = 'pimage' /><br>
	Portfolio Detail : <textarea class = 'form-control' name = 'pdetail'><?php if($_POST){echo $_POST['pdetail'];} ?></textarea><br>
	Portfolio Link : <input class = 'form-control' type = 'text' name = 'plink' value = "<?php if($_POST){echo $_POST['plink'];} ?>"></br>
	<input type = 'submit' class = 'btn btn-primary' />
</form>
   
        </div>
    </main>
  </div>
</div>
</body>
</html>



