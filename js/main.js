
    $(function(){
        $('.MenuList__title').click(function () {
            $(this).next('div').slideToggle();
            $(this).find(".MenuIcon__aco").toggleClass('open');
        });

        var effect_pos = 0; // 画面下からどの位置でフェードさせるか(px)
        var effect_move = 50; // どのぐらい要素を動かすか(px)
        var effect_time = 800; // エフェクトの時間(ms) 1秒なら1000

        // フェードする前のcssを定義
        $('.scroll-fade').css({
            opacity: 0,
            transform: 'translateY('+ effect_move +'px)',
            transition: effect_time + 'ms'
        });

        // スクロールまたはロードするたびに実行
        $(window).on('scroll load', function(){
            var scroll_top = $(this).scrollTop();
            var scroll_btm = scroll_top + $(this).height();
            effect_pos = scroll_btm - effect_pos;

            // effect_posがthis_posを超えたとき、エフェクトが発動
            $('.scroll-fade').each( function() {
                var this_pos = $(this).offset().top;
                if ( effect_pos > this_pos ) {
                    $(this).css({
                        opacity: 1,
                        transform: 'translateY(0)'
                    });
                }
            });
        });
        $.fn.clickToggle = function (a, b) {
            return this.each(function () {
                var clicked = false;
                $(this).on('click', function () {
                clicked = !clicked;
                if (clicked) {
                    return a.apply(this, arguments);
                }
                return b.apply(this, arguments);
                });
            });
            };
            $('.HeadSP__btn').clickToggle(function () {
            // １回目のクリック
            $(this).addClass("active");
            $(this).siblings(".Hum").css("display","block");
            $(this).siblings(".HeadSP__fixed").css("display","none");
            $(this).find(".HeadSP__btn--hm").css("height","41px").css("top","8%");
            }, function () {
            // ２回目のクリック
            $(this).removeClass("active");
            $(this).siblings(".Hum").css("display","none");
            $(this).siblings(".HeadSP__fixed").css("display","inline-block");
            $(this).find(".HeadSP__btn--hm").css("height","24px").css("top","23%");;
            });

            setTimeout(function(){
                $('.LoadMov__img').css("background-image","url('top_pic/1980.jpeg')");
            },2000);
            setTimeout(function(){
                $('.LoadMov__img').find(".Lmovp").html("1980");
            },2000);
            setTimeout(function(){
                $('.LoadMov__img').css("background-image","url('top_pic/2010.jpeg')");
            },4000);
            setTimeout(function(){
                $('.LoadMov__img').find(".Lmovp").html("2010");
            },4000);
            setTimeout(function(){
                $('.LoadMov__img').css("background-image","url('top_pic/2022.jpeg')");
            },6000);
            setTimeout(function(){
                $('.LoadMov__img').find(".Lmovp").html("2022");
            },6000);
            setTimeout(function(){
                $('.LoadMov__img').find(".Lmovp").html("<img src='top_pic/logo.svg'>");
                $('.LoadMov__img').find(".Lmovp").css("background-color","rgba(0,0,0,0.2)");
            },8000);
            setTimeout(function(){
                $('.LoadMov').hide(2000);
                $('.wrap').show(1000);
                $('footer').show(1000);
            },9000);

            $('.Skip').on('click', function() {
                $(this).parents(".LoadMov").hide(2000);
                $(this).parents().siblings().$('footer').show(1000);
            });
            //一秒後に実行

            // 変数にクラスを入れる
            var btn = $('.pagetop');
            
            $(document).ready(function(){
                var w = $(window).width();
                var x = 760;
                if (w <= x) {
                    $('#kotira').css({
                        display: 'block'
                    });
                } else {
                    $('#kotira').css({
                        display: 'none'
                    });
                }
            });
            $(window).resize(function(){
                var w = $(window).width();
                var x = 500;
                if (w <= x) {
                    $('#kotira').css({
                        display: 'block'
                    });
                } else {
                    $('#kotira').css({
                        display: 'none'
                    });
                }
            });


            //スクロールしてページトップから100に達したらボタンを表示
            $(window).on('load scroll', function(){
                if($(this).scrollTop() > 500) {
                btn.addClass('active');
                }else{
                btn.removeClass('active');
                }
            });

            //スクロールしてトップへ戻る
            btn.on('click',function () {
                $('body,html').animate({
                scrollTop: 0
                });
            });


            $('.Himg').on('click', function() {
                // １回目のクリック
                var id = $(this).attr('id');
                $(this).parents().siblings("#fullOverlay").css("display","block");
                $(this).parents().siblings("#fullOverlay").find(".Ovimg").attr("src","top_pic/"+id+".jpeg");
                $(this).parents().siblings("#fullOverlay").find("#"+id).css("display","block");
            });
            
            $("#fullOverlay").on('click', function() {
                $(this).css("display","none");
                $(this).find(".Fexp").css("display","none");
            });
            
            jQuery(window).on("scroll", function() {
                documentHeight = jQuery(document).height();
                scrollPosition = jQuery(this).height() + jQuery(this).scrollTop();
                footerHeight = jQuery(".footer").innerHeight();
            
                if (documentHeight - scrollPosition <= footerHeight) {
                    jQuery("#kotira").css({
                        position: "absolute",
                        bottom: footerHeight + -230
                    });
                } else {
                    jQuery("#kotira").css({
                        position: "fixed",
                        bottom: "7%"
                    });
                }
            });
});
