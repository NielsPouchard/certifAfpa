 (function() {

	var searchBar = document.querySelector('#search_user');	
	searchBar.addEventListener("submit", function() {
		
	var resultSearch = document.querySelector('#result_search'); 
	resultSearch.html('');

		var user = new XMLHttpRequest();
		requeteAjax.open('GET', '../rechercheUser.php')
		requeteAjax.onload = function(){	

			var search = JSON.parse(requeteAjax.responseText);
				
	
			if (user !== "") {				
				$.ajax({
					type:'GET',
					url: './rechercheUser.php',
					dataUser: 'user=' + encodeURIComponent(user), // décode les caractères spéciaux
					success: function(data){
					if (data !== ""){
						$('#result_search').append(data);
						}else{
							document.querySelector('#result_search').innerHTML = "<div> Aucun ami trouvé </div>"
						}
					}					
				});
			}
		}
	});
}); 

