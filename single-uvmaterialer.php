<?php
/**
 * The template for displaying the front page
 
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

    <button class="backbtn">Tilbage</button>
      <article id="singleView-slik">

        <img class="pic" src="" alt=""/>
        <div>
        <h2></h2>
        <p class="smag"></p>
        <p class="beskrivelse"></p>
        <p class="pris"></p>
        </div>
      </article>
    

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
      #footer_kontakt,
      h3,
      h4 {
        color: white !important;
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
          <h3>National Koordinator</h3>
          <h4>Poul Erik Christoffersen</h4>
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
document.querySelector("h2").textContent = materale.overskrift_singleview;
 document.querySelector(".pic").src = materale.billede.guid;
 document.querySelector(".smag").textContent = "Forkuspunkt " + materale.fokuspunkt;
  document.querySelector(".beskrivelse").textContent = materale.lang_beskrivelse;
  /* document.querySelector(".pris").textContent = slik.pris + " kr."; */
      }

      document.querySelector(".backbtn").addEventListener("click", () => {
        history.back();
      });
      
      getJson();
</script>



<?php
get_footer();
