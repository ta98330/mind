$(document).ready(function() {
    // #(ハッシュ)指定されたタブを表示する
    var hashTabName = document.location.hash;
    if (hashTabName) {
        $('.nav-tabs a[href=' + hashTabName + ']').tab('show');
    }
})



$(function(){
    console.log(bf);
    //graph();
    //location.reload();

    
    $('#ang_btn').click(function(){
        $('#graph_emo').text('怒り');
        bf = bf_ang;
        af = af_ang;
        console.log(bf);
        graph();
    });
    
    $('#sad_btn').click(function(){
        $('#graph_emo').text('悲しみ');
        bf = bf_sad;
        af = af_sad;
        console.log(bf);
        graph();
    });
    
    $('#anxiety_btn').click(function(){
        $('#graph_emo').text('不安');
        bf = bf_anxiety;
        af = af_anxiety;
        console.log(bf);
        graph();
    });
    
    $('#joy_btn').click(function(){
        $('#graph_emo').text('喜び');
        bf = bf_joy;
        af = af_joy;
        console.log(bf);
        graph();
    });
    
    $('#stress_btn').click(function(){
        $('#graph_emo').text('ストレス');
        bf = bf_stress;
        af = af_stress;
        console.log(bf);
        graph();
    });
    
    
});

function graph(){
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