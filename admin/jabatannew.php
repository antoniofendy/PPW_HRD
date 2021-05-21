<?php

    session_start();

    include "../library/config.php";

    if(empty($_SESSION['username'])){
        header("location:../akses/login.php");
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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">New Jabatan</h1>
            </div>
            <div class="card mb-3">
                <div class="card-header">
                    <a class="btn btn-outline-primary" href="jabatan.php">
                        <span class="fa fa-arrow-left"></span> Back
                    </a>
                </div>
                <div class="card-body">
                    <form method="post" action="jabatanadd.php">
                        <div class="form-group">
                            <label>Position Name*</label>
                            <input type="text" class="form-control" name="nama" required/>
                        </div>
                        <input type="submit" class="btn btn-outline-info shadow-sm" value="Add">
                        <input type="reset" class="btn btn-outline-warning shadow-sm" value="Clear">
                    </form>
                </div>
                <div class="card-footer small text-muted">
                    * Required Fields
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
    <script>
        function deleteConfirm(url){
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>

</body>

</html>