<?php 
    include ('../SuperBackground.php');
    \YaOO\noHotLink();
    use \SuperBackground\Data;
    \YaOO\makeNoCacheJs();
    
?>
    var _log = console.log;

jQuery(document).ready(function($) {

    
    var ND
    ,   popUp
    ,   inPut           =   $('.mediaUrl')
    ,   onInputChanged  =                             function  (src)   {
        console.log('changed:',src.type!=ND?src.type:src);
        renderPreview(inPut.val());
    }
    ,   renderPreview   =                             function  (url)   {
        var div     =   $('#super-bg-preview-div')
        ,   isImage =   <?php echo \YaOO\jsRegEx(Data::$isImage) ."\n"; ?>
        ,   isVideo =   <?php echo \YaOO\jsRegEx(Data::$isVideo) ."\n"; ?>
        ,   isAuto  =   <?php echo \YaOO\jsRegEx(Data::$isAuto) ."g\n"; ?>
        ,   match   =   isImage.exec(url)
        ;
            div.empty();
            if (!url) return;
            
            if (match) {
                _log('is image!');
                div.append('<img src="'+url+'" />');
            }
            else {
                match = isVideo.exec(url);
                if (match){
                    _log('is video');
                    div.append('<video src="'+url+'" autoplay=1 loop=1></video>');
                }
                else {
                    _log('assume YouTube');
                    url=url.replace("watch?v=","embed/");  
                    url=url.replace("/youtu.be/","/www.youtube.com/embed/");  
                    match = isAuto.exec(url);
                    _log('match:',match);
                    if (match){
                        if (match[0]="?"){
                            match = isAuto.exec(url);
                            _log(match);
                            if (match==null){
                                url+='&autoplay=1';
                            }
                        }
                        else {
                            _log('guess we found autoplay');
                        }
                    }
                    else{
                        url+='?autoplay=1&showinfo=0&controls=0&loop=1';
                    }
                    div.append('<iframe src="'+url+'" ></iframe>');
                }
            }
    }
    ;
    
    renderPreview(inPut.val());
    
    $('body').on('paste blur','.mediaUrl'           , function  (e)     {
        onInputChanged(e);
    });
    
    $('body').on('click', '.mediaChooseButton'      , function  (e)     {

        e.preventDefault();

        if ( popUp ) { popUp.open(); return; }

        popUp = wp.media.frames.popUp   = wp.media({
                            frame       : 'select'
                        ,   title       : 'Choose Background Media'
                        ,   multiple    : false
                        ,   library     : { type: 'image,video' }
                        ,   button      : { text: 'Use Media'   }
        });

        popUp.on( 'select', function() {
            var sel = popUp.state().get('selection').first().toJSON();
            inPut.val(sel.url);
            onInputChanged('selected');
        });

        popUp.open();
    });
    
    

});
