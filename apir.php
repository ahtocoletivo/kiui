<?php
$con = @mysqli_connect('localhost', 'pizzapizza', 'facapartedesseahto', 'kiuipizza');
// var_dump(run_query('select * from pedido inner join pedido_has_pizza on pedido_has_pizza.pedido_ID = pedido.ID inner join pizza on pizza.id = pedido_has_pizza.pizza_id inner join pizza_has_sabor on pizza_has_sabor.pizza_id = pizza.id inner join sabor on sabor.idsabor = pizza_has_sabor.sabor_idsabor;', $con));
if (isset($_GET['update'])) {
	update($_GET['id'], $_GET['status']);
}

$op = $_REQUEST['op'];
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
	case "add_ingrediente":
  	add_ingrediente($_GET['nome']);
  	break;
	case "add_sabor":
		add_sabor($_GET['nome']);
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
		$id_pa = insere_pizza_available($_POST['nome'],$_POST['tipo'],$_POST['custo_gigante'],$_POST['custo_grande'],$_POST['custo_media'],$_POST['custo_pequena'],$_POST['ativa']);
		$id_sabor = add_sabor($_POST['nome']);
		assoc_pizza_available_sabor($id_pa,$id_sabor);
		foreach($_POST as $key => $value) {
			if (strpos($key, 'ingrediente') === 0) {
				assoc_sabor_ingrediente($id_sabor,substr($key,11,strlen($key)));
			}
		}
	break;
	case "deleta_pizza_available":
			pizzas_available_has_sabor($_GET['id']);
			deleta_pizza_available($_GET['id']);
			break;
}
function add_pedido($forma_de_pgto, $troco, $total, $origem){
	global $con;
	$query = "insert into pedido (hora_pedido, total, forma_de_pgto, troco, status, origem)
  values (now(), " . $total . ", " . $forma_de_pgto . ", " . $troco . ", 1, " . $origem . ")";
	echo run_query($query, true);
}

function insere_pizza_available($nome,$tipo, $custo_gigante, $custo_grande, $custo_media, $custo_pequena, $ativa){
	global $con;
	if(strlen($custo_pequena)<1) $custo_pequena = 0;
	$query = "insert into pizzas_available (nome,tipo,custo_gigante,custo_grande,custo_media,custo_pequena,ativo) values ('" . $nome . "', '" .$tipo."'," . $custo_gigante . ", ". $custo_grande . ", ". $custo_media . ", ". $custo_pequena . ", " . $ativa . ")";
	echo $query;
	return run_query($query, true);
}

function assoc_pizza_available_sabor($id_pizza, $id_sabor){
	global $con;
	$query = "insert into pizzas_available_has_sabor (pizzas_available_idpizzas_available, sabor_idsabor) values ('" . $id_pizza . "', " . $id_sabor . ")";
	return run_query($query, true);
}

function assoc_sabor_ingrediente($id_sabor, $id_ingrediente){
	global $con;
	$query = "insert into sabor_has_ingrediente (sabor_idsabor, ingrediente_idingrediente) values (" . $id_sabor . ", " . $id_ingrediente . ")";
	echo $query . "\n";
	return run_query($query, true);
}

function deleta_pizza_available($id){
	global $con;
	$query = "delete from pizzas_available where idpizzas_available = " . $id;
	echo $query;
	echo run_query($query, true);
}

function pizzas_available_has_sabor($id){
	global $con;
	$query = "delete from pizzas_available_has_sabor where pizzas_available_idpizzas_available = " . $id;
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
	$query = "insert into sabor (nome) values ('" . $nome . "')";
	return run_query($query, true);
}

function add_ingrediente($nome){
	$query = "insert into ingrediente (nome) values ('" . $nome . "')";
	echo $query;
	run_query($query, true);
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
