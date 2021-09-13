<?php


if(isset($_REQUEST['ex']))
{
    session_start();
    unset($_SESSION['G_pas']);
    unset($_SESSION['G_log']);
    unset($_SESSION['G_role']);
    unset($_SESSION['login']);
    unset($_SESSION['password']);
    exit();
}

if(!isset($_POST['act']))
{
    include 'HTML/login.html';
    exit();
}

else
{
    session_start();
    $login = $_POST['login'];
    $password = $_POST['password'];
    $scrambled = md5($password);
    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;

//    try{
//         $pdo = new PDO("mysql:host = localhost; dbname = invoice ", $login, $password);
//    }
//    catch(PDOException $e)
//    {
//    $output='Не возможно подключиться к серверу БД'. $e->getMessege();
//    include 'output.php';
//    exit();
//    }
    include 'dbconnect.php';

    try{
        $sql =" SELECT G_login, G_password, G_role
                FROM `curse`.`all_users`
                WHERE U_login='$login' AND U_password='$password';";
    $s = $pdo->query($sql);
    }
    catch(PDOException $e)
    {
    $output="Не возможно подключиться к серверу БД". $e->getMessage();
    include'output.php';
    exit();
    }

    $row = $s->fetch();

    $User_log = $row['G_login']; //varcharDB
    $User_pas = $row['G_password'];//varcharDB
    $User_role = $row['G_role'];//integerDB

    $_SESSION['G_log'] = $User_log;
    $_SESSION['G_pas'] = $User_pas;
    $_SESSION['G_role'] = $User_role;

    header('Location:index.php');
}


?>
