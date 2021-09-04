// 1 -Function qui permet de récupérer les post et de les afficher correctement
function getPosted(){
	// 2-Ell doit créer une requête Ajax pour se connecter au server, et au fichier post.php
	const requeteAjax = new XMLHttpRequest();
	requeteAjax.open('GET', '../post.php'); // La requête ira vers le post.php
	// 3- Quand elle reçoit les données, il doit les traiter (avec le JSON) et doit les afficher en html
	requeteAjax.onload = function() { //Quand la réponse du server est chargée
		const results = JSON.parse(requeteAjax.responseText); // On stock dans une variable ce que le server a répondu + Grâce à JSON.parse cela permet que le résultat ne soit pas une chaîne de caractères, de ce fait le texte pourrat être exploité par js
		const html = results.map(function(post){
			console.log(post.created_at);
			return `
				<div class="post">
					<span class="date">${post.created_at}</span
					<span class="pseudo">${post.pseudo}</span> :
					<span class="content">${post.content}</span>
				</div>
			`
		}).join(''); 

 		const posted = document.querySelector('.posted'); // On va chercher la div.messages
		posted.innerHTML = html; // Et on remplace
		posted.scrollTop = posted.scrollHeight; // Pour que la barre de message soit automatiquement en bas 
	}
	// 4- On renvoie la requête
	requeteAjax.send();
}


// 1- Créer une constqui va effectuer un refresh du chat
	var interval = window.setInterval(getPosted, getMessages, 2000);
	// 2- Dès le chargement de la page on appel la function getMessages();
	getPosted();