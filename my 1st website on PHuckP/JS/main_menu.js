(function() {
  document.addEventListener('DOMContentLoaded',function(){
<?php start_session();
$role = json_encode($_SESSION['G_role']); ?>
  var user = <?php $role ?>;

  if (user == 1) {
    $(document).ready(function() {
      $("input.editing").click(function() {
        $("input").remove(".editing");
        alert("Этот элемент был скрыт, т.к у вас нет доступа к нему.");
      });
    });
  }

  if (user == 3) {
    $(document).ready(function() {
      $("input.reports").click(function() {
        $("input").remove(".reports");
        alert("У вас нет доступа к отчетам.");
      });
    });
  }
});

 })();

 //var getdata = "<?php echo json_encode($_SESSION['G_role'];)";
//  var user = JSON.parse(getdata);
 // // alert(user);
 // ajax(function(data){
 //   sessionData = JSON.parse(data);
 // });
