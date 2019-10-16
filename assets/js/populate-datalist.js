var input = document.getElementById('inputPublicPlaceTrait');

var request = new XMLHttpRequest();

request.onreadystatechange = function(response) {
  if (request.readyState === 4) {
    if (request.status === 200) {
      var jsonOptions = JSON.parse(request.responseText);
  
      jsonOptions.forEach(function(item) {
        var option = document.createElement('option data-tokens=' + item);
        option.value = item;
        input.appendChild(option);
      });
    } else {
      input.placeholder = "Nem sikerult betolteni az opciokat";
    }
  }
};

request.open('GET', '../../../assets/data/json/publicplacetrait.json', true);
request.send();
