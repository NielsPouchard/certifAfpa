
// 1 -Function qui permet de récupérer les messages et de les afficher correctement
function getMessages(){
	// 2-Ell doit créer une requête Ajax pour se connecter au server, et au fichier handler.php
	const requeteAjax = new XMLHttpRequest();
	requeteAjax.open('GET', 'handler.php'); // La requête ira vers le handler.php
	// 3- Quand elle reçoit les données, il doit les traiter (avec le JSON) et doit les afficher en html
	requeteAjax.onload = function() { //Quand la réponse du server est chargée
		const resultat = JSON.parse(requeteAjax.responseText); // On stock dans une variable ce que le server a répondu + Grâce à JSON.parse cela permet que le résultat ne soit pas une chaîne de caractères, de ce fait le texte pourrat être exploité par js
		const html = resultat.reverse().map(function(message){
			return `
				<div class="message">
					<span class="date">${message.created_at}</span>
					<span class="pseudo">${message.pseudo}</span> :
					<span class="content">${message.content}</span>
				</div>
			`
		}).join(''); 

 		const messages = document.querySelector('.messages'); // On va chercher la div.messages
		messages.innerHTML = html; // Et on remplace
		messages.scrollTop = messages.scrollHeight; // Pour que la barre de message soit automatiquement en bas 
	}
	// 4- On renvoie la requête
	requeteAjax.send();
}


// 1- On créer une function pour envoyer le nouveau message au serveur et raffraîchir les messages
function postMessage(event){
	// 2- Elle doit stopper le submit du formulaire
	event.preventDefault();
	// 3- Elle doit récupéerer les données du formulaire
	const pseudo = document.querySelector('#pseudo');
	const content = document.querySelector('#content');
	// 4- Elle oit conditionner les données et les envoyer au server
	const data = new FormData();
	data.append('pseudo', pseudo.value)
	data.append('content', content.value)
	// 5 -Elle doit configurer une requête Ajax en POST et envoyer les données
	const requeteAjax = new XMLHttpRequest();
	requeteAjax.open('POST', 'handler.php?task=write'); //Pour envoyer des messages

	requeteAjax.onload = function () {
		content.value = '';
		content.focus(); // efface les messages du champ (ou l'on écrit les messages) cela nous évite d'effacer avec le curseur pour en écrire un autre
		getMessages();
	}

	requeteAjax.send(data);
}

document.querySelector('#chat').addEventListener('submit', postMessage);

// 1- Créer une constqui va effectuer un refresh du chat
	const interval = window.setInterval(getMessages, 2000);
	// 2- Dès le chargement de la page on appel la function getMessages();
	getMessages();