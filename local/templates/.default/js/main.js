function initCarousel(){
    $('.products-block').each(function(){
        var carousel = $(this).find('.products-list'),
            arrowLeft = $(this).find('.arrow-left'),
            arrowRight = $(this).find('.arrow-right'),
            pager = $(this).find('.pager');
        carousel.carouFredSel({
            auto: false,
            width: 1024,
            items: 1,
            prev: arrowLeft,
            next: arrowRight,
            pagination: pager,
            mousewheel: true,
            swipe: {
                onMouse: true,
                onTouch: true
            }
        });
        carousel.find('.caroufredsel_wrapper').css('height', carousel.find('.products-item').first().outerHeight());
    });
}

$(function () {
    setItemsHeight('.advantages-block','.advantages-item',['.advantages-item-body']);

    initCarousel();

    $(window).on('scroll', function(){
        $('header').toggleClass('fixed', $(window).scrollTop() > 0);
    });

    $('.field-select select').select2({
        minimumResultsForSearch: -1
    });

    $('.fancybox').fancybox({
        helpers: {
            overlay: {
                locked: false
            }
        }
    });

    $('.callback-section .close').on('click', function(e){
        e.preventDefault();
        $('.callback-section').hide();
    });

    $('.callback-btn').on('click', function(e){
        e.preventDefault();
        $('.callback-section').show();
    });

    $('.phone-mask').mask('+7 (999) 999-99-99');

    $('ul.tabs-caption').on('click', 'li:not(.active)', function () {
        $(this).addClass('active')
                .siblings()
                .removeClass('active')
                .closest('div.tabs')
                .find('div.tabs-content')
                .removeClass('active')
                .eq($(this).index())
                .addClass('active');
        initCarousel();
    });

    $('nav, .logo').visualNav({
        selectedClass : 'active',
        selectedAppliedTo: 'a',
        offsetTop: 90
    });
});

$(window).load(function () {
    $('.main-slider').fotorama({
        width: '100%',
        height: 620,
        margin: 0,
        nav: 'dots',
        fit: 'cover',
        autoplay: 20000,
        arrows: false,
        transition: 'dissolve'
    });
});

function setItemsHeight(wrap, item, classes) {
    $(wrap).each(function () {
        var itemsInRow = Math.floor($(this).width() / $(this).find(item).first().outerWidth()),
            rows = Math.ceil($(this).find(item).length / itemsInRow);

        for (var i = 0; i < rows; i++) {
            var selector = item;
            if (i > 0) {
                selector += ':gt(' + (itemsInRow * i - 1) + ')';
            }
            selector += ':lt(' + itemsInRow + ')';
            for (var j in classes) {
                var that = this;
                var elems = $(that).find(selector).find(classes[j]).sort(function (a, b) {
                    return $(that).find(selector).find(a).height() > $(that).find(selector).find(b).height() ? 1 : -1;
                });
                $(that).find(selector).find(classes[j]).height($(that).find(selector).find(elems[elems.length - 1]).height())
            }
        }
    });
}