<?php

    $db = mysqli_connect(
        'us-cdbr-east-06.cleardb.net',
        'b20a5256f8e8ea', 
        'ebc93042', 
        'heroku_ddd085a40e59998'
    );
    $db->set_charset("utf8");

    if (!$db) {
        echo "Error: No se pudo conectar a MySQL.";
        echo "errno de depuración: " . mysqli_connect_errno();
        echo "error de depuración: " . mysqli_connect_error();
        exit;
    }
