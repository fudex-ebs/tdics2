@extends('layouts.individual')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  {{ $group->name }} -
                  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">add invitation</button>


                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>your report</h1>
                    <h2>enviroment personality " {{$group->owner->quiz->get_enviroment_personality()}} "</h2>
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
                          <td> {{$group->owner->quiz->count_most('d')}} </td>
                          <td> {{$group->owner->quiz->count_most('i')}} </td>
                          <td> {{$group->owner->quiz->count_most('s')}} </td>
                          <td> {{$group->owner->quiz->count_most('c')}} </td>
                        </tr>
                    </table>
                    <hr style="heigt:10px;">
                    <h2>actual personality is " {{$group->owner->quiz->get_actual_personality()}} "</h2>
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
                          <td> {{$group->owner->quiz->count_least('d')}} </td>
                          <td> {{$group->owner->quiz->count_least('i')}} </td>
                          <td> {{$group->owner->quiz->count_least('s')}} </td>
                          <td> {{$group->owner->quiz->count_least('c')}} </td>
                        </tr>
                    </table>
                    <hr>
                   @if(!$group->invitations)
                        <p> لا يوجد</p>
                    @else
                      @foreach($group->invitations as $count => $invitation)

                        @if($invitation->user())
                        <h1>name:{{$invitation->user()->name}}</h1>
                        <h2>enviroment personality " {{$invitation->user()->quiz->get_enviroment_personality()}} "</h2>
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
                              <td> {{$invitation->user()->quiz->count_most('d')}} </td>
                              <td> {{$invitation->user()->quiz->count_most('i')}} </td>
                              <td> {{$invitation->user()->quiz->count_most('s')}} </td>
                              <td> {{$invitation->user()->quiz->count_most('c')}} </td>
                            </tr>
                        </table>
                        <hr>
                        <h2>actual personality is " {{$invitation->user()->quiz->get_actual_personality()}} "</h2>
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
                              <td> {{$invitation->user()->quiz->count_least('d')}} </td>
                              <td> {{$invitation->user()->quiz->count_least('i')}} </td>
                              <td> {{$invitation->user()->quiz->count_least('s')}} </td>
                              <td> {{$invitation->user()->quiz->count_least('c')}} </td>
                            </tr>
                        </table>


                        @endif
                        </td>
                      </tr>
                      @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
