<?php 
include('includes/settings.php');
?>


<?php

  $msg = '';
  if ($_POST) 
  {
  	$pname = $_POST['pname'];
  	$pcontent = $_POST['pcontent'];
    $plink = $_POST['plink'];
    $flag = 0;
    if ($pname == '') 
    {
    	$flag = 0;
    	$msg .= "Pages Name cannot be empty. <br>";
    }

    if ($plink == '') 
    {
        $flag = 1;
    	$msg .= "Pages link Cannot be empty. <br>";
    }

   if ($flag == 0) 
    {
  $filename = ''; 
  if ($_FILES['pimage']['name'] != '')
  {
    $filename = date('ymdhis').$_FILES['pimage']['name'];
    $source = $_FILES['pimage']['tmp_name'];
    $destination = $_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$filename;
    move_uploaded_file($source, $destination);
  }



  $sql = "INSERT INTO pages (pages_name,pages_image,pages_content,pages_link) VALUES('$pname','$filename','$pcontent','$plink')";
  $res = mysqli_query($con, $sql);
  $msg= ($res == true)? 'Success':'Failure';
     }
  }

?>


<?php include('includes/nav.php');?>

<div class="container-fluid">
  <div class="row">
    
   <?php include('includes/sidebar.php');?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

      <h2 style="margin-top: 10px;">Create Pages</h2>
      <div class="table-responsive">
<?php echo $msg;?>
<form action="" method="POST" enctype="multipart/form-data">
	Page Name: <input class="form-control" type="text" name="pname" value="<?php if($_POST){echo $_POST['pname'];}?>"><br><br>
	Page Image: <input class="form-control" type="file" name="pimage"><br><br>
	Page Content: <textarea class="form-control" name="pcontent"><?php if($_POST){echo $_POST['pcontent'];}?></textarea><br><br>
	Page Link: <input class="form-control" type="text" name="plink" value="<?php if($_POST){echo $_POST['plink'];}?>"><br><br>
	<input class="btn btn-primary" type="submit" name="submit">
</form>

      </div>
    </main>
  </div>
</div>


