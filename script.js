document.addEventListener('DOMContentLoaded', () => {


	console.log("hello world");
	checkpage()


	
});

function checkpage() {
	console.log("checkpage started")
	const header = document.getElementById("masthead");
	const navbar = document.querySelector(".navbar");
	const logo = document.querySelector(".header-logo-wrapper");
	const menucolor = document.querySelector(".header-navigation-wrapper");
	let currURL = window.location.href
	const frontpageURL = "https://meritfilm.dk/kea/09_cms/test_site/wordpress/"
	document.querySelector(".svg-icon").style.setProperty("fill","white", "!important");
	
	
	
		if (currURL != frontpageURL){
			logo.classList.add("hvidlogo")
		} else {
			menucolor.classList.add("sortMenuTekst")
			window.addEventListener('scroll', function() {	

	if (header.classList.contains('headroom--not-top') && currURL === frontpageURL) {
		console.log("Its unpinned")
		logo.classList.add("hvidlogo")
		menucolor.classList.remove("sortMenuTekst")
		
	}
		else {
		console.log("its pinned")
		logo.classList.remove("hvidlogo")
		menucolor.classList.add("sortMenuTekst")
	} }, {passive: true});
			
		}
	}