var cardSliderMargin = 806;

$('#root').hide();
$(document).ready(function () {

    var eventTriggered = sessionStorage.getItem('eventTriggered');

    var previewTimeout = 3;

    if (!eventTriggered) {
        previewTimeout = 3000;
        sessionStorage.setItem('eventTriggered', 'true');
    }

    setTimeout(function () {
        $('#splash-screen').hide();
        $('#root').show();

        $('span.regular').text('0');
        $(window).on('scroll', handleScroll);

    }, previewTimeout);

    // Card slider margin
    if ($(window).width() > 768) {
        cardSliderMargin = (($(window).width()) / 2 + 200);
    }
    $('.industries-slider').css('transform', 'translate(' + cardSliderMargin + 'px, 145px)');
});

$('.menu-bar').click(function () {
    var menu_btn_pos = $('#header-menu .menu-bar').offset();
    $('.main-menu .menu').css({
        'top': menu_btn_pos.top + 'px',
        'left': menu_btn_pos.left + 'px'
    });

    if ($('.main-menu').hasClass('visible')) {
        $('#root').css('overflow', 'visible');
        $('.main-menu').removeClass('visible');
        $('#header-menu .menu-check').removeClass('active');
    } else {
        $('#root').css({ 'overflow': 'hidden', 'height': '100vh' });
        $('.main-menu').addClass('visible');
        $('#header-menu .menu-check').addClass('active');
    }
});

var element = document.getElementById('cursor');
var rect = element.getBoundingClientRect();
function animateCount(target, duration, element) {
    var start = 0;
    var increment = 10;
    var steps = duration / increment;
    var currentStep = 0;

    var stepValue = target / steps;

    function updateCount() {
        start += stepValue;
        $(element).text(Math.round(start));

        currentStep++;
        if (currentStep < steps) {
            requestAnimationFrame(updateCount);
        }
    }

    updateCount();
}
function runCounters() {
    $('.single-counter .regular').each(function () {
        var target = parseInt($(this).data('count'));
        animateCount(target, 1500, this);
    });
}

function isInViewport(element) {
    if (!element || typeof element.getBoundingClientRect !== 'function') {
        return false;
    }

    var rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

function handleScroll() {
    var targetSection = $('#sec_r3');

    if (isInViewport(targetSection[0])) {
        runCounters();
        $(window).off('scroll', handleScroll);
    }
}

var slider_styles = [
    'z-index: 8; transform: translate(0px, 0px) rotate(5deg);',
    'z-index: 7; transform: translate(-356px, 0px) rotate(10deg);',
    'z-index: 6; transform: translate(-712px, 0px) rotate(15deg);',
    'z-index: 5; transform: translate(-1068px, 0px) rotate(20deg);',
    'z-index: 4; transform: translate(-1424px, 0px) rotate(25deg);',
    'z-index: 3; transform: translate(-1780px, 0px) rotate(30deg);',
    'z-index: 2; transform: translate(-2136px, 0px) rotate(35deg);',
    'z-index: 1; transform: translate(-2492px, 0px) rotate(40deg);'
];
$('.interaction-box').click(function () {
    $('.industries').addClass('large');
    $('.industries-title').addClass('spread');
    $('.industries-slider').eq(0).addClass('still').attr('style', 'width: 2848px; transform: translate(0px, 280px)');
    $('.industry-card').addClass('spread').attr('style', '');

    $('.industry-card.spread').click(function () {
        $('.industries').removeClass('large');
        $('.industries-title').removeClass('spread');
        $('.industries-slider').removeClass('still').attr('style', 'width: 2848px; transform: translate(' + cardSliderMargin + 'px, 145px)');
        $('#industry-card.industry-card').removeClass('spread').each(function (key, slide) {
            $(slide).attr('style', slider_styles[key]);
        });
    });
});

$('.interaction-box').hover(function () {
    $('#industry-card.industry-card').each(function (key, obj) {
        var $element = $(obj);
        var styleAttr = $element.attr('style');
        if (styleAttr) {
            var transformValue = styleAttr.match(/transform:.*?;/);
            if (transformValue) {
                var updatedTransform = transformValue[0].replace(/rotate\((-?\d+)deg\)/, function (match, degrees) {
                    return 'rotate(' + (-parseInt(degrees)) + 'deg)';
                });
                var updatedStyleAttr = styleAttr.replace(/transform:.*?;/, updatedTransform);
                $element.attr('style', updatedStyleAttr);
            }
        }
    });
});

$('.techno-card-title').click(function () {
    if ($(this).parents('.techno-card').hasClass('selected')) {
        $('.techno-card').removeClass('selected');
    } else {
        $('.techno-card').removeClass('selected');
        $(this).parents('.techno-card').addClass('selected');
    }
});


function getProducts(obj, level) {
    var level = parseInt(level);
    var cat_id = $(obj).data('cat_id');
    var cat_title = $(obj).data('cat_title');

    if (level) {
        var selector = '';
        for (var i = 0; i <= $('.sub_parent').length; i++) {
            if (i >= level) {
                if (selector) {
                    selector = selector + ', ';
                }
                selector += ' .sub_parent_' + (i + 1);
            }
        }
        if (selector) {
            console.log(selector);
            $(selector).remove();
        }
    } else {
        $('.sub_parent').remove();
    }

    $('.sub_parent_' + level + ' .services-card').removeClass('selected');

    $(obj).addClass('selected');

    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: {
            action: 'get_product_services',
            level: level + 1,
            cat_id,
            cat_title
        },
        success: function (response) {
            if ($('.sub_parent').length) {
                $(obj).parents('.sub_parent').after(response);
            } else {
                $(obj).parents('.services-tree').after(response);
            }
            var targetBlockPosition = $('.sub_parent_' + (level + 1)).offset().top;
            setTimeout(function () {
                $(window).scrollTop(targetBlockPosition);
            }, 400);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}


var $slider = $('.quotes-slider');
var $slides = $('.quotes-slider .quote-container');

var slideWidth = $slides.eq(0).outerWidth(true);
var currentIndex = 0;
var isAnimating = false;

$slider.on('wheel', function (e) {
    e.preventDefault();

    if (!isAnimating) {
        if (e.originalEvent.deltaY > 0) {
            goToNextSlide();
        } else {
            goToPrevSlide();
        }
    }
});
function goToNextSlide() {
    if (currentIndex < $slides.length - 1) {
        currentIndex++;
        scrollToCurrentSlide();
    }
}


function goToPrevSlide() {
    if (currentIndex > 0) {
        currentIndex--;
        scrollToCurrentSlide();
    }
}

function scrollToCurrentSlide() {
    var newPosition = 0;
    for (var i = 0; i < currentIndex; i++) {
        newPosition += $slides.eq(i).outerWidth(true);
    }
    isAnimating = true;
    $('.quotes-slider').css('transform', 'translateX(-' + newPosition + 'px)');

    $slider.stop().animate({
        scrollLeft: newPosition
    }, 500, function () {
        console.log('asdsa');
        setTimeout(function () {
            isAnimating = false;
        }, 1000);
    });
}

function goto(url) {
    document.location.href = url;
}