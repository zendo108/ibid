
@extends('layouts.default')

@section('content')

	<h1>Login Form</h1>
	{{Form::open(['route' => 'sessions.store'])}}
	<div>
		{{Form::label('email','Email: ')}}
		<!-- {{Form::input('text','Username: ')}} -->
		{{Form::text('email')}}
		<!--{{ $errors->first('email')}}-->
	</div>

	<div>
		{{Form::label('password','Password: ')}}
		<!-- {{Form::input('password','Password: ')}} -->
		{{Form::password('password')}}
		<!--{{ $errors->first('password')}}-->
	</div>

	<div>
		{{Form::submit('Login')}}
	</div>
	{{Form::close()}}

@stop