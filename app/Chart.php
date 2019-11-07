<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chart extends Model
{
  protected $guarded = [''];
  public function dataset()
  {
     return $this->hasMany(Dataset::class);
  }
}