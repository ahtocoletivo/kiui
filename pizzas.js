
// SVG das pizzas

// var umSabor='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 360 360"> <defs> <style>#imgSaborA{clip-path:url(.fillSaborA);}</style> <clipPath class="fillSaborA"> <circle cx="180" cy="180" r="180" transform="translate(0)"/> </clipPath> </defs> <g id="imgSaborA"> <image id="saborA" width="360" height="360" xlink:href="img/pizza.png" data-target="cardapio" data-toggle="modal"/> </g> </svg>';
var umSabor='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 360 360"> <defs> <style>#saborA{clip-path:url(.fillSaborA);}</style> <clipPath class="fillSaborA"> <circle cx="180" cy="180" r="180" transform="translate(0)"/> </clipPath> </defs> <g id="saborA"> <image width="360" height="360" xlink:href="img/pizza.png" data-target="cardapio" data-toggle="modal"/> </g></svg>';
size = 'Grande';
nSabores = '1';
dough = 'Massa Tradicional';
crust = 'Chocolate';

$("#quantidadeSabores").text(nSabores);
$("#tamanho").text(size);
$("#massa").text(dough);
$("#borda").text(crust);

var saborPizza = ["saborA", "saborB", "saborC", "saborD"];

var current = 0;

// Identifica qual fatia foi selecionada

$("#pizza>svg>#saborA").click(function(){
	current = this.id
	alert('Você selecionou o ' + current);
});

$("#pizza>svg>#saborB").click(function(){
	current = this.id
	alert('Você selecionou o ' + current);
});

$("#pizza>svg>#saborC").click(function(){
	current = this.id
	alert('Você selecionou o ' + current);
});

$("#pizza>svg>#saborD").click(function(){
	current = this.id
	alert('Você selecionou o ' + current);
});

// Adiciona sabor do #cardápio na var saboresPizza

$("#cardapio>ul>li").click(function(){
	if (current == "saborA") {
    	saborPizza[0] = this.id;
    	$("#saboresPizza").html(saborPizza[0]);
    	// $('#pizza>svg>defs>pattern>#fillSaborA').attr('xlink:href', this.id.src);
    }
});

// Muda Borda de acordo com a borda selecionada
// $"crust = 'Nenhum';
// 	$('#borda').text(crust);"
// Muda SVG de acordo com o número de sabores da Pizza

$('#pizza').html(doisSabores);

$("#umSabor").click(function(){
	nSabores = '1';
	$('#quantidadeSabores').text(nSabores);
	$('#pizza').html(umSabor);
});

$("#doisSabores").click(function(){
	nSabores = '2';
	$('#quantidadeSabores').text(nSabores);
	$('#pizza').html(doisSabores);
});

$("#tresSabores").click(function(){
	nSabores = '3';
	$('#quantidadeSabores').text(nSabores);
	$('#pizza').html(tresSabores);
});

$("#quatroSabores").click(function(){
	nSabores = '4';
	$('#quantidadeSabores').text(nSabores);
	$('#pizza').html(quatroSabores);
});