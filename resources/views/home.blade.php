@extends('layouts.frontend_theme')

@section('body')
	<section class="">
		<div class="container">
			@if(Auth::check())
				<h2>Welcome {{ Auth::user()->name }}</h2>
			@else
				<h2>Welcome</h2>
			@endif
		</div>
	</section>
@endsection