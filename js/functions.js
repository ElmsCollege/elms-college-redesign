(function($, window, document, undefined) {
  var $win = $(window);
  var $doc = $(document);
  
  $.fn.getIndex = function(){
  	  var $p=$(this).parent().children();
      return $p.index(this);
  };
  
  $doc.ready(function() {
    
    // mobile menu submenu toggle
    $("body").on("click", "#primary-menu .menu-item-has-children > a, #special-menu .menu-item-has-children > a", function (e) {
      var pWidth = $(e.target).innerWidth(); //use .outerWidth() if you want borders
      var pOffset = $(e.target).offset(); 
      var x = e.pageX - pOffset.left;
      if (pWidth*0.85 < x && $("body").hasClass("mobile-or-library")) {
        e.preventDefault();
        e.stopPropagation();
        $($(e.target).parent()).toggleClass("open");
      }
    });
    
    // ensure ada compliance border outline only appears on keyboard focus not mouse focus
    $("body").on("mousedown", "*", function(e) {
        if (($(this).is(":focus") || $(this).is(e.target)) && $(this).css("outline-style") == "none") {
            $(this).css("outline", "none").on("blur", function() {
                $(this).off("blur").css("outline", "");
            });
        }
    });
    
    var is_iPad = (navigator != null && navigator.userAgent != null && navigator.userAgent.match(/iPad|iPhone|iPod/i) != null);
        
    // show more sidebar events 
    $("body").on("click", ".field-related-events .show-more, .field-related-events .show-less", function(e) {
      $(".field-related-events").toggleClass("toggled");
      e.preventDefault();
    });
    
    $(window).resize(function(){
      $('img.js-focal-point-image').responsify();
    });
      
    // copying special section nav (library, school of nursing, subdomains) into the mobile menu
    var specialNavItems = [];
      $("#special-section-menu > li").each( function () {
        console.log($(this));
        var clone = $(this).clone();
        clone = $(clone); 
        clone.removeAttr("id");
        $(clone.find("li")).removeAttr("id");
        specialNavItems.push(clone);
      });
    var count;
    for(count = specialNavItems.length; count >= 0; count--){
      $("#special-menu").prepend(specialNavItems[count]);
    }
    
    // handle keyboard focus in main menu
    $("#primary-menu > .menu-item > a, #special-section-menu  > .menu-item > a").focus(function (e) {
      console.log(whatInput.ask());
      if (whatInput.ask() === 'keyboard') {
        $("#primary-menu > .menu-item, #special-section-menu > .menu-item").removeClass("open");
        $(this).parent().addClass("open");
      }
    });
    $("#primary-menu > .menu-item > a, #special-section-menu > .menu-item > a").blur(function (e) {
      if (whatInput.ask() === 'keyboard') {
        var children = $(this).parent().find(".sub-menu a");
        if (children.length) {
          $(children.get(0)).focus();
        }
        else {
          $(this).parent().removeClass("open");
        }
      }
    });
    
    // hamburger trigger
    $('.nav-trigger').on('click touchstart', function (event) {
        event.preventDefault();
        
        $(this).toggleClass('active');  
        $('header#masthead, html').toggleClass('active');  

        if( $win.width() < 720 ) {
          $('body, .link-donate').toggleClass('active');
        }
    });
    var resetMenuIfDesktopWidth = function () {
      if (Modernizr.mq("only screen and (min-width: 64em)") && !$("body").hasClass("page-template-library-landing-page") && !$("body").hasClass("page-template-library-interior-page")) {
        $("body, header#masthead, html, .nav-trigger, .link-donate").removeClass("active");
        $(".main-navigation li").removeClass("open");
      }
    };
    //resetMenuIfDesktopWidth();
    $(window).resize( function (e) {
      resetMenuIfDesktopWidth();
    });
    	  
    // interior landing page and interior generic mobile dropdowns.
		if( $('ul.opening-menu').length ) {
			$('<select class="opening-select" aria-label="Navigation options"></select>').insertAfter( $('ul.opening-menu') );

			$('ul.opening-menu li').each(function(index) {
				var value = $(this).find('a').text();

				$('<option value="' + ( index + 1 ) + '">' + value + '</option>').appendTo( $('select.opening-select') );
			});
		}
    var sidebarMenu = $('ul.parent-sidebar-menu');
    var finalSidebarMenu = false;
    var sidebarMenuAlreadyExists = !!(sidebarMenu.length);
    if( !sidebarMenuAlreadyExists && !!$(".field-sidebar-menu-items li").length) {
      finalSidebarMenu = $("<ul class='parent-sidebar-menu'></ul>");
      $(".page-sidebar").prepend(finalSidebarMenu);
    }
    else {
      finalSidebarMenu = sidebarMenu;
    }
    //console.log("ifnalsidebarmenu");
    //console.log(finalSidebarMenu);
		if( finalSidebarMenu && finalSidebarMenu.length ) {
      
      $(".field-sidebar-menu-items li").each ( function (index, element) {
        var link = $(this).find("a");
        console.log(link);
        if (link.length > 0 && (link.attr("href")) && $(finalSidebarMenu.find('li a[href="' + $(this).find("a").attr("href") + '"]')).length == 0) {
          finalSidebarMenu.append( $(this) );
        }
      });
      
			jQuery('ul.parent-sidebar-menu li').each(function (index) {
			  var parent = jQuery(jQuery(this).parent()).attr('class');
			  var value = jQuery(jQuery(this).find('a').get(0)).text();
			  var newOptionFromNav = jQuery('<option value="' + (index + 1) + '">' + value + '</option>');
			  jQuery('select.opening-select').append(newOptionFromNav);
			  if (parent == "children") {
			    newOptionFromNav.addClass("child");
			  }
			});
			$("select.opening-select > option").each(function () {
			  var optionValue = jQuery(this).val();
			  console.log(optionValue);
			  var optionClass = jQuery(this).attr("class");
			  console.log(optionClass);
			  jQuery(".fs-dropdown-options button[data-value='" + optionValue + "']").addClass(optionClass);
			});
		}
    
		if( $('.opening-select').length ) {
			$('.opening-select').dropdown({ customClass: "opening-menu"});

			$('body').on('click mousedown', '.fs-dropdown-selected', function() {
        if (!is_iPad) {
          $(".fs-dropdown").toggleClass("fs-dropdown-open");
        }
        
			});
      
      var realMenuSelector = ".opening-menu li";
      if ($(".parent-sidebar-menu").length) {
        realMenuSelector = ".parent-sidebar-menu li";
      }
      $("body").on("blur change", "select.fs-dropdown-element", function(e) {
           var selectedOption = $(this).val();
           console.log($($(realMenuSelector).get(selectedOption - 1)));
           if (window.location.href != $($(realMenuSelector).get(selectedOption - 1)).find("a").attr("href")) {
             window.location.href = $($(realMenuSelector).get(selectedOption - 1)).find("a").attr("href");
           }
           else {
             e.preventDefault();
             e.stopPropagation();
           }
      });
      $("body").on("click", ".fs-dropdown-item", function() {
        if (!is_iPad) {
          var selectedOption = $(this).attr("data-value");
          window.location.href = $($(realMenuSelector).get(selectedOption - 1)).find("a").attr("href");
        }
        else {
          e.preventDefault();
        }
      });
      $("body").on("click touchstart mousedown", ".fs-dropdown-open *", function(e) {
        
        if (is_iPad) {
          e.preventDefault();
        }
           
      });
      
      
      $("body").on("click", "*:not(.fs-dropdown):not(button.fs-dropdown-item):not(.fs-dropdown-options), .fs-dropdown-open", function() {
        $(".fs-dropdown").removeClass("fs-dropdown-open");
      });
		}
    
    //interior landing page story expander.
    $(".page-template-landing-page .show-more a").on( "click touchstart", function (e) {
      e.preventDefault();
      $(this).parent().parent().find(".field-excerpt, .field-permalink").slideToggle();
      if (!$(this).hasClass("open")) {
        $(this).text("Show Less");
      }
      else {
        $(this).text("Show More");
      }
      $(this).toggleClass("open");
    });
    
    //replace search menu text with icon and add dropdown.
    $('#masthead a[href*="/search/"]').each(function() {
      $(this).on("click touchstart", function (e) {
        if (Modernizr.mq("only screen and (min-width: 64em)")) {
          e.preventDefault();
          $($(this).parent()).toggleClass("open");
        }        
      });
    });

    // double fake mobile/library menu 
    var updateMenu = function () {
      if (Modernizr.mq("only screen and (max-width: 64em)") || 
      (jQuery("body").is("#nursingPage")) ||
      (jQuery("body").is("#libraryPage")) ||
      (jQuery("body").is("#commencementPage")) ) {
        $("body").addClass("mobile-or-library");
      }
      else {
        $("body").removeClass("mobile-or-library");
      }
    };
    updateMenu();
    $(window).resize( function (e) {
      updateMenu();
    });
    
    //preload all carousel images
    var preloadCarousel = function (){
      $(".story-carousel .story-image img").each( function () {
        (new Image()).src = $(this).src;
      });
    };
    preloadCarousel();
    //make landingpage student carousel work.
    $(".story-carousel .story-tab:first-child").addClass("active");
    $(".story-carousel .story-tab").on( "click focus", function () {
      var index = $(this).getIndex() + 1;
      console.log(index);
      $(".story-feature .story-full").not(":nth-child("+index+")").css("z-index", "0").delay(400).fadeOut(1);
      $(".story-feature .story-full:nth-child("+index+")").css("z-index", "1").fadeIn(400);
      
      $(".story-carousel .story-tab").removeClass("active");
      $(this).addClass("active");
    });
    $(".story-feature-nav.nav-prev").click( function (e) {
      var height = $(this).parent().prev().height();
      $(this).parent().css({"z-index": 0}).delay(400).fadeOut(1);
      $(this).parent().prev().css({"z-index": 1, height: height, position:"absolute"}).fadeIn(400, function() { $(this).css({height:"", position:""}); });//.css({height:"", position:""});
      e.preventDefault();
      $(".story-tab").removeClass("active");
      var shouldBeUnnecessary = $(this).parent().prev().index();
      $(".story-tab:nth-child("+$(shouldBeUnnecessary+1)+")").addClass("active");
    });
    $(".story-feature-nav.nav-next").click( function (e) {
      var height = $(this).parent().next().height();
      $(this).parent().css({"z-index": 0}).delay(400).fadeOut(1);
      $(this).parent().next().css({"z-index": 1, height: height, position:"absolute"}).fadeIn(400, function() { $(this).css({height:"", position:""}); });//.css({height:"", position:""});
      e.preventDefault();
      $(".story-tab").removeClass("active");
      var shouldBeUnnecessary = $(this).parent().next().index();
      $(".story-tab:nth-child("+(shouldBeUnnecessary+1)+")").addClass("active");
    });
	window.setInterval(function(){
		var visibleStory = $(".story-feature .story-full:visible");
		var nextVisibleStory = visibleStory.next();
		var activeTab = $(".story-tab.active");
		var nextActiveTab = activeTab.next();
		if(nextVisibleStory.length){
			visibleStory.hide();
			nextVisibleStory.show();
			activeTab.removeClass("active");
			nextActiveTab.addClass("active");
		} else {
			$(".story-feature .story-full:last").hide();
			$(".story-feature .story-full:first").show();
			$(".story-tab:last").removeClass("active");
			$(".story-tab:first").addClass("active");
		}
	}, 5000);
	  
	//JS for the Gutenberg FAQ blocks
	jQuery(".schema-faq-section").each(function() {
		jQuery(".schema-faq-question img").each(function () {
			var src = jQuery(this).attr("data-src");
			var split = src.split("/");
			var file = split[split.length-1];
			var name = file.split(".")[0];
			jQuery(this).attr({
				id: name
			});
		});
		jQuery(".schema-faq-question").each(function (index) {
			jQuery(this).attr({
				class: "schema-faq-question collapseomatic noarrow",
				id: index
			});
		});
		jQuery(".schema-faq-answer").each(function (index) {
			jQuery(this).css("display","none").attr({
				class: "schema-faq-answer collapseomatic_content",
				id: "target-" + index
			});
		});
	});//end JS for the Gutenberg FAQ blocks
	jQuery('.requestInfo-close-trigger').click(function(){
		jQuery('#requestInfo').removeClass('is-open').attr("aria-hidden","true");
	});

	  /* begin extra FB tracking for specific events */
	if (jQuery('.UGviewbook').length) {
	  document.querySelector('.UGviewbook').addEventListener('click', function () {
		fbq('trackCustom', 'UG-viewbook');
	  });
	}
	if (jQuery('.UGvisit').length) {
	  document.querySelector('.UGvisit a').addEventListener('click', function () {
		fbq('trackCustom', 'UG-visit');
	  });
	}
	/* end extra FB tracking for specific events */


  });//end doc.ready
	   
})(jQuery, window, document);

  // Initial config for setting up modals
  MicroModal.init({
	openTrigger: 'data-custom-open',
	closeTrigger: 'data-custom-close',
	disableScroll: false,
	awaitCloseAnimation: true
  });

  // Programmatically show modal
	var selection = document.querySelector('.requestInfo-trigger') !== null;
	if (selection) {
		document.querySelector('.requestInfo-trigger').addEventListener('click', function () {
			"use strict";
			MicroModal.show('requestInfo');
			fbq('trackCustom', 'RequestInfo');
		});
	}

  // Scrollspy
  var section = document.querySelectorAll(".heading");
  var sections = {};

  Array.prototype.forEach.call(section, function(e) {
    sections[e.id] = e.offsetTop;
  });

  window.onscroll = function() {
    var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

    for (i in sections) {
      if (sections[i] <= scrollPosition) {
        document.querySelector('.active').classList.remove('blue', 'fw6', 'active');
        document.querySelector('a[href*=' + i + ']').classList.add('blue', 'fw6', 'active');
      }
    }
  };