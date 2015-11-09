$(document).ready(function() {
    // #(ハッシュ)指定されたタブを表示する
    var hashTabName = document.location.hash;
    if (hashTabName) {
        $('.nav-tabs a[href=' + hashTabName + ']').tab('show');
    }
})

/*
$(function() {
    //ページ遷移イベント
    $("div[data-role*='page']").on('pageshow', function(event) {
        console.log('on');
    });
});
*/
/*
$(document).on('pagecreate', '#graph', function() {
    bf = bf_ang;
    af = af_ang;
    graph();
    console.log('graphtest');
})
*/
/*
//グラフ描画
function graph(){
    console.log('graph');
    new Chartist.Line(
        '.ct-chart', {
        labels: label,
        series: [
            bf,
            af
        ]
    },

    {
    fullWidth: true,
    chartPadding: {
        right: 30
    },
    axisX: {
        
    },
    axisY: {
        lineSmooth: true,		// いわゆるベジェ曲線か折れ線か
        scaleMinSpace: 1,		// 間隔
        high: 10,       //最大値
        low: 0,     //最小値
        onlyInteger: true,
        offset: 20
    }
    });
    
}
*/


