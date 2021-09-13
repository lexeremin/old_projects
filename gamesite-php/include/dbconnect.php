<?php

function show_db_error($mysqli) {
    echo "Error: ".$mysqli->connect_error."\n";
}

function dbconnect() {
    $mysqli = new mysqli('localhost', 'digitamesuser', 'praktika2017', 'digitames');

    if ($mysqli->connect_errno) {
        show_db_error($mysqli);
        exit;
    }

    return $mysqli;
}

?>