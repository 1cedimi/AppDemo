<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
  protected $guarded = [''];
  public function chart()
  {
      return $this->belongsTo(Chart::class);
  }
}