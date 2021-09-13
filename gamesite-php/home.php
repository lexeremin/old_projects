<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://js.cx/script/jquery.documentReady.js"></script>
    <script src="./js/resizable_featured.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="./addons/bootstrap-social-gh-pages/bootstrap-social.css">
    <link rel="stylesheet" href="./addons/font-awesome-4.7.0/css/font-awesome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/tableview.js"></script>
    
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <?php 
      include "./include/functions.php";
      $main_content = $_GET['main_content'].'.php'; 
    ?>
    <?php get_header($main_content); ?>
    <?php get_main($main_content); ?>
    <?php get_footer();?>
  </body>
</html>