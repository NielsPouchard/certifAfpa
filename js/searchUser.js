 (function() {

	var searchBar = document.querySelector('#search_user');
	searchBar.addEventListener("click",function() {
		console.log(searchBar);	
		return;
	var resultSearch = document.querySelector('#result_search'); 
	resultSearch.html('');

		var user = $(this).val();
		console.log(user);
		if (user != "") {				
			$.ajax({
				type:'GET',
				url: './rechercheUser.php',
				dataUser: 'user=' + encodeURIComponent(user),
				sucess: function(data){
				if (data != "") {
					$('#result_search').append(data);
					}else{
						document.getElementById('#result_search').innerHTML = "<div> Aucun ami trouvé </div>"
				}
			}					
		});
		}
	});
}); 

