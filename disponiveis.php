<!DOCTYPE html>
<html>
<?php
$mysqli = new mysqli('localhost', 'pizzapizza', 'facapartedesseahto', 'kiuipizza');

if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

$results = $mysqli->query("select * from pizzas_available")or die($mysqli->error);
?>
  <head>
  </head>
  <body>
    <div id="container">
      <table>
        <tr class="titles">
          <td></td>
          <td>Nome</td>
          <td>Custo - Grande</td>
          <td>Ativa</td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td><input id="nome" type="text" placeholder="Nome"></td>
          <td><input id="custo-grande" type="number" placeholder="Custo - Grande"></td>
          <td>
          </td>
          <td>
            <button onclick="$.ajax({
                        url: 'http://pizza.ahto.digital/apir.php?op=insere_pizza_available&nome=' + $('#nome').val() + '&custo_grande=' + $('#custo-grande').val() + '&ativa=1'
                      });
                      window.location.reload(true);">
                      Ativar
            </button>
          </td>
        </tr>
      <?php
      while($row = $results->fetch_assoc()) {
        if($row["ativo"] == 1){
            print '<tr class="enabled">';
            print '<td><img src="img/'.$row["nome"].'.png"</td>';
            print '<td>'.$row["nome"].'</td>';
            print '<td>'.$row["custo_grande"].'</td>';
            print '<td>Habilitada</td>';
            print '<td><button onclick="
                        $.ajax({
                          url: \'http://pizza.ahto.digital/apir.php?op=desativa_pizza&id=' . $row['idpizzas_available'] .'\'
                        });
                        window.location.reload(true);">Desativar</button>
                  </td>';
                  print '<td><button>Desabilite primeiro</button>
                        </td>';
            }else{
              print '<tr class="enabled">';
              print '<td></td>';
              print '<td>'.$row["nome"].'</td>';
              print '<td>'.$row["custo_grande"].'</td>';
              print '<td>Desabilitada</td>';
              print '<td><button onclick="
                          $.ajax({
                            url: \'http://pizza.ahto.digital/apir.php?op=ativa_pizza&id=' . $row['idpizzas_available'] .'\'
                          });
                          window.location.reload(true);">Ativar</button>
                    </td>';
              print '<td><button onclick="
                                  swal(\'Você está certo disso?\', {
                                    buttons: [\'Cancelar\', \'Sim\'],icon: \'error\'
                                  }).then(function (result) {
                                    if(result){
                                      $.ajax({
                                        url: \'http://pizza.ahto.digital/apir.php?op=deleta_pizza_available&id=' . $row['idpizzas_available'] .'\'
                                      });
                                      swal(\'Pizza deletada!\', \'\', \'success\').then(function (result) {
                                      window.location.reload(true);
                                    });
                                    }
                                   });">Apagar</button>
                    </td>';
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
