<?php

namespace App\Http\Controllers;
use App\Chart;
use App\Dataset;
use Illuminate\Http\Request;

class ChartDatasetController extends Controller
{
  public function store(Chart $chart)
  {
    request()->validate([
      'date' => 'required|date',
      'temperature' => 'required|max:3',
      'air_infection' => 'required|max:6'
    ]);

    Dataset::create([
      'chart_id' => $chart->id,
      'date' => request('date'),
      'temperature'=> request('temperature'),
      'air_infection' => request('air_infection')
    ]);
    return back();
  }
}