<?php
    session_start();

    unset($_SESSION['user_login']);
    unset($_SESSION['user_role']);
    unset($_SESSION['user_hash']);

    session_destroy();
    header("Location: ../index.php?logout_successful");
?>