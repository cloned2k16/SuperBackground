<?PHP
    /*
    Plugin Name:        Super Background
    Plugin URI:         http://wpPlugIns.ledg.es/SuperBackground/
    Description:        A Flexible and powerful Video/Image Background handler
    Version:            0.0.5
    Author:             Paolo Lioy
    Author URI:         http://know.ledg.es/
    License:            GPLv2
    License URI:        http://www.gnu.org/licenses/gpl-2.0.html
    Text Domain:        SuperBG
    Domain Path:        /lnggs
    xDepends:           YaOO NET
    */

//----------------------------------------------------------------------------------------------------------------------
  namespace                                                             {
    include                         ('SuperBackground.php');
    include                         ('SuperBackgroundAdmin.php');
    include                         ('SuperBackgroundSite.php');

    use function                    \YaOO\alert;

    \YaOO\accessDenied              (); 
    
    \SuperBackground\Data::$options =   get_option(\SuperBackground\Data::$optionsName);

    add_action                      ( 'init'                            , '\SuperBackgroundAdmin\init'                  );
    
    add_action                      ( 'admin_init'                      , '\SuperBackgroundAdmin\registerSettings'      );
    add_action                      ( 'admin_menu'                      , '\SuperBackgroundAdmin\initMenu'              );
    add_action                      ( 'admin_enqueue_scripts'           , '\SuperBackgroundAdmin\loadScripts'           );

    add_action                      ( 'wp_enqueue_scripts'              , '\SuperBackgroundSite\loadScripts'            );
    add_action                      ( 'wp_footer'                       , '\SuperBackgroundSite\renderBackground'       );
  };
//----------------------------------------------------------------------------------------------------------------------
