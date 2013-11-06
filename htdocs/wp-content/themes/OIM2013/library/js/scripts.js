/*
Bones Scripts File
Author: Eddie Machado

This file should contain any js scripts you want to add to the site.
Instead of calling it in the header or throwing it inside wp_head()
this file will be called automatically in the footer so as not to
slow the page load.

*/

// IE8 ployfill for GetComputed Style (for Responsive Script below)
if (!window.getComputedStyle) {
    window.getComputedStyle = function(el, pseudo) {
        this.el = el;
        this.getPropertyValue = function(prop) {
            var re = /(\-([a-z]){1})/g;
            if (prop == 'float') prop = 'styleFloat';
            if (re.test(prop)) {
                prop = prop.replace(re, function () {
                    return arguments[2].toUpperCase();
                });
            }
            return el.currentStyle[prop] ? el.currentStyle[prop] : null;
        };
        return this;
    };
}

// as the page loads, call these scripts
jQuery(document).ready(function($) {
//====================================fancybox init
$('.fancybox').fancybox();

//------------ TYRONE simply scroll init
    $("#scroller").simplyScroll();


var responsive_viewport = $(window).width();
//-------------------------------------------------- THIS IS SCREEN RES CHECK ON DOC READY
/* if is below 481px */
if (responsive_viewport < 481) {

} /* end smallest screen */

/* if is larger than 481px */
if (responsive_viewport > 481) {

} /* end larger than 481px */

/* if is less than 768px */
if (responsive_viewport < 768) {
//    $('.cycle-slide img').removeClass('slide-large');
//    $('.cycle-slide img').addClass('response-img');
}
/* if is above or equal to 768px */
if (responsive_viewport >= 768) {
//    $('.cycle-slide img').removeClass('response-img');
//    $('.cycle-slide img').addClass('slide-large');
    /* load gravatars */
    $('.comment img[data-gravatar]').each(function(){
        $(this).attr('src',$(this).attr('data-gravatar'));
    });
}
/* off the bat large screen actions */
if (responsive_viewport > 1030) {}
        
        
    /*
    Responsive jQuery is a tricky thing.
    There's a bunch of different ways to handle
    it, so be sure to research and find the one
    that works for you best.
    */
    $(window).resize(function(){
        //-------------------------------------------------- THIS IS SCREEN RES CHECK ON WINDOW RESIZE
        /* getting viewport width */
        var responsive_viewport = $(window).width();
        

        /* if is below 481px */
        if (responsive_viewport < 481) {

        } /* end smallest screen */

        /* if is larger than 481px */
        if (responsive_viewport > 481) {

        } /* end larger than 481px */

        /* if is less than 768px */
        if (responsive_viewport < 768) {
//            $('.cycle-slide img').removeClass('slide-large');
//            $('.cycle-slide img').addClass('response-img');
        }
        /* if is above or equal to 768px */
        if (responsive_viewport >= 768) {
//            $('.cycle-slide img').removeClass('response-img');
//            $('.cycle-slide img').addClass('slide-large');
            /* load gravatars */
            $('.comment img[data-gravatar]').each(function(){
                $(this).attr('src',$(this).attr('data-gravatar'));
            });
        }
        /* off the bat large screen actions */
        if (responsive_viewport > 1030) {}
        
    });
    
   
   
   //------------ TYRONE CYCLE JS
   $('.cycle-slideshow').cycle();
   
   //------------ TYRONE CYCLE RESIZER
   //------------------------------------------------ THIS centers the caption divs on doc ready
   var sliderwidth = $('.wrap').width();
   var slidermarginleft = sliderwidth / 2 * -1;

   $('.cycle-caption').css('position', 'absolute');
   $('.cycle-caption').css('width', sliderwidth);
   $('.cycle-caption').css('margin-left', slidermarginleft);
   $('.cycle-caption').css('left', '50%');
   
   
   var sliderwidth = $('.wrap').width();
       var slidermarginleft = sliderwidth / 2 * -1;
       
   //------------------------------------------------ THIS centers the caption divs on window resize
   if($(window).width() < 768){
       //--- Make slides imgs responsive
       $('.cycle-slide img').addClass('response-img');
       $('.cycle-slide img').removeClass('slide-large');
   }else{
       //--- Remove responsive class for slides imgs
       $('.cycle-slide img').addClass('slide-large');
       $('.cycle-slide img').removeClass('response-img');
       //-- center captions
       $('.cycle-caption').css('position', 'absolute');
       $('.cycle-caption').css('width', sliderwidth);
       $('.cycle-caption').css('margin-left', slidermarginleft);
       $('.cycle-caption').css('left', '50%');
   }
   //------------------------------------------------ THIS centers the caption divs on window resize
   $(window).resize(function(){
       var sliderwidth = $('.wrap').width();
       var slidermarginleft = sliderwidth / 2 * -1;
       
       
       if($(window).width() < 768){
           //--- Make slides imgs responsive
           $('.cycle-slide img').addClass('response-img');
           $('.cycle-slide img').removeClass('slide-large');
       }else{
           //--- Remove responsive class for slides imgs
           $('.cycle-slide img').addClass('slide-large');
           $('.cycle-slide img').removeClass('response-img');
           //-- center captions
           $('.cycle-caption').css('position', 'absolute');
           $('.cycle-caption').css('width', sliderwidth);
           $('.cycle-caption').css('margin-left', slidermarginleft);
           $('.cycle-caption').css('left', '50%');
       }
   });
  
   
       
    //------------ TYRONE SEARCHER REVEAL
    var opacity = 0;

    $('.searchicon').click(function(){
        if(opacity === 0){
            $('#the-search').css('display', 'block');
            $('#the-search').animate({opacity: '1'}, 'fast');
            opacity = 1;
        }else{
            $('#the-search').animate({opacity: '0'}, 'fast', function(){
                $('#the-search').css('display', 'none');
            });
            opacity = 0;
        }
    });

    //------------ TYRONE MEGA PARENTS HOVER BEHAVIOURS
    $('.mega-parent').each(function(){
        $(this).mouseenter(function(){
            $(this).find('.parent-a').css('color', '#ffffff');
        });
        $(this).mouseleave(function(){
            $(this).find('.parent-a').css('color', '');
        });
    });

    //-- HIDE SEARCH IF HOVER ON MENU ITEMS
    $('.sf-menu li').live('mouseenter', function(){
        $('#the-search').css('display', 'none');
        opacity = 0;
    });

    //------------ TYRONE INIT SUPERFISH MENUS
    $('ul.sf-menu').superfish();

    //------------ TYRONE EXPANDABLE 3RD LEVEL DROPDOWNS
    $('.secondary-link').each(function(){
        $(this).mouseenter(function(){
            $(this).css('cursor', 'pointer');
            $(this).css('color', '#B22C33');
        });
        $(this).mouseleave(function(){
            $(this).css('color', '');
        });
        $(this).live('click', function(){
            //$(this).css('cursor', 'pointer');
            //$(this).css('color', '#B22C33');
            $('.flyout').removeClass('expand');
            $(this).find('.flyout').addClass('expand');
        });
    });
    

    //------------ TYRONE MENU-MOBILE INTERACTIONS
    //-- HOVERS INDIVIDUAL ITEM
    $('.mobile-item').live('mouseenter', function(){
        $(this).find('a').css('color', '#ffffff');
    });
    
    $('.mobile-item').live('mouseleave', function(){
        $(this).find('a').css('color', '');
    });
    
    //-- HOVERS MAIN MENU ICON
    $('#menu-mobile').live('mouseenter', function(){
        $(this).css('cursor', 'pointer');
    });

    //-- CLICKS
    $('#menu-mobile').live('click', function(){
        $('#mobile-menu-holder').slideToggle('fast');
    });
    
    //-------- HIDE MOBILE MENU WHEN RESIZING TO 768 UP
    $(window).resize(function(){
        if($(window).width() >= 768){
            //--- HIDE MOBILE MENU
            $('#mobile-menu-holder').css('display', 'none');
        }
    });
    
    //============================
    //     SIDEBAR DROPDOWN
    //============================
    $(".sidebar-select").click(function(){
        $(".sidebar-select-list").toggleClass("hidden");
    });
    
    //=======================================
    //     INPUTS PLACEHOLDER BEHAVIOUR 
    //=======================================
    $("input, textarea").bind({
        focus: function() {
            $(this).removeAttr("style"); //resets the inline styling caused by an error in the input

            if($(this).is("input")){
                if($(this).data("placeholder") === $(this).val()){
                    $(this).val("");
                }
            }else if($(this).is("textarea")){
                if($(this).data("placeholder") === $(this).html()){
                    $(this).html("");
                }
            }
        },
        blur: function() {
            if($(this).is("input")){
                if($(this).val().trim() === ""){
                    $(this).val($(this).data("placeholder"));
                }
            }else if($(this).is("textarea")){
                if($(this).html().trim() === ""){
                    $(this).html($(this).data("placeholder"));
                }
            }
        }
    });
    
    
    //=======================
    //     CONTACT FORM
    //=======================
    function disable_alpha_chars(event){
        // allow only backspace (8), delete (46), tab (9), all numerics (48-57), and numeric numpad (96-105) buttons
        exceptions = new Array(48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 46, 8, 9);

        for(i in exceptions){
            allow_key = false;

            if(event.keyCode == exceptions[i]){
                allow_key = true; 
                break
            }
        }

        if(!allow_key){
            event.preventDefault();
        }
    }

    function validate (target) {
        if ($(target).val() !== $(target).data("placeholder")) {
            return true;
        }else{
            $(target).css({background: "#B32C32", color: "white"});
            return false;
        }
    }

    function validate_email (target) {
        var atSymbol    = $(target).val().indexOf('@');
        var dot         = $(target).val().indexOf('.');
        var lastDot     = $(target).val().lastIndexOf('.');
        var length      = ($(target).val().length)-1;
        var secondAt    = $(target).val().indexOf('@', (atSymbol+1));

        if($(target).val() === $(target).data("placeholder")){
            $(target).css({background: "#B32C32", color: "white"});
            return false;
        }
        else if(atSymbol < 0){
            $(target).css({background: "#B32C32", color: "white"});
            return false;
        }
        else if(atSymbol === 0){
            $(target).css({background: "#B32C32", color: "white"});
            return false;
        }
        else if(dot < 0){
            $(target).css({background: "#B32C32", color: "white"});
            return false;
        }
        else if(lastDot < atSymbol){
            $(target).css({background: "#B32C32", color: "white"});
            return false;
        }
        else if(lastDot >= length){
            $(target).css({background: "#B32C32", color: "white"});
            return false;
        }
        else if(secondAt > 0){
            $(target).css({background: "#B32C32", color: "white"});
            return false;
        }
        else{
            return true;
        }
    }

    if($("#contact-form").length > 0){
        $("#number").bind("keydown", disable_alpha_chars);

        function validate_contactform() {
            var valid_name      = validate("#name");
            var valid_email     = validate_email("#email");
            var valid_topic     = validate("#topic");

            if(valid_name && valid_email && valid_topic){
                return true;
            }else{
                alert('Please fill in all the required form fields correctly before submitting');
                return false;
            }
        }

        function execute_contactform(result) {
            var res = result.trim();
            
            if(res === 'success'){
                //alert('Thank you! A confirmation of your request will be emailed to you shortly.');
                window.location = php_data.thankyou_page;
            }else{
                alert(result);
            }

           console.log(result);
        }

        $("#contact-form").ajaxForm({
            url:            template_data.directory + "/library/scripts/mail.execute.php",
            type:           "post",
            beforeSubmit:   validate_contactform,
            success:        execute_contactform,
            resetForm:      true
        });
    }
 
}); /* end of as page load scripts */


/*! A fix for the iOS orientationchange zoom bug.
 Script by @scottjehl, rebound by @wilto.
 MIT License.
*/
(function(w){
	// This fix addresses an iOS bug, so return early if the UA claims it's something else.
	if( !( /iPhone|iPad|iPod/.test( navigator.platform ) && navigator.userAgent.indexOf( "AppleWebKit" ) > -1 ) ){ return; }
    var doc = w.document;
    if( !doc.querySelector ){ return; }
    var meta = doc.querySelector( "meta[name=viewport]" ),
        initialContent = meta && meta.getAttribute( "content" ),
        disabledZoom = initialContent + ",maximum-scale=1",
        enabledZoom = initialContent + ",maximum-scale=10",
        enabled = true,
		x, y, z, aig;
    if( !meta ){ return; }
    function restoreZoom(){
        meta.setAttribute( "content", enabledZoom );
        enabled = true; }
    function disableZoom(){
        meta.setAttribute( "content", disabledZoom );
        enabled = false; }
    function checkTilt( e ){
		aig = e.accelerationIncludingGravity;
		x = Math.abs( aig.x );
		y = Math.abs( aig.y );
		z = Math.abs( aig.z );
		// If portrait orientation and in one of the danger zones
        if( !w.orientation && ( x > 7 || ( ( z > 6 && y < 8 || z < 8 && y > 6 ) && x > 5 ) ) ){
			if( enabled ){ disableZoom(); } }
		else if( !enabled ){ restoreZoom(); } }
	w.addEventListener( "orientationchange", restoreZoom, false );
	w.addEventListener( "devicemotion", checkTilt, false );
})( this );