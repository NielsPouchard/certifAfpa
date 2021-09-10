
let arrow = document.querySelectorAll(".arrow");

for (var i = 0; i < arrow.length; i++) {
	arrow[i].addEventListener("click", (e)=>{
		e.preventDefault()
		
		let arrowParent = e.target.parentElement.parentElement;				
		arrowParent.classList.toggle("showMenu");

	});			
} 

	let sidebar = document.querySelector(".sidebar");
	let sidebarBtn = document.querySelector("#btdBurger");

	sidebarBtn.addEventListener("click", (e)=>{
		e.preventDefault();
		sidebar.classList.toggle("close");		
	});

