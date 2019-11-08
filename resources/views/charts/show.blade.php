@extends('layouts.app')
@section('content')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/dygraph.css') }}">
  <script type="text/javascript" src="{{ asset('js/dygraph.js') }}"></script>
@endpush

@push('styles')
  <style>
    .chart{
      margin-top:20px;
      padding: 40px 15px;
      border-radius: 10px;
      -webkit-box-shadow: 0px 0px 55px -7px rgba(0,0,0,0.68);
      -moz-box-shadow: 0px 0px 55px -7px rgba(0,0,0,0.68);
      box-shadow: 0px 0px 55px -7px rgba(0,0,0,0.68);
    }
    .graphsets {
      height:400px;
    }

    .blink_me {
      animation: blinker 1s linear infinite;
    }

    @keyframes blinker {  
      50% { opacity: 0; }
    }

    @keyframes blink { 
      50% { box-shadow: 0px 0px 17px 1px rgba(255,8,8,1); } 
    }
    .alert-danger{
      animation: blink 1.2s step-end infinite alternate;
    }
    .alert{
      text-align: center;
      margin-top:30px;
      display:none;
    }
  </style>
@endpush

{{-- @if (Auth::check())
  @include('inc.sidebar')
@endif --}}

<div class="container chart">
  
  @if (Auth::check())
  <div class="row justify-content-md-center">
    <div class="col col-md-6">
      <div class="row justify-content-center">
        <button class="btn btn-primary float-left" type="button" data-toggle="collapse" 
        data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
          New dataset
        </button>
      </div>

      <div class="collapse" id="collapseExample">
        <div class="card card-body">
          <form method="POST" action="/charts/{{ $chart->id }}/datasets">
            @csrf
            
            <div class="form-group">
              <label>Date:</label>
              <input type="date" class="form-control" name="date" 
              value="<?php echo date('Y-m-d'); ?>" required>
            </div>
      
            <div class="form-group">
              <label>Temperature:</label>
              <input type="number" class="form-control" name="temperature"
              placeholder="Temperature" maxlength="3" required >
            </div>
      
            <div class="form-group">
              <label>Air infection:</label>
              <input type="number" class="form-control" name="air_infection"
              placeholder="Air infection" maxlength="5" required >
            </div>
      
            <button type="submit" class="btn btn-primary">Add dataset</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endif

  <h1 class="text-center">{{$chart->name}}</h1><hr>

  <div class="graphsets" id="graphdiv"></div>
  <div class="chart-related">
    <div class="alert alert-danger">
      <h2><strong class="blink_me">Attention!</strong> </h2>
      Air infection level is dangerous.
    </div>
    <div class="alert alert-warning">
      <h2><strong class="blink_me">Attention!</strong></h2>
      Air infection level is potentially dangerous.
    </div>
    <div class="alert alert-success">
      Air infection level is safe.
    </div>
    <div>
      <p>
        {{$chart->description}}
      </p>
    </div>
  </div>
</div>  

@if(isset($air_inf_max))
  <script> 
    var max_val = "{{$air_inf_max}}";  
    if(max_val >= 25){
      document.getElementsByClassName('alert')[0].style.setProperty("display", "block");
    }
    else if(max_val < 25 && max_val >= 15){
      document.getElementsByClassName('alert')[1].style.setProperty("display", "block");
    }
    else if(max_val < 15 && max_val >= 0){
      document.getElementsByClassName('alert')[2].style.setProperty("display", "block");
    }

    /* console.log('max_val has error value of: ' + max_val); */

  </script>
@endif
<script>
  g = new Dygraph(
    document.getElementById("graphdiv"),
    "{{$dataset_params}}", // passed params
    {
      labels: [ 'Date', 'Temperature °C', 'Air Infection %' ],
      ylabel: "<font style='color:green'>" + 'Temperature °C' + "</font>",
      y2label: "<font style='color:blue'>" + 'Air Infection %' + "</font>",
      series : {
        'Temperature °C': {
          axis: 'y'
        },
        'Air Infection %': {
          axis: 'y2'
        }
      },
      axes: {
        y: {
          // set axis-related properties here
          drawGrid: false,
          independentTicks: true,
          valueRange: [-20, 40]
        },
        y2: {
          // set axis-related properties here
          labelsKMB: true,
          drawGrid: true,
          independentTicks: true,
          valueRange: [0, 100]
        }
      },
      animatedZooms:true,
      connectSeparatedPoints: true,     
      legend: 'always'
    } 
  );
</script>

@endsection



 