@extends('layouts.individual')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.dashboard_report')}}</div>

                <div class="card-body">
                <h2>{{__('messages.env_personality')}} " {{$quiz->get_enviroment_personality()}} "</h2>
                <h3>{{__('messages.most_table')}}</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">d</th>
                      <th scope="col">i</th>
                      <th scope="col">s</th>
                      <th scope="col">c</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> {{$quiz->count_most('d')}} </td>
                      <td> {{$quiz->count_most('i')}} </td>
                      <td> {{$quiz->count_most('s')}} </td>
                      <td> {{$quiz->count_most('c')}} </td>
                    </tr>
                </table>
                <hr>
                <h2>{{__('messages.act_personality')}} " {{$quiz->get_actual_personality()}} "</h2>
                <h3>{{__('messages.least_table')}}</h3>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">d</th>
                      <th scope="col">i</th>
                      <th scope="col">s</th>
                      <th scope="col">c</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td> {{$quiz->count_least('d')}} </td>
                      <td> {{$quiz->count_least('i')}} </td>
                      <td> {{$quiz->count_least('s')}} </td>
                      <td> {{$quiz->count_least('c')}} </td>
                    </tr>
                </table>

                </div>
                <div class="result" style="text-align: center">
                    @switch('d')
                        @case('d')
                        <p> {{__('messages.strength')}} : DETERMINED , PRODUCTIVE ,DECISIVE</p>
                        @break

                        @case('i')
                        <p>  Strength : OPTIMISTIC , EXCITED ,COMMUNICATIVE</p>
                        @break

                        @case('s')
                        <p>  Strength : CALM , EASYGOING ,PRACTICAL</p>
                        @break

                        @case('c')
                        <p>  Strength : ANALYTICAL , PERFECTIONISTIC ,IDEALISTIC</p>
                        @break

                        @default
                        'noting'
                    @endswitch
                </div>

            </div>
            {{--<div class="card" >--}}
                {{--<div class="card-header">Chart-report</div>--}}

                {{--<div class="card-body" style="width:350px; height:350px ;">--}}
                    {{--<canvas id="myChart" ></canvas>--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

<script>
    var ctx = document.getElementById('myChart');
    console.log('fff');
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
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options :options
    });


</script>

@endsection
