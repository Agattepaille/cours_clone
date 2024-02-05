// Create Object here
// =========================================

let episode = {
  title: "Guerilla Radio",
  duration: "356",
  hasBeenWatched: true
};
// =========================================

document.querySelector('#episode-info').innerText = `Épisode: ${episode.title}
Durée: ${episode.duration} min
${episode.hasBeenWatched ? 'Déjà regardé' : 'Pas encore regardé'}`;
