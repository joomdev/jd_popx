/**
 * @package JDPopX
 * @version - 1.0
 * @author JoomDev https://www.joomdev.com/
 * @copyright Copyright (C) 2008 - 2018 JoomDev.com. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
jQuery(function($){
	$(document).ready(function() {
		$('#popx_subscribe_form').validate({
			rules: {
				popx_name: {
				  required: true,
				  normalizer: function( value ) {
					return $.trim( value );
				  }
				},
				popx_email: {
				  required: true,
				  email: true,
				  normalizer: function( value ) {
					return $.trim( value );
				  }
				}
			 },
			 submitHandler : function(form) {
				$.ajax({
					beforeSend: function(){
					 var btn = $('.popx-has-spinner');
					 $(btn).buttonLoader('start');
				   },
					url: form.action,
					type: form.method,
					data: $(form).serialize(),
					success: function(response) {
						var data = $.parseJSON(response);
						$('.popx_response').fadeIn(1500);
						if(data.success == true){
							$('.popx_response').html('<div class="alert alert-success alert-dismissable fade in">'+data.message+'</div>'); 
							var cookieday = $('.jdpopx_auto_popup').data('cookies'); 
							set_cookie(cookieday, 'jdpopx_subscribed=true');
							auto_close();
						}else{
							$('.popx_response').html('<div class="alert alert-danger alert-dismissable fade in">'+data.message+'</div>');
						}
					},
					complete: function(){
						var btn = $('.popx-has-spinner');
						$(btn).buttonLoader('stop');
					}
				});
			}
		});
		$('body').addClass('jdpopx');
		var $locked_containers = [];
		$( 'body' ).on( 'click', '.jd-popx-close-btn', function(){
			var container = $('.jdpopxcontainer');			
			container.addClass('jdpopx_exit_animation');
			setTimeout( function() {
				container.remove();
			}, 400 );
			return false;
		});

		function setCookieExpire( days ) {
			var ms = days*24*60*60*1000;
			var date = new Date();
			date.setTime( date.getTime() + ms );

			return "; expires=" + date.toUTCString();
		}

		function checkCookieValue( cookieName, value ) {
			return parseCookies()[cookieName] == value;
		}

		function parseCookies() {
			var cookies = document.cookie.split( '; ' );
			var ret = {};
			for ( var i = cookies.length - 1; i >= 0; i-- ) {
			  var el = cookies[i].split( '=' );
			  ret[el[0]] = el[1];
			}
			return ret;
		}

		function set_cookie( $expire, $cookie_content ) {
			var $cookie_content = '' == $cookie_content ? 'jdPopxCookie=true' : $cookie_content;
			cookieExpire = setCookieExpire( $expire );
			document.cookie = $cookie_content + cookieExpire + "; path=/";
		}

		//separate function for the setTimeout to make it work properly within the loop.
		function make_popup_visible( $popup, $delay, $cookie_exp, $cookie_content ){
			if ( ! $popup.hasClass( 'jdpopx_visible' ) ) {
				setTimeout( function() {
					$popup.addClass( 'jdpopx_visible jdpopx_animated' );
					if ( '' != $cookie_exp ) {
						//set_cookie( $cookie_exp, $cookie_content );
					}
				}, $delay );
			}
		}
		function auto_popup( $current_popup_auto, $delay ) { 
			if ( ! $current_popup_auto.hasClass('jdpopx_animated') ) {
				$already_subscribed = checkCookieValue('jdpopx_subscribed', 'true' );
					if (!$already_subscribed) {
						make_popup_visible ( $current_popup_auto, $delay, '', 'jdPopxCookie' );
					}
			}
		}
		function auto_close() { 
			var this_el = $('.jdpopx_auto_popup'),
			delay = '' !== this_el.data( 'delay' ) ? this_el.data( 'delay' ) * 1000 : 0;
			var aftersubscribe = this_el.data('aftersubscribe');
			if(aftersubscribe == 'redirect'){
				var url = this_el.data('url');	
				 window.open(url, '_blank');
				//window.location.href = url; 
				setTimeout( function() {
					$('.jdpopxcontainer').addClass('jdpopx_exit_animation');
					setTimeout( function() {
						$('.jdpopxcontainer').remove();
					}, 400 );
				},delay);
			}else{
				setTimeout( function() {
					$('.jdpopxcontainer').addClass('jdpopx_exit_animation');
					setTimeout( function() {
						$('.jdpopxcontainer').remove();
					}, 400 );
				},delay);	
			}
		}
		 if( $('.jdpopx_auto_popup').length ) {
			var this_el = $('.jdpopx_auto_popup'),
				delay = '' !== this_el.data( 'delay' ) ? this_el.data( 'delay' ) * 1000 : 0;
			auto_popup( this_el, delay );
		 }
	});
});