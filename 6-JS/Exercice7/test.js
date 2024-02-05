// Create a class here
// =====================================

class Episode {
    constructor(title, duration, hasBeenWatched) {
        this.title = title;
        this.duration = duration;
        this.hasBeenWatched = hasBeenWatched;
    }
}

firstEpisode = new Episode("Premier épisode", 60, true);
secondEpisode = new Episode("Deuxième épisode", 120, true);
thirdEpisode = new Episode("Troisième épisode", 240, true);

    // =====================================

document.querySelector('#first-episode-info').innerText = `Épisode: ${firstEpisode.title}
Durée: ${firstEpisode.duration} min
${firstEpisode.hasBeenWatched ? 'Déjà regardé' : 'Pas encore regardé'}`;

document.querySelector('#second-episode-info').innerText = `Épisode: ${secondEpisode.title}
Durée: ${secondEpisode.duration} min
${secondEpisode.hasBeenWatched ? 'Déjà regardé' : 'Pas encore regardé'}`;

document.querySelector('#third-episode-info').innerText = `Épisode: ${thirdEpisode.title}
Durée: ${thirdEpisode.duration} min
${thirdEpisode.hasBeenWatched ? 'Déjà regardé' : 'Pas encore regardé'}`;