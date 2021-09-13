<?php session_start();
$login = $_SESSION['G_log'];
$password = $_SESSION['G_pas'];
$role = $_SESSION['G_role']; ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="HTML/CSS/cw_main.css">
<meta charset="utf-8">
<head> 
  <title>запрос6</title>
</head>
<body>
  <div align="center" class="wrapper">
<!-- <a href="http://localhost/cw_main.html"> -->
<h2 align=center>Запрос 6</h2>
    <!-- </a> -->
 <div class="content">    
<table style="width:100%" id="edit-table">
  <tr>
    <th>Название детали</th>
    <th>Количество купленных деталей</th>
  </tr>
  <?php
  include "dbconnect.php";
  $sql = "SELECT D_name, Quantity
          FROM `curse`.`customers` JOIN `curse`.`invoice` USING(I_id) JOIN `curse`.`string_of_invoice` USING(I_id) JOIN `curse`.`detail` USING(D_id)
          WHERE C_name=:customer AND YEAR(I_date) = 2017
          GROUP BY(D_name);" ;
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':customer', $_POST['customer']);
  $stmt->execute();
  if($stmt->rowcount()==0)
{
  echo "Такого покупателя не существует или он не совершал покупки в этом году.";
          echo '<a href="http://localhost/cw_main.html">go to main page';
          echo '</a>';
  exit();
}
    //$result = $stmt->fetch(PDO::FETCH_ASSOC);
   // foreach($row as $result){
   while ($row = $stmt->fetch()){

        echo '<tr id="edit-tr">' ;
        echo "<th>".$row[0]."</th>" ;
        echo "<th>".$row[1]."</th>" ;
        echo "</tr>" ;
    }
      //  }
    ?>
</table>
</div>
<div class="footer">
  <br><br>
  <p>2017 Еремин А.А.</p>
</div>
</div>
<!-- <br><br><br>
<div id=padding >
    <br><br><br><br>
	    <div class="bottomright">2017 Еремин А.А.</div>
	</div> -->
</body>
</html>
