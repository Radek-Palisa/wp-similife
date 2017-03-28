
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

		$siteNavigation.fadeIn();
	})
} )();

$(function() {
	var searchInput = $('#search');

	if (searchInput.val()) {
		searchInput.addClass('search-text--focus');
	}

	searchInput.on({
		focus: function() {
			if (!searchInput.val()) {
				$(this).addClass('search-text--focus')
			}
		},
		blur: function() {
			if (!searchInput.val()) {
				$(this).removeClass('search-text--focus');
			}
		}
	})

	var $socialLinks = $('.social-aside a');
	var socialLinkTitles = [];

	$socialLinks.each(function() {
		socialLinkTitles.push(this.getAttribute('title'));
	});

	$(window).on('load resize', function() {

		if ($('#menu-slide').hasClass('menu-slide--js') || window.matchMedia('(min-width: 1600px)').matches) {
			$socialLinks.each(function() {	
				self = $(this);
				self.removeAttr('title');
			});
		} else {
			for (var i = 0; i < $socialLinks.length; i++) {
				$socialLinks[i].setAttribute('title', socialLinkTitles[i]);
			}
		}
	})
;});

