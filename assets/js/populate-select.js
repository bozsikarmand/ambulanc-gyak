document.addEventListener('DOMContentLoaded', function() {
  var dropdown = document.getElementById('inputPublicPlaceTrait');
dropdown.length = 0;

var defaultOption = document.createElement('option');
defaultOption.text = 'Valassz';

dropdown.add(defaultOption);
dropdown.selectedIndex = 0;

var  url = '../../../assets/data/publicplacetrait.json';

var request = new XMLHttpRequest();
request.open('GET', url, true);

request.onload = function() {
  if (request.status === 200) {
    var data = JSON.parse(request.responseText);
    var option;
    for (var i = 0; i < data.length; i++) {
      option = document.createElement('option');
      option.text = data[i].Jelleg;
      option.value = data[i].Jelleg;
      option.setAttribute('data-tokens', data[i].Jelleg)
      dropdown.add(option);
    }
   } else {
       console.error("Hiba!");
  }   
}

request.onerror = function() {
  console.error('Hiba tortent a JSON betoltese kozben! (URL: ' + url + ')');
};

request.send();
}, false);