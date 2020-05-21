
!(function($) {
    "use strict";
  
    
    // Nav Menu
    $(document).on('click', '.nav-menu a, .mobile-nav a', function(e) {
  
      
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var hash = this.hash;
        var target = $(hash);
        if (target.length) {
          e.preventDefault();
  
          if ($(this).parents('.nav-menu, .mobile-nav').length) {
            $('.nav-menu .active, .mobile-nav .active').removeClass('active');
            $(this).closest('li').addClass('active');
          }
  
          if (hash == '#header') {
            $('#header').removeClass('header-top');
            $("section").removeClass('section-show');
            return;
          }
  
          if (!$('#header').hasClass('header-top')) {
            $('#header').addClass('header-top');
            setTimeout(function() {
              $("section").removeClass('section-show');
              $(hash).addClass('section-show');
            }, 350);
          } else {
            $("section").removeClass('section-show');
            $(hash).addClass('section-show');
          }
  
          if ($('body').hasClass('mobile-nav-active')) {
            $('body').removeClass('mobile-nav-active');
            $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
            $('.mobile-nav-overly').fadeOut();
          }
  
          return false;
  
        }
      }
    });
  
    // Activate/show sections on load with hash links
    if (window.location.hash) {
      var initial_nav = window.location.hash;
      if ($(initial_nav).length) {
        $('#header').addClass('header-top');
        $('.nav-menu .active, .mobile-nav .active').removeClass('active');
        $('.nav-menu, .mobile-nav').find('a[href="' + initial_nav + '"]').parent('li').addClass('active');
        setTimeout(function() {
          $("section").removeClass('section-show');
          $(initial_nav).addClass('section-show');
        }, 350);
      }
    }
  
    // Mobile Navigation
    if ($('.nav-menu').length) {
      var $mobile_nav = $('.nav-menu').clone().prop({
        class: 'mobile-nav d-lg-none'
      });
      $('body').append($mobile_nav);
      $('body').prepend('<button type="button" class="mobile-nav-toggle d-lg-none"><i class="icofont-navigation-menu"></i></button>');
      $('body').append('<div class="mobile-nav-overly"></div>');
  
      $(document).on('click', '.mobile-nav-toggle', function(e) {
        $('body').toggleClass('mobile-nav-active');
        $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
        $('.mobile-nav-overly').toggle();
      });
  
      $(document).click(function(e) {
        var container = $(".mobile-nav, .mobile-nav-toggle");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
          if ($('body').hasClass('mobile-nav-active')) {
            $('body').removeClass('mobile-nav-active');
            $('.mobile-nav-toggle i').toggleClass('icofont-navigation-menu icofont-close');
            $('.mobile-nav-overly').fadeOut();
          }
        }
      });
    } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
      $(".mobile-nav, .mobile-nav-toggle").hide();
    }
    
   
   
  })(jQuery);
  
$(window).on("load", function(){
    
    $(document).on('click', '#garage', function(e) {
        $('.cap').show();
        $('.custom-select').hide();
        $('.custom-control').hide();
    });
    $(document).on('click', '#sensor', function(e) {
        $('.cap').hide();
        $('.custom-select').show();
        $('.custom-control').show();
    });
    $('#edit1').hide();
    $('#edit2').hide();
    

    
    
});

var clicked = false;

function edit(id,flag) {
  if(clicked == false){
    if(flag=='2'){
    var idPar = id.parentElement.parentElement.children[0].innerHTML;
    document.getElementById("idParEdit").innerHTML = idPar;
    var x = id.parentElement.parentElement.children[1].innerHTML;
    document.getElementById("xEdit").value = x;
    var y = id.parentElement.parentElement.children[2].innerHTML;
    document.getElementById("yEdit").value = y;
    var cap = id.parentElement.parentElement.children[3].innerHTML;
    document.getElementById("capEdit").value = cap;
    id.parentElement.parentElement.style.display='none';
    $('#edit2').show();
    clicked = true;
    }
    else{
      var idPar = id.parentElement.parentElement.children[0].innerHTML;
      document.getElementById("idParEditS").innerHTML = idPar;
      var x = id.parentElement.parentElement.children[1].innerHTML;
      document.getElementById("xEditS").value = x;
      var y = id.parentElement.parentElement.children[2].innerHTML;
      document.getElementById("yEditS").value = y;
      var dis = id.parentElement.parentElement.children[3].innerHTML;
      document.getElementById("disEditS").value = dis;
      var zone = id.parentElement.parentElement.children[4].innerHTML;
      document.getElementById("zoneEditS").value = zone;
      id.parentElement.parentElement.style.display='none';
      $('#edit1').show();
      clicked = true;
    }
  }
  
}

