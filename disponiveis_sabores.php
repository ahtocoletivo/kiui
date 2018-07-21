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
$pizza_has_ingredientes = $mysqli->query("select * from pizzas_available inner join pizzas_available_has_sabor on pizzas_available.idpizzas_available = pizzas_available_has_sabor.pizzas_available_idpizzas_available inner join sabor on sabor.idsabor = pizzas_available_has_sabor.sabor_idsabor")or die($mysqli->error);
$ingredientes = $mysqli->query("select * from ingrediente")or die($mysqli->error);

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
$i=0;
while($row = $pizzas_array->fetch_assoc()){
  foreach($row as $paramName => $paramValue){
    $pizzas_array[$i][$paramName] = $paramValue;
  }
  $i++;
}
?>
  <head>
  </head>
  <body>
    <table>
      <?php
      $i=0;
      $id;
      while($row = $pizzas->fetch_assoc()) {
        echo "<tr>";
        if($i==0){
          foreach($row as $paramName => $paramValue){
            echo "<td>".$paramName."</td>";
          }
          echo "<td>Ingredientes</td></tr><tr>";
        }
        foreach($row as $paramName => $paramValue){
          $pizzas_array[$i][$paramName] = $paramValue;
          echo "<td>".$paramValue."</td>";
        }
        echo "<td>";
        foreach($pizza_has_ingredientes_array as $pi){
          if($pi['idpizzas_available'] == $row['idpizzas_available'])
            echo $pi['nome'].", ";
        }
        echo "</td>";
        echo "</tr>";
        $i++;
      }
      ?>
    </table>
    <div id="container" style="">
      <table>
        <tr>
          <form id="add_pizza" enctype="multipart/form-data">
            <input type="hidden" name="op" id="op" value="insere_pizza_available">
            <input type="hidden" name="ativa" id="ativa" value="1">
            <td><input type="file" id="pic" name="pic" accept="image/*"></td>
            <td><input id="nome" type="text" name="nome" placeholder="Nome"></td>
            <td>
                <?php foreach($ingredientes as $pi){
                    echo "<input type='checkbox' name='sabor".$pi['idingrediente']."' value='".$pi['nome']."'>".$pi['nome']."</input>";
                  }
                ?>
            </td>
            <td><input id="custo_gigante" type="number" name="custo_gigante" placeholder="Custo - Gigante"></td>
            <td><input id="custo_grande" type="number" name="custo_grande" placeholder="Custo - Grande"></td>
            <td><input id="custo_media" type="number" name="custo_media" placeholder="Custo - Média"></td>
            <td><input id="custo_pequena" type="number" name="custo_pequena" placeholder="Custo - Pequena"></td>
            <td>
              <progress></progress>
            </td>
            <td>
              <button onclick='var form =$("#add_pizza").serialize();
                                console.log(form);
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
    </table>
    </div>
  </body>
  <script type="application/javascript" src="js/jquery.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/disponiveasdis.css" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</html>
