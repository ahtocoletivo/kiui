<?php
$con = @mysqli_connect('localhost', 'pizzapizza', 'facapartedesseahto', 'kiuipizza');
//var_dump(run_query('select * from pedido inner join pedido_has_pizza on pedido_has_pizza.pedido_ID = pedido.ID inner join pizza on pizza.id = pedido_has_pizza.pizza_id inner join pizza_has_sabor on pizza_has_sabor.pizza_id = pizza.id inner join sabor on sabor.idsabor = pizza_has_sabor.sabor_idsabor;', $con));
if(isset($_GET['update'])){
  update($_GET['id'], $_GET['status']);
}

$op = $_GET['op'];
switch ($op){
    case "add_pedido":
        add_pedido($_GET['forma_de_pgto'],$_GET['troco'], 45, 1);
        break;
}

function add_pedido($forma_de_pgto, $troco, $total, $origem){
  global $con;
  $query = "insert into pedido (hora_pedido, total, forma_de_pgto, troco, status, origem)
  values (now(), ". $total . ", ". $forma_de_pgto . ", ". $troco . ", 1, ". $origem . ")";
  run_query($query);
  echo mysqli_insert_id($con);
}

function add_pizza($pedido_ID, $troco, $total, $origem){
  $query = "insert into pedido (hora_pedido, total, forma_de_pgto, troco, status, origem)
  values (now(), ". $total . ", ". $forma_de_pgto . ", ". $troco . ", 1, ". $origem . ")";
  run_query($query);
}


function run_query($query){
  global $con;
  if (!$con) {
      echo "Error: " . mysqli_connect_error();
    exit();
  }
  $request  = mysqli_query($con, $query);
  $data = array();
  if(mysqli_num_rows($request)) {
    while ($row = mysqli_fetch_array($request)){
      $data[] = $row;
    }
  }else{
    echo "No data to return";
  }
  return $data;
}

function update($id, $status){
  $query =  "update pedido set status =" . $status ." where ID=" . $id;
  run_query($query);
}

function connect(){
  $con = mysqli_connect('localhost', 'pizzapizza', 'facapartedesseahto', 'kiuipizza');
  if (!$con) {
      echo "Error: " . mysqli_connect_error();
    exit();
  }
  return $con;
}
?>
