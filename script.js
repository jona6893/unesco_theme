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
	const svg = document.querySelectorAll(".navbar-nav .menu-item-has-children .svg-icon")
	const searchIcon = document.querySelectorAll(".sb-search .sb-search-button-close .sb-icon-search .svg-icon, .sb-search .sb-search-button-open .sb-icon-search .svg-icon")
	const burgerIcon = document.querySelectorAll(".navbar-toggle .icon-bar")
	
		if (currURL != frontpageURL){
			logo.classList.add("hvidlogo")
		} else {
			menucolor.classList.add("sortMenuTekst")
			svg.forEach(e => {
				console.log("foreach attribute")
				e.style.setProperty("fill", "black")
			})
			searchIcon.forEach(e => {
				console.log("foreach attribute")
				e.style.setProperty("fill", "black")
			})
			burgerIcon.forEach(e => {
				console.log("foreach attribute")
				e.style.setProperty("background", "black")
			})
			
			window.addEventListener('scroll', function() {	
			
	if (header.classList.contains('headroom--not-top') && currURL === frontpageURL) {
		console.log("Its unpinned")
		logo.classList.add("hvidlogo")
		menucolor.classList.remove("sortMenuTekst")
		svg.forEach(e => {
				console.log("foreach attribute")
				e.style.setProperty("fill", "white")
			})
		searchIcon.forEach(e => {
				console.log("foreach attribute")
				e.style.setProperty("fill", "white")
			})
		burgerIcon.forEach(e => {
				console.log("foreach attribute")
				e.style.setProperty("background", "white")
			})
		
	}
		else {
		console.log("its pinned")
		logo.classList.remove("hvidlogo")
		menucolor.classList.add("sortMenuTekst")
		svg.forEach(e => {
				console.log("foreach attribute")
				e.style.setProperty("fill", "black")
			})
		searchIcon.forEach(e => {
				console.log("foreach attribute")
				e.style.setProperty("fill", "black")
			})
			burgerIcon.forEach(e => {
				console.log("foreach attribute")
				e.style.setProperty("background", "black")
			})
	} }, {passive: true});
			
		}
	}