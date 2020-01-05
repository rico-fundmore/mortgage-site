// Pre loader


$(document).ready(function(){
  $('#myyModal').modal('show');
  setTimeout(function(){$('body').removeClass('fade-out'); }, 500);
  setTimeout(function(){$('header').removeClass('fade-out'); }, 700);
  $("#wrapper").addClass('wrapper_loaded');
  $("#sidebar").addClass('sidebar_loaded');

  $('#playVideo').on('click', function(ev) {
    $("#video")[0].src += "&autoplay=1";
    ev.preventDefault();
  });


  if($('.demop').length === 1){
  $(document).on('click', function(){
    if ($('.demoVideo').css('display') == 'none'){
    }else{
      $("#video")[0].src += "playerStatus = 0";
    }

    if ($('.modal-open').length === 1){
      $('.modal-open').css('padding', '0')
      $('#banner').css('padding-right', '1rem')
    }

  })

  }

  if($(window).width() <= 768){
    $("#no_overlay").addClass("no_overlay");
  }



  $("#btn_togl").on("click", function () {
    $("#wrapper").toggleClass("wrapper_toggle");
    $("#sidebar").toggleClass("sidebar_toggle");
    $("#darken").toggleClass("overlay_black");
    if($("#sidebar").hasClass("sidebar_toggle")){
      $("div.overlay_black").on("click", function () {
        $("#wrapper").removeClass("wrapper_toggle");
        $("#sidebar").removeClass("sidebar_toggle");
        $("#darken").removeClass("overlay_black");
      });
    }

    });

 

    
    $("#mobile_btn_togl").on("click", function () {
    $("#darken").toggleClass("overlay_black");
    
    });
    if(!$('ul.how_mobile_tab li a').hasClass('active')){
      $('ul.how_mobile_tab li.active a').addClass('active')
      $('a.howActive').on("click", function () {
        $('ul.how_mobile_tab li.active a').removeClass('active')
      })
    }
});

$('#closeMsg').on('click', function(){
  $('#blog_modal').css('display', 'none')
});
// progress animation

$('.progress').each(function (_, progress) {
  var steps = $('> div.right > div.item', progress);
  steps.each(function (i, el) {return $(el).mouseenter(function (e) {return onHover(el);});});
  var onHover = function (el) {
    steps.removeClass(['current', 'prev']);
    el.classList.add('current');
    $(el).prevAll().slice(1).addClass('prev');
  };
});


// step animation
var ANIMATION_END = 'webkitAnimationEnd oanimationend msAnimationEnd animationend';

var debouncer = function (fn) {
  var stack = [];
  var threshold = 200;
  var lastCall = new Date().getTime();
  var callFunctions = Array.prototype.forEach.bind(stack, function (fn) { fn(); }); // can't wait for `x => x()`
  var timeoutHandle;
  return function () {
    var now = new Date().getTime()
    var deltaT = now - lastCall;
    lastCall = now;
    // make sure each function is called with the correct `this` and arguments
    stack.push(fn.bind.apply(fn, [this].concat(Array.prototype.slice.call(arguments))));
    clearTimeout(timeoutHandle);
    timeoutHandle = setTimeout(callFunctions, threshold);
  };
};

var animating = false;

function animateEnter () {
  if (animating) { return; }
  animating = true;
  $('.item').addClass('animate-enter');
  $('.list').removeClass('hidden');
  $('.item').one(ANIMATION_END, debouncer(function (e) {
    $(this).removeClass('animate-enter');
    animating = false;
  }));
}

function animateLeave () {
  if (animating) { return; }
  animating = true;
  $('.item').addClass('animate-leave');
  $('.item').one(ANIMATION_END, debouncer(function (e) {
    $('.list').addClass('hidden');
    $(this).removeClass('animate-leave');
    animating = false;
  }));
}

$('.toggle').click(function () {
  if ($('.list').hasClass('hidden')) {
    animateEnter();
    $('.toggle').removeClass('off');
  } else {
    animateLeave();
    $('.toggle').addClass('off');
  }
});

// for dramatic effect :P
setTimeout(animateEnter, 1000);








$(document).ready(function() {
$('button.tabs_title').on('click',function(event) {
switch($(event.target).attr("data-target")) {
case '#collapseOne':
  $('div.demo_imgs').css('background-image','url(img/result.png)');
  break;
  case '#collapseTwo':
  $('div.demo_imgs').css('background-image','url(img/dashboard.png)');
  break;
  case '#collapseThree':
  $('div.demo_imgs').css('background-image','url(img/chart.png)');
  break;
  case '#collapseFour':
  $('div.demo_imgs').css('background-image','url(img/reward.png)');
  break;
  default:
  // alert('noclass');
}
});
});

$(document).ready(function() {

$(document).on('click', '[data-toggle="lightbox"]', function(event) {
event.preventDefault();
$(this).ekkoLightbox();
});


// ANIMATE css


// Check if element is scrolled into view
function isScrolledIntoView(elem) {
var docViewTop = $(window).scrollTop();
var docViewBottom = docViewTop + $(window).height();

var elemTop = $(elem).offset().top;
var elemBottom = elemTop + $(elem).height();

return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}
// If element is scrolled into view, fade it in
$(window).scroll(function() {
$('.scroll-animations .timeline-content img.animated').each(function() {
  if (isScrolledIntoView(this) === true) {
    $(this).addClass('jackInTheBox');
  }
});
if($(window).width() >= 768){
$('.scroll-animations-demo div.animated').each(function() {
  if (isScrolledIntoView(this) === true) {
    $(this).addClass('fadeInUp');
  }
});

$('.scroll-animations-why div.animated').each(function() {
  if (isScrolledIntoView(this) === true) {
    $(this).addClass('fadeInUp');
  }
});

$('.scroll-animations-new div.animated:nth-child(2n+0)').each(function() {
  if (isScrolledIntoView(this) === true) {
    $(this).addClass('fadeInLeft');
  }
});

$('.scroll-animations-new div.animated:nth-child(2n+1)').each(function() {
  if (isScrolledIntoView(this) === true) {
    $(this).addClass('fadeInRight');
  }
});

$('.scroll-animations-review div.animated').each(function() {
  if (isScrolledIntoView(this) === true) {
    $(this).addClass('fadeInUp');
  }
});
}

});






//Contact us ajax
  // the button

  // values from the form
  const $theform = document.querySelector('.form-horizontal');
  $("#contactUsSubmit").on('click', function(e){
    // prevents from submission
    e.preventDefault();
    $theform.classList.add('theloading');
    //ajax part
    fetch('./post/send.php',{
      method: "post",
      headers : { 
        "Content-Type": "application/x-www-form-urlencoded",
        'Accept': 'application/json; odata=verbose'
       },
       body:`name=${$theform.name.value}&email=${$theform.email.value}&message=${$theform.message.value}`
       
    })
    .then(response => response.json())          // convert to plain text
    .then((response) => {
      const alertdiv = document.createElement("div");
      // response.json()
      if(!response.error){
        alertdiv.setAttribute('class', 'alert alert-success');
        alertdiv.textContent = 'Message Sent!';
        setTimeout(function(){
          window.location.replace("index");
        }, 500);
      }else{
        alertdiv.setAttribute('class', 'alert alert-danger fade show');
        alertdiv.textContent = 'Mail Error!';
      }
      $theform.insertBefore(alertdiv, document.querySelector('.form-group'))
      $theform.classList.remove('theloading');
    })
    
  })
});
