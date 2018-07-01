/**
 * Author: Fatima Aurelia
 * Date: 01/22/2017
 * Version: 1.0
 */

 document.addEventListener('click', function (e) {
    e = e || window.event;
    var target = e.target || e.srcElement;

    if (target.hasAttribute('data-toggle') && target.getAttribute('data-toggle') == 'modal') {
        if (target.hasAttribute('data-target')) {
            var m_ID = target.getAttribute('data-target');
            document.getElementById(m_ID).classList.add('open');
            e.preventDefault();
        }
    }

    // Close modal window with 'data-dismiss' attribute or when the backdrop is clicked
    if ((target.hasAttribute('data-dismiss') && target.getAttribute('data-dismiss') == 'modal') || target.classList.contains('modal')) {
        var modal = document.querySelector('[class="modal open"]');
        modal.classList.remove('open');
        e.preventDefault();
    }
}, false);

sabor1 = $("#sabor1").val();
sabor2 = $("#sabor2").val();
sabor3 = $("#sabor3").val();

size = 'Grande';
quantidadeSabores = '2 Sabores';
dough = 'Massa Tradicional';
crust = 'Chocolate';

$("#numSabores").text(quantidadeSabores);
$("#tamanho").text(size);
$("#massa").text(dough);
$("#borda").text(crust);

var userName = $("#userName").val();
var userEmail = $("#userEmail").val();
var userPhone = $("#userPhone").val();

var userZipcode = $("#userZipcode").val();
var userCity = $("#userCity").val();
var userDistrict = $("#userDistrict").val();
var userStreet = $("#userStreet").val();
var userStreetNumber = $("#userStreetNumber").val();
var userComplement = $("#userComplement").val();

var orderSubtotal = $("#orderSubtotal").val();
var orderTotal = $("#orderTotal").val();
var orderChange = $("#orderChange").val();
var orderDeliveryTax = 100;
var orderPaymentMethod = 1;

var userInfo = {userName: userName, userEmail: userEmail};
var userAdress = {userZipcode: userZipcode, userCity: userCity, userDistrict: userDistrict, userStreet: userStreet, userStreetNumber: userStreetNumber, userComplement : userComplement};
// var orderAdress = {oderZipcode: oderZipcode, oderCity: oderCity, oderDistrict: oderDistrict, oderStreet: oderStreet, oderStreetNumber: oderStreetNumber, oderComplement : oderComplement};
// var order = {userInfo, orderAdress};

switch(quantidadeSabores) {
    case 1:
        $("#pizza").html(umSabor);
        break;
    case 2:
        $("#pizza").html(doisSabores);
        break;
    case 3:
        $("#pizza").html(tresSabores);
        break;
    case 4:
        $("#pizza").html(quatroSabores);
        break;
}