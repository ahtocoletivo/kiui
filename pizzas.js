
$( document ).ready(function() {


var umSabor='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 360 360"> <defs> <style>#saborA{clip-path:url(.fillSaborA);}</style> <clipPath class="fillSaborA"> <circle cx="180" cy="180" r="180" transform="translate(0)"/> </clipPath> </defs> <g id="saborA"> <image width="360" height="360" xlink:href="img/pizza.png" data-target="cardapio" data-toggle="modal"/> </g></svg>';
var doisSabores='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 360 360"><defs><style>#saborA{clip-path:url(#a);}#saborB{clip-path:url(#b);}</style><clipPath id="a"><path d="M178,0a180.011,180.011,0,0,0,0,360Z"/></clipPath><clipPath id="b"><path d="M182,0V359.9a179.985,179.985,0,0,0,178-180C360,81.1,280.5,1.1,182,0Z"/></clipPath></defs><g id="saborA"><image width="360" height="360" xlink:href="img/pizza2.png" data-target="cardapio" data-toggle="modal"/></g><g id="saborB"><image width="360" height="360" xlink:href="img/pizza.png" data-target="cardapio" data-toggle="modal"/></g></svg>';
var tresSabores='<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 360.017 359.999"> <defs> <style>#saborA{clip-path:url(#a);}#saborB{clip-path:url(#b);}#saborC{clip-path:url(#c);}</style> <clipPath id="a"> <path d="M181.2,182.3,91.8,337.1c85.3,48,195.1,18.1,244.1-66.9a180.283,180.283,0,0,0,24.1-88H181.2Z" transform="translate(0.017)"/> </clipPath> <clipPath id="b"> <path d="M177.4,180,88,25.1C3.8,75-25.2,185.1,23.9,270a180.689,180.689,0,0,0,64.2,64.9Z" transform="translate(0.017)"/> </clipPath> <clipPath id="c"> <path d="M181.2,178H360C358.9,80.2,278.1,0,180,0A180.978,180.978,0,0,0,91.7,23.1Z" transform="translate(0.017)"/> </clipPath> </defs> <g id="saborA"> <image width="360" height="360" xlink:href="img/pizza.png" data-target="cardapio" data-toggle="modal"/> </g> <g id="saborB"> <image width="360" height="360" xlink:href="img/pizza3.png" data-target="cardapio" data-toggle="modal"/> </g> <g id="saborC"> <image width="360" height="360" xlink:href="img/pizza2.png" data-target="cardapio" data-toggle="modal"/> </g></svg>';
var size = 'Grande';
var nSabores = '2';
var dough = 'Massa Tradicional';
var crust = 'Chocolate';
// SVG das pizzas
$("#quantidadeSabores").text(nSabores);
$("#tamanho").text(size);
$("#massa").text(dough);
$("#borda").text(crust);

var saborPizza = ["saborA", "saborB", "saborC", "saborD"];

var current = 0;

var urlImgPizza = 0;

// Adiciona sabor do #cardápio na var saboresPizza

$("#cardapio>ul>li").click(function(){
	if (current == "saborA") {
    	saborPizza[0] = this.id;
    	$("#primeiroSabor").html(saborPizza[0]);
    	// alert('Você selecionou o sabor ' + saborPizza[0]);
    	urlImgPizza = $(this).children("img").attr('src');
    	$("#pizza>svg>#saborA>image").attr('xlink:href', urlImgPizza);
    } if (current == "saborB") {
    	saborPizza[1] = this.id;
    	$("#segundoSabor").html(saborPizza[1]);
    	// alert('Você selecionou o sabor ' + saborPizza[1]);
    	urlImgPizza = $(this).children("img").attr('src');
    	$("#pizza>svg>#saborB>image").attr('xlink:href', urlImgPizza);
    } if (current == "saborC") {
    	saborPizza[2] = this.id;
    	$("#terceiroSabor").html(saborPizza[2]);
    	// alert('Você selecionou o sabor ' + saborPizza[2]);
    	urlImgPizza = $(this).children("img").attr('src');
    	$("#pizza>svg>#saborC>image").attr('xlink:href', urlImgPizza);
    } if (current == "saborD") {
    	saborPizza[3] = this.id;
    	$("#quartoSabor").html(saborPizza[3]);
    	// alert('Você selecionou o sabor ' + saborPizza[3]);
    	urlImgPizza = $(this).children("img").attr('src');
    	$("#pizza>svg>#saborD>image").attr('xlink:href', urlImgPizza);
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
		current = this.id;
		// alert('Você selecionou o ' + current);
	});
});

$("#doisSabores").click(function(){
	nSabores = '2';
	$('#quantidadeSabores').text(nSabores);
	$('#pizza').html(doisSabores);
	$("#pizza>svg>[id^='sabor']").click(function(){// Identifica qual fatia foi selecionada
		current = this.id;
		// alert('Você selecionou o ' + current);
	});
});

$("#tresSabores").click(function(){
	nSabores = '3';
	$('#quantidadeSabores').text(nSabores);
	$('#pizza').html(tresSabores);
	$("#pizza>svg>[id^='sabor']").click(function(){// Identifica qual fatia foi selecionada
		current = this.id;
		// alert('Você selecionou o ' + current);
	});
});

$("#quatroSabores").click(function(){
	nSabores = '4';
	$('#quantidadeSabores').text(nSabores);
	$('#pizza').html(quatroSabores);
	$("#pizza>svg>[id^='sabor']").click(function(){// Identifica qual fatia foi selecionada
		current = this.id;
		// alert('Você selecionou o ' + current);
	});
});
});
