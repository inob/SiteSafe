<?php
    $connect = mysqli_connect("localhost","mysql","mysql","site");

    if (!$connect){
        die("Error to connect BD");
    }

    