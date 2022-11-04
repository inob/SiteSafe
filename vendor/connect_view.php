<?php
    $connect_view = mysqli_connect("localhost","ViewUser","ViewUser","site");

    if (!$connect_view){
        die("Error to connect BD view");
    }

    