<?php
    $connect_insert = mysqli_connect("localhost","InsertUser","InsertUser","site");

    if (!$connect_insert){
        die("Error to connect BD insert");
    }

    