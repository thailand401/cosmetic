document.addEventListener( 'DOMContentLoaded', function() {

	/**
	* Masonry
	*/
	( function setupMasonry() {
		var grid = document.querySelector( '.tg-archive-style--masonry .cenote-content-masonry' ),
		masonry;

		if ( grid && typeof Masonry !== undefined && typeof imagesLoaded !== undefined ) {
			imagesLoaded( grid, function( instance ) {
				masonry = new Masonry( grid, {
					itemSelector: '.hentry'
				} );

				setTimeout( function() {
					grid.classList.remove( 'cenote-content-masonry--animated' );
				}, 4000 );
			} );
		}

	} () );

	// Adds animation to masonry layout.
	( function addAnimationToMasonry() {
		var masonryItem = document.querySelectorAll( '.tg-archive-style--masonry .cenote-content-masonry .hentry' );
		if ( masonryItem ) {
			for ( index = 0; index < masonryItem.length; index++ ) {
				masonryItem[index].style.animationDelay = 2 * ( index + 1 ) + '00ms';
			}
		}
	} () );

	/**
	 * Show search form.
	 */
	( function showSearchform() {
		var searchForm = document.querySelector( '.cenote-search-form' ),
		searchButton   = document.querySelectorAll( '.tg-header-action-menu .tg-search-toggle' ),
		searchFormClose = searchForm.querySelector( '.search-form-close' ),
		mainBody = document.getElementById( 'page' );

		// Close search form when clicked outsite of it.
		function closeOnBody( event ) {
			searchForm.classList.remove( 'cenote-search-form--opened' );
			mainBody.removeEventListener( 'click', closeOnBody, true );
		};

		// close on esc key pressed.
		function closeOnESC( event ) {
			if ( ( 'Escape' == event.key || 'Esc' == event.key || 27 == event.keyCode ) ) {
				event.preventDefault();
				searchForm.classList.remove( 'cenote-search-form--opened' );
				window.removeEventListener( 'keydown', closeOnESC, true );
			}
		};

		if ( searchForm && searchButton ) {
			searchButton.forEach( function( element ) {
				element.addEventListener( 'click', function() {
					searchForm.classList.toggle( 'cenote-search-form--opened' );
					mainBody.addEventListener( 'click', closeOnBody, true );
					window.addEventListener( 'keydown', closeOnESC, true );
				} );
			} );

			searchFormClose.addEventListener( 'click', function() {
				searchForm.classList.toggle( 'cenote-search-form--opened' );
			} );
		}
	} () );

	/**
	* Setup mobile menu
	*/
	( function setupMobileMenu() {
		var toggleButton = document.querySelector( '.tg-mobile-menu-toggle' ),
		stickyToggleButton = document.querySelector( '.cenote-header-sticky .tg-mobile-menu-toggle' ),
		mobileMenu = document.querySelector( '.cenote-mobile-navigation' ),
		main = document.getElementById( 'page' ),
		hammerMobileMenu;

		function closeMobileMenu() {
			if ( toggleButton ) {
				toggleButton.classList.remove( 'tg-mobile-menu-toggle--opened' );
			}

			if ( stickyToggleButton ) {
				stickyToggleButton.classList.remove( 'tg-mobile-menu-toggle--opened' );
			}

			if ( mobileMenu ) {
				mobileMenu.classList.remove( 'cenote-mobile-navigation--opened' );
			}
		}

		function openMobileMenu() {
			if ( toggleButton ) {
				toggleButton.classList.add( 'tg-mobile-menu-toggle--opened' );
			}

			if ( stickyToggleButton ) {
				stickyToggleButton.classList.add( 'tg-mobile-menu-toggle--opened' );
			}

			if ( mobileMenu ) {
				mobileMenu.classList.add( 'cenote-mobile-navigation--opened' );
			}
		}

		( function closeOnBody() {
			if ( main ) {
				main.addEventListener( 'touchstart', function( event ) {

					// Return if user is clicking on mobile menu toggle.
					var target = event.target;

					if ( toggleButton && ( target === toggleButton || toggleButton.contains( target ) ) ) {
						return;
					}

					if ( stickyToggleButton && ( target === stickyToggleButton || stickyToggleButton.contains( target ) ) ) {
						return;
					}
					closeMobileMenu();
				} );
			}
		} () );

		// Toggle menu and button class.
		if ( toggleButton && mobileMenu ) {
			toggleButton.addEventListener( 'click', function() {
				this.classList.toggle( 'tg-mobile-menu-toggle--opened' );
				if ( stickyToggleButton ) {
					stickyToggleButton.classList.toggle( 'tg-mobile-menu-toggle--opened' );
				}
				mobileMenu.classList.toggle( 'cenote-mobile-navigation--opened' );
			} );
		}

		// Toggle menu and button class.
		if ( stickyToggleButton && mobileMenu ) {
			stickyToggleButton.addEventListener( 'click', function() {
				this.classList.toggle( 'tg-mobile-menu-toggle--opened' );
				if ( toggleButton ) {
					toggleButton.classList.toggle( 'tg-mobile-menu-toggle--opened' );
				}
				mobileMenu.classList.toggle( 'cenote-mobile-navigation--opened' );
			} );
		}

		if ( 'ontouchstart' in window ) {
			if ( typeof Hammer !== undefined ) {
				hammerMobileMenu = new Hammer( document.body );
				hammerMobileMenu.on( 'swiperight', function() {
					openMobileMenu();
				} );

				hammerMobileMenu.on( 'swipeleft', function() {
					closeMobileMenu();
				} );
			}
		}

	} () );

	/**
	 * Scroll to top
	 */
	( function backToTop() {
		var backToTopButton = document.querySelector( '.cenote-back-to-top' ),
		showScrollToTopButton,
		hideScrollToTopButton;

		if ( backToTopButton ) {

			// Activate showing an hiding back to top.
			showScrollToTopButton = function() {
				if ( 500 < window.scrollY ) {
					backToTopButton.classList.add( 'cenote-back-to-top--show' );
					window.removeEventListener( 'scroll', showScrollToTopButton, true ); //Remove event since we want to execute only once(no performance issue)
					window.addEventListener( 'scroll', hideScrollToTopButton, true ); //Again start event to hide button.
				}
			};

			// Activate hiding and showing back to top.
			hideScrollToTopButton = function() {
				if ( 500 > window.scrollY ) {
					backToTopButton.classList.remove( 'cenote-back-to-top--show' );
					window.removeEventListener( 'scroll', hideScrollToTopButton, true ); //Remove event since we want to execute only once(no performance issue)
					window.addEventListener( 'scroll', showScrollToTopButton, true ); //Again start event to show button.
				}
			};

			// Show back to top button on scroll.
			window.addEventListener( 'scroll', showScrollToTopButton, true );

			// Hide back to top button on scroll
			window.addEventListener( 'scroll', hideScrollToTopButton, true );

			backToTopButton.addEventListener( 'click',  function() {

				// Only scroll to top if we are not in top.
				if ( 0 != window.scrollY ) {
					window.scroll( {
						top: 0,
						left: 0,
						behavior: 'smooth'
					} );
				}
			} );
		}
	} () );
} );

/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {

	/**
	 * Toggles `focus` class to allow submenu access on tablets.
	 */
	( function() {
		var touchStartFn, i,
			parentLink = document.querySelectorAll( '.main-navigation .menu-item-has-children > a, .main-navigation .page_item_has_children > a, .cenote-mobile-navigation .menu-item-has-children > a, .cenote-mobile-navigation .page_item_has_children > a' );
		if ( 'ontouchstart' in window ) {
			touchStartFn = function( e ) {
				var menuItem = this.parentNode,
				i;

				if ( ! menuItem.classList.contains( 'focus' ) ) {
					e.preventDefault();
					for ( i = 0; i < menuItem.parentNode.children.length; ++i ) {
						if ( menuItem === menuItem.parentNode.children[i] ) {
							continue;
						}
						menuItem.parentNode.children[i].classList.remove( 'focus' );
					}
					menuItem.classList.add( 'focus' );
				} else {
					menuItem.classList.remove( 'focus' );
				}
			};

			for ( i = 0; i < parentLink.length; ++i ) {
				parentLink[i].addEventListener( 'touchstart', touchStartFn, false );
			}
		}
	}( ) );

	/**
	 * Setup slider on specific area.
	 */
	( function setupSwiper() {
		var gallerySlider = document.querySelectorAll( '.post-format-media--gallery .swiper-container' ),
		swiperGallery;

		if ( gallerySlider && typeof Swiper !== undefined  ) {
			gallerySlider.forEach( function( element ) {
				swiperGallery = new Swiper( element, {
					speed: 400,
					autoplay: true,
					navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev'
					}
				} );
			} );
		}
	} () );

	/**
	 * Setup sticky header if enabled.
	 */
	( function setupStickyHeader() {
		var stickyHeader = document.querySelector( '.cenote-header-sticky' ),
		offsetHeight = document.querySelector( '.tg-site-header' ).offsetHeight,
		stickHeader;

		if ( stickyHeader && typeof Headroom !== undefined ) {
			stickHeader = new Headroom( stickyHeader, {
				offset: offsetHeight,
				classes: {
					initial: 'cenote-sticky-header',
					pinned: 'cenote-sticky-header--pinned',
					unpinned: 'cenote-sticky-header--unpinned',
					top: 'cenote-sticky-header--top',
					notTop: 'cenote-sticky-header--not-top',
					bottom: 'cenote-sticky-header--bottom',
					notBottom: 'cenote-sticky-header--not-bottom'
				}
			} );
			stickHeader.init();
		}
	} ( ) );

}() );
