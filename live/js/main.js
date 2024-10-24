// Loading Common Element Using External File
$("#header").load("header.html");
$("#footer").load("footer.html");



// AOS Js (Reveal Animation)
AOS.init();

$('.how-we-work-box').hover(
    function () {
        $(this).addClass('active');
    }
);

// Home Page Center Slider 
$('.center-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    arrows: false,
    infinite: true,
    dots: false,
    speed: 300,
    centerPadding: '20px',
    infinite: true,
    autoplaySpeed: 5000,
    autoplay: false,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                centerPadding: '40px',
                slidesToShow: 2,
                centerMode: false
            }
        },
        {
            breakpoint: 768,
            settings: {
                centerPadding: '40px',
                slidesToShow: 1,
                centerMode: false
            }
        }
    ]
});

$('#center-arrow-prev').on('click', function () {
    $('.center-slider').slick('slickPrev');
});

$('#center-arrow-next').on('click', function () {
    $('.center-slider').slick('slickNext');
});


// Project Pages Slider 
$(".project-slider").slick({
    dots: false,
    arrows: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 1000,
    infinite: true,
    centerMode: false,
});
$("#project-slider-prev").on("click", function () {
    $(".project-slider").slick("slickPrev");
});

$("#project-slider-next").on("click", function () {
    $(".project-slider").slick("slickNext");
});

// Home Page Counter Section
// Function to check if an element is in the viewport
function isInViewport(element) {
    var rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// Check if the .counter section is in the viewport on scroll
$(window).on('scroll', function () {
    if (isInViewport($('.counter')[0])) {
        // Iterate over each .th-h1 element and animate the counter
        $('.th-h1').each(function () {
            var countTo = $(this).attr('data-count');
            $(this).prop('Counter', 0).animate({
                Counter: countTo
            }, {
                duration: 1000, // Adjust the duration as needed
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
        // Unbind the scroll event to prevent multiple animations
        $(window).off('scroll');
    }
});

// Trigger the scroll event to check if the section is initially in the viewport
$(window).scroll();

// Home Page Industries Section Slider
function checkCarouselState() {
    var currentIndex = $('#carouselExampleIndicators .carousel-item.active').index();
    var totalItems = $('#carouselExampleIndicators .carousel-item').length - 1;

    if (currentIndex === 0) {
        $('#carouselExampleIndicators .carousel-control-prev').hide();
        $('#carouselExampleIndicators .carousel-control-next').show();
    } else if (currentIndex === totalItems) {
        $('#carouselExampleIndicators .carousel-control-prev').show();
        $('#carouselExampleIndicators .carousel-control-next').hide();
    } else {
        $('#carouselExampleIndicators .carousel-control-prev').show();
        $('#carouselExampleIndicators .carousel-control-next').show();
    }
}

$('#carouselExampleIndicators').on('slid.bs.carousel', function () {
    checkCarouselState();
});
$(window).on('load', function () {
    checkCarouselState();
});

