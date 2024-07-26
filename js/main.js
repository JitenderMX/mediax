// Loading Common Element Using External File
$("#header").load("header.html");
$("#footer").load("footer.html");
$("#case-study-project").load("case-study-project.html");


// AOS Js (Reveal Animation)
AOS.init({
  once: true // Animation will happen only once when the element comes into view
});


// Check if form submission was successful
if (window.location.search.includes('success=true')) {
  alert('Form submitted successfully!');
  // Redirect to home page after alert
  window.location.href = 'index.html';
}

// header scroll 
$(window).scroll(function () {
  let st = $(window).scrollTop();
  if (st > 10) {
    $("header").addClass("active");
  } else {
    $("header").removeClass("active");
  }
})


$(window).on('load', function () {
  var homeVideo = document.getElementById('homeVideo');
  var aboutVideo = document.getElementById('aboutVideo');

  if (homeVideo) {
    homeVideo.muted = true;
    homeVideo.play();
  }
  if (aboutVideo) {
    aboutVideo.muted = true;
    aboutVideo.play();
  }
});

/* //  Locomotive Scroll Js 
const Locoscroll = new LocomotiveScroll({
  el: document.querySelector("[data-scroll-container]"),
  smooth: true,
  smartphone: {
    smooth: true
  }
}) */

/* // -----====== Counter Player =======-----
var counter = $(".counter").offset().top - 300;
$(window).scroll(function () {
  var scrTop = $(window).scrollTop();
  if (scrTop > counter) {
    $(".num").each(function () {
      var $this = $(this),
        countTo = $this.attr("data-count");

      $({ countNum: $this.text() }).animate(
        {
          countNum: countTo,
        },

        {
          duration: 1000,
          easing: "linear",
          step: function () {
            $this.text(Math.floor(this.countNum));
          },
          complete: function () {
            $this.text(this.countNum);
            //alert('finished');
          },
        }
      );
    });
  }
}); */


// Counter code
var hasCodeRun = false;
$(window).scroll(function () {
  var scrollPos = $(window).scrollTop();
  var sectionOffsetTop = $('#elevating-brand').offset().top;

  if ((scrollPos + 200) >= sectionOffsetTop && !hasCodeRun) {
    startCounter();
    hasCodeRun = true;
  }
});

function startCounter() {
  $('.cout').each(function () {
    var target = parseInt($(this).attr('data-akhi'));
    var $element = $(this);

    $({ countNum: 0 }).animate({ countNum: target }, {
      duration: 3000,
      easing: 'linear',
      step: function () {
        $element.text(Math.floor(this.countNum));
      },
      complete: function () {
        $element.text(target);
      }
    });
  });
}

$(document).ready(function () {
  $(window).on('load', checkViewportWidth);

  function checkViewportWidth() {
    var viewportWidth = $(window).width();
    $('.tes-box').off('click'); // Remove previous click event listeners

    if (viewportWidth <= 576) {
      $('.test-content').slideUp();
      $('.tes-box.open .test-content').slideDown();

      $('.tes-box').on('click', function () {
        $('.tes-box').removeClass('open').addClass('close').find('.test-content').slideUp(500);
        $(this).addClass('open').removeClass('close').find('.test-content').slideDown(500);
      });
    } else {
      $('.tes-box').on('click', function () {
        $('.tes-box').removeClass('open').addClass('close');
        $(this).addClass('open').removeClass('close');
      });
    }
  }

  // checkViewportWidth();
});

$(".brand-slider").slick({
  dots: false,
  arrows: false,
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 0,
  speed: 4000,
  pauseOnHover: false,
  cssEase: 'linear',
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }
  ]
})
$(".casp-slider").slick({
  dots: false,
  arrows: false,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 2000,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        // variableWidth: true
      }
    }
  ]
})

