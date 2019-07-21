<?php
include('includes/settings.php');
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
//get the id from get method
$msg="";
$id=$_GET['id'];
$con=mysqli_connect('localhost','root','','binayaktech');
//submit form after pulling old data
if ($_POST) {
	$sname=$_POST['sname'];
	$sdeg=$_POST['sdeg'];
	$link=$_POST['link'];
    $flag=0;
	if ($sname=='') {
		$flag=1;
	    $msg .="Full name cannot  be empty.<br>";
	}
	 if ($link=='') {
		$flag=1;
		$msg .="linked in url cannnot be empty.<br>";
	}



	//if photo is selected upload new photo and delete the old one
if ($flag==0) {
	$sql1="SELECT * FROM staffs where staff_id = $id";
    $res1=mysqli_query($con,$sql1);
    $row1=mysqli_fetch_assoc($res1);
     if ($_FILES['image']['name']!='') {
	    $filename =date('ymdhis').$_FILES['image']['name'];
	    $source=$_FILES['image']['tmp_name'];
	    $destination=$_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$filename;

	    move_uploaded_file($source, $destination);
	   $oldfile=$_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$row1['staff_image'];
	//if old file is exists, remove the file
	   if (file_exists($oldfile)) {
		unlink($oldfile);
	 }

	
  //update the row in data base for the specific row if image is selected
    $sql2="UPDATE staffs SET staff_name='$sname',staff_designation='$sdeg',staff_image='$filename',linkedin_url='$link' WHERE staff_id= $id";
}
else
 {
 	//update row if image is not selected
 	 $sql2="UPDATE staffs SET staff_name='$sname',staff_designation='$sdeg',linkedin_url='$link' WHERE staff_id= $id";
 }
 $res=mysqli_query($con,$sql2);
 if ($res) {
     $msg="<h1>"."Update Successful"."</h1>";
 }
 else
 {
    $msg="<h1>"."Update Failed"."</h1>";
 }
}
}
//pull the old data from the specific row from the table

$sql="SELECT * FROM staffs where staff_id = $id";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);
?>

<?php include('includes/nav.php')  ?>
<html>
<title>Edit Staff</title>
<div class="container-fluid">
  <div class="row">
    <?php include('includes/sidebar.php')  ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Staff</h1>
      </div>
      <?php echo $msg;?>
 <?php //create form ?>
 	<form action=" " method="POST" enctype="multipart/form-data">
 		<?php if ($_POST) {
 			$staffname=$_POST['sname'];}
 			else{
 				$staffname=$row['staff_name'];
 			}
 	    ?>
 			<?php if ($_POST) {
 			$linkedinurl=$_POST['link'];}
 			else{
 				$linkedinurl=$row['linkedin_url'];
 			}
 		?>
	Full Name : <input type="text" name="sname" value="<?php echo $staffname ?>" class="form-control"><br><br>
	Desigination : <input type="text" name="sdeg" value="<?php echo $row['staff_designation'] ?>" class="form-control"><br><br>
	Image : <input type="file" name="image" class="form-control"><br><br>
	Linked in URL : <input type="text" name="link" value="<?php echo $linkedinurl ?>" class="form-control"><br><br>
	<input type="submit" value="Update" class="btn btn-success">
</form>

      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      
    </main>
  </div>
</div>
</html>