<?php

    include "../library/config.php";

    $query = mysqli_query($con, "UPDATE jabatan SET nama_jabatan = '$_POST[nama]' WHERE id='$_POST[id]' ");

    if($query){
        header("location:jabatan.php?pesan=sukses");
    }

?>