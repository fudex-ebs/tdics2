<h2 >invitation for tdics</h2>

<div >
	{{--<p>{{$invitation->group_report->user->name}} invite you to take exam</p>--}}

	<p>{{$invitation->group_report->owner->name}} invite you to take exam</p>

	<p>	<a href="{{ route('register') }}"> click here </a>to take the exam</p>
</div>