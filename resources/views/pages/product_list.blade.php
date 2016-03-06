@extends('layouts.default')

@section('title_page')
Product @parent
@stop


@section('content')
@include('includes.menu')
<div class="jumbotron">
	<div class="container">
		<p></p>
			<a class="btn btn-primary btn-lg">Product</a>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, 
			sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
			Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi 
			ut aliquip ex ea commodo consequat. Duis aute irure dolor 
			in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
			 Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
			  deserunt mollit anim id est laborum.</p>
		</p>
	</div>
</div>
<div class="container">
<h1 class="text-center">Product List...({{($data_count)}})</h1>
		<table class="table table-hover table-bordered">
			<thead>
				<tr class="bg-primary">
					<th>category_id</th>
					<th>prdname</th>
					<th>price</th>
					<th>menufac_id</th>
					<th>status</th>
				</tr>
			</thead>
			<tbody>
			@foreach($data_customer as $data)
				<tr>
					<td>{{$data->category_id}}</td>
					<td>{{$data->prdname}}</td>
					<td>{{$data->price}}</td>
					<td>{{$data->menufac_id}}</td>
					<td>{{$data->status}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{!!$data_product->render()!!}
		</div>
@stop