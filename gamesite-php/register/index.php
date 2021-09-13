<?php
    session_start();

    include '../include/dbconnect.php';

    $mysqli = dbconnect();

    $sql = $mysqli->prepare("SELECT id FROM users WHERE email=?");
    $sql->bind_param("s", $_SESSION['new_email']);
    $sql->execute();
    $sql->bind_result($user_id);
    $sql->fetch();
    $sql->close();

    if (is_numeric($user_id)) {
        $mysqli->close();
        $err = "User with specified e-mail already exists!";

        unset($_SESSION['new_email']);
        unset($_SESSION['new_nickname']);
        unset($_SESSION['new_pwd']);
        unset($user_id);
        unset($mysqli);
        unset($sql);

        header("Location: ../index.php?error=$err");
        exit;
    }

    $sql = $mysqli->prepare("INSERT INTO users (email, pwd) VALUES (?, ?)");
    $pwd = password_hash($_SESSION['new_pwd'], PASSWORD_DEFAULT);
    $sql->bind_param("ss", $_SESSION['new_email'], $pwd);
    $sql->execute();
    $sql->close();
    unset($pwd);

    $sql = $mysqli->prepare("SELECT id FROM users WHERE email=?");
    $sql->bind_param("s", $_SESSION['new_email']);
    $sql->execute();
    $sql->bind_result($user_id);
    $sql->fetch();
    $sql->close();

    if (!(is_numeric($user_id))) {
        $mysqli->close();
        $err = "There are some problems with registration... Try later";

        unset($_SESSION['new_email']);
        unset($_SESSION['new_nickname']);
        unset($_SESSION['new_pwd']);
        unset($user_id);
        unset($mysqli);
        unset($sql);

        header("Location: ../index.php?error=$err");
        exit;
    }

    $sql = $mysqli->prepare("INSERT INTO user_data (usr_id, nickname) VALUES (?, ?)");
    $sql->bind_param("is", $user_id, $_SESSION['new_nickname']);
    $sql->execute();
    $sql->close();
    $mysqli->close();

    unset($_SESSION['new_email']);
    unset($_SESSION['new_nickname']);
    unset($_SESSION['new_pwd']);
    unset($registered);
    unset($user_id);
    unset($sql);
    unset($mysqli);

    header("Location: ../index.php");
?>