<?php

namespace App\Policies;

use App\Chart;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChartPolicy
{
    use HandlesAuthorization;

    public function show(?User $user, Chart $chart)
    {
      if (!empty($user->id)){
        return $chart->creator_id == $user->id OR $chart->active == 1;
      }
      else{
        return $chart->active == 1;
      }
    }

    public function edit(User $user, Chart $chart)
    {
      return $chart->creator_id == $user->id;
    }

    public function destroy(User $user, Chart $chart)
    {
      return $chart->creator_id == $user->id;
    }
}