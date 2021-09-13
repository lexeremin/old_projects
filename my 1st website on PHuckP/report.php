<?php

session_start();
$login = $_SESSION['G_log'];
$password = $_SESSION['G_pas'];
$role = $_SESSION['G_role'];

// include "dbconnect.php";
// //if(isset($_SESSION['send'])){
// $sql = "SELECT name_p, det_p, quantity_p
// 		FROM `curse`.`monthly_report`
// 		WHERE datm=:month AND daty=:year;";
// $stmt = $pdo->prepare($sql);
// $stmt->bindParam(':month', $_GET['month']);
// $stmt->bindParam(':year', $_GET['year']);
// $stmt->execute();

// if($stmt->rowcount()!=0)
// {
//     echo '<a href="http://localhost/cw_main.html">';
//     echo "<h2 align=center>Такой отчет уже есть в базе данных:</h2><br>";
//     echo '</a>';
// } 
// else
// {
//     echo '<a href="http://localhost/cw_main.html">';
// 	echo "<h2 align=center>Cоздан отчет:</h2><br>";
//     echo '</a>';
// 	$stmt = $pdo->prepare("CALL `curse`.`proc`(:month, :year);");
// 	$stmt->bindParam(':month', $_GET['month']);
// 	$stmt->bindParam(':year', $_GET['year']);
// 	$stmt->execute();
// 	$stmt = $pdo->query("SELECT name_p, det_p, quantity_p
// 						FROM `curse`.`monthly_report`
// 						WHERE datm=$_GET[month] AND daty=$_GET[year]");
// 	if($stmt->rowcount()==0)
// 		{
//             $output='<a href="http://localhost/dz/index.php">нет данных.go to main page </a>';
//             include 'output.php';
// 			exit();
// 		}
//}
if(isset($_GET['exit']))
{
  $output = '<a href="index.php">Выход из системы</a>';
  include 'output.php';
  exit();
}

include "HTML/reports.html";
// echo '<h5 align=center id="tooltp"> Отчет за '. $_GET['year'].".". $_GET['month']."*";
//}
//include "HTML/reports.html"
?>
