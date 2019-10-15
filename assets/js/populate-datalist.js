var dataList = document.getElementById('listPublicPlaceTrait');
var input = document.getElementById('inputPublicPlaceTrait');

var request = new XMLHttpRequest();

request.onreadystatechange = function(response) {
  if (request.readyState === 4) {
    if (request.status === 200) {
      var jsonOptions = JSON.parse(request.responseText);
  
      jsonOptions.forEach(function(item) {
        var option = document.createElement('option');
        option.value = item;
        dataList.appendChild(option);
      });
      
      input.placeholder = "Valassz";
    } else {
      input.placeholder = "Nem sikerult betolteni az opciokat";
    }
  }
};

input.placeholder = "Betöltés...";

request.open('GET', '../../../data/json/publicplacetrait.json', true);
request.send();
