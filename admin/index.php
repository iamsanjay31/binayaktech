<?php include('includes/settings.php'); ?>
<?php include('includes/nav.php'); ?>


<?php include('includes/sidebar.php'); ?>
<div class="container-fluid">
  <div class="row">
 

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
   
      <h2 style = 'margin-top:20px;'>Dashboard</h2>
      <div class="table-responsive">
        Hello, <?php echo $_SESSION['username']; ?>. Welcome to Your admin panel. Control your content in your website from this panel.
      </div>
    </main>
  </div>
</div>
</body>
</html>





