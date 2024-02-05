$('#root').hide();
$(document).ready(function () {
    setTimeout(function () {
        $('#splash-screen').hide();
        $('#root').show();
    }, 3000);
});

$('.menu-bar').click(function () {
    var menu_btn_pos = $('#header-menu .menu-bar').offset();
    $('.main-menu .menu').css({
        'top': menu_btn_pos.top + 'px',
        'left': menu_btn_pos.left + 'px'
    });

    if ($('.main-menu').hasClass('visible')) {
        $('.main-menu').removeClass('visible');
        $('#header-menu .menu-check').removeClass('active');
    } else {
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
    $('.regular').each(function () {
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

  $(window).on('scroll', handleScroll);