<?php
    session_start();

    function reject() {
        $err = 'Permission denied! Please, sign in';
        session_destroy();

        header("Location: ../index.php?error=$err");
        unset($err);
        exit;
    }

    if (isset($_SESSION['user_hash']) and isset($_SESSION['user_role'])) {
        include 'dbconnect.php';

        $mysqli = dbconnect();

        $sql = "SELECT session_id FROM user_data d LEFT JOIN users u ON d.usr_id=u.id JOIN user_role r USING(usr_id) WHERE email=\"".$_SESSION['user_login']."\" AND role=\"".$_SESSION['user_role']."\";";

        $result = $mysqli->query($sql);

        if ($result->num_rows !== 1) {
            $result->close();
            unset($result);
            unset($sql);

            reject();
        }

        $session_id = $result->fetch_assoc()['session_id'];
        $result->close();
        unset($result);
        $mysqli->close();
        unset($mysqli);

        if ($_SESSION['user_hash'] !== $session_id) {
            unset($session_id);
            reject();
        }
    } else {
        reject();
    }
?>