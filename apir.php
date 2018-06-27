<?php
$con = @mysqli_connect('localhost', 'pizzapizza', 'facapartedesseahto', 'kiuipizza');
if (!$con) {
    echo "Error: " . mysqli_connect_error();
  exit();
}
var_dump(run_query('select * from pedido inner join pedido_has_pizza on pedido_has_pizza.pedido_ID = pedido.ID inner join pizza on pizza.id = pedido_has_pizza.pizza_id inner join pizza_has_sabor on pizza_has_sabor.pizza_id = pizza.id inner join sabor on sabor.idsabor = pizza_has_sabor.sabor_idsabor;', $con));

function run_query($query, $con){
  $request  = mysqli_query($con, $query);
  $data = array();
  while ($row = mysqli_fetch_array($request)){
    $data[] = $row;
  }
  return $data;
}
?>
