/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
// ( function() {
// 	var container, button, menu, links, i, len;

// 	container = document.getElementById( 'site-navigation' );
// 	if ( ! container ) {
// 		return;
// 	}

// 	button = container.getElementsByTagName( 'button' )[0];
// 	if ( 'undefined' === typeof button ) {
// 		return;
// 	}

// 	menu = container.getElementsByTagName( 'ul' )[0];

// 	// Hide menu toggle button if menu is empty and return early.
// 	if ( 'undefined' === typeof menu ) {
// 		button.style.display = 'none';
// 		return;
// 	}

// 	menu.setAttribute( 'aria-expanded', 'false' );
// 	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
// 		menu.className += ' nav-menu';
// 	}

// 	button.onclick = function() {
// 		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
// 			container.className = container.className.replace( ' toggled', '' );
// 			button.setAttribute( 'aria-expanded', 'false' );
// 			menu.setAttribute( 'aria-expanded', 'false' );
// 		} else {
// 			container.className += ' toggled';
// 			button.setAttribute( 'aria-expanded', 'true' );
// 			menu.setAttribute( 'aria-expanded', 'true' );
// 		}
// 	};

// 	// Get all the link elements within the menu.
// 	links    = menu.getElementsByTagName( 'a' );

// 	// Each time a menu link is focused or blurred, toggle focus.
// 	for ( i = 0, len = links.length; i < len; i++ ) {
// 		links[i].addEventListener( 'focus', toggleFocus, true );
// 		links[i].addEventListener( 'blur', toggleFocus, true );
// 	}

// 	*
// 	 * Sets or removes .focus class on an element.
	 
// 	function toggleFocus() {
// 		var self = this;

// 		// Move up through the ancestors of the current link until we hit .nav-menu.
// 		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

// 			// On li elements toggle the class .focus.
// 			if ( 'li' === self.tagName.toLowerCase() ) {
// 				if ( -1 !== self.className.indexOf( 'focus' ) ) {
// 					self.className = self.className.replace( ' focus', '' );
// 				} else {
// 					self.className += ' focus';
// 				}
// 			}

// 			self = self.parentElement;
// 		}
// 	}

// 	/**
// 	 * Toggles `focus` class to allow submenu access on tablets.
// 	 */
// 	( function( container ) {
// 		var touchStartFn, i,
// 			parentLink = container.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

// 		if ( 'ontouchstart' in window ) {
// 			touchStartFn = function( e ) {
// 				var menuItem = this.parentNode, i;

// 				if ( ! menuItem.classList.contains( 'focus' ) ) {
// 					e.preventDefault();
// 					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
// 						if ( menuItem === menuItem.parentNode.children[i] ) {
// 							continue;
// 						}
// 						menuItem.parentNode.children[i].classList.remove( 'focus' );
// 					}
// 					menuItem.classList.add( 'focus' );
// 				} else {
// 					menuItem.classList.remove( 'focus' );
// 				}
// 			};

// 			for ( i = 0; i < parentLink.length; ++i ) {
// 				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
// 			}
// 		}
// 	}( container ) );
// } )();

(function() {

	var $menuButton = $('#menuButton');
	var $menuButtonClose = $('#menu-button-close');
	var $siteNavigation = $('#site-navigation');
	var $menuSlide = $('#secondary');
	var $menuSlideSidebar = $('#menuSlideSidebar');
	var $body = $('body');

	// Hide Header on on scroll down
	var didScroll;
	var lastScrollTop = 0;
	var delta = 5;
	var $siteHeader = $('#masthead');
	var navbarHeight = $siteHeader.outerHeight();

	function slideMenuOpen() {
		$body.addClass('menu-opened');
		$menuSlide.fadeIn(200, function(){	
			$(this).addClass('menu-slide--activated');
		});	
	}

	function slideMenuClose() {
		if (!$(event.target).closest($menuSlideSidebar).length) {
			$(this).removeClass('menu-slide--activated').fadeOut(200, function() {
				$body.removeClass('menu-opened');
			});
			
		}		
	}

	function hasScrolled() {
	    var st = $(this).scrollTop();
	    // Make sure they scroll more than delta
	    if(Math.abs(lastScrollTop - st) <= delta)
	        return;
	    
	    // If they scrolled down and are past the navbar, add class .nav-up.
	    // This is necessary so you never see what is "behind" the navbar.
	    if (st > 500) {
			$siteHeader.addClass('site-header--pos-fixed');

		    if (st > lastScrollTop && st > navbarHeight){
		        // Scroll Down
		        $siteHeader.removeClass('nav-down').addClass('nav-up');
		    } else {
		        // Scroll Up
		        if(st + $(window).height() < $(document).height()) {
		            $siteHeader.removeClass('nav-up').addClass('nav-down');
		        }
		    }
		} else {
			$siteHeader.removeClass('site-header--pos-fixed');
			$siteHeader.removeClass('nav-up nav-down');
		}
		    
	    lastScrollTop = st;
	}

	var IntervalTicker = false;
	var checkingForScroll;

	$(window).scroll(function(event){
	    didScroll = true;
	});

	

	$(window).on('load resize', function() {

		if (window.matchMedia('(max-width: 730px)').matches) {

			if ($menuButton.hasClass('menu-button--lg')) {
				$menuButton.prependTo('#headerSiteNavigation').removeClass('menu-button--lg').addClass('menu-button--sm');
				$siteNavigation.prependTo('.right-sidebar-inner--js');
			}
		} else {
			if ($menuButton.hasClass('menu-button--sm')) {
				$menuButton.insertBefore('#headerSiteNavigation').removeClass('menu-button--sm').addClass('menu-button--lg');
				$siteNavigation.appendTo('#headerSiteNavigation');
			}
		}

		if (!$('body').hasClass('single')) {

			if (window.matchMedia('(max-width: 1350px)').matches) {

				if (!$menuSlide.hasClass('menu-slide--js')) {
					$menuSlide.addClass('menu-slide--js');
					$menuButton.on('click', slideMenuOpen).fadeIn();
					$menuSlide.on('click', slideMenuClose);
				}

				if (IntervalTicker === false) {
					checkingForScroll = setInterval(function() {
						    if (didScroll) {
						        hasScrolled();
						        didScroll = false;
						    }
						}, 250);
					IntervalTicker = true;
				}		
			} else {
				$body.removeClass('menu-opened');
				$menuSlide.css('display', '').removeClass('menu-slide--js menu-slide--activated').off('click', slideMenuClose).fadeIn();
				$menuButton.off('click', slideMenuOpen).fadeOut();
				clearInterval(checkingForScroll);
				$siteHeader.removeClass('site-header--pos-fixed');
				$siteHeader.removeClass('nav-up nav-down');		
				IntervalTicker = false;
			}
		} else {
			$menuSlide.addClass('menu-slide--js');
			$menuButton.on('click', slideMenuOpen).fadeIn();
			$menuSlide.on('click', slideMenuClose);

			setInterval(function() {
			    if (didScroll) {
			        hasScrolled();
			        didScroll = false;
			    }
			}, 250);
		}
	})
} )();