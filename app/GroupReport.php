<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupReport extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'owner_id'
    ];

    public function getRouteKeyName() {
        return 'slug';
    }
    public function invitations(){
        return $this->hasMany('App\Invitation');
    }

    public function registered_users(){
      $counter = 0;
      foreach ($this->invitations as $invitation) {
        if($invitation->user_toke_quiz()) $counter++;
      }
      return $counter;
    }
    public function unregistered_users(){
      $counter = 0;
      foreach ($this->invitations as $invitation) {
        if(!$invitation->user_toke_quiz()) $counter++;
      }
      return $counter;
    }

    public function owner()
    {
        return $this->belongsTo('App\User','owner_id');
    }

    public function has_invited($email)
    {
        return $this->invitations->where('email',$email)->first() ? true : false;
    }



}
