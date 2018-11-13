@extends('layouts.individual')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  {{ $group->name }} -
                  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">add invitation</button>
                  <a href="{{route('group.report',['groupReport'=> $group->slug])}}" class="btn btn-success">group report</a>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   @if(!$group->invitations)
                        <p> لا يوجد</p>
                    @else
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">email</th>
                          <th scope="col">status</th>
                          <th></th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach($group->invitations as $count => $invitation)
                        <tr>
                          <th scope="row">{{$count+1}}</th>
                          <td>{{$invitation->email}}</td>
                          <td>
                          @if($invitation->user_toke_quiz())
                            <a href="{{ route('pc_exam.report',$invitation->invited_user_exam()->slug) }}">see the report</a>
                          @else
                            user didnot toke the exam yet
                          @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضافة دعوة</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('invitation.store',['groupReport'=> $group])}}" enctype="multipart/form-data">
      <div class="modal-body">
        <input type='hidden' name='_token' value="{!! csrf_token() !!}">
        <div class="row">
          <div class="form-group col-md-12">
              <label>البريد الالكتروني</label>
              <input type="email" name="email" class="form-control" required="required">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
        <input type="submit" class="btn btn-primary" value="ارسال">
      </div>
      </form>
    </div>
  </div>
@endsection
