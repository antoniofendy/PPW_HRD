<!DOCTYPE html>
<html lang="en">

<head>

<?php include "../_includesall/head.php"; ?> 
<link rel="stylesheet" href="../css/st-login.css">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
      <br>
      <?php
        if(isset($_GET['pesan'])){
          if($_GET['pesan'] == 'gagal'){
            echo "
              <div class='alert alert-danger alert-dismissible fade-show' role='alert'>
              <h5 class='alert-heading'><b>LOGIN GAGAL</b></h5>
              <p>Username dan Password Tidak Sesuai</p>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
              </button>
              </div>
            ";
          }
        }
      ?>
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="post" action="ceklogin.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" placeholder="Username" value="<?php echo isset($COOKIE['cookieUser'])? $_COOKIE['cookieUser']:''; ?>">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" value="<?php echo isset($COOKIE['cookiePass'])? $_COOKIE['cookiePass']:''; ?>">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" name='check' id="customCheck" <?php echo isset($COOKIE['cookieUser'])? 'checked':''; ?>>
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                    <br><br><br>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
