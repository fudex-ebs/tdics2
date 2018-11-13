<?php

namespace App\Services;

use Auth;
use App\Events\InvitaionCreated;
use App\GroupReport;
use App\Invitation;


class InvitationService
{

  public function create_invitation($dataArray,GroupReport $groupReport){
    $invitation = Invitation::create([
        'email' => $dataArray['email'],
        'group_report_id' => $groupReport->id,
        ]);
    event(new InvitaionCreated($invitation));
    return $invitation;
  }



}
