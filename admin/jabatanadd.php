<?php

    include "../library/config.php";

    $query = mysqli_query($con, "INSERT INTO jabatan SET nama_jabatan = '$_POST[nama]'");

    if($query){
        header("location:jabatan.php?pesan=sukses");
    }

?>