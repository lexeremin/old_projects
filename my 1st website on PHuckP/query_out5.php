<?php session_start();
$login = $_SESSION['G_log'];
$password = $_SESSION['G_pas'];
$role = $_SESSION['G_role']; ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="HTML/CSS/cw_main.css">
<meta charset="utf-8">
<head> 
  <title>запрос5</title>
</head>
<body>
  <div align="center" class="wrapper">
<!-- <a href="http://localhost/cw_main.html"> -->
<h2 align=center>Запрос 5</h2>
    <!-- </a> -->
<div class="content"> 
<table style="width:100%" id="edit-table">
  <tr>
    <th>I_date</th>
  </tr>
  <?php
  include "dbconnect.php";
  $sql = "SELECT idate
          FROM `curse`.`dfind`
          WHERE D_Q = (SELECT MAX(D_Q) FROM `curse`.`dfind`)
              AND dname = :dname;" ;
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':dname', $_POST['dname']);
  $stmt->execute();
  if($stmt->rowcount()==0)
{
  echo "Что-то пошло не так, запрос не найден, приноси свои извинения.";
          echo '<a href="http://localhost/cw_main.html">go to main page';
          echo '</a>';
  exit();
}
    //$result = $stmt->fetch(PDO::FETCH_ASSOC);
   // foreach($row as $result){
   while ($row = $stmt->fetch()){

        echo '<tr id="edit-tr">' ;
        echo "<th>".$row[0]."</th>" ;
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
