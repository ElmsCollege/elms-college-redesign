  jQuery(document).ready(function () {

    // mobile menu submenu toggle
    jQuery("body").on("click", "#primary-menu .menu-item-has-children > a, #special-menu .menu-item-has-children > a", function (e) {
      var pWidth = jQuery(e.target).innerWidth(); //use .outerWidth() if you want borders
      var pOffset = jQuery(e.target).offset();
      var x = e.pageX - pOffset.left;
      if (pWidth * 0.85 < x && jQuery("body").hasClass("mobile-or-library")) {
        e.preventDefault();
        e.stopPropagation();
        jQuery(jQuery(e.target).parent()).toggleClass("minus");
      }
    });

    // ensure ada compliance border outline only appears on keyboard focus not mouse focus
      jQuery("body").on("mousedown", "*", function (e) {
      if ((jQuery(this).is(":focus") || jQuery(this).is(e.target)) && jQuery(this).css("outline-style") == "none") {
        jQuery(this).css("outline", "none").on("blur", function () {
          jQuery(this).off("blur").css("outline", "");
        });
      }
    });
    var is_iPad = (navigator != null && navigator.userAgent != null && navigator.userAgent.match(/iPad|iPhone|iPod/i) != null);

    // show more sidebar events 
    jQuery("body").on("click", ".field-related-events .show-more, .field-related-events .show-less", function (e) {
      jQuery(".field-related-events").toggleClass("toggled");
      e.preventDefault();
    });

    // copying special section nav (library, school of nursing, subdomains) into the mobile menu
    var specialNavItems = [];
    jQuery("#special-section-menu > li").each(function () {
      console.log(jQuery(this));
      var clone = jQuery(this).clone();
      clone = jQuery(clone);
      clone.removeAttr("id");
      jQuery(clone.find("li")).removeAttr("id");
      specialNavItems.push(clone);
    });
    var count;
    for (count = specialNavItems.length; count >= 0; count--) {
      jQuery("#special-menu").prepend(specialNavItems[count]);
    }

    // handle keyboard focus in main menu
    jQuery("#primary-menu > .menu-item > a, #special-section-menu  > .menu-item > a").focus(function (e) {
      console.log(whatInput.ask());
      if (whatInput.ask() === 'keyboard') {
        jQuery("#primary-menu > .menu-item, #special-section-menu > .menu-item").removeClass("open");
        jQuery(this).parent().addClass("open");
      }
    });
    jQuery("#primary-menu > .menu-item > a, #special-section-menu > .menu-item > a").blur(function (e) {
      if (whatInput.ask() === 'keyboard') {
        var children = jQuery(this).parent().find(".sub-menu a");
        if (children.length) {
          jQuery(children.get(0)).focus();
        } else {
          jQuery(this).parent().removeClass("open");
        }
      }
    });

    // hamburger trigger
    jQuery('.nav-trigger').on('click touchstart', function (event) {
      event.preventDefault();

      jQuery(this).toggleClass('active');
      jQuery('header#masthead, html').toggleClass('active');

      if (jQuery(window).width() < 720) {
        jQuery('body, .link-donate').toggleClass('active');
      }
    });
    var resetMenuIfDesktopWidth = function () {
      if (Modernizr.mq("only screen and (min-width: 64em)") && !jQuery("body").hasClass("page-template-library-landing-page") && !jQuery("body").hasClass("page-template-library-interior-page")) {
        jQuery("body, header#masthead, html, .nav-trigger, .link-donate").removeClass("active");
        jQuery(".main-navigation li").removeClass("open");
      }
    };
    //resetMenuIfDesktopWidth();
    jQuery(window).resize(function (e) {
      resetMenuIfDesktopWidth();
    });

    // interior landing page and interior generic mobile dropdowns.
    if (jQuery('ul.opening-menu').length) {
      jQuery('<select class="opening-select" aria-label="Navigation options"></select>').insertAfter(jQuery('ul.opening-menu'));

      jQuery('ul.opening-menu li').each(function (index) {
        var value = jQuery(this).find('a').text();

        jQuery('<option value="' + (index + 1) + '">' + value + '</option>').appendTo(jQuery('select.opening-select'));
      });
    }
    var sidebarMenu = jQuery('ul.parent-sidebar-menu');
    var finalSidebarMenu = false;
    var sidebarMenuAlreadyExists = !!(sidebarMenu.length);
    if (!sidebarMenuAlreadyExists && !!jQuery(".field-sidebar-menu-items li").length) {
      finalSidebarMenu = jQuery("<ul class='parent-sidebar-menu'></ul>");
      jQuery(".page-sidebar").prepend(finalSidebarMenu);
    } else {
      finalSidebarMenu = sidebarMenu;
    }
    //console.log("ifnalsidebarmenu");
    //console.log(finalSidebarMenu);
    if (finalSidebarMenu && finalSidebarMenu.length) {

      jQuery(".field-sidebar-menu-items li").each(function (index, element) {
        var link = jQuery(this).find("a");
        console.log(link);
        if (link.length > 0 && (link.attr("href")) && jQuery(finalSidebarMenu.find('li a[href="' + jQuery(this).find("a").attr("href") + '"]')).length == 0) {
          finalSidebarMenu.append(jQuery(this));
        }
      });

      jQuery('<select class="opening-select" aria-label="Left rail navigation options"></select>').insertBefore('#primary');

      jQuery('ul.parent-sidebar-menu li:not(.toggle-parent)').each(function (index) {
        var linkClass = jQuery(jQuery(this).find('a').get(0)).attr('class');
        var value = jQuery(jQuery(this).find('a').get(0)).text();
        var newOptionFromNav = jQuery('<option value="' + (index + 1) + '">' + value + '</option>');
        jQuery('select.opening-select').append(newOptionFromNav);
        newOptionFromNav.addClass(linkClass);
      });
    }
    if (jQuery('.opening-select').length) {
      jQuery('.opening-select').dropdown({
        customClass: "opening-menu"
      });

      jQuery('body').on('click mousedown', '.fs-dropdown-selected', function () {
        if (!is_iPad) {
          jQuery(".fs-dropdown").toggleClass("fs-dropdown-open");
        }

      });

      var realMenuSelector = ".opening-menu li";
      if (jQuery(".parent-sidebar-menu").length) {
        realMenuSelector = ".parent-sidebar-menu li:not(.toggle-parent)";
      }
      jQuery("body").on("blur change", "select.fs-dropdown-element", function (e) {
        var selectedOption = jQuery(this).val();
        console.log(jQuery(jQuery(realMenuSelector).get(selectedOption - 1)));
        if (window.location.href != jQuery(jQuery(realMenuSelector).get(selectedOption - 1)).find("a").attr("href")) {
          window.location.href = jQuery(jQuery(realMenuSelector).get(selectedOption - 1)).find("a").attr("href");
        } else {
          e.preventDefault();
          e.stopPropagation();
        }
      });
      jQuery("body").on("click", ".fs-dropdown-item", function () {
        if (!is_iPad) {
          var selectedOption = jQuery(this).attr("data-value");
          window.location.href = jQuery(jQuery(realMenuSelector).get(selectedOption - 1)).find("a").attr("href");
        } else {
          e.preventDefault();
        }
      });
      jQuery("body").on("click touchstart mousedown", ".fs-dropdown-open *", function (e) {

        if (is_iPad) {
          e.preventDefault();
        }

      });

      jQuery("body").on("click", "*:not(.fs-dropdown):not(button.fs-dropdown-item):not(.fs-dropdown-options), .fs-dropdown-open", function () {
        jQuery(".fs-dropdown").removeClass("fs-dropdown-open");
      });
    }

    jQuery("select.opening-select > option").each(function () {
      var optionValue = jQuery(this).val();
      var optionClass = jQuery(this).attr("class");
      jQuery(".fs-dropdown-options button[data-value='" + optionValue + "']").addClass(optionClass);
    });

    //replace search menu text with icon and add dropdown.
    jQuery('#masthead a[href*="/search/"]').each(function () {
      jQuery(this).on("click touchstart", function (e) {
        if (Modernizr.mq("only screen and (min-width: 64em)")) {
          e.preventDefault();
          jQuery(jQuery(this).parent()).toggleClass("open");
        }
      });
    });

    // double fake mobile/library menu 
    var updateMenu = function () {
      if (Modernizr.mq("only screen and (max-width: 64em)") || (jQuery("body").is("#nursingPage")) || (jQuery("body").is("#libraryPage")) || (jQuery("body").is("#commencementPage"))) {
        jQuery("body").addClass("mobile-or-library");
      } else {
        jQuery("body").removeClass("mobile-or-library");
      }
    };
    updateMenu();
    jQuery(window).resize(function (e) {
      updateMenu();
    });

    //preload all carousel images
    var preloadCarousel = function () {
      jQuery(".story-carousel .story-image img").each(function () {
        (new Image()).src = jQuery(this).src;
      });
    };
    preloadCarousel();
    //make landingpage student carousel work.
    jQuery(".story-carousel .story-tab:first-child").addClass("active");
    jQuery(".story-carousel .story-tab").on("click focus", function () {
      var index = jQuery(this).getIndex() + 1;
      console.log(index);
      jQuery(".story-feature .story-full").not(":nth-child(" + index + ")").css("z-index", "0").delay(400).fadeOut(1);
      jQuery(".story-feature .story-full:nth-child(" + index + ")").css("z-index", "1").fadeIn(400);

      jQuery(".story-carousel .story-tab").removeClass("active");
      jQuery(this).addClass("active");
    });
    jQuery(".story-feature-nav.nav-prev").click(function (e) {
      var height = jQuery(this).parent().prev().height();
      jQuery(this).parent().css({
        "z-index": 0
      }).delay(400).fadeOut(1);
      jQuery(this).parent().prev().css({
        "z-index": 1,
        height: height,
        position: "absolute"
      }).fadeIn(400, function () {
        jQuery(this).css({
          height: "",
          position: ""
        });
      }); //.css({height:"", position:""});
      e.preventDefault();
      jQuery(".story-tab").removeClass("active");
      var shouldBeUnnecessary = jQuery(this).parent().prev().index();
      jQuery(".story-tab:nth-child(" + jQuery(shouldBeUnnecessary + 1) + ")").addClass("active");
    });
    jQuery(".story-feature-nav.nav-next").click(function (e) {
      var height = jQuery(this).parent().next().height();
      jQuery(this).parent().css({
        "z-index": 0
      }).delay(400).fadeOut(1);
      jQuery(this).parent().next().css({
        "z-index": 1,
        height: height,
        position: "absolute"
      }).fadeIn(400, function () {
        jQuery(this).css({
          height: "",
          position: ""
        });
      }); //.css({height:"", position:""});
      e.preventDefault();
      jQuery(".story-tab").removeClass("active");
      var shouldBeUnnecessary = jQuery(this).parent().next().index();
      jQuery(".story-tab:nth-child(" + (shouldBeUnnecessary + 1) + ")").addClass("active");
    });
    window.setInterval(function () {
      var visibleStory = jQuery(".story-feature .story-full:visible");
      var nextVisibleStory = visibleStory.next();
      var activeTab = jQuery(".story-tab.active");
      var nextActiveTab = activeTab.next();
      if (nextVisibleStory.length) {
        visibleStory.hide();
        nextVisibleStory.show();
        activeTab.removeClass("active");
        nextActiveTab.addClass("active");
      } else {
        jQuery(".story-feature .story-full:last").hide();
        jQuery(".story-feature .story-full:first").show();
        jQuery(".story-tab:last").removeClass("active");
        jQuery(".story-tab:first").addClass("active");
      }
    }, 5000);

    jQuery('.requestInfo-close-trigger').click(function () {
      jQuery('#requestInfo').removeClass('is-open').attr("aria-hidden", "true");
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

    /* BEGIN collapsible left rail nav JS code */
    function collapsibleNav(e) {
      e.preventDefault();

      var $this = jQuery(this);

      if ($this.next().hasClass('show')) { //next works because the <a> is a sibling to the ul.inner
        $this.next().removeClass('show');
        $this.next().slideUp(350);
      } else {
        $this.parent().parent().find('li .inner').removeClass('show');
        $this.parent().parent().find('li .inner').slideUp(350);
        $this.next().toggleClass('show');
        $this.next().slideToggle(350);
      }
    }

    jQuery('.toggle').click(collapsibleNav);

    jQuery('.toggle').click(function () {
      var $this = jQuery(this);

      jQuery(".toggle").not($this.parents().prev()).removeClass("minus");
      if ($this.next().hasClass('show')) {
        $this.addClass("minus");
      }
    });
    /* END collapsible left rail nav JS code */
  }); //end doc.ready

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
