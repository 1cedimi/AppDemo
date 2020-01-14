@extends('layouts.app')

@section('content')
@push('head')
<style>
  .col-sm-4 li:hover{
    font-weight: bold;
  }
  
  .title{
    font-size: 84px;
    color: #636b6f;
  } 
  .jumbotron{
    border-style: solid;
    -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
    -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
    box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
  }
  .jumbotron:hover{
    
  }
</style>
@endpush

<div class="container">
  <div class="jumbotron text-center">
    <h1 class="title">Demo project!</h1>
    <p>The project demonstrates some of the Laravel framework functionality.
      Guest users can see list of public charts of different cities worldwide.
      In this project example each city can have some data parameters in charts with warnings messages according to data values ​​limits.
      Authentication is designed in a way that registered users has ability to create new charts with random generated data by default.
      Role based system is applied in the project therefore registered users receive "User" role by default
      which also allows them to view, edit and delete charts but only those which are created by themselves.
      On the other hand those charts are not set as public by default therefore are not visible to the guests or other users with basic "User" role.
      Only "Admin" role user is eligible to view all charts and has full control over them.
    </p>
    @if (Route::has('login'))
      @auth
      <a class="btn- btn-primary btn-lg" href="{{ url('/charts') }}">Charts</a>
      @else
        <a class="btn- btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a>
      @endauth
    @endif
  </div>
  <div class="row">
    <div class="col-sm-4">
      <h2 class="text-center">Project functionality
      </h2>
      <ul>
        <li>Database migrations</li>
        <li>Database seeders with random faker data</li>
        <li>Authentication</li> 
        <li>Eloquent Many to Many relationship for Role based system</li>
        <li>CRUD functionality</li>
      </ul>
  </div>
    <div class="col-sm-4">
        <h2 class="text-center">Project techs</h2>
        <ul>
          <li>Laravel framework</li> 
          <li>MySQL database</li>
          <li>Bootstrap.js library</li>
          <li>Dygraphs.js library</li>
        </ul>
    </div>
    <div class="col-sm-4">
      <h2 class="text-center">Laravel benefits</h2>
      <ul>
        <li>Fast and simplifies majority of tasks</li>
        <li>Object oriented libraries and model-controller-view (MVC) architecture </li>
        <li>Highly Secure(XSS, CSRF, SQL injections)</li>
        <li>Most popular PHP framework</li>
      </ul>
    </div>
  </div>
</div>
@endsection