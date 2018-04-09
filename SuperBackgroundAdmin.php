<?PHP
  namespace                     SuperBackgroundAdmin                {

    use function                \YaOO\alert;
    use                         \SuperBackground\Data ;

//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    getAdminTitle                       ()                                                  {
        return __('Super Background Options'                        ,   'superBG_lang');
    }
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    getAdminSubTitle                    ()                                                  {
        return __('Choose Your Video/Image'                         ,   'superBG_lang');
    }
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    mediaButtonLabel                    ()                                                  {
        return __('from Media Library'                              ,   'superBG_lang');
    }
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    bttnSaveOptionLabel                 ()                                                  {
        return __('Save Options'                                    ,   'superBG_lang');
    }
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    settingsHandle                      ()                                                  {
        return  Data::$registerSettingsHandle;
    }
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    getOptionMedia                      ()                                                  {
        return  Data::$options['image'];

    }   
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    optionMediaName                     ()                                                  {
        return  Data::$optionsName . '[image]';
    }   
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    getOptionAlpha                      ()                                                  {
        return  Data::$options['pageAlpha'];

    }   
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    optionAlphaName                     ()                                                  {
        return  Data::$optionsName . '[pageAlpha]';
    }   
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    getOptionOverAlpha                  ()                                                  {
        return  Data::$options['overAlpha'];

    }   
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    optionOverAlphaName                 ()                                                  {
        return  Data::$optionsName . '[overAlpha]';
    }   
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    getOptionOverUrl                    ()                                                  {
        return  Data::$options['overUrl'];

    }   
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    optionOverUrlName                   ()                                                  {
        return  Data::$optionsName . '[overUrl]';
    }   
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    optionsName                         ()                                                  {
        return  Data::$optionsName;
    }   
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    init                                ()                                                  {
        //alert('here we go ...');
    };
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    registerSettings                    ()                                                  {
        register_setting        ( settingsHandle()                  , Data::$optionsName );
    }
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    loadScripts                         ($hook)                                             {
        
        wp_enqueue_media();
        
        $path       =   plugin_dir_url( __FILE__ );
        $jsFile     =   $path . Data::$adminJs;
        
        $cssFile    =   $path . Data::$adminCss;

        wp_enqueue_style    (   'sprbg-css'                         ,   $cssFile    );                      
        
        wp_enqueue_script   (   'sprbg-js'
                            ,    $jsFile
                            ,   array( 'jquery', 'media-upload')
                            ,   '1.0.0'
                            ,   true
                            );

                            

    }
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    initMenu                            ()                                                  {
        //$menu_admin = add_submenu_page( 'themes.php',
        $menu_admin = add_menu_page     (   
                                            __( 'Super Background options'      , 'superBG' )
                                        ,   __( 'SuperBackground'               , 'superBG' )
                                        ,       'manage_options'
                                        ,       'SuperBackground-options'
                                        ,       '\SuperBackgroundAdmin\adminPage' 
                                        );
    }
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    adminPage                           ()                                                  {
         include ('page_header.php');
         include ('page_content.php');
         include ('page_footer.php');
    }
//  --------------------------- ----------------------------------- ----------------------------------------------------

  };
