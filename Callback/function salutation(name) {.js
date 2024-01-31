function salutation(name) {
  alert("Bonjour " + name);
}

function processUserInput(callback) {
  var name = prompt("Entrez votre nom.");
  callback(name);
}

processUserInput(salutation);