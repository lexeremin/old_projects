<?php
session_start();
	$login = $_SESSION['G_log'];
	$password = $_SESSION['G_pas'];
	$role = $_SESSION['G_role'];

	if(isset($_GET['out']))
	{
		$output="<a href='index.php' class='btn'>До новых вcтреч</a>";
		include 'output.php';
		exit();
	}
	if(isset($_GET['adds']))
	{
		include 'HTML/insert_items.html';
		exit();
	}
	include 'dbconnect.php';
	if(isset($_POST['name']))
	{
		try
		{
			$sql='insert into `curse`.`detail`
					set D_name=:name, D_weight=:weight, D_material=:material, D_quantity=:quantity, D_price=:dprice ;';
			$s=$pdo->prepare($sql);
			$s->bindValue(':name', $_POST['name']);
			$s->bindValue(':weight', $_POST['weight']);
			$s->bindValue(':material', $_POST['material']);
			$s->bindValue(':quantity', $_POST['quantity']);
            $s->bindValue(':dprice', $_POST['dprice']);
			$s->execute();
		}
		catch(PDOExeption $e)
		{
			$output='Ошибка добавления товара'.$e->getMessage();
			include 'output.php';
			exit();
		}
	}


	if(isset($_POST['delete']))
	{
		try
		{
			$sql='DELETE FROM `curse`.`detail` WHERE D_id=:id;';
			$s=$pdo->prepare($sql);
			$s->bindValue(':id',$_POST['id']);
			$s->execute();
		}
		catch(PDOExeption $e)
		{
			$output='Ошибка удаления товара'.$e->getMessage();
			include 'output.php';
			exit();
		}
	}

	$sql="SELECT *
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
	include 'edit_items.php';
?>
