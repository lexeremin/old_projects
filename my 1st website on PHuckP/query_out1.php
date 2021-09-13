<?php session_start();
$login = $_SESSION['G_log'];
$password = $_SESSION['G_pas'];
$role = $_SESSION['G_role']; ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="HTML/CSS/cw_main.css">
<meta charset="utf-8">
<head> 
  <title>запрос1</title>
</head>
<body>
  <div align="center" class="wrapper">
<!-- <a href="http://localhost/cw_main.html"> -->
    <h2 align=center>Запрос 1</h2>
<!-- </a> -->
<div class="content">
<table style="width:100%" id="edit-table">
  <tr>
    <th>C_name</th>
    <th>D_id</th>
    <th>quantity</th>
    <th>price</th>
  </tr>
  <?php
  include "dbconnect.php";
  $sql = "SELECT C_name, D_id, Quantity, Total_price
          FROM `curse`.`customers` JOIN `curse`.`invoice` USING(I_id) JOIN                               `curse`.`string_of_invoice` USING(I_id) JOIN `curse`.`detail` USING(D_id)
          WHERE YEAR(CCD)=:year AND MONTH(CCD)=:month;" ;
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':month', $_GET['month']);
  $stmt->bindParam(':year', $_GET['year']);
  $stmt->execute();
  if($stmt->rowcount()==0)
{
  echo "Неверная дата, возможно это где-то в будущем или там где нас еще не было.";
          echo '<a href="http://localhost/cw_main.html">go to main page';
          echo '</a>';
  exit();
}
    //$result = $stmt->fetch(PDO::FETCH_ASSOC);
   // foreach($row as $result){
   foreach ($stmt as $row) {
        echo '<tr id="edit-tr">';
        echo "<th>".$row['C_name']."</th>" ;
        echo "<th>".$row['D_id']."</th>" ;
        echo "<th>".$row['Quantity']."</th>" ;
        echo "<th>".$row['Total_price']."</th>" ;
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
