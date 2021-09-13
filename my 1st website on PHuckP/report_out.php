<?php session_start();
$login = $_SESSION['G_log'];
$password = $_SESSION['G_pas'];
$role = $_SESSION['G_role']; ?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="HTML/CSS/cw_main.css">
<meta charset="utf-8">
<body>
<div align="center" class="wrapper">
<div align="center" class="content">
<table style="width:100%" id="edit-table">
  <tr>
    <th>Покупатель</th>
    <th>Название детали</th>
    <th>Количество купленных деталей</th>
  </tr>
  <?php
// session_start();
// $login = $_SESSION['G_log'];
// $password = $_SESSION['G_pas'];
// $role = $_SESSION['G_role'];

  include "dbconnect.php";
//if(isset($_SESSION['send'])){
$sql = "SELECT name_p, det_p, quantity_p
    FROM `curse`.`monthly_report`
    WHERE datm=:month AND daty=:year;";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':month', $_GET['month']);
$stmt->bindParam(':year', $_GET['year']);
$stmt->execute();

if($stmt->rowcount()!=0)
{
    echo '<a href="http://localhost/dz/index.php">';
    echo "<h2 align=center>Такой отчет уже есть в базе данных:</h2><br>";
    echo '</a>';
} 
else
{
    echo '<a href="http://localhost/dz/index.php">';
  echo "<h2 align=center>Cоздан отчет:</h2><br>";
    echo '</a>';
  $stmt = $pdo->prepare("CALL `curse`.`proc`(:month, :year);");
  $stmt->bindParam(':month', $_GET['month']);
  $stmt->bindParam(':year', $_GET['year']);
  $stmt->execute();
  $stmt = $pdo->query("SELECT name_p, det_p, quantity_p
            FROM `curse`.`monthly_report`
            WHERE datm=$_GET[month] AND daty=$_GET[year]");
  if($stmt->rowcount()==0)
    {
            $output='<a href="http://localhost/dz/index.php">нет данных.go to main page </a>';
            include 'output.php';
      exit();
    }
}
    //$result = $stmt->fetch(PDO::FETCH_ASSOC);

   // foreach($row as $result){
   while ($row = $stmt->fetch()){

        echo '<tr id="edit-tr">' ;
        echo "<th>".$row[0]."</th>" ;
        echo "<th>".$row[1]."</th>" ;
        echo "<th>".$row[2]."</th>" ;
        echo "</tr>" ;
    }
      //  }
    echo '<h5 align=center id="tooltp"> Отчет за '. $_GET['year'].".". $_GET['month']."*";
    ?>
</table>
</div>
<div class="footer">
<br><br>
<p>2017 Еремин А.А.</p>
</div>
</div>
<br><br><br>
<!-- <div id=padding >
    <br><br><br><br>
	    <div class="bottomright">2017 Еремин А.А.</div>
	</div> -->
</body>
</html>
