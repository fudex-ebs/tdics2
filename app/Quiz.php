<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends BaseModel
{
	protected $fillable = [
        'slug',
        'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function count_most($data){
        return $this->answers->where('most',$data)->count();
    }

    public function count_least($data){
        return $this->answers->where('least',$data)->count();
    }

    public function get_enviroment_personality(){
        $array = array("d"=>$this->count_most('d'),"i"=> $this->count_most('i'),
                        "s"=> $this->count_most('s'),"c"=>$this->count_most('c'));
        arsort($array);
        $personality = '';
        foreach ($array as $key => $value) {
            if($value >= 4){
                $personality = $personality.$key;
            }
        }
        return $personality;
    }
    public function get_actual_personality(){
        $array = array("d"=>$this->count_least('d'),"i"=> $this->count_least('i'),
                        "s"=> $this->count_least('s'),"c"=>$this->count_least('c'));
        asort($array);
        $personality = '';
        foreach ($array as $key => $value) {
            if($value <= 4){
                $personality = $personality.$key;
            }
        }
        return $personality;
    }


    
}
