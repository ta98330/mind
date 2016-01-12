$(document).ready(function() {
    // #(ハッシュ)指定されたタブを表示する
    var hashTabName = document.location.hash;
    if (hashTabName) {
        $('.nav-tabs a[href=' + hashTabName + ']').tab('show');
    }
})


/*--------------------プレースホルダ----------------------*/
$(document).on('pagecreate', '#event', function() {
    $('input[type=date]').each(function(){
        var thisTitle = $(this).attr('title');
        if(!(thisTitle === '')){
            $(this).wrapAll('<span style="text-align:left;display:inline-block;position:relative;"></span>');
            $(this).parent('span').append('<span class="placeholder">' + thisTitle + '</span>');
            $('.placeholder').css({
                //top:'20px',
                //left:'30px',
                //fontSize:'100%',
                //lineHeight:'120%',
                //textAlign:'center',
                color:'#999',
                overflow:'hidden',
                //position:'absolute',
                zIndex:'99'
            }).click(function(){
                $(this).prev().focus();
            });

            $(this).focus(function(){
                $(this).next('span').css({display:'none'});
            });

            $(this).blur(function(){
                var thisVal = $(this).val();
                if(thisVal === ''){
                    $(this).next('span').css({display:'inline-block'});
                } else {
                    $(this).next('span').css({display:'none'});
                }
            });

            var thisVal = $(this).val();
            if(thisVal === ''){
                $(this).next('span').css({display:'inline-block'});
            } else {
                $(this).next('span').css({display:'none'});
            }
        }
    });
});