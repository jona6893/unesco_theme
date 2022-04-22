document.addEventListener('DOMContentLoaded', () => {

	console.log("hello world");

	const header = document.getElementById("masthead");
	const logo = document.querySelector(".header-logo-wrapper")

	console.log(header)


	window.addEventListener('scroll', function() {
		/*const header = document.getElementById("masthead");*/
	
	
	if (header.classList.contains('headroom--not-top')) {
		console.log("Its unpinned")
		logo.classList.add("hvidlogo")
	}
		else {
		console.log("its pinned")
		logo.classList.remove("hvidlogo")
	}
		
	});
});

