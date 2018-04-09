		,	overLay		=	$('.bgOverlay').val()
		,	overAlpha	=	$('.bgOverlayAlpha').val()
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
						match= isYouId.exec(url);
						
                        url+='?autoplay=1&showinfo=0&controls=0&loop=1&playlist='+match[0].substring(6);
                    }
                    div.append('<iframe src="'+url+'" ></iframe>');
                }
            }
			div.append('<div style="background-image            :       url('+overLay+');'
                            +'      background-repeat           :       repeat;'
                            +'      opacity                     :       '+overAlpha+';" ></div>');
    }
    ;
    
    renderPreview(inPut.val());
    
    $('body').on('paste blur','.mediaUrl,.bgOverlay,.bgOverlayAlpha' , function  (e)     {
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
