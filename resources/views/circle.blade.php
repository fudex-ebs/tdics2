<canvas id="myCanvas" width="1500" height="1500">Your browser does not support the HTML5 canvas tag.</canvas>
{{--<div style="width:350px; height:350px ;">--}}
    {{--<canvas id="myChart" ></canvas>--}}
{{--</div>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<script>
    //Define Variables
    var radius = 80;
    var point_size = 4;
    // var center_x = 150;
    // var center_y = 150;
    var font_size = "20px";

    var c = document.getElementById("myCanvas");
    var ctx = c.getContext("2d");

    function drawCircle(center_x , center_y , radius){
        ctx.beginPath();
        ctx.arc(center_x, center_y, radius, 0, 2 * Math.PI);
        ctx.moveTo(200,200);
        ctx.lineTo(170,170);
        ctx.stroke();
    }

    function drawPoint(angle,distance,label){
        var x = 200 + radius * Math.cos(-angle*Math.PI/180) * distance;
        var y = 200 + radius * Math.sin(-angle*Math.PI/180) * distance;

        ctx.beginPath();
        ctx.arc(x, y, point_size, 0, 2 * Math.PI);
        ctx.fill();

        ctx.font = font_size;
        ctx.fillText(label,x + 10,y);
    }

    //Execution
    drawCircle(200,200 ,170);
    drawCircle(200,200 ,130);
    drawCircle(200,200 ,90);
    drawCircle(200,200 ,50);
    drawCircle(200,200 ,20);
    drawPoint(0,1,"A");
    drawPoint(90,1.5,"B");
    drawPoint(180,1,"C");
    drawPoint(45,0.5,"D");
    //
    var pie = document.getElementById('myChart');
    console.log('pie');
    data = {
        datasets: [{
            data: [25, 25, 25 , 25],
            backgroundColor: [
                'red',
                '#3490dc',
                '#ffcd56',
                'green'

            ],
            borderColor: [
                'red',
                '#3490dc',
                '#ffcd56',
                'green'

            ],

        }],

        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
            'Inspiring',
            'Cautious',
            'supportive',
            'Dominant'
        ],

    };
    var options = {
        cutoutPercentage: 95,
        // circumference:2
    };
    var myDoughnutChart = new Chart(pie, {
        type: 'doughnut',
        data: data,
        options :options
    });
</script>