
$( document ).ready(function() {

// var umSabor='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 360 360"> <defs> <style>#imgSaborA{clip-path:url(.fillSaborA);}</style> <clipPath class="fillSaborA"> <circle cx="180" cy="180" r="180" transform="translate(0)"/> </clipPath> </defs> <g id="imgSaborA"> <image id="saborA" width="360" height="360" xlink:href="img/pizza.png" data-target="cardapio" data-toggle="modal"/> </g> </svg>';
var umSabor='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 360 360"> <defs> <style>#saborA{clip-path:url(.fillSaborA);}</style> <clipPath class="fillSaborA"> <circle cx="180" cy="180" r="180" transform="translate(0)"/> </clipPath> </defs> <g id="saborA"> <image width="360" height="360" xlink:href="img/pizza.png" data-target="cardapio" data-toggle="modal"/> </g></svg>';
var size = 'Grande';
var nSabores = '1';
var dough = 'Massa Tradicional';
var crust = 'Chocolate';
// SVG das pizzas
$("#quantidadeSabores").text(nSabores);
$("#tamanho").text(size);
$("#massa").text(dough);
$("#borda").text(crust);

var saborPizza = ["saborA", "saborB", "saborC", "saborD"];

var current = 0;

// Adiciona sabor do #cardápio na var saboresPizza

$("#cardapio>ul>li").click(function(){
	if (current == "saborA") {
    	saborPizza[0] = this.id;
			console.log($(this).children("img").attr('src'));
    	$("#saboresPizza").html(saborPizza[0]);
    	alert('Você selecionou o sabor ' + saborPizza[0]);
    	$("#pizza>svg>#saborA>image").attr('xlink:href', this.id.src);
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
	$("#pizza>svg>[id^='sabor']").click(function(){
		current = this.id;console.log('oi');
		alert('Você selecionou o ' + current);
	});
});

$("#doisSabores").click(function(){
	nSabores = '2';
	$('#quantidadeSabores').text(nSabores);
	$('#pizza').html(doisSabores);
	$("#pizza>svg>[id^='sabor']").click(function(){// Identifica qual fatia foi selecionada
		current = this.id;console.log('oi');
		alert('Você selecionou o ' + current);
	});
});

$("#tresSabores").click(function(){
	nSabores = '3';
	$('#quantidadeSabores').text(nSabores);
	$('#pizza').html(tresSabores);
	$("#pizza>svg>[id^='sabor']").click(function(){// Identifica qual fatia foi selecionada
		current = this.id;console.log('oi');
		alert('Você selecionou o ' + current);
	});
});

$("#quatroSabores").click(function(){
	nSabores = '4';
	$('#quantidadeSabores').text(nSabores);
	$('#pizza').html(quatroSabores);
	$("#pizza>svg>[id^='sabor']").click(function(){// Identifica qual fatia foi selecionada
		current = this.id;console.log('oi');
		alert('Você selecionou o ' + current);
	});
});
});
