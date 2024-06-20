var cardSliderMargin = 806;
var productCatUrlObj = {};

var previewBlocked = sessionStorage.getItem('eventTriggered');
var previewTimeout = 3;

var vacancyHeight = 0;
var isLargeScreen = false;

// Check mob/large view
isLargeScreen = $(window).width() > 768 ? true : false;

$('#root').hide();
$(document).ready(function () {

    if (!previewBlocked) {
        previewTimeout = 3000;

        // Redirect user to his country lang page
        getUserCountry()
            .then(country => {
                if (country !== 'UA' && firstVisitCountryPageUrl) {
                    setTimeout(function () {
                        goto(firstVisitCountryPageUrl);
                    }, previewTimeout - 1000);
                }
            })
            .catch(error => {
                console.error('Error fetching user country:', error);
            });

        sessionStorage.setItem('eventTriggered', 'true');
    }

    setTimeout(function () {
        $('#splash-screen').hide();
        $('#root').show();

        $('span.regular').text('0');
        $(window).on('scroll', handleScroll);

        // Product post render
        if (typeof (parentCatSlugs) !== 'undefined' && parentCatSlugs) {
            $('#cat_slug_' + parentCatSlugs[0]).click();
        }

    }, previewTimeout);

    // Card slider margin
    if (isLargeScreen) {
        cardSliderMargin = (($(window).width()) / 2 + 100);
        $('.industries-slider').css('transform', 'translate(' + cardSliderMargin + 'px, 145px)');
    }

    $('.pum-overlay').css({ 'z-index' : '0' });
    $('.pum-title').css({ 'font-family' : 'Commissioner'});
    $('#pum-1370').css({ 'cursor' : 'none' }).find('*').css({ 'cursor' : 'none' });
    $('#pum-1373').css({ 'cursor' : 'none' }).find('*').css({ 'cursor' : 'none' });

    initMobilePlanetsSpinner();
});

function switchHeader() {
    if ($(window).width() <= 1024 &&
        (isPage('home') || isPage('home-english'))) {
        var header = $('header');
        $(header).attr('class', 'bg-light-grey');
        $('#logo', header).attr('class', 'fill-navy-green');
        $('.locale-btn', header).attr('class', 'locale-btn bg- bw1 border-color-navy-green');
        $('.locale-btn input', header).attr('class', 'hover-border-color-undefined');
        $('.locale-btn .knobs', header).attr('class', 'knobs color-before-white bg-before-navy-green');
        $('.locale-btn .labels', header).attr('class', 'labels color-before-navy-green color-after-navy-green');
        $('#header-menu .menu-button', header).attr('class', 'menu-button bg-navy-green bordered-navy-green');
        $('#header-menu .menu-check .contrast-bg-white', header).attr('class', 'contrast-bg-navy-green');
        $('.main-menu .menu').attr('class', 'menu bg-navy-green');
        $('.main-menu .main-links .label').attr('class', 'label color-soft-blue');
        $('.main-menu .page-links .animated-link .title span, .main-menu .follow-links .animated-link .title span').attr('class', 'color-before-soft-blue');
    }
}
switchHeader();

function isPage(slug) {
    return $('body').data('page') == slug;
}

$('.menu-bar').click(function () {
    var menu_btn_pos = $('#header-menu .menu-bar').offset();
    $('.main-menu .menu').css({
        'top': isLargeScreen ? '30px' : '10px',
        'left': (menu_btn_pos.left - 30) + 'px'
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



const slider = $('.industries-slider');
const sliderWidth = slider.width();
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
    let positionX = 0;
    let isDraggable = false;
    let timing;
    const clickEventTiming = 150;
    slider.scrollLeft(0);
    $('.industries').addClass('large');
    $('.industries-title').addClass('spread');
    $('.industries-slider').eq(0)
        .addClass('still')
        .attr('style', 'width: 2848px; transform: translate(0px, 280px)')
        .attr('data-cursor', 'slider');
    $('.industry-card').addClass('spread').attr('style', '');

    $('.industries-slider.still').mousedown(({ clientX }) => {
        isDraggable = true;
        positionX = slider.scrollLeft() + clientX;
        timing = Date.now();
    })
        .mousemove((event) => {
            if (!isDraggable)
                return;
            
            let delta = positionX - event.clientX;
           
            if (delta <= 0) {
                delta = sliderWidth + delta;
            }
            if (delta >= sliderWidth) {
                delta = 0 + delta - sliderWidth;
            }
            
            slider.get(0).scrollTo({ left: delta });
            
        })
        .mouseup(() => {
            isDraggable = false;
        })
        .mouseleave(() => {
            isDraggable = false;
        })

    $('.industry-card.spread').click(function () {
        if(Date.now() - timing > clickEventTiming){
            return;
        }
        slider.scrollLeft(0)
        $('.industries').removeClass('large');
        $('.industries-title').removeClass('spread');
        $('.industries-slider')
            .removeClass('still')
            .attr('style', 'width: 2848px; transform: translate(' + cardSliderMargin + 'px, 145px)')
            .removeAttr('data-cursor');
        $('#industry-card.industry-card').removeClass('spread').each(function (key, slide) {
            $(slide).attr('style', slider_styles[key]);
        });
    });

    initCursor();
});

$('.value-card').hover(function () {
    $(this).css({ transition: "all 1s ease-out", transform: 'rotateY(0deg)  rotateX(0deg)  translateZ(1px)' });
    $(this).mousemove(({ clientX, clientY }) => {
        const { x, y, width, height } = this.getBoundingClientRect();
        const ratio = window.devicePixelRatio === 1.25 ? 1.25 : 1;
        const ax = (x + width / 2 - clientX * ratio) / 10;
        const ay = (y + height / 2 - clientY) / 20;
        this.style.transition = "none";
        this.style.transform = `rotateY(${-ax}deg) rotateX(${ay}deg) translateZ(10px) scale(1.05)`;
    })
}).mouseleave(() => { $(this).off('mousemove') });

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


$('.techno-card').click(function () {
    const ratio = window.devicePixelRatio === 1.25 ? 1.25 : 1;
    if ($(this).hasClass('selected')) {
        $('.techno-card').removeClass('selected');
        setTimeout(() => {
            window.scrollTo({ top: $(this).parents('.width-wrappers')[0].offsetTop / ratio });
        }, 1200);
    } else {
        $('.techno-card').removeClass('selected');
        $(this).addClass('selected');
        setTimeout(() => {
            window.scrollTo({ top: ($(this).parents('.width-wrappers')[0].offsetTop + $(this)[0].offsetTop) / ratio });
        }, 1000);
        
    }
});


function getProducts(obj, level) {
    var level = parseInt(level);
    var cat_id = $(obj).data('cat_id');
    var cat_title = $(obj).data('cat_title');
    var cat_slug = $(obj).data('cat_slug');

    productCatUrlObj[level] = cat_slug;
    for (let el in productCatUrlObj) {
        if (el > level) {
            delete productCatUrlObj[el];
        }
    }

    var productCatUrl = '';
    for (let el in productCatUrlObj) {
        if (el > 0) {
            productCatUrl += '&';
        }
        productCatUrl += productCatUrlObj[el];
    }


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
            if (parentCatSlugs) {
                $(window).scrollTop(targetBlockPosition);

                if (typeof (parentCatSlugs[level + 1]) == 'undefined') {
                    parentCatSlugs = false;
                } else {
                    $('#cat_slug_' + parentCatSlugs[level + 1]).click();
                }

            } else {
                setTimeout(function () {
                    $(window).scrollTop(targetBlockPosition);
                }, 400);
            }
            if (postId) {
                productCatUrl += '&post_slug=' + postId;
                postId = false;

                //TODO Remove this line to avoid opening post in new tab
                if (!redirectBlocked) {
                    document.location.href = '?' + productCatUrl;
                }
                redirectBlocked = false;
            }
            history.pushState(null, null, '?' + productCatUrl);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

function goto(url) {
    document.location.href = url;
}
function gotoPage(page, isNewTab) {
    if (pages[page]) {
        if (isNewTab) {
            window.open(pages[page], "_blank");
        } else {
            document.location.href = pages[page];
        }
        event.preventDefault();
    }
}

$('.vacancies-root .single-vacancy .accordion').click(function () {
    var sv = $(this).parents('.single-vacancy');
    if (sv.hasClass('collapse')) {
        vacancyHeight = 0;
        sv.removeClass('collapse');
        $('.single-desc', sv).css({ 'overflow-y': 'hidden', 'height': vacancyHeight + 'px' });
    } else {
        vacancyHeight = $('.single-desc div:eq(0)', sv).height();
        sv.addClass('collapse');
        $('.single-desc', sv).css({ 'overflow-y': 'initial', 'height': vacancyHeight + 'px' });
    }
});

$('.vacancies-root .single-vacancy .apply-btn').click(function () {
    var va = $('.vacancy-application', $(this).parents('.single-desc'));

    if ($(this).hasClass('apply')) {
        vacancyHeight -= va.height();
        $(this).removeClass('apply');
        va.removeClass('apply');
        $(this).parents('.single-desc').css({ 'overflow-y': 'initial', 'height': vacancyHeight + 'px' });
    } else {
        vacancyHeight += va.height();
        $(this).addClass('apply');
        va.addClass('apply');
        $(this).parents('.single-desc').css({ 'overflow-y': 'initial', 'height': vacancyHeight + 'px' });
    }

});

function getUserCountry() {
    return new Promise((resolve, reject) => {
        fetch('https://ipapi.co/json/')
            .then(response => response.json())
            .then(data => {
                const countryCode = data.country_code;

                resolve(countryCode);
            })
            .catch(error => {
                reject(error);
            });
    });
}

function initSlider(selectorId) {

    var swiper = new Swiper('#' + selectorId);
    var scrollTimeout;

    $('#' + selectorId + ' .swiper-wrapper').on('wheel', function (e) {
        clearTimeout(scrollTimeout);

        if (!scrollTimeout) {
            var direction = e.originalEvent.deltaX > 0 ? 'next' : 'prev';
            if (direction === 'next') {
                swiper.slideNext();
            } else {
                swiper.slidePrev();
            }
        }

        scrollTimeout = setTimeout(function () {
            scrollTimeout = null;
        }, 40);
    });
}

initSlider('feedback_swiper');
initSlider('products_swiper');
initSlider('gallery_swiper');
initSlider('regions_swiper');

function get_label(uk, en) {
    if (lang == 'en') {
        return en;
    } else {
        return uk;
    }
}
function validateEmail(email) {
    var pattern = /^[a-zA-Z0-9.+]+@[a-zA-Z0-9]+\.[a-zA-Z0-9.]+$/;

    return pattern.test(email);
}
function validateDigits(input) {
    var pattern = /^[+\d][0-9]+$/;

    return pattern.test(input);
}
function validateTextArea(input) {
    return input.length <= 2000;
}
function formValidate(selector, fields) {
    var isValid = true;
    $(fields).each(function () {
        var field = $(this);
        if ($(field).attr('aria-required') && !$(field).val()) {
            $(field).parents('.text-input').addClass('error');
            $(field).after('<div class="input-error"><p class="Body color-just-grey ">' + get_label('Заповніть це поле', 'This field is required') + '</p></div>');
            isValid = false;
        } else {
            if ($(field).attr('type') == 'email' && !validateEmail($(field).val())) {
                $(field).parents('.text-input').addClass('error');
                $(field).after('<div class="input-error"><p class="Body color-just-grey ">' + get_label('Недійсний e-mail', 'Invalid email address') + '</p></div>');
                isValid = false;
            }
            if ($(field).attr('name') == 'phone' && !validateDigits($(field).val())) {
                $(field).parents('.text-input').addClass('error');
                $(field).after('<div class="input-error"><p class="Body color-just-grey ">' + get_label('Тільки цифри', 'Only Digits') + '</p></div>');
                isValid = false;
            }
        }
    });
    $('#' + selector + ' [type="checkbox"]').each(function () {
        if (!$(this).is(':checked')) {
            $(this).parents('label.checkbox').before('<p class="Body color-white checkbox-error">! ' + get_label('Заповніть це поле', 'This field is required') + '</p>');
            isValid = false;
        }
    });

    if ($('#' + selector).data('career_title')) {
        $('#' + selector + ' [name="hidden-subject"]').val($('#' + selector).data('career_title'));
    }

    if (isValid) {
        $('[type="submit"]', $('#' + selector).parents('form')).click();
        $('#' + selector + ' [type="submit"]').click();
    }
}

initSticky('#header-menu', '.menu-button');
initSticky('.btn-box', '.btn-joint');
initSticky('.pum-close', '.pum-close');
function initSticky(wrapper, domestic) {
    var selector = $(domestic);
    if (wrapper == '.btn-box') {
        selector = $(domestic).add('.clutch-btn');
    }
    selector.hover(function () {
        $(this).mousemove(({ clientX, clientY }) => {
            const { width, left, top, height } = adjustedLocation(this, wrapper);
            const TX = left + width / 2;
            const TY = top + height / 2;
            const dist = Math.hypot(clientX - TX, clientY - TY);
            if (dist < width / 2 + 20) {
                const x = (clientX - TX) / 5;
                const y = (clientY - TY) / 5;
                $(domestic).css({ 'transform': `translate(${x}px, ${y}px)`, 'transition': `none`, 'animation': `none` });
            }
        });

        $(this).mouseout(() => {
            $($(domestic)).css({ 'transform': `translate(0, 0)`, 'transition': `all 0.75s ease-out` });
        });
    });
}
function adjustedLocation(ref, wrapper) {
    const ratio = window.devicePixelRatio === 1.25 ? 0.8 : 1;
    let buttonBox = $(ref).parents(wrapper)[0];

    if (!buttonBox) {
        switch (wrapper) {
            case '.btn-box':
                buttonBox = $(ref).parents('.submission').find('.btn-box')[0];
                break;
            case '.pum-close':
                buttonBox = $(ref)[0];
                break;
        }
    }
    let { width, x, y, height } = buttonBox.getBoundingClientRect();
    return { width: width * ratio, left: x * ratio, top: y * ratio, height: height * ratio };
}

function initForm(selector) {
    const clutchLink = $(`#${selector}`).find('.clutch').find('a');
    if (clutchLink.length) {
        $(`#${selector}`).find('.clutch').find('br').remove();
        $(`#${selector}`).find('.clutch').find('p').remove();

        clutchLink.append($(`#${selector}`).find('.clutch').find('.clutch-btn'));
        $(`#${selector}`).find('.clutch').append(clutchLink);
    };

    var textarea = $('#' + selector + ' textarea');
    if (textarea) {
        if ($(textarea).attr('name') == 'your-message') {
            $(textarea).attr('data-cursor', 'input-text');
            $(textarea).bind('input propertychange selectionchange paste', function () {
                const lettersCounter = $(textarea).parents('.text-input').find('.letters-counter');

                const value = this.value;
                if (value.length) {
                    if (!validateTextArea($(textarea).val())) {
                        $(textarea).val($(textarea).val().substring(0, 2000));
                        lettersCounter.text(`2000/2000`);
                    } else {
                        lettersCounter.text(`${value.length}/2000`);
                    }
                }
                else {
                    lettersCounter.text(`0/2000`);
                }
                resizeTextarea(textarea[0]);
            });
        }
    }

    var fields = $('#' + selector + ' input[type="text"], #' + selector + ' input[type="email"]');
    $(fields).attr('data-cursor', 'input-text');

    $('#' + selector + ' .send-btn').click(function () {
        if ($('#' + selector).is(':visible')) {

            $(fields).each(function () {
                var field = $(this);

                $(field).focus(function () {
                    $(field).parents('.text-input').removeClass('error');
                    $('.input-error', $(field).parents('.text-input')).remove();
                });

                $(field).parents('.text-input').removeClass('error');
                $('.input-error', $(field).parents('.text-input')).remove();
            });

            $('#' + selector + ' [type="checkbox"]').focus(function () {
                $('.checkbox-error', $(this).parents('.checkbox-root')).remove();
            });

            $('.checkbox-error', $('#' + selector + ' [type="checkbox"]').parents('.checkbox-root')).remove();

            formValidate(selector, fields);
        }
    });

    $(`#${selector}`).on('keypress', function (event) {
        if (event.which == 13) {
            event.preventDefault();
            const inputs = $(this).find('.input');
            const length = inputs.length - 1;

            $(inputs).each(function (index, input) {
                if ($(input).is(':focus')) {
                    focusedInputIndex = index + 1;
                }
            });
            if (focusedInputIndex <= length) {
                inputs[focusedInputIndex].focus();

            } else if (focusedInputIndex > length && $(inputs).last().is('textarea')) {
                const textarea = $(inputs).last()[0];
                let start = textarea.selectionStart;
                let end = textarea.selectionEnd;
                $(textarea).val($(textarea).val().substring(0, start) + '\n' + $(textarea).val().substring(end));
                textarea.selectionStart = textarea.selectionEnd = start + 1;
                resizeTextarea(textarea);
                textarea.dispatchEvent(new InputEvent('input'));
            }
        }
    })
}

function resizeTextarea(textarea) {
    const { style } = textarea;
    style.height = style.minHeight = 'auto';
    style.minHeight = `${Math.min(textarea.scrollHeight + 4, parseInt(textarea.style.maxHeight))}px`;
    style.height = `${textarea.scrollHeight + 4}px`;
}

initForm('contact_us_form');
initForm('subscribe_form');
initForm('career_form');

function setBookmark() {
    const ratio = window.devicePixelRatio === 1.25 ? 1.25 : 1;
    const content = $('.blog-content');
    if (!content.length)
        return;
    const scrollY = Math.floor(window.scrollY);
    const anchors = $(content).find('.anchor-name');
    let index = 0;
    anchors.each((i, anchor) => {
        if (scrollY >= anchor.offsetTop / ratio - 100) {
            index = i;
        }
    });

    const link = $('.one-tab')[index];
    $('.blog-side-bar').find('svg').hide();
    $(link).find('svg').show();
}

$('.one-tab').click(function () {
    $(window).off('scroll');
    $('.blog-side-bar').find('svg').hide();
    $('svg', $(this)).show();
    $('.charity-tabs .flex-row .Body').attr('class', 'Body color-grey ');
    $('.Body', $(this)).attr('class', 'Body color-navy-green');
    setTimeout(() => {
        $(window).on('scroll', setBookmark);
    }, 500);
});

$(window).on('load', function () {
    const blogSideBar = $('.blog-side-bar').find('svg');
    if (blogSideBar.length) {
        $(blogSideBar).hide();
    }

    $(window).on('scroll', setBookmark)
});




//Dropzone


function initDropzone(selector) {

    var dropWrap = $('#' + selector);
    var dropArea = $('.dropzone', dropWrap);

    dropArea.on('dragenter dragover dragleave drop', function (e) {
        e.preventDefault();
        e.stopPropagation();
    });

    dropArea.on('dragenter dragover', function () {
        dropArea.addClass('highlight');
        if (!$('.dropzone-overlay', dropWrap).is(':visible')) {
            $('.dropzone-overlay', dropWrap).show();
            $('.dropzone', dropWrap).addClass('green-bg');
        }
    });

    dropArea.on('dragleave drop', function () {

        dropArea.removeClass('highlight');
        if ($('.dropzone-overlay', dropWrap).is(':visible')) {
            $('.dropzone-overlay', dropWrap).hide();
            $('.dropzone', dropWrap).removeClass('green-bg');
        }
    });

    dropArea.on('drop', function (e) {
        var files = e.originalEvent.dataTransfer.files;
        handleFiles(files);
    });

    $('[type="file"]', dropArea).on('change', function () {
        var files = $(this)[0].files;
        handleFiles(files);
    });

    function handleFiles(files) {
        for (var i = 0; i < files.length; i++) {
            var file = files[0];
            uploadFile(file);
        }
    }

    function uploadFile(file) {
        var fileName = file.name;
        $('.gap16').append('<div class="flex row gap12 single-file"><svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 0C0.9 0 0.0100002 0.9 0.0100002 2L0 18C0 19.1 0.89 20 1.99 20H14C15.1 20 16 19.1 16 18V6L10 0H2ZM9 7V1.5L14.5 7H9Z" fill="#AFBCBA"></path></svg><p class="Body2 color-navy-green f2 file-label">' + fileName + '</p><div class="f1"><div class="delete-button"></div></div></div>');
    }

    function deleteFile(file) { }

    $(dropArea).click(function (e) {
        $('[name="file-492"]', e).click();
    });
}
/*
setTimeout(function(){
    $('.single-vacancy .accordion').eq(0).click();
    $('.single-vacancy .single-desc .apply-btn').click();

}, 500);
*/

function initMobilePlanetsSpinner() {
    var currentRotation = 0;
    const hinge = $('#planets_mobile .hinge');
    var move = 4;
    $('.partners-mob').on('wheel', function (event) {
        // var pos = $('#planets_mobile .partner').eq(0).offset();
        // var top = pos.top;
        if (event.originalEvent.deltaY > 0) {
            currentRotation += move;
        } else {
            currentRotation -= move;
        }

        hinge.attr('style', 'transform: rotate(' + currentRotation + 'deg)');
    });
}