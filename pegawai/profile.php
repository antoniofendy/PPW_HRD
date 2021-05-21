<?php
    session_start();
    include "../library/config.php";

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
    <?php include "../_includesall/head.php" ?>
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
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class='col-xl-10 offset-xl-1'>
            <?php
                $nik = $_SESSION['nik'];
                $query1 = mysqli_query($con, "SELECT * FROM pegawai where nik ='$nik'");
                $data1 = mysqli_fetch_assoc($query1);

                $query2 = mysqli_query($con, "SELECT * FROM jabatan where id ='".$data1['id_jabatan']."'");
                $data2 = mysqli_fetch_assoc($query2);
            ?>

            <div class="row">
                <div class="col-lg-5">
                    <?php 
                        echo "<img class='img-fluid rounded-circle' src='../img/user/".$data1['foto']."' alt='".$data1['nama_pegawai']."' title='".$data1['nama_pegawai']."'>";
                    ?>
                </div>
                <div class="col-lg-6">
                    <div>
                        <h4><?php echo $data1['nama_pegawai']; ?></h4>
                        <p><?php echo $data2['nama_jabatan']; ?></p>
                        <p>Pegawai</p>
                    </div>
                    <div>
                        <h4>General Info</h4>
                        <table class="table">
                            <tr>
                                <td><b>Gender</b></td>
                                <td><?php echo ($data1['jenis_kelamin']== 'L')? 'Laki-Laki' : 'Perempuan'; ?></td>
                            </tr>
                            <tr>
                                <td><b>Date of Birth</b></td>
                                <td><?php echo $data1['tgl_lahir']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

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