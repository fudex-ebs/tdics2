<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable = [
        'email',
        'group_report_id'
    ];

    public function user(){
      return User::where('email',$this->email)->first();
    }

    public function group_report(){
    	return $this->belongsTo('App\GroupReport');
    }

    public function user_toke_quiz(){
        $user = User::where('email',$this->email)->first();
        if($user){
            return $user->has_quiz() ? true : false;
        }
    	return false;
    }

    public function invited_user_exam(){
        $user = User::where('email',$this->email)->first();
        if($user){
            return $user->quiz;
        }

        return false;
    }


}
