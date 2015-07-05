<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class spesifik extends Model
{
    //
	protected $table = 'spesifik';

	public function pakar_digit3(){
		return	$this->hasOne('App\digit3' , 'id'  , 'digit3');
	}

}
