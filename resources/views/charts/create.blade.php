@extends('layouts.app')
@section('content')

<div class="container">
  @include('inc.notifications')
  <div class="row justify-content-md-center">
    <div class="col-md-6">
      <h1 class="text-center">Create new chart</h1>

      <form method="POST" action="/charts">
        @csrf
        <div class="form-group">
          <label>Name:</label>
          <input type="text" class="form-control" name="name" value="{{old('name')}}"
          placeholder="Name" minlength="4" maxlength="18" required>
        </div>

        <div class="form-group">
          <label>Description:</label>
          <textarea class="form-control" name="description" placeholder="Description"
          rows="5" maxlength="300"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
      </form>
    </div>
  </div>
</div>
@endsection