<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class digit3 extends Model
{
    //
	protected $table = 'digit3';

	public function pakar_digit2(){
		return	$this->hasOne('App\digit2' , 'id'  , 'digit2');
	}

}
