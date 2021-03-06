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
while($row = $pizzas->fetch_assoc()){
  foreach($row as $paramName => $paramValue){
    $pizzas_array[$i][$paramName] = $paramValue;
  }
  $i++;
}
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Kiui - UI para Pizzarias</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="application/javascript" src="js.js"></script>
    <script type="application/javascript" src="pizzas.js" defer></script>

    <style>
      <button {
        padding: 15px;
        font-size: 12px;
        background: indianred;
        color: #FFF;
        border: none
      }

      .subheading {
        font-style: italic
      }

    </style>
  </head>

  <body style="background-color: #F5EFE6;">
    <section class="grid">
      <div class="wrap">
        <div class="um" style="padding: 1.5em;">
          <div class="card rounded" style="position: relative;">
            <div class="gambis" data-target="tamanhoPizza" data-toggle="modal"></div>
            <div style="display: grid; grid-template-columns: 3em 1fr;">
              <img src="img/pizza-grande.svg" style="width: 48px;">
              <div style="padding-left: 1.5em; align-content: center; display: grid;">
                <p style="font-size: 0.75em;" id="tamanho">Grande<br>35cm<br>8 Fatias</p>
              </div>
            </div>
          </div>
          <div class="card rounded txt-center" id="quantidadeSabores" data-target="numSabores" data-toggle="modal">
            2 Sabores
          </div>
        </div>
      </div>
    </section>

    <section class="grid">
      <div class="wrap">
        <div class="um">

          <div class="tabua">
            <img src="img/tabua.png" class="img-fluid">
            <div id="pizza">
            </div>
          </div>

          <p id="primeiroSabor">
          </p>
          <p id="segundoSabor">
          </p>
          <p id="terceiroSabor">
          </p>
          <p id="quartoSabor">
          </p>
        </div>
      </div>
    </section>
    <section class="grid">
      <div class="wrap">
        <div class="um" style="padding: 1.5em;">
          <div class="card rounded txt-center" id="borda" data-target="tipoBorda" data-toggle="modal">
            Borda Catupiry
          </div>
          <div class="txt-center">
            <a href="checkout.html">
              <h2>Subtotal</h2>
              <button class="btn-primary fluid">
							Comprar
						</button>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- Modais -->
    <div id="tamanhoPizza" class="modal">
      <div class="wrap">
        <div class="um" style="padding: 1.5em;">
          <div class="card rounded" style="position: relative;" onclick="size = 'Media'; $('#tamanho').text(size);">
            <div class="gambis" data-dismiss="modal"></div>
            <div style="display: grid; grid-template-columns: 3em 1fr;">
              <img src="img/pizza-grande.svg" style="width: 48px;">
              <div style="padding-left: 1.5em; align-content: center; display: grid;">
                <p style="font-size: 0.75em;">Grande<br>35cm<br>8 Fatias</p>
              </div>
            </div>
          </div>
          <div class="card rounded" style="position: relative;" onclick="size = 'Grande'; $('#tamanho').text(size);">
            <div class="gambis" data-dismiss="modal"></div>
            <div style="display: grid; grid-template-columns: 3em 1fr;">
              <img src="img/pizza-grande.svg" style="width: 48px;">
              <div style="padding-left: 1.5em; align-content: center; display: grid;">
                <p style="font-size: 0.75em;">Grande<br>35cm<br>8 Fatias</p>
              </div>
            </div>
          </div>
          <div class="card rounded" style="position: relative;" onclick="size = 'Gigante'; $('#tamanho').text(size);">
            <div class="gambis" data-dismiss="modal"></div>
            <div style="display: grid; grid-template-columns: 3em 1fr;">
              <img src="img/pizza-grande.svg" style="width: 48px;">
              <div style="padding-left: 1.5em; align-content: center; display: grid;">
                <p style="font-size: 0.75em;">Grande<br>35cm<br>8 Fatias</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <nav class="nav-inferior">
        <button data-dismiss="modal" class="botao-acao">
				Fechar
			</button>
      </nav>
    </div>

    <div id="numSabores" class="modal">
      <div class="wrap">
        <div class="um" style="padding: 1.5em;">
          <div id="umSabor" class="card rounded" data-dismiss="modal">
            1 Sabor
          </div>
          <div id="doisSabores" class="card rounded" data-dismiss="modal">
            2 Sabores
          </div>
          <div id="tresSabores" class="card rounded" data-dismiss="modal">
            3 Sabores
          </div>
          <div id="quatroSabores" class="card rounded" data-dismiss="modal">
            4 Sabores
          </div>
        </div>
        <nav class="nav-inferior">
          <button data-dismiss="modal" class="botao-acao">
					Fechar
				</button>
        </nav>
      </div>
    </div>
    <div id="cardapio" class="modal">
      <ul class="cardapio">
				<?php
				for($i=0;$i < count($pizzas_array);$i++){
					echo '<li id="'.str_replace(' ', '-', strtolower($pizzas_array[$i]['nome'])).'"><div class="gambis" data-dismiss="modal"></div><div class="descricao">';
					echo '<h2>'.$pizzas_array[$i]['nome'].'</h2><p style="font-size: 0.75em;">';
					foreach($pizza_has_ingredientes_array as $pi){
						if($pi['idpizzas_available'] == $pizzas_array[$i]['idpizzas_available']){
								echo $pi['nome']."; ";
						}
					}
					echo '</p></div><img src="img/pizzas/'.strtolower($pizzas_array[$i]['nome']).'.jpg" class="img-fluid"></li>';
				}
				?>
      </ul>
      <nav class="nav-inferior">
        <button data-dismiss="modal" class="botao-acao">
				Fechar
			</button>
      </nav>
    </div>









    <div id="tipoBorda" class="modal">
      <div class="wrap">
        <div class="um" style="padding: 1.5em;">
          <div id="bordaCaturipy" class="card rounded txt-center" data-dismiss="modal">
            Catupiry
          </div>
          <div class="card rounded txt-center" data-dismiss="modal">
            Cheddar
          </div>
          <div class="card rounded txt-center" data-dismiss="modal">
            Chocolate
          </div>
          <div class="card rounded txt-center" data-dismiss="modal">
            Nenhum
          </div>
        </div>
      </div>
      <nav class="nav-inferior">
        <button data-dismiss="modal" class="botao-acao">
				Fechar
			</button>
      </nav>
    </div>

  </body>

</html>
