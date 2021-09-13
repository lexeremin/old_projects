<!DOCTYPE html>
<html>

<head>
  <link href="HTML/CSS/cw_main.css"  rel="stylesheet" type="text/css">
	<meta charset="utf-8">
  <!-- <script type=text/javascript src="window.js"></script> -->
	<title>Корзина</title>
</head>

<body>
    <div align="center" class="wrapper">
      <h2>Списков товаров в вашей корзине:</h2>
      <div class="content">
        <a href="?add" id=reset class="btn"><h2>  Вернуться в каталог   </h2></a>
        <div align="right">
          <a href="?out" id=reset class="btn">Выйти из системы</a>
        </div>
        <div class='log'>
        <table style="width:50%" id="edit-table">
           <tr>
            <th>Название детали</th>
            <th>Вес</th>
            <th>Материал</th>
            <th>      </th>
            <th>Количеcтво</th>
            <th>Цена</th>
            </tr>

	          <?php foreach($cart as $carts):?>

        <div class="item-no-active">
	         <form action="?delete" method="post">
             <tr id="edit-tr">

                <th> <?php echo $carts['D_name'];?> </th>
                <th> <?php echo $carts['D_weight'];?> </th>
                <th> <?php echo $carts['D_material'];?> <th>
                <th> <input type="number" name="quantity" min="1"  max= "<?php echo $carts['D_quantity'];?>" value = "<?php echo $_SESSION['kol']; ?>" > </th>
                <th> <?php echo $carts['D_price'];?> <th>


                 <input type="hidden" name="id" value="<?php echo $carts['D_id'];?>" >
                 <th weight: 100%>
		                 <input type="submit" value="Удалить" id="submit" class="btn">
                 </th>
              </tr>
            <!-- <input type="hidden" name="id" value="<?php //echo $items['item_id'];?>">
            <input type="submit" value="Удалить" id="submit" class="btn"> -->
  
	         </form>
          </div>
	<?php endforeach; ?>
    </table>
            <form action="?WTB" method="post">
              <input type="submit" value="Подтвердить" class="btn" id="reset">
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