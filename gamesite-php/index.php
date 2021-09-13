<?php
    if (!isset($_GET['sign_in'])) {
        if (isset($_GET['sign_out'])) {
            header("Location: ./auth/logout.php");
            exit;
        }

        if (isset($_GET['sign_up'])) {
            session_start();
            
            $_SESSION['new_email'] = $_POST['usr_email'];
            $_SESSION['new_nickname'] = $_POST['usr_nickname'];
            $_SESSION['new_pwd'] = $_POST['usr_pwd'];

            header("Location: ./register/index.php");
            exit; 
        }

        if (isset($_GET['account'])) {
            header("Location: ./account/index.php");
            exit;
        }

        //any error check
        $err_arg = '';

        if (isset($_GET['error'])) {
            $err_arg = '&error='.$_GET['error'];
        }

        $content = 'front_page';
        
        if (isset($_GET['main_content']) and $_GET['main_content'] !== '') {
           $content = $_GET['main_content'];
        }

        header("Location: ./home.php?main_content=$content"."$err_arg");
    } else {
      session_start();

      $_SESSION['user_login'] = $_POST['usr'];
      $_SESSION['user_pwd'] = $_POST['pwd'];

      header("Location: ./auth/index.php");
    }

    exit;
?>