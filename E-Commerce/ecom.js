function validateAll() {
  alert(validateTitle())
}

function validateTitle() {
  var x = document.forms['prodsearch']['title'].value;
  if (x == "") {
    var response = "Name must be filled out"
    return response;
  }
}

function validatePrice() {
  var x = document.forms['prodsearch']['price'].value;
  if (x == "") {
   var response = "Please choose a price";
    return response;
  }

function validateDescr() {
  var x = document.forms['prodsearch']['descr'].value;
  if (x == "") {
    var response = "Please prodvide a Description";
     return response;
  }
}
