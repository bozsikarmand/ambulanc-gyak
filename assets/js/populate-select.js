let dropdown = document.getElementById('inputPublicPlaceTrait');
dropdown.length = 0;

let defaultOption = document.createElement('option');
defaultOption.text = 'Valassz';

dropdown.add(defaultOption);
dropdown.selectedIndex = 0;

const url = '../data/publicplacetrait.json';

const request = new XMLHttpRequest();
request.open('GET', url, true);

request.onload = function() {
  if (request.status === 200) {
    const data = JSON.parse(request.responseText);
    let option;
    for (let i = 0; i < data.length; i++) {
      option = document.createElement('option');
      option.text = data[i].Jelleg;
      option.value = data[i].ID;
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