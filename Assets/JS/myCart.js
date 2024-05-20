function getClass(className) {
    return document.getElementsByClassName(className);
}

function getId(id){
    return document.getElementById(id);
}

var gt = 0;
var iprice = getClass('iprice');
var iquantity = getClass('iquantity');
var itotal = getClass('itotal');
var gtotal = getId('gtotal');

// Function to calculate subtotal
function subTotal() {
    gt = 0;
    for (var i = 0; i < iprice.length; i++) {
        itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
        gt += (iprice[i].value) * (iquantity[i].value);;
    }
    gtotal.innerText = gt;
}
