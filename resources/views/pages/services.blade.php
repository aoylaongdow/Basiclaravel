@extends('layouts.default')

@section('title_page')
Services @parent
@stop

@section('active_services')
class="active"
@stop

@section('content')
@include('includes.menu')
	
	<!--Section introduction-->
	<div class = "jumbotron">
		<div class="container">
			<h1>Services</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
			Minima officiis eius est dicta nostrum debitis veritatis placeat
			 repudiandae illum velit inventore dolor quidem incidunt odio iure,
			  fugit iste beatae distinctio!</p>
		</div>
	</div>


@stop

