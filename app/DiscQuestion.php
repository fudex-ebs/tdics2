<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscQuestion extends BaseModel
{
	public $timestamps = true;
	protected $fillable = [
        'slug',
        'option_d_ar',
        'option_d_en',
        'option_i_ar',
        'option_i_en',
        'option_s_ar',
        'option_s_en',
        'option_c_ar',
        'option_c_en',
				'content_en',
				'content_ar',
        'type',
    ];
		public function getRouteKeyName() {
        return 'slug';
    }
  
}
