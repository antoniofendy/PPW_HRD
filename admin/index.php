<?php 
  session_start();
  include '../library/config.php';

  if(empty($_SESSION['username'])){
    header('location:../akses/login.php');
  }

  $timeout = 600;
  if(isset($_SESSION['start'])){
    $elapsed = time()-$_SESSION['start'];
    if($elapsed >= $timeout){
      session_destroy();
      echo "<script type='text/javascript'>alert('Sesi telah berakhir'); window.location'../akses/login.php' </script> ";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

<?php include "../_includesall/head.php"; ?> 

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include "../_includesall/sidebar.php"; ?> 
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include "../_includesall/navbar.php"; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class='col-xl-12 col-lg-10'>
              <img src="../img/image_dashboard.jpg" class='img-fluid rounded mx-auto d-block' alt="responsive image">
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include "../_includesall/footer.php"; ?> 
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include "../_includesall/modal.php"; ?> 

  <!-- Bootstrap core JavaScript-->
  <?php include "../_includesall/js.php"; ?> 

</body>

</html>
