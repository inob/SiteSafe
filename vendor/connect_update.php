<?php
    $connect_update = mysqli_connect("localhost","UpdateUser","UpdateUser","site");

    if (!$connect_update){
        die("Error to connect BD insert");
    }

    