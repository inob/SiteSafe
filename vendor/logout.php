<?php
    session_start();
    unset($_SESSION['user']);
    //ini_set('session.gc_max_lifetime', 0);
    //ini_set('session.gc_probability', 1);
    //ini_set('session.gc_divisor', 1);
    //session_destroy();
    //session_regenerate_id(true); 
    header('Location: ../index.php');