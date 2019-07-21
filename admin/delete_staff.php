
<?php 

include('includes/settings.php');

?>
<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}
 $id=$_GET['id'];
 $con = mysqli_connect('localhost','root','','binayaktech');
 $sql1="SELECT * FROM staffs WHERE staff_id=$id";
 $res=mysqli_query($con,$sql1);
 $row=mysqli_fetch_assoc($res);
 $file=$row['staff_image'];
 $todelete=$_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$file;
 if (file_exists($todelete)) {
                               unlink($todelete);
                              }
 $sql = "DELETE FROM staffs WHERE staff_id=$id";
 mysqli_query($con,$sql);
 header('location:staff.php');
?>