var cardSliderMargin = 806;
var productCatUrlObj = {};

var previewBlocked = sessionStorage.getItem('eventTriggered');
var previewTimeout = 3;
const isScale = window.devicePixelRatio == 1.25;
const isMozilaBrow = typeof InstallTrigger !== 'undefined';
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
        const ratio = window.devicePixelRatio === 1.25 ? 1.25 : 1;
        cardSliderMargin = (($(window).width()) / 2 + 100) * ratio;
        $('.industries-slider').css('transform', 'translate(' + cardSliderMargin + 'px, 145px)');
        $('.bar-filter').find('.overflow-hidden').css({ 'display': 'none' });
        $('.bar-filter').find('.flex-row').find('svg').hide();
        $('.pdf-page .flex-col .flex-row').find('.btn-mob').remove();
        $('.pdf-page').find('.btn-wrapper-mob').remove();
        initSticky('#header-menu', '.menu-button');
        initSticky('.btn-box', '.btn-joint');
        initSticky('.pum-close', '.pum-close');
        $('.services-slider').find('.product-title').each((index, item) => {
            const text = $(item).find('.mob-link').text();
            $(item).find('.H2').text(text);
            $(item).find('.mob-link').remove();

        })
    }

    if (isScale) {
        const ratio = 1.25;
        const popupContainer = $('.pum-container');
        popupContainer.each((index, item) => {
            const observer = new MutationObserver(function () {
                if (item.style.display != 'none') {
                    $(item).css({
                        'top': `${(window.innerHeight / 2) * ratio - (item.clientHeight / 2)}px`,
                        'left': `${((window.innerWidth / 2) * ratio - (item.clientWidth / 2))}px`
                    });
                    return;
                }
            });
            observer.observe(item, { attributes: true });
        });
    }

    if (!isLargeScreen) {
        $('#products_swiper, #gallery_swiper, #regions_swiper').find('.swiper-slide').css({ 'flex-shrink': 1 });
        $('#cursor-border').css({ 'display': 'none' });
        $('.vacancies-bar .bar-filter .accordion .flex-row svg').hide();
        $('.hide-mob').remove();
        $('.pdf-page .flex-col .flex-row').find('.btn').remove();
        $('.wide-gallery-slider').find('img').each((index, item) => {
            if ($(item).attr('alt').includes('Гуманітарна допомога') || $(item).attr('alt').includes('Humanitarian aid')) {
                $(item).attr('src', 'https://wp.telesens.ua/wp-content/uploads/2024/07/5e6bf4f0-58a0-4904-8989-98904225833c-10.png');
            }
        });
        $('.wide-gallery-slider').find('.Body').removeClass('Body').addClass('Button').each((index, item) => {
            if (isEmpty($(item)))
                $(item).remove();
        });
        $('.wide-gallery-slider').find('.Sub2').removeClass('Sub2').removeClass('mb12').addClass('Body semi-bold mb8');
        const popupContainer = $('.pum-container');
        popupContainer.each((index, item) => {
            const observer = new MutationObserver(function () {
                if (item.style.display != 'none') {
                    $(item).css({
                        'width': `${$(window).width() - 32}`,
                        'top': `${(window.innerHeight / 2) - (item.clientHeight)}px`,
                        'left': `${((window.innerWidth / 2) - (item.clientWidth / 2))}px`
                    });
                    return;
                }
            });
            observer.observe(item, { attributes: true });
        });
        const productTitle = $('.services-slider').find('.product-title');
        if (productTitle.length) {
            productTitle[0].style.bottom = '175px';
            productTitle[0].style.left = '-205px';
        }
    }

    $('.pum-title').css({ 'font-family': 'Commissioner' });
    $('.pum-content').css({ 'font-family': 'Commissioner' });
    $('.pum').css({ 'cursor': 'none' }).find('*').css({ 'cursor': 'none' });

    initCareerPageComponet();
    initVacanciesPostsCount();
    initMobilePlanetsSpinner();
    initFocusOnInputs();
});

function isEmpty(el) {
    return !$.trim(el.html());
}

function initFocusOnInputs() {
    $('input[type=text], input[type=email], textarea').focus(function () {
        $('.Sub2', $(this).parents('.text-input')).attr('class', 'Sub2 color-navy-green');
    }).blur(function () {
        $('.Sub2', $(this).parents('.text-input')).attr('class', 'Sub2 color-black');
    });
}
function initCareerPageComponet() {
    initAccordionVacancy();
    initFileUploader();
    if (isLargeScreen) {
        initSticky('.btn-box', '.btn-joint');
    }
    $('.vacancy-application').each(function () {
        initForm($(this).attr('id'));
        $(this).find('form').on('wpcf7submit', function () {
            $(this).find('.file-wrapper').children().remove();
            $(this).find('.dropzone').removeClass('disabled');
            $(this).find('.uploader').removeAttr('disabled');
        })
    });
    initCursor();
}

function initVacanciesPostsCount() {
    const vacanciesFilter = isLargeScreen ?
        $('.bar-filter .flex-row .Body') :
        $('.bar-filter .overflow-hidden .filter-item .Body');
    vacanciesFilter.each(function (index, item) {
        const slug = [$(item).attr('slug')];
        getVacancyPostsCountAjax(slug, $(item));
    });
}

function initFileUploader() {
    $('.dropzone').find('.wpcf7-form-control-wrap').css({ 'white-space': 'unset' });
    $('.dropzone').each((index, item) => {
        const containerUploads = $(item).find('.container-uploads');
        $(item).find('.container-uploads').remove();
        $(item).find('.codedropz-btn-wrap').append(containerUploads);
        $(item).find('a').remove();
        $(item).children('p').click(function (event) {
            if (!$(event.target).hasClass('uploader') && !$(event.target).hasClass('dnd-icon-remove')) {
                $(item).find('.uploader').click();
            }
        });
        $(item).find('.codedropz-upload-handler').add('.uploader').on('drop change click', function (event) {
            const errorText = window.location.href.includes('/en/') ? 'Some file isn’t matched of requirements' : 'Файл не відповідає вимогам';
            const uploadStatus = $(item).find('.dnd-upload-status');
            if ($(item).find('.dropzone-error').length) {
                $(item).find('.dropzone-error').remove();
            }
            if ($(item).find('.has-error-msg').length) {
                $(item).find('.has-error-msg').remove();
            }
            uploadStatus.hide();
            const MutationObserver = window.MutationObserver || window.WebKitMutationObserver;
            const observer = new MutationObserver(statusMutationHandler);
            const params = {
                childList: true,
                characterData: true,
                attributes: true,
                subtree: true
            };
            uploadStatus.each((index, element) => {
                observer.observe(element, params);
                if ($(element).find('.has-error').length) {
                    const dropError = '<div class="dropzone-error"><svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.935222 9.2496C0.74224 9.58293 0.98277 10.0001 1.36794 10.0001H10.6335C11.0187 10.0001 11.2592 9.58293 11.0662 9.2496L6.43342 1.24753C6.24084 0.914886 5.76058 0.914887 5.568 1.24753L0.935222 9.2496ZM6.50071 8.50012H5.50071V7.50012H6.50071V8.50012ZM6.50071 6.50012H5.50071V4.50012H6.50071V6.50012Z" fill="white"></path></svg>' +
                        `<p class="Overline color-white ">${errorText}</p></div>`;
                    $(uploadStatus).parents('.dropzone').append(dropError);
                    const input = $(item).find('.wpcf7-form-control-wrap');
                    const storageName = input.attr('data-name') + '_count_files';
                    const count = localStorage.getItem(storageName);
                    localStorage.setItem('upload-file_count_files', Number(count) - 1);
                    $(element).remove();
                }
            })
        })
    });
    $('.dropzone').find('.codedropz-upload-inner').find('span').remove();
}

function statusMutationHandler(mutationRecord) {
    mutationRecord.every(function (mutation) {
        if ($(mutation.target).hasClass('dnd-upload-status') && mutation.attributeName == 'class') {
            const uploadStatus = $(mutation.target);
            const container = $(mutation.target).parents('.text-input');
            const fileWrapper = container.find('.file-wrapper');
            if ($(uploadStatus).hasClass('complete')) {
                const fileName = uploadStatus.find('.name').find('span').text();
                $(fileWrapper).append(
                    '<div class="flex row gap12 single-file"><svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 0C0.9 0 0.0100002 0.9 0.0100002 2L0 18C0 19.1 0.89 20 1.99 20H14C15.1 20 16 19.1 16 18V6L10 0H2ZM9 7V1.5L14.5 7H9Z" fill="#AFBCBA"></path></svg><p class="Body2 color-navy-green f2 file-label">' +
                    fileName + `</p><div class="f1"><div id='${uploadStatus.attr('id')}_' data-cursor="active" class="delete-button"></div></div></div>`);
                initCursor();
                $(fileWrapper).find(`#${uploadStatus.attr('id')}_`).click(function (event) {
                    const buttonDelete = $(`#${uploadStatus.attr('id')}`);
                    buttonDelete.find('.dnd-icon-remove').trigger('click');
                    setTimeout(() => {
                        $(event.target).parents('.single-file').remove();
                    }, 1500);
                    if (container.find('.dnd-upload-status').length <= 3) {
                        container.find('.dropzone').removeClass('disabled');
                        $('.uploader').removeAttr('disabled');
                    }
                });
                const dropzone = $(mutation.target).parents('.dropzone');
                const completedUploads = dropzone.find('.dnd-upload-status.complete');
                if (completedUploads.length > 2) {
                    $(dropzone).addClass('disabled');
                    $(dropzone).find('.uploader').attr('disabled', 'disabled');
                    $(dropzone).find('.has-error-msg').remove();
                }
                return false;
            }
        }
    });
}

function clamp(value, lower, upper) {
    if (value > upper) return upper;
    if (value < lower) return lower;
    return value;
}

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
        $('body').removeAttr('style');
    } else {
        $('.main-menu').addClass('visible');
        $('#header-menu .menu-check').addClass('active');
        $('body').attr('style', 'overflow: hidden');
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
        if (Date.now() - timing > clickEventTiming) {
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
    if(isLargeScreen){
        $(this).mousemove(({ clientX, clientY }) => {
            const { x, y, width, height } = this.getBoundingClientRect();
            let isMozila = typeof InstallTrigger !== 'undefined';
            const ratio = window.devicePixelRatio === 1.25 && !isMozila ? 1.25 : 1;
            const ax = (x + width / 2 - clientX * ratio) / 10;
            const ay = (y + height / 2 - clientY) / 20;
            this.style.transition = "none";
            this.style.transform = `rotateY(${-ax}deg) rotateX(${ay}deg) translateZ(10px) scale(1.05)`;
        })
    }
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
    if (isLargeScreen) {
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
    } else {
        if ($(this).hasClass('selected')) {
            $('.techno-card').removeClass('selected');
            setTimeout(() => {
                window.scrollTo({ top: $(this).parents('.width-wrappers').offset().top });
            }, 1200);
        } else {
            $('.techno-card').removeClass('selected');
            $(this).addClass('selected');
            setTimeout(() => {
                window.scrollTo({ top: $(this).offset().top });
            }, 1000);

        }
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

function initAccordionVacancy() {
    $('.vacancies-root .single-vacancy .accordion').click(function (e) {
        let isMozila = typeof InstallTrigger !== 'undefined';
        const ratio = window.devicePixelRatio == 1.25 && !isMozila ? 1.25 : 1;
        let vacancyHeight = 0;
        var sv = $(this).parents('.single-vacancy');
        var va = $('.vacancy-application', $(sv).find('.single-desc'));
        if (sv.hasClass('collapse')) {
            const apply = sv.find('.apply-btn');
            if (apply.hasClass('apply')) {
                vacancyHeight = va.parents('.single-desc div:eq(0)').height() - va.height() - 50;
                apply.removeClass('apply');
                va.removeClass('apply');
                apply.parents('.single-desc').css({ 'overflow-y': 'initial', 'height': vacancyHeight + 'px' });
            }
            vacancyHeight = 0;
            sv.removeClass('collapse');
            $('.single-desc', sv).css({ 'overflow-y': 'hidden', 'height': vacancyHeight + 'px' });
        } else {
            vacancyHeight = $('.single-desc div:eq(0)', sv).height();
            const list = sv.parents('.vacancies-list');
            const openedVacancies = list.find('.collapse');
            const isPrevChildCollapse = sv.prevAll('.single-vacancy').hasClass('collapse');
            const vacancyApply = $(openedVacancies).find('.vacancy-application.apply');
            const vacancyApplyHeight = !!vacancyApply.length ? $(vacancyApply)[0].offsetHeight : 0;
            const isNeedCalcOffset = sv.is(':first-child') || !isPrevChildCollapse;
            const scroll = isNeedCalcOffset ? sv[0].offsetTop : sv[0].offsetTop - vacancyHeight - vacancyApplyHeight;
            openedVacancies.find('.accordion').trigger('click');
            sv.addClass('collapse');
            $('.single-desc', sv).css({ 'overflow-y': 'initial', 'height': vacancyHeight + 'px' });
            window.scrollTo({ top: scroll / ratio });

        }
    });

    $('.vacancies-root .single-vacancy .apply-btn').click(function (e) {
        var va = $('.vacancy-application', $(this).parents('.single-desc'));
        let vacancyHeight = 0;
        if ($(this).hasClass('apply')) {
            vacancyHeight = va.parents('.single-desc div:eq(0)').height() - va.height() - 50;
            $(this).removeClass('apply');
            va.removeClass('apply');
            $(this).parents('.single-desc').css({ 'overflow-y': 'initial', 'height': vacancyHeight + 'px' });
        } else {
            initCursor();
            vacancyHeight = va.parents('.single-desc div:eq(0)').height() + va.height() + 50;
            localStorage.setItem(`${va.attr('id')}`, va.height());
            $(this).addClass('apply');
            va.addClass('apply');
            $(this).parents('.single-desc').css({ 'overflow-y': 'initial', 'height': vacancyHeight + 'px' });
        }

    });

    $('.vacancy-application').each(function () {
        new ResizeObserver(resizeSingleDesc).observe(this);
    });

    function resizeSingleDesc(event) {
        if ($(event[0].target).hasClass('apply')) {
            const prevHeight = localStorage.getItem(`${$(event[0].target).attr('id')}`);
            const height = $(event[0].target).parents('.single-desc div:eq(0)').height() - (Number(prevHeight) - event[0].contentRect.height);
            $(event[0].target).parents('.single-desc').css({ 'overflow-y': 'initial', 'height': height + 'px' })
        }
    }
}



function accordionClick(element) {
    if (!isLargeScreen) {
        const accordion = $(element);
        const bar = $(element).parents('.bar-filter');
        const overflow = bar.find('.overflow-hidden');
        if (bar.hasClass('collapse')) {
            bar.removeClass('collapse');
            overflow.height(0);
        }
        else {
            bar.addClass('collapse');
            const childHeight = overflow.find('div').height();
            overflow.height(childHeight);
            let svg;
            overflow.find('.filter-item').click(function () {
                overflow.find('.filter-item').each((index, item) => {
                    if ($(item).hasClass('selected')) {
                        $(item).removeClass('selected');
                        svg = $(item).find('svg');
                        $(svg).remove();
                        $(item).append('<div class="tick-empty"></div>')
                    }
                })
                $(this).append(svg);
                $(this).find('.tick-empty').remove();
                $(this).addClass('selected');
                accordion.find('p').text($(this).find('p').text());
                let category = [];
                $('.vacancies-bar .bar-filter .overflow-hidden').find('.selected').each((index, item) => {
                    category.push($(item).find('p').attr('slug'));
                });
                vacancyAjaxPosts(category);
            })

        }
    }
}

let isSelectFilter = false;
$('.bar-filter').find('.flex-row').click(function (event) {
    if (isLargeScreen) {
        let category = [];
        const flexRow = $(this);
        const svg = flexRow.find('svg');
        const accordion = flexRow.parents('.accordion');
        const defaultCategory = flexRow.find('p').attr('default-slug');
        const barFilters = $('.bar-filter');
        const filterRows = barFilters.find('.flex-row');
        if (flexRow.hasClass('selected')) {
            flexRow.removeClass('selected');
            svg.hide();
            flexRow.find('p').removeClass('color-navy-green');
            if (!filterRows.hasClass('selected')) {
                category.push(defaultCategory);
                vacancyAjaxPosts(category);
                filterRows.each((index, item) => {
                    getVacancyPostsCountAjax([$(item).find('.Body').attr('slug')], $(item).find('.Body'));
                });
            } else {
                isSelectFilter = true;
                $('.vacancies-bar .bar-filter .accordion').find('.selected').each((index, item) => {
                    category.push($(item).find('p').attr('slug'));
                })
                if (category.length) {
                    vacancyAjaxPosts(category);
                }
            }
        } else {
            isSelectFilter = true;
            accordion.find('.flex-row').removeClass('selected')
            accordion.find('svg').hide();
            accordion.find('p').removeClass('color-navy-green').addClass('color-black');
            flexRow.addClass('selected');
            flexRow.find('p').addClass('color-navy-green');
            svg.show();
            $('.vacancies-bar .bar-filter .accordion').find('.selected').each((index, item) => {
                category.push($(item).find('p').attr('slug'));
            })
            if (category.length) {
                vacancyAjaxPosts(category);
            }
        }
    }
});

function getVacancyPostsCountAjax(category, paragraph) {
    $.ajax({
        url: '/wp-admin/admin-ajax.php',
        data: {
            'action': 'posts_count_ajax_request',
            'category_slug': category
        },
        success: function (data) {
            const counter = $(paragraph).find('.posts-count');
            data ? $(counter).text(`${data}`) : $(counter).text(`${0}`);
        },
        error: function (errorThrown) {
            console.log(errorThrown);
        }
    });
}

function vacancyAjaxPosts(category) {
    $.ajax({
        url: '/wp-admin/admin-ajax.php',
        data: {
            'action': 'codecanal_ajax_request',
            'category_slug': category
        },
        success: function (data) {
            const vacancies = $('.vacancies-list');
            vacancies.children().remove();
            vacancies.append(data);
        },
        error: function (errorThrown) {
            console.log(errorThrown);
        }
    }).done(function () {
        $('.wpcf7 > form').each(function () {
            wpcf7.init(this);
        });
        window.initDragDrop();
        initCareerPageComponet();
        if (isSelectFilter) {
            const filters = isLargeScreen ? $('.bar-filter .flex-row') : $('.bar-filter .overflow-hidden .filter-item');
            filters.each((index, item) => {
                const paragraph = $(item).find('.Body');
                filteredCategory = category.filter(cat => cat !== paragraph.attr('slug'));
                filteredCategory.push(paragraph.attr('slug'));
                getVacancyPostsCountAjax(filteredCategory, paragraph);
            });
            isSelectFilter = false;
        }
    });
}

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

    var swiper = new Swiper('#' + selectorId, {
        slidesPerView: 1,
        touchAngle: 1000,
        mousewheel: {
            releaseOnEdges: true,
            thresholdTime: 1000,
            forceToAxis: true,
            thresholdDelta: 30
        }
    });
    const isHaveSwiper = $(`#${selectorId}`).length;
    switch (selectorId) {
        case 'feedback_swiper':
            if (isHaveSwiper) {
                if (isLargeScreen) {
                    swiper.destroy(true, true);
                    swiper = new Swiper('#' + selectorId, {
                        slidesPerView: 1,
                        touchStartPreventDefault: false,
                        mousewheel: {
                            releaseOnEdges: true,
                            thresholdTime: 1000,
                            forceToAxis: true,
                            thresholdDelta: 30
                        }
                    });
                    swiper.on('touchStart', function () {
                        if (isLargeScreen) {
                            $('#cursor').attr('class', 'slider');
                            $('#cursor-border').attr('class', 'slider');
                        };
                        swiper.on('touchEnd', function () {
                            if (isLargeScreen) {
                                $('#cursor').removeAttr('class');
                                $('#cursor-border').removeAttr('class');
                            }
                        });
                    })
                } 
                else {
                    swiper.on('beforeTransitionStart', function (event) {
                        const nextSlideHeight = $(event.el).find('.swiper-slide-active')[0].firstChild.offsetHeight;
                        $(`#${selectorId} .swiper-wrapper`).css({ height: `${nextSlideHeight + 120}px` });
                        const parent = $(`#${selectorId} .swiper-wrapper`).parents('.swiper');
                        const hint = parent.find('.hint');
                        if(event.activeIndex > 0 && hint.length){
                            hint.remove();
                        }
                    });
                }
            }
            break;
        case 'gallery_swiper':
            if (isHaveSwiper) {
                if (!isLargeScreen) {
                    swiper.detachEvents();
                    let pressed = false,
                        startX = 0,
                        posX = 0,
                        initX = -1,
                        len = 0,
                        slideWidth = 0;
                    $(`#${selectorId} .swiper-wrapper`).on('touchstart', function(event) {
                        len = $(this).children().length;
                        slideWidth = $(this).children()[0].offsetWidth;
                        this.style.transition = "none";
                        window.addEventListener("touchend", touchEndSwiper, { once: true });
                        let positionX = this.getBoundingClientRect().x;
                        pressed = true;
                        initX = event.originalEvent.changedTouches[0].pageX;
                        posX = positionX;
                        startX = positionX - event.originalEvent.changedTouches[0].pageX;
                        $(this).on('touchmove', function(event) {
                            if (pressed) {
                                this.style.transform = `translateX(${startX + event.originalEvent.changedTouches[0].pageX}px)`;    
                            }
                        })
                    })
                    function touchEndSwiper(event){
                        if (pressed) {
                            pressed = false;
                            const currentTransate = $(`#${selectorId} .swiper-wrapper`).css("transform").split(",")[4].trim();
                            const offset = Math.abs(event.changedTouches[0].pageX - initX) > 50 ? Math.sign(event.changedTouches[0].pageX - initX) : 0;
                            const dir = Math.floor(currentTransate / slideWidth) + offset;
                            const isLast = -len + 1 >= dir;
                            const padding = isLast ? 16 : 0;
                            $(`#${selectorId} .swiper-wrapper`)[0].style.transition = "transform 0.3s ease-out";
                            $(`#${selectorId} .swiper-wrapper`)[0].style.transform = `translateX(${(clamp(dir, -len + 1, 0) * slideWidth) + padding}px)`;
                        }
                    }
                }
            }
            break;    
        default:
            if (isHaveSwiper) {
                if (!isLargeScreen) {
                    const countCards = $(`#${selectorId}`).find('.swiper-slide').length - 1;
                    swiper.on('beforeTransitionStart', function (event) {
                        const currentCardIndex = event.activeIndex;
                        const slideWidth = $(`#${selectorId}`).find('.swiper-slide')[0].offsetWidth;
                        const dif = selectorId != 'products_swiper' ? (window.innerWidth - slideWidth) / 2 : 80;
                        if (currentCardIndex === countCards) {
                            swiper.translateTo(-slideWidth * currentCardIndex + dif, 300, false, false);
                        } else {
                            swiper.translateTo(-slideWidth * currentCardIndex, 300, false, false);
                        }

                    })
                }
            }
            break;
    }

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

    // var formData = new FormData($('#' + selector + ' form ').html());
    // console.log(formData);
    // console.log($('#' + selector + ' form').serialize());
    // sendAjaxForm($('#' + selector + ' form'));

    if (isValid) {
        $('[type="submit"]', $('#' + selector).parents('form')).click();
        $('#' + selector + ' [type="submit"]').click();
        if (!selector.includes('subscribe_form') && !isLargeScreen) {
            window.scrollTo({ top: $(`#${selector}`).offset().top });
        }
    }
}

function sendAjaxForm(data) {
    $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        data: {
            action: 'send_email',
            data: data
        },
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}


function initSticky(wrapper, domestic) {
    var selector = $(domestic);
    if (wrapper == '.btn-box') {
        selector = $(domestic).add('.contact-us').add('.subscribe-form');
    } else if (domestic == '.pum-close') {
        const pumButton = $('.pum-container').find('.pum-close');
        $('.pum-container').each((index, item) => {
            const invisibleButton = document.createElement('button');
            $(invisibleButton).css({
                'width': `${pumButton.width() + 24}px`,
                'height': `${pumButton.height() + 24}px`, 'border': 'none', 'position': 'absolute', 'top': '11px',
                'bottom': 'auto', 'left': 'auto', 'right': '13px', 'opacity': 0, 'z-index': 1
            });
            $(item).append(invisibleButton);
            $(invisibleButton).addClass('pum-button-container');
        })
        selector = $('.pum-button-container').add('.pum-close');
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
                buttonBox = $(ref).find('.btn-box')[0];
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
            $('.pum-close').click(() => {
                textarea[0].dispatchEvent(new InputEvent('input'));
            })
            $(textarea).bind('input propertychange', function () {
                const lettersCounter = $(textarea).parents('.text-input').find('.letters-counter');

                const value = this.value;
                if (value.length) {
                    if (!validateTextArea($(textarea).val())) {
                        $(textarea).val($(textarea).val().substring(0, 2000));
                        lettersCounter.text(`2000/2000`);
                    } else {
                        lettersCounter.text(`${value.length}/2000`);
                    }
                    resizeTextarea(textarea[0]);
                }
                else {
                    lettersCounter.text(`0/2000`);
                    this.style.height = '98px';
                }
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
    const diff = isLargeScreen ? 4 : 15;
    style.height = style.minHeight = 'auto';
    style.minHeight = `${Math.min(textarea.scrollHeight + diff, parseInt(textarea.style.maxHeight))}px`;
    style.height = `${textarea.scrollHeight + diff}px`;
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
    $('.blog-side-bar .Body').attr('class', 'Body color-grey ');
    $(link).find('svg').show();
    $(link).find('.Body').attr('class', 'Body color-navy-green');
}

$('.one-tab').click(function () {
    $(window).off('scroll');
    $('.blog-side-bar').find('svg').hide();
    $('svg', $(this)).show();
    $('.charity-tabs .flex-row .Body, .blog-side-bar .flex-row .Body').attr('class', 'Body color-grey ');
    $('.Body', $(this)).attr('class', 'Body color-navy-green');
    setTimeout(() => {
        $(window).on('scroll', setBookmark);
    }, 500);
});

$(window).on('load', function () {
    initCursor();
    const blogSideBar = $('.blog-side-bar').find('svg');
    if (blogSideBar.length) {
        $(blogSideBar).hide();
    }

    $(window).on('scroll', setBookmark)
});




//Dropzone


// function initDropzone(selector) {

//     var dropWrap = $('#' + selector);
//     var dropArea = $('.dropzone', dropWrap);

//     dropArea.on('dragenter dragover dragleave drop', function (e) {
//         e.preventDefault();
//         e.stopPropagation();
//     });

//     dropArea.on('dragenter dragover', function () {
//         dropArea.addClass('highlight');
//         if (!$('.dropzone-overlay', dropWrap).is(':visible')) {
//             $('.dropzone-overlay', dropWrap).show();
//             $('.dropzone', dropWrap).addClass('green-bg');
//         }
//     });

//     dropArea.on('dragleave drop', function () {

//         dropArea.removeClass('highlight');
//         if ($('.dropzone-overlay', dropWrap).is(':visible')) {
//             $('.dropzone-overlay', dropWrap).hide();
//             $('.dropzone', dropWrap).removeClass('green-bg');
//         }
//     });

//     dropArea.on('drop', function (e) {
//         var files = e.originalEvent.dataTransfer.files;
//         handleFiles(files);
//     });

//     $('[type="file"]', dropArea).on('change', function () {
//         var files = $(this)[0].files;
//         handleFiles(files);
//     });

//     function handleFiles(files) {
//         for (var i = 0; i < files.length; i++) {
//             var file = files[0];
//             uploadFile(file);
//         }
//     }

//     function uploadFile(file) {
//         console.log(file);
//         sendAjaxForm(file);
//         var fileName = file.name;
//         $('.gap16', dropWrap).append('<div class="flex row gap12 single-file"><svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 0C0.9 0 0.0100002 0.9 0.0100002 2L0 18C0 19.1 0.89 20 1.99 20H14C15.1 20 16 19.1 16 18V6L10 0H2ZM9 7V1.5L14.5 7H9Z" fill="#AFBCBA"></path></svg><p class="Body2 color-navy-green f2 file-label">' + fileName + '</p><div class="f1"><div class="delete-button" onClick="deleteFile(this)"></div></div></div>');
//     }

//     $(dropArea).click(function (e) {
//         $('[name="file-492"]', e).click();
//     });
// }
// setTimeout(function(){
//     $('.single-vacancy .accordion').eq(0).click();
//     $('.single-vacancy .single-desc .apply-btn').click();

// }, 500);

function initMobilePlanetsSpinner() {
    const partners = $('#planets_mobile .partners');
    const hinge = $('#planets_mobile .hinge');
    const len = $('#planets_mobile .partner').length - 2;
    $(window).on('load', () => {
        if(partners.length){
            partners.scrollTop(400);
        }
    })
    partners.on('scroll', function (e) {
        const slideHeight = $('#planets_mobile .partner')[0].offsetHeight;
        hinge.css({ 'transform': `rotate(${(e.target.scrollTop / slideHeight) * 90}deg)`});
        
        if (e.target.scrollTop / slideHeight === len + 1) {
            e.target.scrollTop = slideHeight;
        } else if (e.target.scrollTop === 0) {
            e.target.scrollTop = len * slideHeight;
        } else if (e.target.scrollTop !== slideHeight) {
            $('#planets_mobile .Overline')[0].style.opacity = 0;
        }
    });
}


function renderPDF(pdfUrl) {
    const ratio = window.devicePixelRatio == 1.25 ? 1.25 : 1;
    // Get the width of the .flex-col block
    pdfWidth = isLargeScreen ? ($(window).width() * ratio) * 0.9 : $(window).width() - 64;

    // Load the PDF document with the reference of its file object URL
    var loadingTask = pdfjsLib.getDocument(pdfUrl);

    loadingTask.promise.then(
        function (pdf) {
            // Get the total number of pages
            var numPages = pdf.numPages;

            // Iterate through all the pages
            for (var pageNum = 1; pageNum <= numPages; pageNum++) {
                renderPage(pdf, pageNum, pdfWidth);
            }
            if (numPages > 0) {
                $('#pdf_loader').remove();
            }
        },
        function (reason) {
            console.error(reason);
        }
    );
}

function renderPage(pdf, pageNum, customWidth) {
    pdf.getPage(pageNum).then(function (page) {
        var viewport = page.getViewport({ scale: 1 });

        // Calculate scale based on the custom width
        var scale = customWidth / viewport.width;
        var scaledViewport = page.getViewport({ scale: scale });

        // Create a new canvas element for each page
        var canvas = document.createElement("canvas");
        canvas.id = "pdfCanvas" + pageNum;
        var context = canvas.getContext("2d");

        canvas.height = scaledViewport.height;
        canvas.width = customWidth;

        // Append the canvas to the container
        document.getElementById("pdf-embed-library").appendChild(canvas);

        // Build 2D viewport with context
        var renderContext = {
            canvasContext: context,
            viewport: scaledViewport
        };

        // Render the PDF page on the canvas
        page.render(renderContext).promise.then(function () {
            console.log("Page " + pageNum + " rendered!");
        });

        // Display the PDF container
        document.getElementById("pdf-embed-library").style.display = "block";
    });
}