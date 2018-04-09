    var _log = console.log;

    jQuery(document).ready(function($) {
        _log('SuperBackground.js loaded...');
        
        var div     =   $('#super_back_ground')
        ,   isImage =   <?php echo \YaOO\jsRegEx(Data::$isImage) ."\n"; ?>
        ,   isVideo =   <?php echo \YaOO\jsRegEx(Data::$isVideo) ."\n"; ?>
        ,   isAuto  =   <?php echo \YaOO\jsRegEx(Data::$isAuto) ."g\n"; ?>
        ,   url     =   $('#mediaUrl').val()
        ,   match   =   isVideo.exec(url)
        ;
        //_log(url,match);
        //div.append('<video src="'+url+'" autoplay=true loop=1 ></video>');
    });