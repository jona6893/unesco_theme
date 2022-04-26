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
	<h3>
		Skoletrin
		<img src="https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-content/uploads/2022/04/arrow_upward_FILL0_wght400_GRAD0_opsz48.webp">
	</h3>
	<div id="drop-down">
	<button data-skoletrinet="alle">Alle</button>
	</div>
</nav>


<section id="ret-oversigt"></section>
</main><!-- #main -->
<template>
	<article>
		<img src="" alt=""> 
        <h3 class="smag"></h3>
		<!-- <h4 class="fokuspunkt"></h4> -->
		<h4 class="beskrivelse"></h4>
		
	</article>
</template>

</div><!-- #div -->



<script>
	console.log("mit_script_loader");
	let Umaterale;
	let categories;
	let filterskoletrin = "alle";
	const liste = document.querySelector("#ret-oversigt");
	let temp = document.querySelector("template");
	
	document.addEventListener("DOMContentLoaded", start);

	function start() {
		console.log("start");
		getJson();
	
	}

const url = `https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-json/wp/v2/undervisningsmateria?_page=100`;
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
		if (filterskoletrin == "alle"|| materale.skoletrinet[0].id === (parseInt(filterskoletrin))){
		console.log(filterskoletrin)
        let klon = temp.cloneNode(true).content;
		klon.querySelector(".smag").innerHTML = materale.overskrift;
		klon.querySelector("img").src = materale.billede.guid;
        klon.querySelector(".beskrivelse").innerHTML = materale.skoletrinet[0].name;
		// klon.querySelector(".beskrivelse").innerHTML = slik.beskrivelse;
	
		
       /*klon.querySelector(".fokuspunkt").innerHTML = "Fokuspunkt: " + materale.fokuspunkt;*/
		klon.querySelector("article").addEventListener("click", ()=>{location.href = materale.link;})
		liste.appendChild(klon);
		}
	})

}

</script>

<?php
get_footer();

