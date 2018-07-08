var umSabor =
'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 360 360"><defs><style>.a{fill:#ffed00;}</style></defs><g transform="translate(228.183 -204)"><circle class="a" cx="180" cy="180" r="180" transform="translate(-228.183 204)"/></g></svg>';
var doisSabores =
'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 360 360"><defs><style>.a{fill:#ffed00;}.b{fill:#e30613;}</style></defs><g transform="translate(644.883 -204)"><path class="a" d="M1011.1,0a180.011,180.011,0,0,0,0,360Z" transform="translate(-1477.983 204)"/><path class="b" d="M1140.4,52.7A179.937,179.937,0,0,0,1015.1,0V360A180.038,180.038,0,0,0,1140.4,52.7Z" transform="translate(-1477.983 204)"/></g></svg>';
var tresSabores =
'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 359.717 359.799"><defs><style>.a{fill:#ffed00;}.b{fill:#009640;}.c{fill:#e30613;}</style></defs><g transform="translate(1478 -204.1)"><path class="a" d="M177.4,180,88,25.3C3.8,75.1-25.2,185.2,23.9,270.1A179.625,179.625,0,0,0,88,335Z" transform="translate(-1477.983 204)"/><path class="b" d="M180.9,182,91.5,337c85.3,48,195.1,18.1,244.1-66.9a180.283,180.283,0,0,0,24.1-88Z" transform="translate(-1477.983 204)"/><path class="c" d="M180.9,178l178.8.1C358.6,80.3,277.8.1,179.7.1A180.978,180.978,0,0,0,91.4,23.2Z" transform="translate(-1477.983 204)"/></g></svg>';
var quatroSabores =
'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 360 360"><defs><style>.a{fill:#010202;}.b{fill:#009640;}.c{fill:#ffed00;}.d{fill:#e30613;}</style></defs><g transform="translate(1061.583 -204)"><path class="a" d="M594.4,182h-178a179.965,179.965,0,0,0,178,178Z" transform="translate(-1477.983 204)"/><path class="b" d="M598.4,182V360a179.965,179.965,0,0,0,178-178Z" transform="translate(-1477.983 204)"/><path class="c" d="M594.4,178V0a179.965,179.965,0,0,0-178,178Z" transform="translate(-1477.983 204)"/><path class="d" d="M598.4,178h178A179.965,179.965,0,0,0,598.4,0Z" transform="translate(-1477.983 204)"/></g></svg>;'
// var doisSabores =
// '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 344 344"> <defs> <pattern id="sabor1" patternUnits="userSpaceOnUse" width="100%" height="100%"> <image xlink:href="img/pizza.png" x="0" y="0" width="100%" height="100%"/> </pattern> <pattern id="sabor2" patternUnits="userSpaceOnUse" width="100%" height="100%"> <image xlink:href="img/pizza2.png" x="-72" y="0" width="100%" height="100%"/> </pattern> <style>.a{fill:url(#sabor1);}.b{fill:url(#sabor2);}</style> </defs> <g id="a" class="a"> <rect width="344" height="344"/> <path d="M172,172V344C77.6,344,0,266.4,0,172S77.6,0,172,0Z" fill="url(#sabor1)" data-target="sabores" data-toggle="modal"/> <path d="M172,172V0c94.4,0,172,77.6,172,172S266.4,344,172,344Z" fill="url(#sabor2)" data-target="sabores" data-toggle="modal"/> </g></svg>';

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