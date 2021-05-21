<?php

    include "../library/config.php";

    $query = mysqli_query($con, "DELETE FROM jabatan WHERE id = '$_GET[id]'");

    if($query){
        header("location:jabatan.php?pesan=sukses");
    }

?>