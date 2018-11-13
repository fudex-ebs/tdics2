@extends('layouts.individual')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard-report</div>

                <div class="card-body">
                <h2>enviroment personality is " {{$quiz->get_enviroment_personality()}} "</h2>
                <h2>most table</h2>
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
                <h2>actual personality is " {{$quiz->get_actual_personality()}} "</h2>
                <h2>least table</h2>
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
                @switch('d')
                  @case('d')
                        <p>Strength : DETERMINED , PRODUCTIVE ,DECISIVE</p>
                      @break

                  @case('i')
                      <p>Strength : OPTIMISTIC , EXCITED ,COMMUNICATIVE</p>
                      @break

                  @case('s')
                      <p>Strength : CALM , EASYGOING ,PRACTICAL</p>
                      @break

                  @case('c')
                      <p>Strength : ANALYTICAL , PERFECTIONISTIC ,IDEALISTIC</p>
                      @break

                  @default
                     'noting'
              @endswitch
            </div>
        </div>
    </div>
</div>
@endsection
