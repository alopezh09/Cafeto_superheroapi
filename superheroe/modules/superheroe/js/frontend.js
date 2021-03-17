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
                 <div class="col-cards-lo col-lg-4 col-md-4 col-sm-6 col-12 lo-card bd-highlight">
                    <div class="row">

                        <h4 class="superheroe-name">#superHeroeName</h4>
                    
                        <div class="superheroe-image">

                            <img src="#superheroeImg" alt="logo"/>
                        
                        </div>

                        <div class="superheroe-information">

                            <div class="superheroe-skills">

                              <span class="physical-strength">physical strength: #strength</span>
                              <span class="special-powers">special powers: #powers</span>
                              <span class="combat">Weapons: #combat</span>
                            
                            </div>

                            <div class="superheroe-biografy">

                              <p class="superheroe-biography-text">
                                #biography
                              </p>
                            
                            </div>
                        
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
