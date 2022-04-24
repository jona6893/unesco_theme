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
	<button data-slik="alle">Alle</button>
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
	let slikket;
	let categories;
	let filterSlik ="alle";
	const liste = document.querySelector("#ret-oversigt");
	let temp = document.querySelector("template");
	
	document.addEventListener("DOMContentLoaded", start);

	function start() {
		console.log("start");
		getJson();
	
	}

const url = `https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-json/wp/v2/undervisningsmateria`;
const catUrl = `https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-json/wp/v2/categories`;


async function getJson() {
	let response = await fetch(url);
	let catResponse = await fetch(catUrl);
    slikket = await response.json();
	categories = await catResponse.json();
	visSlikket();
	console.log(categories);
	opretKnapper();

}
function opretKnapper() {
categories.forEach(cat=> {
		document.querySelector("#filter").innerHTML += `<button class="filterKnapper" data-slik="${cat.id}">${cat.name}</button>`
	});


	addEventListenersToButtons();

}

function addEventListenersToButtons() {
document.querySelectorAll("#filter button").forEach(elm => {elm.addEventListener("click", filtrering);
})
};


function filtrering() {
filterSlik = this.dataset.slik;
console.log("filterSlik");

visSlikket();

}

function visSlikket() {
	
	console.log(slikket);

		liste.innerHTML="";
    	slikket.forEach(slik => {
		if (filterSlik =="alle"|| slik.categories.includes(parseInt(filterSlik))){
        let klon = temp.cloneNode(true).content;
		klon.querySelector("h3").textContent = slik.title.rendered;
		klon.querySelector("img").src = slik.billede.guid;
        klon.querySelector(".smag").innerHTML = slik.kort_beskrivelse;
		// klon.querySelector(".beskrivelse").innerHTML = slik.beskrivelse;
	
		
        klon.querySelector(".pris").innerHTML = slik.pris + " kr";
		klon.querySelector("article").addEventListener("click", ()=>{location.href = slik.link;})
		liste.appendChild(klon);
		}
	})

}

</script>

<?php
get_footer();



