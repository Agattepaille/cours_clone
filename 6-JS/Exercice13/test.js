// 
// ======================


const calculateAverageRating = (array) => {
  let sumValues = 0
  for (let index = 0; index < array.length; index++) {
    sumValues += array[index];
  }
  if (array.length === 0) return 0;
  var numberValues = array.length
  const average = sumValues / numberValues
  return average
}

// ======================

const gotRatings = [5, 4, 5, 5, 1, 2];
const harrypRatings = [5, 5, 5, 4, 5];
const starWarsRatings = [2,2,2];

const gotAverage = calculateAverageRating(gotRatings);
const harrypAverage = calculateAverageRating(harrypRatings);
const swAverage = calculateAverageRating(starWarsRatings);


if (gotAverage && harrypAverage && swAverage) {
  document.querySelector('#got-score').innerText = gotAverage === 0 ? 'Pas de note' : gotAverage.toFixed(1) + ' étoiles';
  document.querySelector('#harryp-score').innerText = harrypAverage === 0 ? 'Pas de note' : harrypAverage.toFixed(1) + ' étoiles';
  document.querySelector('#sw-score').innerText = swAverage === 0 ? 'Pas de note' : swAverage.toFixed(1) + ' étoiles';
}