;(function($){
    $.fn.extend({
        praParent:function(name){
            var th = $(this);
            while (th = th.parent()) {
                if (th.is(name)) break
            }
            return th;
        }
    })
})(jQuery)

$(function(){
    $('.gallery .imgs a').each(function(){
        var th=$(this), img=$('img',th), tmp;

        if(tmp=img.height()) {
            th.css({height:tmp/2});
        } else {
            img.load(function(){
            th.css({height:this.offsetHeight/2})
            })
        }

        th.css({overflow:'hidden',position:'relative'}).append($('<span></span>')
            .css({background:'url('+img.attr('src')+') 0 100% no-repeat',position:'absolute',left:0,top:0,width:'100%',height:'100%',opacity:0,cursor:'pointer'})
            .bind('mouseenter',function(){
                $(this).stop().animate({opacity:1})
            })
            .bind('mouseleave',function(){
                if(!$(this).praParent('li').is('.current')) {
                    $(this).stop().animate({opacity:0});
                }
            })
        )
        .bind('click',function(){
            var th=$(this),pic=th.praParent('div').find('.pic img');
            th.parent('li').addClass('current').siblings().removeClass('current').find('span').stop().animate({opacity:0});
            pic.spinner({
                filename:'images/ajax-loader.gif',
                src:th.attr('href')
            })
            return false
        })
        $('.gallery ul.imgs li.current span').css({opacity:1})
    })
})