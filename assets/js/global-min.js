/*jshint browser:true */
/*!
* FitVids 1.1
*
* Copyright 2013, Chris Coyier - http://css-tricks.com + Dave Rupert - http://daverupert.com
* Credit to Thierry Koblentz - http://www.alistapart.com/articles/creating-intrinsic-ratios-for-video/
* Released under the WTFPL license - http://sam.zoy.org/wtfpl/
*
*/
!function(h){"use strict";h.fn.fitVids=function(t){var i={customSelector:null,ignore:null};if(!document.getElementById("fit-vids-style")){
// appendStyles: https://github.com/toddmotto/fluidvids/blob/master/dist/fluidvids.js
var e=document.head||document.getElementsByTagName("head")[0],a=".fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}",r=document.createElement("div");r.innerHTML='<p>x</p><style id="fit-vids-style">'+a+"</style>",e.appendChild(r.childNodes[1])}return t&&h.extend(i,t),this.each(function(){var t=['iframe[src*="player.vimeo.com"]','iframe[src*="youtube.com"]','iframe[src*="youtube-nocookie.com"]','iframe[src*="kickstarter.com"][src*="video.html"]',"object","embed"];i.customSelector&&t.push(i.customSelector);var n=".fitvidsignore";i.ignore&&(n=n+", "+i.ignore);var e=h(this).find(t.join(","));// Disable FitVids on this video.
(// SwfObj conflict patch
e=(e=e.not("object object")).not(n)).each(function(t){var e=h(this);if(!(0<e.parents(n).length||"embed"===this.tagName.toLowerCase()&&e.parent("object").length||e.parent(".fluid-width-video-wrapper").length)){e.css("height")||e.css("width")||!isNaN(e.attr("height"))&&!isNaN(e.attr("width"))||(e.attr("height",9),e.attr("width",16));var i,a,r=("object"===this.tagName.toLowerCase()||e.attr("height")&&!isNaN(parseInt(e.attr("height"),10))?parseInt(e.attr("height"),10):e.height())/(isNaN(parseInt(e.attr("width"),10))?e.width():parseInt(e.attr("width"),10));if(!e.attr("id")){var o="fitvid"+t;e.attr("id",o)}e.wrap('<div class="fluid-width-video-wrapper"></div>').parent(".fluid-width-video-wrapper").css("padding-top",100*r+"%"),e.removeAttr("height").removeAttr("width")}})})}}(window.jQuery||window.Zepto),jQuery(function(a){
// Smooth Scroll
function t(t){var e=null;try{e=a(t)}catch(t){
// Perhaps worth adding some error logging here in the future.
return!1}if((e=e.length?e:a("[name="+this.hash.slice(1)+"]")).length){var i=0;return"fixed"==a(".site-header").css("position")&&(i=a(".site-header").height()),a("body").hasClass("admin-bar")&&(i+=a("#wpadminbar").height()),a("html,body").animate({scrollTop:e.offset().top-i},1e3),!1}}
// -- Smooth scroll on pageload
window.location.hash&&t(window.location.hash),
// -- Smooth scroll on click
a('a[href*="#"]:not([href="#"]):not(.no-scroll)').click(function(){location.pathname.replace(/^\//,"")!=this.pathname.replace(/^\//,"")&&location.hostname!=this.hostname||t(this.hash)})}),// @codekit-prepend "jquery.fitvids.js"
// @codekit-prepend "smoothscroll.js"
jQuery(function(t){
// FitVids
t(".entry-content").fitVids()});