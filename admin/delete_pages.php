<?php
    $id = $_GET['id'];
    include('includes/settings.php');
    $sql1 = "SELECT * FROM pages WHERE pages_id = $id";
    $res = mysqli_query($con, $sql1);
    $row = mysqli_fetch_assoc($res);
    $file = $row['pages_image'];
    $todelete = $_SERVER['DOCUMENT_ROOT'].'/binayaktech/uploads/'.$file;
    if (file_exists($todelete)) 
    {
    	unlink($todelete);
    }
    $sql = "DELETE FROM pages WHERE pages_id = $id";
    mysqli_query($con, $sql);
    header('location:pages.php');
?>