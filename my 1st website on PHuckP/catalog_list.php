<!DOCTYPE html>
<html>

<head>
  <link href="HTML/CSS/cw_main.css"  rel="stylesheet" type="text/css">
	<meta charset="utf-8">
	<title>Каталог</title>
</head>

<body>
    <div align="center" class="wrapper">
      <h2>Списков всех товаров:</h2>
      <div class="content">
        <form action="?change" method="post">
         <input type="submit" name="change" value=" Редактировать накладную " id="reset" class="btn">
       </form> 
       <div align="right"> 
       <form action="?clean" method="post">
         <input type="submit" name="clean" value="очистить корзину" id="reset" class="btn">
       </form>
       <form action="?cart" method="post">
         <input type="submit" name="cart" value="Корзина" id="reset">
       </form>
       
<!--       <a href="?cart" id=reset><h2>  Корзина  <?php //echo count($_SESSION['id']); ?> </h2></a> -->
        
          <a href="?out" method="get" id=reset class="btn">Выйти из системы</a>
        </div>
    <div class='log'>
      <table style="width:50%" id="edit-table">
        <tr>
          <th>Название детали</th>
          <th>Вес</th>
          <th>Материал</th>
          <th>      </th>
          <th>Количеcтво товара в наличии</th>
          <th>Цена</th>
        </tr>

	      <?php foreach($item as $items):?>

        <div class="item-no-active">
	         <form action="?action" method="post">
             <tr id="edit-tr">


                <th> <?php echo $items['D_name'];?> </th>
                <th> <?php echo $items['D_weight'];?> </th>
                <th> <?php echo $items['D_material'];?> <th>
                <th> <?php echo $items['D_quantity'];?> </th>
                <th> <?php echo $items['D_price'];?> <th>


                 <input type="hidden" name="id" value="<?php echo $items['D_id'];?>" >
                 <th weight: 100%>
                    <input type="number" name="kol" min="1" max= "<?php echo $items['D_quantity'];?>" id="login" >
		                <input type="submit" value="купить" id="submit" name="action"> 
                 </th>
            </tr>
            <!-- <input type="hidden" name="id" value="<?php //echo $items['item_id'];?>">
            <input type="submit" value="Удалить" id="submit" class="btn"> -->

	         </form>
          </div>
	<?php endforeach; ?>
    </table>

            </div>
          </div>
<!--
    <br><br>

		<a href="?out" id=reset>Выйти из системы</a>
-->
<div class="footer">
  <br><br>
  <p>2017 Еремин А.А.</p>
</div>
	</div>
     <!-- <script type=text/javascript src="main.js"></script> -->
     <script type=text/javascript src="window.js"></script>
</body>
</html>
