<?php 
session_start();
$login = $_SESSION['G_log'];
$password = $_SESSION['G_pas'];
$role = $_SESSION['G_role'];
$kol = $_SESSION['kol'];
$id

	if(isset($_GET['out']))
	{
		$output="До новых втреч";
		include 'output.php';
		exit();
	}
	if(isset($_GET['add']))
	{
		include 'catalog.php';
	}
	include 'dbconnect.php';
	if(isset($_POST['iname']))
	{
		try
		{
			$sql='insert into `curse`.`detail`
					set D_name=:name, D_weight=:weight, D_material=:material, D_quantity=:quantity, D_price=:price ;';
			$s=$pdo->prepare($sql);
			$s->bindValue(':iname', $_POST['iname']);
			$s->bindValue(':imeasure', $_POST['imeasure']);
			$s->bindValue(':iquantity', $_POST['iquantity']);
            $s->bindValue(':idate', $_POST['idate']);
			$s->execute();
		}
		catch(PDOExeption $e)
		{
			$output='Ошибка добавления товара'.$e->getMessage();
			include 'output.php';
			exit();
		}
	}


	if(isset($_GET['delete']))
	{
		// try
		// {
		// 	$sql='DELETE FROM `invoice`.`sources` WHERE item_id=:id;';
		// 	$s=$pdo->prepare($sql);
		// 	$s->bindValue(':id',$_POST['id']);
		// 	$s->execute();
		// }
		// catch(PDOExeption $e)
		// {
		// 	$output='Ошибка удаления товара'.$e->getMessage();
		// 	include 'output.php';
		// 	exit();
		// }
	}

	if(isset($_GET['buy']))
	{
		include 'invoice.php';
		exit();
	}

	$sql="SELECT D_id, D_name, D_weight, D_material, D_price
            FROM `curse`.`detail`";
	try
	{
		$result=$pdo->query($sql);
		$numb=$result->rowcount();
	}
	catch(PDOException $e)
	{
	$output='Ошибка при извлечении базы данных '.$e->getMessage();
	include 'output.php';
	exit();
	}
	$rownumb=$result->rowcount();
	if($rownumb>0)
	$item=$result->fetchAll();
	else
	{
		$output="Товар не найден";
		include 'output.php';
		exit();
	}
	include 'cart_list.php';

 ?>