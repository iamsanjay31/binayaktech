<?php 

include('includes/settings.php');

	?>
<?php 

$id= $_GET['id'];

$con = mysqli_connect('localhost', 'root', '', 'binayaktech'); 


$sql1= "SELECT * FROM gallery WHERE gallery_id = $id"; 
$res=mysqli_query($con,$sql1);
$row=mysqli_fetch_assoc($res);


$file = $row['gallery_image']; 

$todelete= $_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$file; 
if(file_exists($todelete))
{
unlink($todelete); 
}
/*echo '<pre>';
print_r($row);
die;*/

$sql = "DELETE FROM gallery WHERE gallery_id=$id"; 
mysqli_query($con,$sql);

header('location:gallery.php'); 



?> 
