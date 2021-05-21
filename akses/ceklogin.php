<?php
    session_start();
    include("../library/config.php");

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $remember = isset($_POST['check'])? $_POST['check']: '';

    $result = mysqli_query($con, "select * from user where username='$username' and password='$password'");
    $data = mysqli_fetch_array($result);
    $jumlah = mysqli_num_rows($result);

    if($jumlah > 0){
        $_SESSION['username'] = $data['username'];
        $_SESSION['nik'] = $data['nik'];
        $_SESSION['level'] = $data['level'];
        $_SESSION['start'] = time();

        if($remember){
            setCookie('cookieUser', $username, time() + 3600);
            setCookie('cookiePass', $password, time() + 3600);
        }

        if($data['level'] == 'Admin'){
            header("location:../admin/index.php");
            exit;
        }
        else if($data['level'] = 'Pegawai'){
            header("location:../pegawai/index.php");
            exit;
        }
        else{
            header("location:login.php?pesan=gagal");
            exit;
        }

    }
    else{
        header("location:login.php?pesan=gagal");
        exit;
    }

?>