<?php
	
	session_start();
	$login = $_SESSION['G_log'];
	$password = $_SESSION['G_pas'];
	$role = $_SESSION['G_role'];

	include 'dbconnect.php';

	if(isset($_GET['out'])) {
		$output="<a href='index.php' class='btn'>До новых вcтреч</a>";
		include 'output.php';
		exit();
	}
	if(isset($_GET['change'])) {
		include 'invoice.php';
		exit();
	}

	if(isset($_POST['WTB'])) {

		try
		{
			$sql='insert into `curse`.`customers`
					set C_name=:cname, City=:weight, D_material=:ccd ;';
			$s=$pdo->prepare($sql);
			$s->bindValue(':cname', $_SESSION['cname']);
			$s->bindValue(':city', $_SESSION['city']);
			$s->bindValue(':ccd', $_SESSION['ccd']);
			$s->execute();
		}
		catch(PDOExeption $e)
		{
			$output='Ошибка добавления товара'.$e->getMessage();
			include 'output.php';
			exit();
		}

		try
		{
			$sql="SELECT C_id
            FROM `curse`.`customers`
            WHERE C_name:=cname;";
            $s=$pdo->prepare($sql);
			$s->bindValue(':cname', $_SESSION['cname']);
			$s->execute();
            
		}
		catch(PDOExeption $e)
		{
			$output='Ошибка добавления товара'.$e->getMessage();
			include 'output.php';
			exit();
		}
		$cid = $s->fetch();

		try
		{
			$sql='insert into `curse`.`invoices`
					set Inv_index=:invindex, C_id=:cid;';
			$s=$pdo->prepare($sql);
			$s->bindValue(':invindex', $_SESSION['invindex']);
			$s->bindValue(':cid', $cid);
			
			$s->execute();
		}
		catch(PDOExeption $e)
		{
			$output='Ошибка добавления товара'.$e->getMessage();
			include 'output.php';
			exit();
		}
		foreach($cart as $cartss) {
			try 
			{
				$sql='insert into `curse`.`invoice_list`
					set Inv_index=:invindex, D_id=:d_id, quantity=:quantity;';
				$s=$pdo->prepare($sql);
				$s->bindValue(':invindex', $_SESSION['invindex']);
				//$s->bindValue(':cid', $cid);
				$s->bindValue(':d_id', $cartss['D_id']);
				$s->bindValue(':quantity', $cartss['D_quantity']);
				$s->execute();
			}
			catch(PDOExeption $e)
			{
				$output='Ошибка добавления товара'.$e->getMessage();
				include 'output.php';
				exit();
			}
		}

	}

	try
	{
		$sql="SELECT *
           	FROM `curse`.`detail`";
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

	// if(isset($_REQUEST['ex'])) //пользователь согласился со всем, что в корзине
	// {
	// 	unset($_SESSION['id']);
	// 	unset($_SESSION['kol']);
	// 	unset($_SESSION['price']);
	// 	exit();
	// }

	if(!isset($_SESSION['id'])) //корзина пуста
	{

		$_SESSION['id'] = array(); //инициализация индеекса id
		$_SESSION['kol']= 0; //инициализация количества товаров
		$_SESSION['price']=0;
		//$_SESSION['ids'] = array();
	}
	if(isset($_POST['action']) and $_POST['action'] == 'купить') // если выбран один из товаров и нажата купить
	{
		$_SESSION['kol'] = $_SESSION['kol'] + 1;
		$_SESSION['price'] += $_SESSION['price'] ;
		$_SESSION['id'][] = $_POST['id']; //очередной элемент массива с индексом id это айди, которое пришло из hidden
		//$_SESSION['ids'][] = array( $_POST['id'] , $_POST['kol'] );
		header('location:./catalog.php'); //возвращение в контроллер к самому себе о_О передача управления в начало контроллера, если контроллер index
		exit();
	}
	if(isset($_POST['ation']) and $_POST['action'] == 'очистить корзину')
	{
		unset($_SESSION['id']);
		//unset($_SESSION['ids']);
		unset($_SESSION['kol']);
		unset($_SESSION['price']);
		header('location:./catalog.php');
		exit();
	}
	if(isset($_POST['cart']))
	{
		$cart = array();
		$total = 0;
		foreach($_SESSION['id'] as $id)
		{
			foreach($items as $product)
			{
				if($product['id'] == $id)
				{
					$cart[] = $product;
					break;
				}
			}
		}
		include 'cart_list.php';
		exit();
	} //показать корзину, на основе массива $_SESSION['id'] формируем новый массив с айди, описанием и ценой выбранных товаров
	
	include 'catalog_list.php';
	//}

?>