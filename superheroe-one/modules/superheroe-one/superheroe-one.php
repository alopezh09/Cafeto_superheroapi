<?php

/**
 * @class FLFindLoanOfficerModule
 */
class FLSuperHeroeOneModule extends FLBuilderModule {

    /** 
     * Constructor function for the module. You must pass the
     * name, description, dir and url in an array to the parent class.
     *
     * @method __construct
     */  
    public function __construct()
    {
        parent::__construct(array(
            'name'          => __('Superheroes Card', 'fl-builder'),
            'description'   => __('Add super heroes cards', 'fl-builder'),
            'category'		=> __('Super Heroes', 'fl-builder'),
            'dir'           => FL_MODULE_SUPERHEROEONE_DIR . 'modules/superheroe-one/',
            'url'           => FL_MODULE_SUPERHEROEONE_URL . 'modules/superheroe-one/',
            'editor_export' => true, // Defaults to true and can be omitted.
            'enabled'       => true, // Defaults to true and can be omitted.
        ));
        
        /** 
         * Use these methods to enqueue css and js already
         * registered or to register and enqueue your own.
         */
        // Already registered
        //$this->add_css('font-awesome');
        //$this->add_js('jquery-bxslider');
        
        // Register and enqueue your own
        //$this->add_css('example-lib', $this->url . 'css/example-lib.css');

        $this->add_css('superheroe-bootstrap', $this->url . 'css/bootstrap.min.css');

    }

    /** 
     * Use this method to work with settings data before 
     * it is saved. You must return the settings object. 
     *
     * @method update
     * @param $settings {object}
     */      
    public function update($settings)
    {
        $settings->textarea_field .= ' - this text was appended in the update method.';
        
        return $settings;
    }

    /** 
     * This method will be called by the builder
     * right before the module is deleted. 
     *
     * @method delete
     */      
    public function delete()
    {
    
    }

    /** 
     * Add additional methods to this class for use in the 
     * other module files such as preview.php, frontend.php
     * and frontend.css.php.
     * 
     *
     * @method example_method
     */   
    public function example_method()
    {
    
    }

    public function apirequest($superheroe_name)
    {
        
        if(isset($superheroe_name)){
            $ch = curl_init("https://superheroapi.com/api/10159786368926318/search/".$superheroe_name);
            
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            
            //set the content type to application/json
            
            //return response instead of outputting
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            
            //execute the POST request
            $result = curl_exec($ch);
            
            $data = json_decode($result, true);
            curl_close($ch);
                        
            return ($data);
            
        }
    }
}

FLBuilder::register_module('FLSuperHeroeOneModule', array(
    'general'       => array( // Tab
        'title'         => __('General', 'fl-builder'), // Tab title
        'sections'      => array( // Tab Sections
            'general'       => array( // Section
                'title'         => __('Super Heroe Info', 'fl-builder'), // Section Title
                'fields'        => array( // Section Fields
                    'superheroe_name'     => array(
                        'type'          => 'text',
                        'label'         => __('Super Heroe Name', 'fl-builder'),
                        'default'       => '',
                        'size'          => '50',
                        'class'         => 'my-css-class',
                        'help'          => 'Components Title',
                        'preview'         => array(
                            'type'             => 'css',
                            'selector'         => '.fl-example-text',
                            'property'         => 'font-size',
                            'unit'             => 'px'
                        )
                    ),
                   
                )
            )
        )
    )
));

