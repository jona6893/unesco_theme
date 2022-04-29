<?php
/**
 * The template for displaying the front page
 
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">


      <article id="singleView-slik">
        <img class="pic" src="" alt=""/>
        <div>
        <h2></h2>
        <p class="smag"></p>
        <p class="beskrivelse"></p>
        <p class="pris"></p>
        </div>
      </article>
    

<button>Tilbage</button>

    </main>
    <script>
   
      
      let ret;

      const url = `https://meritfilm.dk/kea/09_cms/test_site/wordpress/wp-json/wp/v2/uvmaterialer/<?php echo get_the_ID() ?>`; 

      // settings, test data, tag link, husk at fjerne max
      // key = database, API keys, manage dem --> Selve nøglen

     

      async function getJson() {
        const data = await fetch(url);
        materale = await data.json();
        visSlikket();

      }


      function visSlikket() {
document.querySelector("h2").textContent = materale.title.rendered;
 document.querySelector(".pic").src = materale.billede.guid;
 document.querySelector(".smag").textContent = slik.smag;
  document.querySelector(".beskrivelse").textContent = slik.beskrivelse;
  document.querySelector(".pris").textContent = slik.pris + " kr.";
      }

      document.querySelector("button").addEventListener("click", () => {
        history.back();
      });
      
      getJson();
</script>



<?php
get_footer();
