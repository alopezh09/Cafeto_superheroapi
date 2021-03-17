<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file: 
 * 
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 * Example: 
 */


if((isset($settings->superheroe_name)) && (!empty($settings->superheroe_name))){
    $data=$module->apirequest($settings->superheroe_name);
    //console.log($data);
    if($data["response"]!="error")
    {
?>
    <div class="card" style="width: 14rem;">
        <div class="superheroe-image">
        <img src="<?php echo $data["results"][0]["image"]["url"]; ?>" alt="SuperHero_picture"/>
                    </div>
        
        <div class="card-body">
        <h4 class="superheroe-name"><?php echo $data["results"][0]["name"]; ?></h4>
        <p class="card-text">
            <span class="intelligence">Intelligence: <?php echo $data["results"][0]["powerstats"]["intelligence"]; ?></span><br>
            <span class="strength">strength: <?php echo $data["results"][0]["powerstats"]["strength"]; ?></span><br>
            <span class="speed">speed: <?php echo $data["results"][0]["powerstats"]["speed"]; ?></span><br>
            <span class="durability">durability: <?php echo $data["results"][0]["powerstats"]["durability"]; ?></span><br>
            <span class="power">power: <?php echo $data["results"][0]["powerstats"]["power"]; ?></span><br>
            <span class="combat">combat: <?php echo $data["results"][0]["powerstats"]["combat"]; ?></span><br>
        </p>
        </div>					  
        <div class="card-body">
        <div class="superheroe-biografy">
            <p class="superheroe-biography-text">
                <span class="full-name">Full Name: <?php echo $data["results"][0]["biography"]["full-name"]; ?></span><br>
                <span class="alter-egos">Alter Egos: <?php echo $data["results"][0]["biography"]["alter-egos"]; ?></span><br>
                <span class="City">City: <?php echo $data["results"][0]["work"]["base"]; ?></span><br>
            </p>
        </div>
        </div>
    </div>
<?php
    } else {
        echo "<h3>Select a Valid Super Hero</h3>";
    }
} else {
    echo "<h3>Please select a Super Hero</h3>";
}

?>



