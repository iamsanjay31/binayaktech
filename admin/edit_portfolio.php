 

<?php 

include('includes/settings.php');
include('includes/nav.php');
// get the id from get.
$msg = '';
$id = $_GET['id'];

//post the form
if($_POST)
{

	$pname = sanitize($_POST['pname']);
	$plink = sanitize($_POST['plink']);
	$pdetail = sanitize($_POST['pdetail']);

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
		if($_FILES['pimage']['name'] != '')
		{
			$sql1 = "SELECT * FROM portfolio WHERE portfolio_id = $id;";
			$res1 = mysqli_query($con, $sql1);
			$row1 = mysqli_fetch_assoc($res1);

			$filename = date('ymdhis').$_FILES['pimage']['name'];
			$source = $_FILES['pimage']['tmp_name'];
			$destination = $_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$filename;
			move_uploaded_file($source, $destination);
			$oldfile = $_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$row1['portfolio_image'];
			
			
			if(file_exists($oldfile))
			{
				unlink($oldfile);
			}
			$sql2 = "UPDATE portfolio SET portfolio_name = '$pname', portfolio_detail = '$pdetail', portfolio_image = '$filename', portfolio_link = '$plink' WHERE portfolio_id = $id";
		}
		else
		{
		// update the row in the database with the id we collected

			$sql2 = "UPDATE portfolio SET portfolio_name = '$pname', portfolio_detail = '$pdetail', portfolio_link = '$plink' WHERE portfolio_id = $id";
		}

		$res = mysqli_query($con, $sql2);
		if($res)
		{
			$msg = 'Update Successful';
		}
		else
		{
			$msg = 'Update Failed';
		}
	}
	
}

// pull the old data from the table where id is what we collected from get

$con = mysqli_connect('localhost','root','','binayaktech');
$sql = "SELECT * FROM portfolio WHERE portfolio_id = $id;";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);


?>



<div class="container-fluid">
  <div class="row">
 <?php include('includes/sidebar.php'); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
   
      <h2 style = 'margin-top:20px;'>Edit Portfolio</h2>
      <div class="table-responsive">
    	<?php echo $msg; ?>
	<form action = '' method="POST" enctype="multipart/form-data">
		<?php 
		if($_POST)
		{
			$portname = $_POST['pname'];
		}
		else
		{
			$portname = $row['portfolio_name'];
		}
		?>
		Portfolio Name : <input type = 'text' class = 'form-control' name = 'pname' value = "<?php echo $portname; ?>"/><br>
		Portfolio Image : <input type = 'file' class = 'form-control' name = 'pimage' /><br>
			<?php 
		if($_POST)
		{
			$portdetail = $_POST['pdetail'];
		}
		else
		{
			$portdetail = $row['portfolio_detail'];
		}
		?>
		Portfolio Detail : <textarea class = 'form-control' name = 'pdetail'><?php echo $portdetail; ?></textarea><br>

		<?php 
		if($_POST)
		{
			$portlink = $_POST['plink'];
		}
		else
		{
			$portlink = $row['portfolio_link'];
		}
		?>


		Portfolio Link : <input class = 'form-control' type = 'text' name = 'plink' value = "<?php echo $portlink; ?>"></br>
		<input type = 'submit' class = 'btn btn-primary' />
	</form>
   
        </div>
    </main>
  </div>
</div>
</body>
</html>
































