<?php session_start();
$login = $_SESSION['G_log'];
$password = $_SESSION['G_pas'];
$role = $_SESSION['G_role']; ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="HTML/CSS/cw_main.css">
<meta charset="utf-8">
<head> 
  <title>запрос2</title>
</head>
<body>
  <div align="center" class="wrapper">
<!-- <a href="http://localhost/cw_main.html"> -->
<h2 align=center>Запрос 2</h2>
    <!-- </a> -->
<table style="width:100%" id="edit-table">
  <tr>
    <th>D_id</th>
    <th>D_name</th>
    <th>D_weight</th>
    <th>D_material</th>
    <th>D-quantity</th>
    <th>D_price</th>
  </tr>
  <?php
  include "dbconnect.php";
  $sql = "Select `curse`.`detail`.*
          FROM `curse`.`detail` LEFT JOIN (SELECT* FROM `curse`.`sale_history`
                  WHERE YEAR(Sale_date)=:year AND MONTH(Sale_date)=:month) D USING(D_id)
          WHERE Sh_id is NULL ;" ;
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':month', $_GET['month']);
  $stmt->bindParam(':year', $_GET['year']);
  $stmt->execute();
  if($stmt->rowcount()==0)
{
  echo "Возможно в этом месяце продавались все дедали доступные в ассортименте, попробуйте снова.";
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
        echo "<th>".$row[2]."</th>" ;
        echo "<th>".$row[3]."</th>" ;
        echo "<th>".$row[4]."</th>" ;
        echo "<th>".$row[5]."</th>" ;
        echo "</tr>" ;
    }
      //  }
    ?>
</table>
</div>
<br><br><br>
<div id=padding >
    <br><br><br><br>
	    <div class="bottomright">2017 Еремин А.А.</div>
	</div>
</body>
</html>
