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

	<button class="col_btn">Skoletrin</button>
	<div id="drop-down">
	<button data-skoletrinet="alle" class="valgt" >Alle</button>
	</div>





</section>

</main><!-- #main -->
<section id="grid-container">
<nav id="filter2">
	<div id="drop-down2">
		<p id="tekst_til_filterering">Sorter efter FN's Verdensmål</p>
	
		<button data-verdensml="alle" class="alleknappen valgt2">Alle</button>
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

<style>
      @media (min-width: 615px) {
        #footer {
          --repeat: 3;
        }
      }

      #footer {
        padding: 0%;
padding-bottom: 5%;
    padding-top: 5%;
        margin: 0%;
        width: 100%;
        height: auto;
        background-color: #53abcebf;
        display: grid;
        grid-template-columns: repeat(
          var(--repeat, auto-fit),
          minmax(200px, 1fr)
        );
        color: white;
        align-items: center;
      }
      #footer a {
        color: white;
        text-decoration: none;
      }
      #footer_kontakt {
        display: grid;
        justify-content: center;
        padding: 3%;
      }
      .footer_heading {
        color: white;
      }
      #footer_logo {
        width: 100%;
        filter: brightness(0) invert(1);
        display: grid;
        justify-content: center;
        padding: 3%;
      }
      #footer_some {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: center;
        padding: 3%;
      }
      #footer_some img {
        max-width: 10%;
        min-width: 5%;
      }
    </style>
  
  
    <section id="footer">
      <div id="footer_logo">
        <img src="https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-content/uploads/2022/04/unesco_logo-1.webp" alt="">
      </div>
      <div id="footer_kontakt">
        <article>
          <h3 class="footer_heading">National Koordinator</h3>
          <h4 class="footer_heading">Poul Erik Christoffersen</h4>
          <address>
            <a href="pec@ungdomsbyen.dk">pec@ungdomsbyen.dk</a><br><br>Tlf:
            +45 4491 4646 <br><br>Direkte: +45 2174 4275
          </address>
        </article>
      </div>
      <div id="footer_some">
        <img src="https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-content/uploads/2022/04/facebook1.png" alt="">
        <img src="https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-content/uploads/2022/04/instagram2.png" alt="">
        <img src="https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-content/uploads/2022/04/youtube.png" alt="">
        <img src="https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-content/uploads/2022/04/tiktok.png" alt="">
      </div>
    </section>

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
		
		document.querySelector("#drop-down").classList.add("disnone")
		document.querySelector(".alleknappen").classList.add("disnone")
		
	}

const url = `https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-json/wp/v2/uvmaterialer?per_page=100`;
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

document.querySelector(".col_btn").addEventListener("click", () =>{
	document.querySelector("#drop-down").classList.toggle("disnone")
})


function opretKnapper() {
categories.forEach(cat=> {
		document.querySelector("#drop-down").innerHTML += `<button class="filterKnapper" data-skoletrinet="${cat.id}">${cat.name}</button>`
	});

	verdensmaal.forEach(maal =>  {
		number++ 
		document.querySelector("#drop-down2").innerHTML += `<div class="dropdown2style"><div class="${classes + number}" ></div><button class="filterKnapper2"  data-verdensml="${maal.id}">${maal.name}</button></div>`
	});	
		
	document.querySelectorAll(".dropdown2style").forEach(bnt=>{bnt.classList.add("disnone")})
	addEventListenersToButtons();
}



function addEventListenersToButtons() {
	document.querySelector("#tekst_til_filterering").addEventListener("click", () =>{
	document.querySelector(".alleknappen").classList.toggle("disnone")
	document.querySelectorAll(".dropdown2style").forEach(btn=>{
		btn.classList.toggle("disnone")
	})
});
document.querySelectorAll("#drop-down button").forEach(elm => {elm.addEventListener("click", filtrering);
});
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
document.querySelector(".valgt2").classList.remove("valgt2");
this.classList.add("valgt2");

visUmaterale(); 
}


function visUmaterale() {
	
	console.log(Umaterale + "made it so far");
		liste.innerHTML="";
    	Umaterale.forEach(materale => {
			
		/* if (filterskoletrin == "alle" || materale.skoletrinet[0].id === (parseInt(filterskoletrin)) || materale.verdensml.includes(parseInt(filterverdensmaal)) ){ */
		if (materale.skoletrinet[0].id === (parseInt(filterskoletrin)) || filterskoletrin == "alle" && filterverdensmaal == "alle" || materale.verdensml.includes(parseInt(filterverdensmaal))){
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

