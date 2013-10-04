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
//-- HIDE SEARCH IF HOVER ON MENU ITEMS
$('.sf-menu li').live('mouseenter', function(){
    $('#the-search').css('display', 'none');
    opacity = 0;
});
    
//------------ TYRONE ADDS RESPONSIVE SLIDES
//$(".rslides").responsiveSlides({
//    "timeout": 10000
//});

//--check window.resize width of calltoaction
//$(window).resize(function(){
//    var menuwidth = $('#menu-menu_oim').width();
//    var menuwidthoffset = -menuwidth/2;
//
//    $('.calltoaction').css('width', menuwidth);
//    $('.calltoaction').css('margin-left', menuwidthoffset);
//    $('.calltoaction').css('left', '50%');
//});

//------------ TYRONE INIT SUPERFISH MENUS
$('ul.sf-menu').superfish();

//------------ TYRONE EXPANDABLE 3RD LEVEL DROPDOWNS
$('.secondary-link').each(function(){
    $(this).live('mouseenter', function(){
        //$('.flyout').removeClass('expand');
        $(this).find('.flyout').addClass('expand');
    });
    $(this).live('mouseleave', function(){
        $(this).find('.flyout').removeClass('expand');
    });
});
//------------ TYRONE simply scroll init
$("#scroller").simplyScroll();


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
    $('#menu-mobile span').css('color', '#A22B38');
});
$('#menu-mobile').live('mouseleave', function(){
    $('#menu-mobile span').css('color', '');
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


    /*
    Responsive jQuery is a tricky thing.
    There's a bunch of different ways to handle
    it, so be sure to research and find the one
    that works for you best.
    */
    
    /* getting viewport width */
    var responsive_viewport = $(window).width();
    
    /* if is below 481px */
    if (responsive_viewport < 481) {
        
    } /* end smallest screen */
    
    /* if is larger than 481px */
    if (responsive_viewport > 481) {
        
    } /* end larger than 481px */
    
    /* if is above or equal to 768px */
    if (responsive_viewport >= 768) {
    
        /* load gravatars */
        $('.comment img[data-gravatar]').each(function(){
            $(this).attr('src',$(this).attr('data-gravatar'));
        });
    }
    
    /* off the bat large screen actions */
    if (responsive_viewport > 1030) {
        
    }
    
	
	// add all your scripts here
	
 
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