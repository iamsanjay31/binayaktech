
<?php include('includes/settings.php'); ?>

<?php
    $sqli3 = "SELECT * FROM pages";
    $res3 = mysqli_query($con, $sqli3);
    $no_of_rows = mysqli_num_rows($res3);
    $limit = 2;
    $totalnoofpages = ceil($no_of_rows/$limit);
    if (isset($_GET['page'])) 
    {
        $offset = $limit * ($_GET['page'] - 1);

    }
    else
    {
       $offset = 0;
    }



    $sql = "SELECT * FROM pages LIMIT 2 OFFSET 0";
    $res = mysqli_query($con, $sql);
    $result = array();

    while($row = mysqli_fetch_assoc($res)) 
    {

    	$result[] = $row;  

    } 
?>



<?php include('includes/nav.php'); ?>

<div class="container-fluid">
  <div class="row">
    
   <?php include('includes/sidebar.php'); ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

      <h2 style="margin-top: 10px;">Pages</h2>
      <div class="table-responsive">
       <a href="create_pages.php" class="btn btn-success">Create Page</a><br><br>
      
       <table class="table table-strike">
        <tr>
            <td>Pages Name</td>
            <td>Pages Image</td>
            <td>Pages Link</td>
            <td>Action</td>
        </tr>

        <?php
       
         foreach ($result as $key => $value){
        ?>

        <tr>
            <td><?php echo $value['pages_name'];?></td>
            <td><img style="height: 200px;" src="../uploads/<?php echo $value['pages_image'];?>" class = 'img-fluid'></td>
            <td><a href="<?php echo $value['pages_link'];?>"><?php echo $value['pages_link'];?></a></td>
            <td><a class="btn btn-primary" href="edit_pages.php?id=<?php echo $value['pages_id'];?>">Edit</a></td>
            <td><a class="btn btn-danger" href="delete_pages.php?id=<?php echo $value['pages_id'];?>">Delete</a></td>
        </tr>
        <?php }?>                
    </table>

    <?php for($i = 1; $i<=$totalnoofpages; $i++){?>

      <a href="pages.php?page=<?php echo $i;?>"><?php echo $i;?></a>

    <?php }?>


      </div>
    </main>
  </div>
</div>
</body>
</html>


