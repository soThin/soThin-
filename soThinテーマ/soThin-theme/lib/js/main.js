$(function () {
    jQuery(document).ready(function ($) {
        $(function () {
            $('#navbarToggler').on('click', function () {
                $(this).toggleClass('active');
            });
        });
    });
});


$(function () {
    $('.inv_mv').on('inview', function (event, isInView, visiblePartX, visiblePartY) {
        if (isInView) {
            $(this).stop().addClass('inv');
        }
        else {
            $(this).stop().removeClass('inv');
        }
    });
});

$(function () {
    $('.fade_mv').on('inview', function (event, isInView, visiblePartX, visiblePartY) {
        if (isInView) {
            $(this).stop().addClass('fade');
        }
        else {
            $(this).stop().removeClass('fade');
        }
    });
});

$(function () {
    // #にダブルクォーテーションが必要
    $('a[href^="#"]').click(function () {
        var speed = 400;
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $('body,html').animate({ scrollTop: position }, speed, 'swing');
        return false;
    });
});