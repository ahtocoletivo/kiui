<!DOCTYPE html>
<html>
<?php
$mysqli = new mysqli('localhost', 'pizzapizza', 'facapartedesseahto', 'kiuipizza');

if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}
$pizzas_array = array();
$pizza_has_ingredientes_array = array();
$ingredientes_array = array();
$pizzas = $mysqli->query("select * from pizzas_available")or die($mysqli->error);
$pizza_has_ingredientes = $mysqli->query("select * from pizzas_available inner join pizzas_available_has_sabor on pizzas_available.idpizzas_available = pizzas_available_has_sabor.pizzas_available_idpizzas_available inner join sabor on sabor.idsabor = pizzas_available_has_sabor.sabor_idsabor inner join sabor_has_ingrediente on sabor_has_ingrediente.sabor_idsabor = sabor.idsabor inner join ingrediente on ingrediente.idingrediente = sabor_has_ingrediente.ingrediente_idingrediente")or die($mysqli->error);
$ingredientes = $mysqli->query("select * from ingrediente order by nome")or die($mysqli->error);
$i=0;
while($row = $pizza_has_ingredientes->fetch_assoc()){
  foreach($row as $paramName => $paramValue){
    $pizza_has_ingredientes_array[$i][$paramName] = $paramValue;
  }
  $i++;
}
$i=0;
while($row = $ingredientes->fetch_assoc()){
  foreach($row as $paramName => $paramValue){
    $ingredientes_array[$i][$paramName] = $paramValue;
  }
  $i++;
}

$results = $mysqli->query("select * from pizzas_available")or die($mysqli->error);
?>
  <head>
  </head>
  <body>
    <div id="container">
      <table>
        <tr class="titles">
          <td>Image</td>
          <td>Nome</td>
          <td>Tipo</td>
          <td>Ingredientes</td>
          <td>Custo - Gigante</td>
          <td>Custo - Grande</td>
          <td>Custo - Media</td>
          <td>Custo - Pequena</td>
          <td>Ativa</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <form id="add_pizza" enctype="multipart/form-data">
            <input type="hidden" name="op" id="op" value="insere_pizza_available">
            <input type="hidden" name="ativa" id="ativa" value="1">
            <td><input type="file" id="pic" name="pic" accept="image/*"></td>
            <td><input id="nome" type="text" name="nome" placeholder="Nome"></td>
            <td><input id="tipo" type="text" name="tipo" placeholder="Tipo"></td>
            <td id="ingredientes">
              <?php foreach($ingredientes as $pi){
                echo "<input type='checkbox' name='ingrediente".$pi['idingrediente']."' value='".$pi['nome']."'>".$pi['nome']."</input><br>";
              }
            ?></td>
            <td><input id="custo_gigante" type="number" name="custo_gigante" placeholder="Custo - Gigante"></td>
            <td><input id="custo_grande" type="number" name="custo_grande" placeholder="Custo - Grande"></td>
            <td><input id="custo_media" type="number" name="custo_media" placeholder="Custo - Média"></td>
            <td><input id="custo_pequena" type="number" name="custo_pequena" placeholder="Custo - Pequena"></td>
            <td>
              <progress></progress>
            </td>
            <td>
              <button onclick='var form =$("#add_pizza").serialize();
                              var settings = {
                                "async": true,
                                "crossDomain": true,
                                "url": "http://pizza.ahto.digital/apir.php",
                                "method": "POST",
                                "headers": {
                                  "Content-Type": "application/x-www-form-urlencoded",
                                  "Cache-Control": "no-cache"
                                },
                                "processData": false,
                                "contentType": false,
                                "mimeType": "multipart/form-data",
                                "data": form
                              }

                              $.ajax(settings).done(function (response) {
                                console.log(response);
                              });
                            '>
                        Adicionar
              </button>
            </td>
          </form>
        </tr>
      <?php
      while($row = $results->fetch_assoc()) {
            print '<tr class="enabled">';
            print '<td><img src="img/pizzas/'.strtolower($row["nome"]).'.jpg"</td>';
            print '<td>'.$row["idpizzas_available"]. " - ".$row["nome"].'</td>';
            print '<td>'.$row["tipo"].'</td>';
            print '<td>';
            $i = 1;
            foreach($pizza_has_ingredientes_array as $pi){
              if($pi['idpizzas_available'] == $row['idpizzas_available']){
                  echo $pi['nome']."; ";
              }
            }
            print '</td>';
            print '<td>R$'.$row["custo_gigante"].'</td>';
            print '<td>R$'.$row["custo_grande"].'</td>';
            print '<td>R$'.$row["custo_media"].'</td>';
            print '<td>R$'.$row["custo_pequena"].'</td>';
            if($row["ativo"] == 1){
              print '<td>Habilitada</td>';
              print '<td><button onclick="$.ajax({url: \'http://pizza.ahto.digital/apir.php?op=desativa_pizza&id=' . $row['idpizzas_available'] .'\'});window.location.reload(true);">Desativar</button></td>';
              print '<td><button>Desabilite primeiro</button></td>';
            }else{
              print '<td>Desabilitada</td>';
              print '<td><button onclick="$.ajax({url: \'http://pizza.ahto.digital/apir.php?op=ativa_pizza&id=' . $row['idpizzas_available'] .'\'});window.location.reload(true);">Ativar</button></td>';
              print '<td><button onclick="swal(\'Você está certo disso?\', {buttons: [\'Cancelar\', \'Sim\'],icon: \'error\'}).then(function (result) {if(result){$.ajax({url: \'http://pizza.ahto.digital/apir.php?op=deleta_pizza_available&id=' . $row['idpizzas_available'] .'\'});                                      swal(\'Pizza deletada!\', \'\', \'success\').then(function (result) {window.location.reload(true);});} });">Apagar</button></td>';
            }
            print '</tr>';
      } ?>

    </table>
    </div>
  </body>
  <script type="application/javascript" src="js/jquery.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/disponiveis.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</html>
