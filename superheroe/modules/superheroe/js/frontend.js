/**
 * This file should contain frontend logic for 
 * all module instances.
 */
 (function($){
 
  $(document).ready(function() {

    function init(data){

            var htmlSuperHeroe;                                     

            for(let item of data){


              htmlSuperHeroe = `
                <div class="card" style="width: 18rem;">
                  <div class="superheroe-image">
                    <img src="#superheroeImg" alt="SuperHero_picture"/>
                              </div>
                  
                  <div class="card-body">
                    <h4 class="superheroe-name">#superHeroeName</h4>
                    <p class="card-text">
                      <span class="physical-strength">physical strength: #strength</span><br>
                      <span class="special-powers">special powers: #powers</span><br>
                      <span class="combat">Weapons: #combat</span><br>
                    </p>
                  </div>					  
                  <div class="card-body">
                    <div class="superheroe-biografy">
                      <p class="superheroe-biography-text">
                        #biography
                      </p>
                    </div>
                  </div>
                </div>`;

                                                
                  
              htmlSuperHeroe = htmlSuperHeroe.replace("#superHeroeName",item.name);
              htmlSuperHeroe = htmlSuperHeroe.replace("#superheroeImg",item.image.url);
              htmlSuperHeroe = htmlSuperHeroe.replace("#strength",item.powerstats.strength);   
              htmlSuperHeroe = htmlSuperHeroe.replace("#powers",item.powerstats.power);
              htmlSuperHeroe = htmlSuperHeroe.replace("#combat",item.powerstats.combat);
              htmlSuperHeroe = htmlSuperHeroe.replace("#biography",item.biography["full-name"]);   
                    
              $( "#superheroes" ).append( htmlSuperHeroe );


            }




     }

     $.ajax({
      url: url_plugin + '/modules/superheroe/includes/loadSuperHeroes.php',

      data: { 
        name: superheroes 
       },
          
        method: 'GET',
          }).then(function(data) {


                
                let dataJson = JSON.parse(data);
                console.log(dataJson);
                let resultados = dataJson.results;

                console.log(resultados);
                init(resultados);

              
             
            


            
          
          });


     
     //fin init
     //init(superheroes);

  });
    
})(jQuery);
