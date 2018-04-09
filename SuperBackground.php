<?PHP
//----------------------------------------------------------------------------------------------------------------------
  namespace                             {
    include                         ('YaOO.php');
  };
//----------------------------------------------------------------------------------------------------------------------
  namespace                         SuperBackground                     {
//  ------------------------------- ----------------------------------- ------------------------------------------------
    function                        getAdminTitle                       ()                                              {
        return  __( 'Super Background Options', 'superBG' ); 
    }
//  ------------------------------- ----------------------------------- ------------------------------------------------
    Class                           Data                                {
        public static   
        $registerSettingsHandle     =   'superBG_register_settings'                     ;
        public static
        $optionsName                =   'SuperBbackground'                              ;
        public static
        $options                                                                        ;
        public static
        $siteJs                     =   'js/SuperBackground.js.php'                     ;
        public static
        $adminJs                    =   'js/SuperBackground-admin.js.php'               ;
        public static
        $siteCss                    =   'css/view_page.css.php'                         ;
        public static
        $adminCss                   =   'css/admin_page.css.php'                        ;
        public static
        $isImage                    =   '/(\.)(jpg|png|gif)$/ius'                       ;
        public static
        $isVideo                    =   '/(\.)(mp4|avi|ogg)$/ius'                       ;
        public static
        $isAuto                     =   '/(\?)|((?<=(\&|\?))(autoplay=)(1|0))/isu'      ;
        public static
        $isYouId                    =   '/(embed\/)[a-z0-9]+/isu'      					;
		
    };
//  ------------------------------- ----------------------------------- ------------------------------------------------
  };      


