<?php 

session_start();

$login = $_SESSION['G_log'];
$password = $_SESSION['G_pas'];

if(isset($_REQUEST['ex'])) //пользователь согласился со всем, что в корзине
	{
		unset($_SESSION['cname']);
		unset($_SESSION['city']);
		unset($_SESSION['ccd']);
		unset($_SESSION['invindex']);
		exit();
	}

if(isset($_POST['gotocatalog'])) {
	$_SESSION['cname'] = $_POST['cname'];
	$_SESSION['city'] = $_POST['city'];
	$_SESSION['ccd'] = $_POST['ccd'];
	$_SESSION['invindex'] = $_POST['invindex'];
	//include 'catalog.php';
	header('location:./catalog.php');
	exit();
}

include "HTML/invoice_insert.html";

//$role = $_SESSION['G_role'];
//$kol = $_SESSION['kol'];
//$index=rand();

// include 'dbconnect.php';

// if(isset($_POST['send']))
// {
	
// try
// 		{
// 			$sql='insert into `curse`.`customers`
// 					set C_name=:cname, City=:city ;';
// 			$s=$pdo->prepare($sql);
// 			$s->bindValue(':cname', $_POST['cname']);
// 			$s->bindValue(':city', $_POST['city']);
// 			$s->execute();
// 		}
// 	catch(PDOExeption $e)
// 		{
// 			$output='Ошибка создания накладной'.$e->getMessage();
// 			include 'output.php';
// 			exit();
// 		}
// 		try
// 		{
// 			$sql='SELECT C_id FROM `curse`.`customers`
// 			WHERE C_name=:cname;';
// 			$s=$pdo->prepare($sql);
// 			$s->bindValue(':cname', $_POST['cname']);
// 			$s->execute();
// 		}
// 	catch(PDOExeption $e)
// 		{
// 			$output='Ошибка создания накладной'.$e->getMessage();
// 			include 'output.php';
// 			exit();
// 		}

// 	try
// 		{
// 			$sql='insert into `curse`.`invoices`
// 					set Inv_index=:index, C_id=:customer ;';
// 			$s=$pdo->prepare($sql);
// 			$s->bindValue(':price', $index);
// 			$s->bindValue(':customer', $C_id);
// 			$s->execute();
// 		}
// 	catch(PDOExeption $e)
// 		{
// 			$output='Ошибка создания накладной'.$e->getMessage();
// 			include 'output.php';
// 			exit();
// 		}
// 	try
// 		{
// 		$sql='SELECT Inv_id FROM `curse`.`invoices`
// 					WHERE Inv_index=:index AND C_id=:customer ;';
// 			$s=$pdo->prepare($sql);
// 			$s->bindValue(':price', $index);
// 			$s->bindValue(':customer', $C_id);
// 			$s->execute();
// 		}	
// 	catch(PDOExeption $e)
// 		{
// 			$output='Ошибка удаления товара'.$e->getMessage();
// 			include 'output.php';
// 			exit();	
// 		}
// 		foreach ($variable as $key => $value) {
// 			try
// 			{
// 				$sql='insert into `curse`.`invoice_list`
// 					set Inv_index=:index, D_id=:did, quantity=:kol ;';
// 				$s=$pdo->prepare($sql);
// 				$s->bindValue(':index', $index);
// 				$s->bindValue(':did', $_POST['id']);
// 				$s->bindValue(':kol', $kol);
// 				$s->execute();
// 			}	
// 			catch(PDOExeption $e)
// 			{
// 				$output='Ошибка удаления товара'.$e->getMessage();
// 				include 'output.php';
// 				exit();	
// 			}
// 		}
// }
 ?>