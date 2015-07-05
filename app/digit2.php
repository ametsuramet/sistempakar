<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class digit2 extends Model
{
    //
	protected $table = 'digit2';

	public function pakar_digit3(){
		return	$this->hasMany('App\digit3' , 'digit2'  , 'id');
	}

}
