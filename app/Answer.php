<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends BaseModel
{
	protected $fillable = [
        'most',
        'least',
        'quiz_id',
        'disc_question_id'
    ];
    public function quiz()
    {
        return $this->belongsTo('App\User');
    }

    public function disc_question()
    {
        return $this->belongsTo('App\DiscQuestion');
    }
}
