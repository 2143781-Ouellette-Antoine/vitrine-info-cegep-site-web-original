/*
* @Author: LarochelleJ
* @Date:   2023-03-28 15:14:55
* @Last Modified by:   LarochelleJ
* @Last Modified time: 2023-03-28 20:45:35
*/


let sketchs = document.querySelectorAll(".GridCards > a");

// We add an EventListener for every sketch
// We prevent the default action of the a tag
sketchs.forEach(sketch => {
	sketch.addEventListener('click', function(event){
		playSketch(sketch.getAttribute("fractal"));
		event.preventDefault();
	});
});

/**
 * Send an ajax post request to the server to play a fractal sketch
 * @param  {string} sketchName Name of the sketch
 */
function playSketch(sketchName) {
	fetch('jouer-sketch.php', {
        method: 'POST',
        headers:{
          'Content-Type': 'application/x-www-form-urlencoded'
        },    
        body: new URLSearchParams({
            'sketch': sketchName
        })
    })
    .then(response => {
        return response.json();
    })
    .then(code => {
        parseResponseCode(code);
    });
}

/**
 * Parse the responde code from the server
 * @param  {integer} code Response code
 */
function parseResponseCode(code) {
	// @TODO Error display with non-blocking alerts
	// Like Toastr (https://codeseven.github.io/toastr/)
	// We could make our own script
	
	switch (code) {
		case "API_ERROR":
			notification("error", "Une erreur s'est produite: api_error.");
			break;
		case "NO_TV_SESSION":
			notification("warning", "Vous n'êtes pas connecté à la TV.");
			break;
		case "TV_SESSION_EXPIRED":
			notification("warning", "Votre session TV a expiré, veuillez vous reconnecter à la TV.");
			break;
		case "GENERAL_ERROR":
			notification("error", "Une erreur s'est produite.");
			break;
		case "ERROR_LOADING_SKETCH":
			notification("error", "Une erreur s'est produite au chargement du fractal, veuillez contacter un administrateur.");
			break;
		case "GOOD":
			notification("success", "Le fractal devrait s'afficher à l'écran d'ici quelques secondes.");
			break;
	}
}

// Update session activity
setInterval(function(){
	console.log("Updating session activity.");
	fetch('tv-session.php');
}, 5000)

