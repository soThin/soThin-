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




/*スクロールバー*/
$(function () {

    $(".slide").each(function (i) {

        let value = (100 * i) + "%";
        $(this).css("left", value);
        let value2 = '<a href="#!">' + (i + 1) + "</a>";
        $(".slideshow-indicator").append(value2);

    });


    let currentIndex = 0;

    goToSlide = (index) => {

        let value3 = (index * 100) + "%";
        // slideGroupを移動させる処理
        $(".slideshow-slides").stop(true).animate({
            right: value3
        }, 1000);

        /* 現在表示されているスライドがわかるようにcurrentIndexという変数にindexの値を保存しましょう。
            変数の宣言は適切な位置で行なってください。またはcurrentIndexには最初から0を与えてください。
            currentIndexが0ということは最初のスライドが表示されているということです。slideが2番目であればcurrentIndexは1になります。*/
        currentIndex = index;
        /* 表示されるslideに合わせてサンプルの下の数字や左右にある矢印を変化させる必要があります。
            この処理は(3)で新たな関数を作って実装します。とりあえず今は下記のように関数を呼び出しておいてください。*/
        updateNav();
    }
    updateNav = () => {
        let $prev = $(".prev");
        let $next = $(".next");
        if (currentIndex === 0) {
            $prev.addClass('disabled');
            $next.removeClass('disabled');
        }
        else if (currentIndex === 4 - 1) {
            $next.addClass('disabled');
            $prev.removeClass('disabled');
        } else {
            $next.removeClass('disabled');
            $prev.removeClass('disabled');
        }


        indicator = () => {
            $(".slide").removeClass('active');
            $(".slide").eq(currentIndex).addClass('active');
        }
    }

    startTimer = () => {
        timer = setInterval(function () {

            let num = currentIndex + 1;
            if (currentIndex === 3) {
                num = 0;
            }
            let nextIndex = num;
            goToSlide(nextIndex);
        }, 2000);
    }
    stopTimer = () => {
        clearInterval(timer);
    }
    startTimer();

    let upContent = startTimer;
    let downContent = stopTimer;

    $(".slideshow").on({
        'mouseout': upContent,
        'mouseover': downContent
    });

    // $navの中にあるa要素が押されたとき

    $('#prev').on('click', function () {
        let num = currentIndex - 1;
        goToSlide(num);
    });
    $('#next').on('click', function () {
        let num = currentIndex + 1;
        goToSlide(num);
    });

    let $nav2 = $(".slideshow-indicator");

    $nav2.on('click', 'a', function () {
        if (!($(this).children("a").hasClass('.active'))) {
            let num = $(this).index()
            goToSlide(num);
        }
    });

});

$(function () {
    $(".aaa").on('webkitAnimationEnd', function () {
        $(".header_title").removeClass("hidden");
    });
});