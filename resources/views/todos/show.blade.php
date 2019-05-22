
@extends ('layouts.app')

@section('title')

Single Todo:{{$todo->name}}

@endsection
@section('content')

	<h1 class= 'text-center my-5 '>TODOS PAGE</h1>
	{{-- $todos --}}
	 <div class="row justify-content-center">
	 	<div class="col-md-8">
	 		<div class="card card-default">
	 	<div class="card-header">Todos details</div>

	 	<div class="card-body">
	 		
	 		{{$todo->description}}

	 	</div>

		

	 </div>
		<a href="/todos/{{$todo->id}}/edit" class="btn btn-primary my-3 ">Edit</a>

		<a href="/todos/{{$todo->id}}/delete" class="btn btn-danger my-3">Delete</a>


	 	</div>

	

	 </div>

	@endsection
