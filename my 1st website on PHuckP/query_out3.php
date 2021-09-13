<?php session_start();
$login = $_SESSION['G_log'];
$password = $_SESSION['G_pas'];
$role = $_SESSION['G_role']; ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="HTML/CSS/cw_main.css">
<meta charset="utf-8">
<head> 
  <title>запрос3</title>
</head>
<body>
  <div align="center" class="wrapper">
<!-- <a href="http://localhost/cw_main.html"> -->
<h2 align=center>Запрос 3</h2>
    <!-- </a> -->
 <div class="content">    
<table style="width:100%" id="edit-table">
  <tr>
      <th>C_id</th>
    <th>C_name</th>
    <th>City</th>
    <th>CCD</th>
      <th>I_id</th>
  </tr>
  <?php
  include "dbconnect.php";
  $sql = "SELECT *
          FROM `curse`.`customers`
          WHERE CCD=(SELECT MAX(CCD) FROM `curse`.`customers`);" ;
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  if($stmt->rowcount()==0)
{
  echo "Что-то пошло не так, мы не можем показать вам посленего покупателя, приносим свои извенения.";
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
