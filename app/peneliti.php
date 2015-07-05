<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class peneliti extends Model
{
    //
	protected $table = 'peneliti';

	public function pakar_spesifik(){
			return	$this->hasOne('App\spesifik' , 'id'  , 'spesifik');
		}

	public function detail_jabatan(){
			return	$this->hasOne('App\jabatan' , 'id'  , 'jabatan');
		}

	public function detail_pangkat(){
			return	$this->hasOne('App\pangkat' , 'id'  , 'pangkat');
		}

}
