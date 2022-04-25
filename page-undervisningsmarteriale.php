<script>
	console.log("mit_script_loader");
	</script>
<?php


// Det skal rettes til, så det passer til vores data --- Der er massser af slik på vores side!! det er da fantastisk :)

get_header();
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
<nav id="filter">
	<div id="drop-down">
	<button data-skoletrin="alle">Alle</button>
	</div>
</nav>


<section id="ret-oversigt"></section>
</main><!-- #main -->
<template>
	<article>
		<img src="" alt=""> 
		<h3></h3>
        <p class="smag"></p>
		<p class="beskrivelse"></p>
		<p class="pris"></p>
		
	</article>
</template>

</div><!-- #div -->
<script>
	console.log("mit_script_loader");
	let Umaterale;
	let categories;
	let filterskoletrin = null;
	const liste = document.querySelector("#ret-oversigt");
	let temp = document.querySelector("template");
	
	document.addEventListener("DOMContentLoaded", start);

	function start() {
		console.log("start");
		getJson();
	
	}

const url = `https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-json/wp/v2/undervisningsmateria`;
const catUrl = `https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-json/wp/v2/skoletrin`;


async function getJson() {
	let response = await fetch(url);
	let catResponse = await fetch(catUrl);
    Umaterale = await response.json();
	categories = await catResponse.json();
	console.log(categories + "liste");
	console.log(Umaterale)
	visUmaterale();
	
	opretKnapper();

}
function opretKnapper() {
categories.forEach(cat=> {
		document.querySelector("#drop-down").innerHTML += `<button class="filterKnapper" data-skoletrinet="${cat.id}">${cat.name}</button>`
	});


	addEventListenersToButtons();

}

function addEventListenersToButtons() {
document.querySelectorAll("#drop-down button").forEach(elm => {elm.addEventListener("click", filtrering);
})
};


function filtrering() {
filterskoletrin = this.dataset.skoletrinet;
console.log(filterskoletrin);

visUmaterale();

}

function visUmaterale() {
	
	console.log(Umaterale);
	
		liste.innerHTML="";
    	Umaterale.forEach(materale => {
		if (filterskoletrin == null|| materale.skoletrinet[0].id === (parseInt(filterskoletrin))){
		console.log(filterskoletrin)
        let klon = temp.cloneNode(true).content;
		klon.querySelector("h3").textContent = materale.title.rendered;
		klon.querySelector("img").src = materale.billede.guid;
        klon.querySelector(".smag").innerHTML = materale.kort_beskrivelse;
		// klon.querySelector(".beskrivelse").innerHTML = slik.beskrivelse;
	
		
        klon.querySelector(".pris").innerHTML = materale.pris + " kr";
		klon.querySelector("article").addEventListener("click", ()=>{location.href = materale.link;})
		liste.appendChild(klon);
		}
	})

}

</script>

<?php
get_footer();



