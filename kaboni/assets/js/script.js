$(window).load(function(){$("#preloader").delay(350).fadeOut("slow",function(){})}),$(document).ready(function(){"use strict";function t(){{var t=$(window).width();$(window).height()}$(".introduction , .menu").css(t>767?{width:"50%",height:"100%"}:{width:"100%",height:"50%"});var i=$(".introduction").width(),n=$(".introduction").height(),o=$(".menu > div img");o.css(i>n?{width:"100%",height:"auto"}:{width:"100%",height:"100%"})}function i(){history.pushState("",document.title,window.location.pathname+window.location.search)}function n(){var t=$(".introduction").width(),i=$(".menu").width();$(".introduction").animate({left:"-"+t},1e3,"easeOutQuart"),$(".menu").animate({left:i},1e3,"easeOutQuart",function(){$(".home-page").css({display:"none"})})}if($(window).on("load resize",t),$(".menu").on("click",".menu_button",function(){n()}),$(".menu").on("click","div.menu_button",function(){var t=$(this).data("url_target");window.location.hash=t,$("#"+t).fadeIn(1200),$(window).scrollTop(0)}),$(".menu").on("click","div.profile-btn",function(){setTimeout(function(){$(".count").each(function(){$(this).prop("Counter",0).animate({Counter:$(this).text()},{duration:1500,easing:"swing",step:function(t){$(this).text(Math.ceil(t))}})})},100)}),$(".menu").on("click","div.portfolio-btn",function(){setTimeout(function(){$("#projects").mixItUp()},100)}),$(".menu").on("click","div.gallery-btn",function(){setTimeout(function(){$(".pop-up-gallery").magnificPopup({delegate:"a",type:"image",gallery:{enabled:!0}})},100)}),$("#contactForm").submit(function(t){t.preventDefault();var i=jQuery,n=i(this).serializeArray(),o=i(this).attr("action"),e=i("#contactFormResponse"),a=i("#cfsubmit"),c=a.text();return a.text("Sending..."),i.ajax({url:o,type:"POST",data:n,success:function(t){e.html(t),a.text(c),i("#contactForm input[name=name]").val(""),i("#contactForm input[name=email]").val(""),i("#contactForm textarea[name=message]").val("")},error:function(){alert("Error occurd! Please try again")}}),!1}),$("body").on("click",".close-btn",function(){window.location.hash="",$(".home-page").css({display:"block"}),$(".introduction, .menu").animate({left:0},1e3,"easeOutQuart"),$(".page").fadeOut(800),i(),$(window).scrollTop(0)}),$('.intro-content .social-media [data-toggle="tooltip"]').tooltip({placement:"bottom"}),$('.contact-details .social-media [data-toggle="tooltip"]').tooltip(),$("#sponsor-list").owlCarousel({autoPlay:3e3,stopOnHover:!0,items:3,itemsDesktop:[1200,3],itemsDesktopSmall:[991,3],itemsTablet:[767,2],itemsTabletSmall:[625,2],itemsMobile:[479,1]}),""!==window.location.hash&&window.location.hash){var o=window.location.hash.slice(1);$('*[data-url_target="'+o+'"]').trigger("click")}$(".open-popup-link").magnificPopup({type:"inline",midClick:!0})});

  