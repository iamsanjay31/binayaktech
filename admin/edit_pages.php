<?php include('includes/settings.php'); ?>
<?php
    $msg = '';
    $id = $_GET['id'];

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

          
        $sql1 = "SELECT * FROM pages WHERE pages_id = $id";
        $res1 = mysqli_query($con, $sql1);
        $row1 = mysqli_fetch_assoc($res1);
        
         if ($flag == 0) 
         {
        if ($_FILES['pimage']['name'] != '')
        {
    	   $filename = date('ymdhis').$_FILES['pimage']['name'];
           $source = $_FILES['pimage']['tmp_name'];
           $destination = $_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$filename;

         $res = move_uploaded_file($source, $destination); 

    	   $oldfile = $_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$row1['pages_image'];
    	if (file_exists($oldfile)) 
    	{
    		unlink($oldfile);
    	}
    	
         
         $sql2 = "UPDATE pages SET pages_name = '$pname',pages_content = '$pcontent',pages_image = '$filename',pages_link = '$plink' WHERE pages_id = $id";
  
    	}
       
       else
       {
       	  $sql2 = "UPDATE pages SET pages_name = '$pname',pages_content = '$pcontent',pages_link = '$plink' WHERE pages_id = $id";
       }
      $res = mysqli_query($con, $sql2);
      if ($res) 
      {
      	$msg = 'Update Successful';
      }
      else
      {
      	$msg = 'Update Failed';
      }
 }

}

    $sql = "SELECT * FROM pages WHERE pages_id = $id";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($res);
?>


<?php include('includes/nav.php');?>

<div class="container-fluid">
  <div class="row">
    
   <?php include('includes/sidebar.php');?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

      <h2 style="margin-top: 10px;">Edit Pages</h2>
      <div class="table-responsive">
       <?php echo $msg;?>
<form action="" method="POST" enctype="multipart/form-data">
<?php
if ($_POST) {
 	$pagename = $_POST['pname'];
 } 
 else
 {
 	$pagename = $row['pages_name'];
 }
?>

	Pages Name: <input type="text" class="form-control" name="pname" value="<?php echo $pagename;?>"><br><br>
	Pages Image: <input type="file" class="form-control" name="pimage"><br><br>

	<?php
if ($_POST) {
 	$pagecontent = $_POST['pcontent'];
 } 
 else
 {
 	$pagecontent = $row['pages_content'];
 }
?>
	Pages Content: <textarea class="form-control" name="pcontent"><?php echo $pagecontent;?></textarea><br><br>

	<?php
if ($_POST) {
 	$pagelink = $_POST['plink'];
 } 
 else
 {
 	$pagelink = $row['pages_link'];
 }
?>
	Pages Link: <input type="text" class="form-control" name="plink" value="<?php echo $pagelink;?>"><br><br>
	<input class="btn btn-primary" type="submit" name="submit" >
</form>

      </div>
    </main>
  </div>
</div>
</body>
</html>
