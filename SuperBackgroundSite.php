<?PHP
  namespace                     SuperBackgroundSite                 {

    use function                \YaOO\alert;
    use                         \SuperBackground\Data;
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    getOption                           ($tag)                                              {
        return Data::$options[$tag];
    }   
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    loadScripts                         ()                                                  {
        $path       =   plugin_dir_url( __FILE__ );
        $cssFile    =   $path . Data::$siteCss;
        $jsFile     =   $path . Data::$siteJs;

        
        wp_enqueue_style        ( 'superBackGroundCss', $cssFile    );                      
        try {
         $pageAlpha = getOption('pageAlpha');  
         if ($pageAlpha>= 0.01 && $pageAlpha<=1){
            $customCss      ="                          
                                #page{
                                    opacity: {$pageAlpha};
                                }";
            wp_add_inline_style ( 'superBackGroundCss', $customCss  );                                  
         }
         
         $overUrl   = getOption('overUrl');
         $overAlpha = getOption('overAlpha');
         if (!is_null($overUrl) && $overAlpha>= 0.01 && $overAlpha<=1){
            $customCss      ="                          
                                #super_back_ground_overlay      {
                                    background-image            :       url('{$overUrl}');
                                    background-repeat           :       repeat;
                                    opacity                     :       {$overAlpha};
                                }";
            wp_add_inline_style ( 'superBackGroundCss', $customCss  );                                  
         }
        }
        catch(Exception $err){
            
        };
        wp_enqueue_script       ( 'superBackGroundJs'
                                ,   $jsFile
                                ,   array( 'jquery')
                                ,   false 
                                ,   false
                                );

    }
//  --------------------------- ----------------------------------- ----------------------------------------------------
    function                    renderBackground                    ()                                                  {
        
        $url = getOption('image'); 

        if ( isset( $url ) ) {
            if( is_ssl() ) { /* fix protocol missmatch if required */ }
            echo  '<div id="super_back_ground">';
            echo   '<input type=hiddden id=mediaUrl value='. getOption('image') .' ></input>';
            if (preg_match( Data::$isImage , $url)){
            echo   '<img src="'. $url .'"/>';
            }
            else {
                if (preg_match( Data::$isVideo , $url)) {
            echo   '<video autoplay="1" loop="1" src="'. $url .'" ></video>';
                }
                else {
                    $url = str_replace ('watch?v=','embed/'                     ,$url);
                    $url = str_replace ('youtu.be','www.youtube.com/embed/'     ,$url);
					$match = preg_match(Data::$isYouId,$url,$mtchs);
					if ($match){
						$vId = substr($mtchs[0],6);
					}
					else {
						$vId="";
					}
                    if (preg_match( Data::$isAuto, $url)){
                    }
                    else {
						
            echo   '<iframe src="'. $url . '?autoplay=1&showinfo=0&controls=0&loop=1&playlist='. $vId .'" ></iframe>';
                    }
                }
            }
            echo  '<div id="super_back_ground_overlay"></div>';
            echo '</div>';
            
        }
    }
//  --------------------------- ----------------------------------- ----------------------------------------------------
  };