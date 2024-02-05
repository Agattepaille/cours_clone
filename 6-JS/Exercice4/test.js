// Create variables here
// =========================================

let episodeTitle = "Killing in the Name";
let episodeDuration = 356;
let hasBeenWatched = true;


// =========================================

document.querySelector('#episode-info').innerText = `Épisode: ${episodeTitle}
Durée: ${episodeDuration} min
${hasBeenWatched ? 'Déjà regardé' : 'Pas encore regardé'}`