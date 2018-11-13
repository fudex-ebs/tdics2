<?php

namespace App\Services;

use Auth;
use App\GroupReport;
use App\Invitation;


class GroupService
{
  public function create_group_report($dataArray){
    $group_report = GroupReport::create([
           'slug' => uniqid(),
					 'name' => $dataArray['name'],
           'owner_id' => Auth::user()->id,
        ]);
    return $group_report;
  }
  
}
