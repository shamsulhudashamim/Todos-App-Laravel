@extends('layouts.app')
@section('content')

<h1 class="text-center my-5">Create Todos</h1>
<div class="row justify-content-center">
	<div class="col-md-8">
	
	<div class="card card-default">
		<div class="card-header">Create new Todos</div>
		<div class="card-body">
			{{--form validation or validate input data --}}


			@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif





				<form action="/store-todos" method="POST">
					@csrf
	<div class="form-group">
		<input type="text" class="form-control" placeholder="name" name ="name">
	</div>
	<div class="form-group">
		<textarea name="description" cols="5" rows="3" class="form-control" placeholder="enter description in here"></textarea>
	</div>
	<div class="form-group text-center">
		<button type="submit" class="btn btn-primary">Create Todo</button>
	</div>
</form>
		
		</div>
	</div>
	
	</div>
</div>



@endsection