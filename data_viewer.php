<!DOCTYPE html>
<html>
<?php
$con = @mysqli_connect('localhost', 'pizzapizza', 'facapartedesseahto', 'kiuipizza');
if (!$con) {
    echo "Error: " . mysqli_connect_error();
  exit();
}
$sql  = 'select * from pedido inner join pedido_has_pizza on pedido_has_pizza.pedido_ID = pedido.ID inner join pizza on pizza.id = pedido_has_pizza.pizza_id inner join pizza_has_sabor on pizza_has_sabor.pizza_id = pizza.id inner join sabor on sabor.idsabor = pizza_has_sabor.sabor_idsabor;';
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
    <div class="col">
<?php
for($i = 1;$i < $n_de_pedidos;$i++){?>
     </table>
     <?php
  if($last_id != $pedido[$i]['ID']){ ?>
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
        <td class="concluir"> <button>
            <i class="material-icons" style="color:#29CCB1; ">
              check
            </i>
            Concluir
          </button>
        </td>
      </tr>
      <tr>
        <td class="item" colspan="2">
          <?php echo $pedido[$i]['pizza_id']." ".$pedido[$i]['pizza_id']; ?>
        </td>
        <td class="prop">
          <?php
          for($j = 0;$j < $n_de_pedidos;$j++){
            if($pedido[$i]['pizza_id'] == $pedido[$j]['pizza_id'])
              echo "1/".$pedido[$i]['n_de_sabores'] . "<br>";
          }
          ?>
        </td>
        <td class="sabor">
          <?php for($j = 0;$j < $n_de_pedidos;$j++){
            if($pedido[$i]['pizza_id'] == $pedido[$j]['pizza_id'])
              echo $pedido[$j]['nome']."<br>";
            }
            ?>
        </td>
      </tr>
    <?php
  }else{ ?>
    <tr>
      <td class="item" colspan="2">
        <?php echo $pedido[$i]['pizza_id']." ".$pedido[$i]['pizza_id']; ?>
      </td>
      <td class="prop">
        <?php
        for($j = 0;$j < $n_de_pedidos;$j++){
          if($pedido[$i]['pizza_id'] == $pedido[$j]['pizza_id'])
            echo "1/".$pedido[$i]['n_de_sabores'] . "<br>";
        }
        ?>
      </td>
      <td class="sabor">
        <?php for($j = 0;$j < $n_de_pedidos;$j++){
          if($pedido[$i]['pizza_id'] == $pedido[$j]['pizza_id'])
            echo $pedido[$j]['nome']."<br>";
          }
          ?>
      </td>
    </tr>
<?php }} ?>
  </body>
  <style>
  body {
    background-color: #000;
    color: #c92;
  }
  </style>
    <link rel="stylesheet" href="css/cozinha.css" />
</html>
