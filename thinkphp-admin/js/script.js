/**
 * Created by admin on 2016/9/20.
 */
$(function () {
    //左侧导航高度
    var $domHeight = $(document).height();
    $('.body-left').height($domHeight);
    
    //伸缩左侧导航
    $('.navbar-brand').click(function () {
        var $icon =  $(this).find('i');
        var bRight = $('.body-right');
        if($icon.hasClass('glyphicon-align-justify')){
            //显示左边导航
            $('.body-left').show();
            bRight.removeClass('col-lg-12');
            bRight.addClass('col-lg-10');
            $icon.removeClass('glyphicon-align-justify');
            $icon.addClass('glyphicon-list');
        }else{
            //影藏左边导航
            $('.body-left').hide();
            bRight.removeClass('col-lg-10');
            bRight.addClass('col-lg-12');
            $icon.addClass('glyphicon-align-justify');
            $icon.removeClass('glyphicon-list');
        }
    });


    //过滤器控制
    $('.filter-switch').click(function () {
        $('.filter').toggle();
        $('.filter-switch').toggleClass('btn-primary btn-default');
    });

});