<?php

    $db = mysqli_connect(
        'us-cdbr-east-06.cleardb.net',
        'baf11fc9b43d4a', 
        '60940b6b', 
        'heroku_68efbcacd414720'
    );
    $db->set_charset("utf8");

    if (!$db) {
        echo "Error: No se pudo conectar a MySQL.";
        echo "errno de depuración: " . mysqli_connect_errno();
        echo "error de depuración: " . mysqli_connect_error();
        exit;
    }
