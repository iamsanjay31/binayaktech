<?php
include('includes/settings.php');
?>
<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
$msg='';
if($_POST){
	$sname=$_POST['sname'];
	$sdeg=$_POST['sdeg'];
	$link=$_POST['link'];
	$flag=0;
	//validation for character inputs and empty fields
	if (!preg_match("/[a-z]/i", $sname)) {
		$flag=1;
		$msg .="Name can only be alphabets. <br>";
	}
	if ($sname=='') {
		$flag=1;
	    $msg .="Full name cannot  be empty.<br>";
	}
	 if ($link=='') {
		$flag=1;
		$msg .="linked in url cannnot be empty.<br>";
	}
	if ($flag==0)
	 {
	  $filename='';
	  //upload the image
	  if ($_FILES['image']['name']!= '') 
	        {
              $filename =date('ymdhis').$_FILES['image']['name'];
	          $source=$_FILES['image']['tmp_name'];
	          $destination=$_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$filename;

	          move_uploaded_file($source, $destination);
	        }

	          $con = mysqli_connect('localhost','root','','binayaktech');
	          $sql = "INSERT INTO staffs(staff_name,staff_designation,staff_image,linkedin_url)VALUES('$sname','$sdeg','$filename','$link')";
	          $res = mysqli_query($con,$sql);
	          $msg  = ($res==true)?"<h1>"."Success"."</h1>":"<h1>"."Failure"."</h1>";
    }
  }
?>
<?php include('includes/nav.php')  ?>
<html>
<title>Create Staff</title>
<div class="container-fluid">
  <div class="row">
    <?php include('includes/sidebar.php')  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Staff</h1>
      </div>
     <?php echo $msg;?>
<form action=" " method="POST" enctype="multipart/form-data" >
	Full Name : <input class="form-control" type="text" name="sname" value="<?php if($_POST){ echo $_POST['sname'];}?>"><br><br>
	Desigination : <input class="form-control" type="text" name="sdeg" value="<?php if($_POST){ echo $_POST['sdeg'];}?>"><br><br>
	Image : <input class="form-control"type="file" name="image"><br><br>
	Linked in URL : <input class="form-control" type="text" name="link" value="<?php if($_POST){ echo $_POST['link'];}?>"><br><br>
	<input type="submit" value="Submit" class="btn btn-success">
</form>
      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      
    </main>
  </div>
</div>
</html>
