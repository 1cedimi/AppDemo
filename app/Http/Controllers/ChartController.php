<?php

namespace App\Http\Controllers;
use App\Chart;
use App\Dataset;
use Illuminate\Http\Request;

class ChartController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', ['except' => ['index', 'show']]);   
  }

  public function index()
  {
    $charts = Chart::OrderBy('created_at', 'desc')->get();
    
    return view('charts.index')->with('charts', $charts);
  }

  public function show(Chart $chart)
  {
    $dataset_params = "";
    foreach ($chart->dataset as $dataset) {
      $dataset_params .= $dataset->date . "," 
                      . $dataset->temperature . "," 
                      . $dataset->air_infection  . '\n';
    }
    $air_inf_max = $chart->dataset->max('air_infection');
  
    return view('charts.show')->with('chart', $chart)
                              ->with('dataset_params', $dataset_params)
                              ->with('air_inf_max', $air_inf_max);
  }

  public function create()
  {
    return view('charts.create');
  }

  public function store()
  {
    request()->validate([
      'name' => 'required|unique:charts|min:4|max:20',
      'description'=> 'max:300'
    ]);

    $chart = Chart::create([
      'name' => request('name'),
      'description' => request('description'),
      'creator_id' => auth()->id(),
      'active' => '0'
    ]);
    $chart->dataset()->createMany
    (factory(Dataset::class, 50)->make()->toArray());

    return redirect('/charts')->with('success', "New chart is created");
  }

  public function edit(Chart $chart)
  {
    $this->authorize('edit', $chart);
    /* abort_unless(auth()->id() == $chart->creator_id, 403); */
    return view('charts.edit')->with('chart', $chart);
  }

  public function update(Chart $chart)
  {
    if (request('name') != $chart->name){
      request()->validate([
        'name' => 'unique:charts'
      ]);
    }

    request()->validate([
      'name' => 'required|min:4|max:20',
      'description'=> 'max:300'
    ]);

    $chart->update([
      'name' => request('name'),
      'description' => request('description')
    ]);

    return redirect('/charts')->with('success', "$chart->name is updated");
  }

  public function destroy(Chart $chart)
  {
    $this->authorize('destroy', $chart);
    /* abort_unless(auth()->id() == $chart->creator_id, 403); */
    $chart->delete();
  
    return redirect('/charts')->with('success', "$chart->name is deleted");
  }
}