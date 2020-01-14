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
    .alert-attention{
      animation: blink 1.2s step-end infinite alternate;
    }
    .alert{
      text-align: center;
      margin-top:30px;
      display:none;
    }
  </style>
@endpush

<div class="container chart">
  @include('inc.notifications')
 

  <h1 class="text-center">{{$chart->name}}</h1><hr>

  <div class="graphsets" id="graphdiv"></div>
  <div class="chart-related">
    <div class="alert alert-danger alert-attention">
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
    if(max_val >= 25){ //danger
      document.getElementsByClassName('alert')[0].style.setProperty("display", "block");
    }
    else if(max_val < 25 && max_val >= 15){ //warning
      document.getElementsByClassName('alert')[1].style.setProperty("display", "block");
    }
    else if(max_val < 15 && max_val >= 0){ //success
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



 