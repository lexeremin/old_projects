<?php

// session_start();
// $login = $_SESSION['G_log'];
// $password = $_SESSION['G_pas'];
// $role = $_SESSION['G_role'];
//$key = $_POST['key'];

// if($role != 1 || $role != 2)
// {
//   $output="У вас не достаточно прав для выполнения запросов";
//   include 'output.php';
// }

// include "dbconnect.php";
//
// switch($key)
// {
//     case 1:
//       include 'query_out1.php';
//     break;
//     case 2:
//       include 'query_out2.php';
//     break;
//     case 3:
//       include 'query_out3.php';
//     break;
//     case 4:
//       include 'query_out4.php';
//     break;
//     case 5:
//       include 'query_out5.php';
//     break;
//     case 6:
//       include 'query_out6.php';
//     break;
//
// }
if(isset($_GET['exit']))
{
  $output = '<a href="index.php" class="btn">Выход из системы</a>';
  include 'output.php';
  exit();
}

include 'HTML/queries.html';


// if($key == 1)
//     include 'query_out1.php';
// if($key == 2)
//     include 'query_out2.php';
// if($key == 3)
//     include 'query_out3.php';
// if($key == 4)
//     include 'query_out4.php';
// if($key == 5)
//     include 'query_out5.php';
// if($key == 6)
//     include 'query_out6.php';

?>
