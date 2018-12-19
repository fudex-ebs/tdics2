@extends('layouts.individual')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('messages.dashboard')}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <form method="post" action="{{ route('pc_exam.answer') }}" enctype="multipart/form-data">
                        <input type='hidden' name='_token' value="{!! csrf_token() !!}">
                        @foreach($questions as $key => $question)
                              @if(Auth::user()->role == "company")
                                  @if(app()->getLocale() == "ar")
                                    <h5>{{ $question->content_ar }}</h5>
                                  @else
                                    <h5>{{ $question->content_en }}</h5>
                                @endif
                              @endif
                              @if(app()->getLocale() == "ar")
                                  <p>{{$question->option_d_ar}}:
                                    <label><input type="radio" name="{{$question->id}}-most" value="d" required="required">{{__('messages.most')}}</label>
                                    <label><input type="radio" name="{{$question->id}}-least" value="d" required="required">{{__('messages.least')}}</label>
                                  </p>
                                  <p>{{$question->option_i_ar}}:
                                    <label><input type="radio" name="{{$question->id}}-most" value="i">{{__('messages.most')}}</label>
                                    <label><input type="radio" name="{{$question->id}}-least" value="i">{{__('messages.least')}}</label>
                                  </p>
                                  <p>{{$question->option_c_ar}}:
                                    <label><input type="radio" name="{{$question->id}}-most" value="c">{{__('messages.most')}}</label>
                                    <label><input type="radio" name="{{$question->id}}-least" value="c">{{__('messages.least')}}</label>
                                  </p>
                                  <p>{{$question->option_s_ar}}:
                                    <label><input type="radio" name="{{$question->id}}-most" value="s">{{__('messages.most')}}</label>
                                    <label><input type="radio" name="{{$question->id}}-least" value="s">{{__('messages.least')}}</label>
                                  </p>
                              @else
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
                              @endif
                              <hr>
                        @endforeach

                        <input type="submit" class="btn btn-primary" value="{{__('messages.send')}}">
                      </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
