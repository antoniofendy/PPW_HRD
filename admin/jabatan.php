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

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Jabatan</h1>
            </div><br>

            <?php
                if(isset($_GET['pesan']) == "sukses"){
                    echo "
                        <div class='alert alert-success alert-dismissible fade-show' role='alert'>
                        <h5 class='alert-heading'><b>Success!!</b></h5>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>
                    ";
                }
            ?>
            <div class="row">
                <div class="col-md-8">
                    <a class="btn btn-outline-primary shadow-sm" href="jabatannew.php">
                        <span class="fa fa-plus"> New</span>
                    </a>
                </div>
                <div class="col-md-4">
                    <form action="jabatan.php" method="get">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control shadow-sm" placeholder="Search ID/Nama Jabatan" name="keyword"
                            value="<?= (isset($_GET['keyword']))? $_GET['keyword']:''; ?>" aria-descibeby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary shadow-sm" type="submit">
                                    <span class="fa fa-search"></span>
                                </button>
                                <?php
                                    if(isset($_GET['keyword'])){
                                        echo "<a class='btn btn-outline-danger shadow-sm' href='jabatan.php'>
                                        <span class='fa fa-times'></span></a>";
                                    }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">POSITION</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($_GET['keyword'])){
                                        $query = mysqli_query($con, 
                                        "SELECT * FROM jabatan WHERE id LIKE '%$_GET[keyword]%' OR nama_jabatan LIKE '%$_GET[keyword]%'");
                                    }
                                    else{
                                        $query = mysqli_query($con, "SELECT * FROM jabatan ORDER BY id ASC");
                                    }
                                    while($data = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?= $data['id'] ?></td>
                                    <td><?= $data['nama_jabatan'] ?></td>
                                    <td class="text-center">
                                        <a href="jabatanedit.php?id=<?= $data['id']; ?>" class="btn btn-small">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a onclick="deleteConfirm('jabatandelete.php?id=<?= $data['id']; ?>')" class="btn btn-small text-danger" href="#!">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
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
    <script>
        function deleteConfirm(url){
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }
    </script>

</body>

</html>