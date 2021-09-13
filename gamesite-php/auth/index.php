<?php
    session_start();
    
    $login = $_SESSION['user_login'];

    include '../include/dbconnect.php';

    $mysqli = dbconnect();

    $sql = $mysqli->prepare("SELECT usr_id, role, pwd FROM user_role r JOIN users u ON r.usr_id=u.id WHERE email=?");
    $sql->bind_param("s", $login);
    $sql->execute();
    $sql->bind_result($user_id, $user_role, $pwd);
    $sql->fetch();
    $sql->close();

    unset($login);

    if ((!(password_verify($_SESSION['user_pwd'], $pwd))) or ((!is_numeric($user_id)) or $user_role == '')) {
        $mysqli->close();
        $err = 'Failed to sign in: uncorrect login/password';
        
        unset($sql);
        unset($mysqli);
        unset($_SESSION['user_login']);

        header("Location: ../index.php?error=$err");
        exit;
    }

    unset($pwd);

    $_SESSION['user_role'] = $user_role;
    $session_id = password_hash(microtime(), PASSWORD_BCRYPT);
    $_SESSION['user_hash'] = $session_id;

    $sql = $mysqli->prepare("UPDATE user_data SET session_id=? WHERE usr_id=?");
    $sql->bind_param("si", $session_id, $user_id);
    $sql->execute();
    $sql->close();

    $sql = $mysqli->prepare("SELECT nickname FROM user_data WHERE usr_id=?");
    $sql->bind_param("i", $user_id);
    $sql->execute();
    $sql->bind_result($user_nickname);
    $sql->fetch();
    $sql->close();

    if ($user_nickname != '') {
        $_SESSION['nickname'] = $user_nickname;
    }

    $mysqli->close();
    unset($sql);
    unset($mysqli);
    unset($user_role);
    unset($user_id);
    unset($session_id);
    unset($user_nickname);

    header("Location: ../index.php?login_successful");
?>