@extends('layouts.individual')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                   
                    <form method="post" action="{{ route('pc_exam.answer') }}" enctype="multipart/form-data">
                        <input type='hidden' name='_token' value="{!! csrf_token() !!}">
                        @foreach($questions as $key => $question)
                              
                              <p>{{$question->option_d_en}}:
                                <label><input type="radio" name="{{$question->id}}-most" value="d" required="required">most</label>
                                <label><input type="radio" name="{{$question->id}}-least" value="d" required="required">least</label>
                              </p>
                              <p>{{$question->option_i_en}}:
                                <label><input type="radio" name="{{$question->id}}-most" value="i">most</label>
                                <label><input type="radio" name="{{$question->id}}-least" value="i">least</label>
                              </p>
                              <p>{{$question->option_c_en}}:
                                <label><input type="radio" name="{{$question->id}}-most" value="c">most</label>
                                <label><input type="radio" name="{{$question->id}}-least" value="c">least</label>
                              </p>
                              <p>{{$question->option_s_en}}:
                                <label><input type="radio" name="{{$question->id}}-most" value="s">most</label>
                                <label><input type="radio" name="{{$question->id}}-least" value="s">least</label>
                              </p>
                              <hr>
                        @endforeach
                       
                        <input type="submit" class="btn btn-primary" value="send">
                      </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
