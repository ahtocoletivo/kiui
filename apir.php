<?php
$con = @mysqli_connect('localhost', 'pizzapizza', 'facapartedesseahto', 'kiuipizza');
// var_dump(run_query('select * from pedido inner join pedido_has_pizza on pedido_has_pizza.pedido_ID = pedido.ID inner join pizza on pizza.id = pedido_has_pizza.pizza_id inner join pizza_has_sabor on pizza_has_sabor.pizza_id = pizza.id inner join sabor on sabor.idsabor = pizza_has_sabor.sabor_idsabor;', $con));
if (isset($_GET['update'])) {
	update($_GET['id'], $_GET['status']);
}

$op = $_GET['op'];
switch ($op) {
	case "add_pedido":
		add_pedido($_GET['forma_de_pgto'], $_GET['troco'], $_GET['total'], 1);
		break;
	case "add_pizza":
		add_pizza($_GET['tamanho'], $_GET['n_de_sabores'], $_GET['borda'], 1);
		break;
	case "add_cliente":
  	add_pizza($_GET['nome'], $_GET['troco'], $_GET['total'], 1);
  	break;
	case "assoc_pedido_pizza":
		assoc_pedido_pizza($_GET['pedido'], $_GET['pizza']);
		break;
	case "ativa_pizza":
			ativa_pizza($_GET['id']);
			break;
	case "desativa_pizza":
			desativa_pizza($_GET['id']);
			break;
	case "insere_pizza_available":
			insere_pizza_available($_GET['nome'],$_GET['custo_grande'],$_GET['ativa']);
			break;
	case "deleta_pizza_available":
			deleta_pizza_available($_GET['id']);
			break;
}
function add_pedido($forma_de_pgto, $troco, $total, $origem){
	global $con;
	$query = "insert into pedido (hora_pedido, total, forma_de_pgto, troco, status, origem)
  values (now(), " . $total . ", " . $forma_de_pgto . ", " . $troco . ", 1, " . $origem . ")";
	echo run_query($query, true);
}

function insere_pizza_available($nome, $custo_grande, $ativa){
	global $con;
	$query = "insert into pizzas_available (nome,custo_grande,ativo) values ('" . $nome . "', " . $custo_grande . ", " . $ativa . ")";
	echo run_query($query, true);
}

function deleta_pizza_available($id){
	global $con;
	$query = "delete from pizzas_available where idpizzas_available = " . $id;
	echo $query;
	echo run_query($query, true);
}

function ativa_pizza($id){
	global $con;
	$query = "update pizzas_available set ativo = 1 where idpizzas_available = " . $id;
	echo run_query($query, true);
}

function desativa_pizza($id){
	global $con;
	$query = "update pizzas_available set ativo = 0 where idpizzas_available = " . $id;
	echo run_query($query, true);
}

function assoc_pedido_pizza($pedido, $pizza){
	global $con;
	$query = "insert into pedido_has_pizza (pedido_ID, pizza_id) values (" . $pedido . ", " . $pizza . ")";
	echo run_query($query, true);
}

function add_pizza($tamanho, $n_de_sabores, $borda){
	$query = "insert into pizza (tamanho, n_de_sabores, borda)
  values (" . $tamanho . ", " . $n_de_sabores . ", " . $borda . ")";
	echo run_query($query, true);
}
function add_cliente($nome, $cep, $tel, $endereco, $email){
	$query = "insert into cliente (nome, cep, tel, endereco, email)
  values (" . $nome . ", " . $cep . ", " . $tel . "," . $endereco . "," . $email . ")";
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

function run_query($query, $insert = false){
	global $con;
	if (!$con) {
		echo "Error: " . mysqli_connect_error();
		exit();
	}
	$request = mysqli_query($con, $query);
	if(!$insert){
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
	}else{
		return mysqli_insert_id($con);
	}
}

function update($id, $status){
	$query = "update pedido set status =" . $status . " where ID=" . $id;
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
