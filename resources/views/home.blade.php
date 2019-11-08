@extends('layouts.app')

@section('content')
@push('head')
<style>
  .col-sm-4 li:hover{
    margin-left: 4px;
  }
  
  .title{
    font-size: 84px;
    color: #636b6f;
  } 
</style>
@endpush

<div class="container">
  <div class="jumbotron text-center">
    <h1 class="title">Demo project!</h1>
    <p>The project demonstrates back-end and front-end technologies. 
      Example idea of this project is to list charts of different cities worldwide and show data to the users.
      Authenticated users have access for data interaction with CRUD functionality.
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
        <li>Fast and simplifies majority of tasks such as Authentication</li>
        <li>Object oriented libraries and model-controller-view (MVC) architecture </li>
        <li>Highly Secure(XSS, CSRF, SQL injections)</li>
        <li>Most popular PHP framework</li>
      </ul>
    </div>
    <div class="col-sm-4">
      <h2 class="text-center">Laravel features</h2>
      <ul>        
        <li>Artisan command line tool</li>
        <li>Eloquent service for model part</li>
        <li>Blade template engine</li>
        <li>Database Migrations</li>
      </ul>
    </div>
  </div>
</div>
@endsection