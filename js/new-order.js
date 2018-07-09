function addOrder(data){
  var pedido = [data.forma_de_pgto, $data.troco, $data.total, 1];
  var pedido = [data.forma_de_pgto, $data.troco, $data.total, 1];
}
var currOrder = 0;
var currPizza = 0;

$.get("apir.php?op=add_pedido&forma_de_pgto=1&troco=500&total=143", function(data, status){
    alert("pedido: " + data + "\nStatus: " + status);
    currOrder = data;
});

$.get("apir.php?op=add_pizza&tamanho=pequena&n_de_sabores=3&borda=calabresa", function(data, status){
    alert("pizza: " + data + "\nStatus: " + status);
    currPizza = data;
});

$.get("apir.php?op=assoc_pedido_pizza&pedido="+ currOrder + "&pizza="+ currPizza, function(data, status){
    alert("coiso: " + data + "\nStatus: " + status);
});
