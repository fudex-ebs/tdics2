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
                    @if(Auth::user()->role == "individual")
                        {{__('messages.indi_acc')}}
                    @elseif(Auth::user()->role == "company")
                        {{__('messages.comp_acc')}}
                    @else
                        {{__('messages.admin_acc')}}
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
