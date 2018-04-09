<?php 
    include ('../SuperBackground.php');
    //YaOO\noHotLink();
    use \SuperBackground\Data;
    \YaOO\makeNoCacheJs();
?>
    var _log = console.log;

jQuery(document).ready(function($) {

    
    var ND
    ,   popUp
    ,   inPut           =   $('.mediaUrl')
    ,   onInputChanged  =                             function  (src)   {
        renderPreview(inPut.val());
    }
    ,   renderPreview   =                             function  (url)   {
        var div     	=   $('#super-bg-preview-div')
        ,   isImage 	=   <?php echo \YaOO\jsRegEx(Data::$isImage) ."\n"; ?>
        ,   isVideo 	=   <?php echo \YaOO\jsRegEx(Data::$isVideo) ."\n"; ?>
        ,   isAuto  	=   <?php echo \YaOO\jsRegEx(Data::$isAuto) ."g\n"; ?>
		,   isYouId     =   <?php echo \YaOO\jsRegEx(Data::$isYouId) ."\n"; ?>
        ,   match   	=   isImage.exec(url)
<?php
    include ( '_-'. basename(__FILE__, '.php')); 
?>
