class Episode {
  constructor(title, duration, hasBeenWatched) {
    this.title = title;
    this.duration = duration;
    this.hasBeenWatched = hasBeenWatched;
  }
}

let episodes = [
  new Episode("L'hiver vient", 52, true),
  new Episode("La Route royal", 52, false),
  new Episode("Lord Snow", 52, false)
];

// Add logic here
// ======================

// Boucle FOR
/* for (let index = 0; index < episodes.length; index++) {
   episodes[index].hasBeenWatched = true;
} */

// Boucle FOR OF
 for (const episode of episodes) {
  episode.hasBeenWatched = true;
} 

// Boucle FOR IN
/*for (const hasBeenWatched in episodes) {
  if (Object.hasOwnProperty.call(episodes, hasBeenWatched)) {
    episodes[hasBeenWatched] = false;

  }
}*/

// ======================

const body = document.querySelector('body');

for (let episode of episodes) {
  let newDiv = document.createElement('div');
  newDiv.classList.add('series-frame');
  let newTitle = document.createElement('h2');
  newTitle.innerText = 'Game of Thrones';
  let newParagraph = document.createElement('p');
  newParagraph.innerText = `${episode.title}
${episode.duration} minutes
${episode.hasBeenWatched ? 'Déjà regardé' : 'Pas encore regardé'}`;
  newDiv.append(newTitle);
  newDiv.append(newParagraph);
  body.append(newDiv);
}