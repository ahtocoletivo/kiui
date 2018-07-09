<!DOCTYPE html>
<html>
<?php
$con = @mysqli_connect('localhost', 'pizzapizza', 'facapartedesseahto', 'kiuipizza');
if (!$con) {
    echo "Error: " . mysqli_connect_error();
    exit();
}
$sql  = 'select * from pedido inner join pedido_has_pizza on pedido_has_pizza.pedido_ID = pedido.ID inner join pizza on pizza.id = pedido_has_pizza.pizza_id inner join pizza_has_sabor on pizza_has_sabor.pizza_id = pizza.id inner join sabor on sabor.idsabor = pizza_has_sabor.sabor_idsabor order by pedido.ID ;';
$query  = mysqli_query($con, $sql);
$pedido = array();
while ($row = mysqli_fetch_array($query)){
  $pedido[] = $row;
}
$last_id = 0;
$last_id_pizza = 0;
$n_de_pedidos = count($pedido);
?>
  <head>
  </head>
  <body>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <div id="container">
      <div class="col">
  <?php
  for($i = 1;$i < $n_de_pedidos;$i++){
    if($i != 1 && $last_id != $pedido[$i]['ID']) echo "</table>";
    if($last_id != $pedido[$i]['ID'] && $pedido[$i]['status'] == 1){
      $last_id = $pedido[$i]['ID'];
      ?>
      <table class="card">
        <tr>
          <td class="id">
            <?php echo $pedido[$i]['ID']; ?>
          </td>
          <td class="hora">
            <?php echo substr($pedido[$i]['hora_pedido'],11,5); ?>
          </td>
          <td></td>
          <td></td>
          <td class="concluir">
            <button onclick='
            $.ajax({
              url: "<?php echo "http://pizza.ahto.digital/apir.php?update=1&status=2&id=" . $pedido[$i]['ID'];?>"
            });
            window.location.reload(true);'>
              <i class="material-icons" style="color:#29CCB1; ">
                check
              </i>
              Concluir
            </button>
          </td>
        </tr>
        <tr>
          <td class="item" colspan="2">
            <?php echo $pedido[$i]['pizza_id'] . " " . $pedido[$i]['tamanho']; ?>
          </td>
          <td class="prop">
            <?php
            for($j = 0;$j < $n_de_pedidos;$j++){
              if($pedido[$i]['pizza_id'] == $pedido[$j]['pizza_id'])
                echo "1/".$pedido[$i]['n_de_sabores'] . "<br>";
            }
            ?>
          </td>
          <td class="sabor" colspan="2">
            <?php for($j = 0;$j < $n_de_pedidos;$j++){
              if($pedido[$i]['pizza_id'] == $pedido[$j]['pizza_id'])
                echo $pedido[$j]['nome']."<br>";
              }
              ?>
          </td>
        </tr>
        <tr>
          <td colspan="2"></td>
          <td></td>
          <td class="obs" colspan="2"><?php echo "- Borda de " . $pedido[$i]['borda'] . "<br>";?></td>
        </tr>
      <?php
    }else{
      if($pedido[$i]['status'] == 1){
      ?>

      <tr>
        <td class="item" colspan="2">
          <?php echo $pedido[$i]['pizza_id'] . " " . $pedido[$i]['tamanho']; ?>
        </td>
        <td class="prop">
          <?php
          for($j = 0;$j < $n_de_pedidos;$j++){
            if($pedido[$i]['pizza_id'] == $pedido[$j]['pizza_id'])
              echo "1/".$pedido[$i]['n_de_sabores'] . "<br>";
          }
          ?>
        </td>
        <td class="sabor" colspan="2">
          <?php for($j = 0;$j < $n_de_pedidos;$j++){
            if($pedido[$i]['pizza_id'] == $pedido[$j]['pizza_id'])
              echo $pedido[$j]['nome']."<br>";
            }
            ?>
        </td>
      </tr>
      <tr>
        <td colspan="2"></td>
        <td></td>
        <td class="obs" colspan="2"><?php echo "- Borda de " . $pedido[$i]['borda'] . "<br>";?></td>
      </tr>
  <?php }}} ?>
    </div>
  </body>
  <script type="application/javascript" src="js/jquery.js"></script>
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/cozinha.css" />
  <script>
  $.get("pedidos.php?get-info=1", function(data, status){
       console.log("Data: " + data + "\nStatus: " + status);
   });
  </script>
</html>
