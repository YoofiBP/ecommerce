var counter = 0;
var cart = [];
function doAll(item){
  count();
  add(item);
}

function count() {
  counter++;
  var num = document.getElementById('counter').innerHTML = counter;
}

function add(item){
  cart.push(item.name);
  localStorage.setItem("usercart",cart)
}

function printcart() {
  document.getElementById('cartez').innerHTML = localStorage.getItem("usercart");
}
