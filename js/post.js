
function getPosted(){
	const requeteAjax = new XMLHttpRequest();
	requeteAjax.open('GET', '../post.php'); 

	requeteAjax.onload = function() { 
		const results = JSON.parse(requeteAjax.responseText); 
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

 		const posted = document.querySelector('.posted'); 
		posted.innerHTML = html; 
		posted.scrollTop = posted.scrollHeight; 
	}
	
	requeteAjax.send();
}


// 1- Créer une constqui va effectuer un refresh du chat
	var interval = window.setInterval(getPosted, getMessages, 2000);
	// 2- Dès le chargement de la page on appel la function getMessages();
	getPosted();