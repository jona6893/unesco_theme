<script>
	console.log("mit_script_loader");
	</script>
<?php




// Det skal rettes til, så det passer til vores data --- Der er massser af slik på vores side!! det er da fantastisk :)

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
	<section id="listgrid">

	
	<div id="drop-down">
	<button data-skoletrinet="alle" class="valgt" >Alle</button>
	</div>



<!-- '<img class="hjul" src="https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-content/uploads/2022/04/image-4.png" alt="hjul">' -->

</section>

</main><!-- #main -->
<section id="grid-container">
<nav id="filter2">
	<div id="drop-down2">
		<p id="tekst_til_filterering">Sorter efter FN's Verdensmål</p>
	
		<button data-verdensml="alle">Alle</button>
	</div>
</nav>

<section id="ret-oversigt">
<template>
	<article>
		<img src="" alt=""> 
        <h3 class="smag"></h3>
		<!-- <h4 class="fokuspunkt"></h4> -->
		<h4 class="beskrivelse"></h4>
		
	</article>
</template>
</section>
</section>

</div><!-- #div -->

<

<script>
	console.log("mit_script_loader");
	let Umaterale;
	let categories;
	let verdensmaal;
	let filterskoletrin = "alle";
	let filterverdensmaal = "alle";
	const liste = document.querySelector("#ret-oversigt");
	let temp = document.querySelector("template");
	let valgtknap = []
	let classes = "farve";
	let number = 0;

	
	document.addEventListener("DOMContentLoaded", start);

	function start() {
		console.log("start");
		getJson();
	
	}

const url = `https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-json/wp/v2/undervisningsmateria?per_page=100`;
const catUrl = `https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-json/wp/v2/skoletrin?per_page=100`;
const maalUrl = `https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-json/wp/v2/verdensml?per_page=100`;


async function getJson() {
	let response = await fetch(url);
	let catResponse = await fetch(catUrl);
	let maalResponse = await fetch(maalUrl);
    Umaterale = await response.json();
	categories = await catResponse.json();
	verdensmaal = await maalResponse.json();
	/* console.log(categories + "liste"); */
	/* console.log(Umaterale) */
	visUmaterale();
	
	opretKnapper();

}
function opretKnapper() {
categories.forEach(cat=> {
		document.querySelector("#drop-down").innerHTML += `<button class="filterKnapper" data-skoletrinet="${cat.id}">${cat.name}</button>`
	});

	verdensmaal.forEach(maal =>  {
		number++ 
		document.querySelector("#drop-down2").innerHTML += `<div class="dropdown2style"><div class="${classes + number}" ></div><button class="filterKnapper2"  data-verdensml="${maal.id}">${maal.name}</button></div>`
	});	
		
	
	addEventListenersToButtons();
}


function addEventListenersToButtons() {
document.querySelectorAll("#drop-down button").forEach(elm => {elm.addEventListener("click", filtrering);
})	
document.querySelectorAll("#drop-down2 button").forEach(elm => {elm.addEventListener("click", filtrering2);	
})
};


function filtrering() {

filterskoletrin = this.dataset.skoletrinet;
/* console.log(filterskoletrin + "skoletrin"); */
document.querySelector(".valgt").classList.remove("valgt");
this.classList.add("valgt");
visUmaterale();

}

function filtrering2() {
filterverdensmaal = this.dataset.verdensml;
/* console.log(filterverdensmaal + "verdensmål"); */

visUmaterale(); 
}


function visUmaterale() {
	
	console.log(Umaterale + "made it so far");
		liste.innerHTML="";
    	Umaterale.forEach(materale => {
			
		/* if (filterskoletrin == "alle" || materale.skoletrinet[0].id === (parseInt(filterskoletrin)) || materale.verdensml.includes(parseInt(filterverdensmaal)) ){ */
		if (filterskoletrin == "alle" || materale.skoletrinet[0].id === (parseInt(filterskoletrin)) && filterverdensmaal == "alle" || materale.verdensml.includes(parseInt(filterverdensmaal))){
		/* console.log(filterskoletrin)*/
		console.log(filterverdensmaal) 
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

