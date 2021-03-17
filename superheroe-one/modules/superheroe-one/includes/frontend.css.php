/**
 * This file should contain frontend styles that 
 * will be applied to individual module instances.
 *
 * You have access to three variables in this file: 
 * 
 * $module An instance of your module class.
 * $id The module's ID.
 * $settings The module's settings.
 *
 * Example: 
 */

 <

.fl-node-<?php echo $id; ?> {
    font-size: <?php echo $settings->text_field; ?>px;
}

<?php 
    
    if($settings->overflow == 'yes'){

?>

#loanofficers{
   
   margin-top: 5px;
   background-color: white;
   height: <?php echo $settings->height; ?>px;
   overflow-y: scroll;
}

<?php 

    }

?>

