@extends('layouts.app')

@section('title', 'Chart')
@section('content')

@push('styles')
  <style>
    .border{
      padding: 15px;
      margin: 5px -10px;
      background-color: #E9ECEF;
    }
    
    .border:hover{
      background-color: #dcdee2;
      border:1px solid #B5CDE5 !important;
    }
    a{
      color: inherit;
      text-decoration: none;
    }

    .hidden-desc{
      height: 5em;
      overflow: hidden;
      text-overflow: ellipsis;
      word-break: break-word;
    }
  </style>
@endpush


<div class="container">

    @include('inc.notifications')
    <div class="row justify-content-md-center breadcrumb">
      <h1>Charts</h1>
    </div>
  
    @if (Auth::check())
      <div class="row justify-content-md-center breadcrumb">
        <a class="btn btn-outline-primary" href="/charts/create">
          <i class="fas fa-plus-circle"></i> Add new chart
        </a>
      </div>
    @endif
    
    <div class="row">
      @if(count($charts) > 0)
        @foreach ($charts as $chart)
        @can('show', $chart)
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="border rounded">
              <a href="/charts/{{$chart->id}}">
                <i class="fas fa-globe fa-4x float-right"></i> 
                <h2>{{$chart->name}}</h2>
              </a>  
              @can('edit', $chart)
                <a class="btn btn-outline-primary float-left mr-2" 
                href="/charts/{{$chart->id}}/edit">Edit</a>
              @endcan  
              @can('destroy', $chart)
                <form method="POST" action="/charts/{{$chart->id}}"> 
                  @method('DELETE')
                  @csrf
                  <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
                <div class="clearfix"></div>
              @endcan
              <div class="hidden-desc">
                <p>{{$chart->description}}</p>
              </div>
            </div>
          </div>
        @endcan
        @endforeach
      @else
      <div class="col-md-12">
        <div class="row justify-content-md-center">
          No charts available
        </div>
      </div>
      @endif
    </div>  
  </div>

@endsection