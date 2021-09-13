<?php
session_start();
$login = $_SESSION['G_log'];
$password = $_SESSION['G_pas'];
$role = $_SESSION['G_role'];
//echo json_encode($_SESSION["G_role"]);

// if(isset($_REQUEST['ex']))
// 	{
// 		if($_SESSION['G_role'] == "director")
// 		{
// //			header('location:../repeat/');
// 			exit();
// 		}
//         if($_SESSION['G_role'] == "chief accountant" || $_SESSION['G_role'] =="office worker")
// 		{
// //			header('location:./repeat/');
// 			exit();
// 		}

//         if($_SESSION['G_role'] == "Vendor")
// 		{
// //			header('location:../repeat/');
// 			exit();
// 		}
// 		else
// 		{
// 			$output="У вас нет прав доступа к контроллеру главного меню";
// 			include $_SERVER['DOCUMENT_ROOT'].'/includes/output.php';
// 			exit();
// 		}
// 	}

if($role == 3) {
	if (isset($_GET['catalog'])) {		
  		header('location:./invoice.php');
		exit();
	}
}

if( ($role == 1) || ($role == 2) ) {
	if (isset($_GET['queries'])) {
		header('location:./queries.php');
		exit();
	}
}

if($role == 2) {
	if (isset($_GET['reports'])) {
		header('location:./report.php');
  	exit();
	}
}

if ($role == 4) {
	if (isset($_GET['editing'])) {
		header('location:./edit_list.php');
		exit();
	}
}

if(isset($_REQUEST['exit']))
	{
		unset($_SESSION['G_role']);
    	unset($_SESSION['G_log']);
		unset($_SESSION['G_pas']);
		$output="До новый встреч!<br><a href='autorization.php' class='btn' id='reset'>Выход</a>";
		include 'output.php';
		//include $_SERVER[DOCUMENT_ROOT].'/includes/output.php';
		exit();
	}
include 'HTML/main_menu.html';
?>
