@extends('layouts.app')
@section('content')

<div class="container">
  @include('inc.notifications')
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <h1 class="text-center">Edit chart</h1>

      <form method="POST" action="/charts/{{$chart->id}}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label>Name:</label>
          <input type="text" class="form-control" name="name" value="{{$chart->name}}" 
          placeholder="Name" minlength="4" maxlength="20" required>
        </div>

        <div class="form-group">
          <label>Description:</label>
          <textarea class="form-control" name="description" placeholder="Description"
          rows="5" maxlength="300">{{$chart->description}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary float-left">Update</button>
			</form>

			<form method="POST" action="/charts/{{$chart->id}}">
				@method('DELETE')
				@csrf
				<button type="submit" class="btn btn-danger float-right">Delete</button>
      </form>
      
			<div class="clearfix"></div>
    </div>
	</div>
</div>
@endsection