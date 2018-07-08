<?php
$con = @mysqli_connect('localhost', 'pizzapizza', 'facapartedesseahto', 'kiuipizza');
// var_dump(run_query('select * from pedido inner join pedido_has_pizza on pedido_has_pizza.pedido_ID = pedido.ID inner join pizza on pizza.id = pedido_has_pizza.pizza_id inner join pizza_has_sabor on pizza_has_sabor.pizza_id = pizza.id inner join sabor on sabor.idsabor = pizza_has_sabor.sabor_idsabor;', $con));

if (isset($_GET['update'])) {
	update($_GET['id'], $_GET['status']);
}

$op = $_GET['op'];
switch ($op) {
case "add_pedido":
	add_pedido($_GET['forma_de_pgto'], $_GET['troco'], $_GET['troco'], 1);
	break;

case "add_pizza":
	add_pizza($_GET['pedido_ID'], $_GET['troco'], $_GET['total'], 1);
	break;

  case "add_pizza":
  	add_pizza($_GET['pedido_ID'], $_GET['troco'], $_GET['total'], 1);
  	break;
  }

  case "add_cliente":
  	add_pizza($_GET['nome'], $_GET['troco'], $_GET['total'], 1);
  	break;
  }
function add_pedido($forma_de_pgto, $troco, $total, $origem){
	global $con;
	$query = "insert into pedido (hora_pedido, total, forma_de_pgto, troco, status, origem)
  values (now(), " . $total . ", " . $forma_de_pgto . ", " . $troco . ", 1, " . $origem . ")";
	run_query($query);
}
function add_pizza($tamanho, $n_de_sabores, $borda){
	$query = "insert into pizza (tamanho, n_de_sabores, borda)
  values (" . $tamanho . ", " . $n_de_sabores . ", " . $borda . ")";
	run_query($query);
}
function add_cliente($nome, $cep, $tel, $endereco, $email){
	$query = "insert into cliente (nome, cep, tel, endereco, email)
  values (" . $nome . ", " . $cep . ", " . $tel . "," . $endereco . "," . $email")";
	run_query($query);
}
function add_bebida($nome, $descricao, $preco){
	$query = "insert into bebida (nome, descricao, preco)
  values (" . $nome . ", " . $descricao . ", " . $preco . ")";
	run_query($query);
}

function add_sabor($nome){
	$query = "insert into sabor (nome)
  values (" . $nome . ")";
	run_query($query);
}

function add_ingrediente($nome){
	$query = "insert into ingrediente (nome)
  values (" . $nome . ")";
	run_query($query);
}

function run_query($query){
	global $con;
	if (!$con) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}

	$request = mysqli_query($con, $query);
	$data = array();
	if (mysqli_num_rows($request)) {
		while ($row = mysqli_fetch_array($request)) {
			$data[] = $row;
		}
	}
	else {
		echo "No data to return";
	}

	return $data;
}

function update($id, $status){
	$query = "update pedido set status =" . $status . " where ID=" . $id;
	run_query($query);
}

function connect()
{
	$con = mysqli_connect('localhost', 'pizzapizza', 'facapartedesseahto', 'kiuipizza');
	if (!$con) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}

	return $con;
}
?>
