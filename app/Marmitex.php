<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marmitex extends Model
{
	protected $table = 'marmitex';

	public function carnes(){
		return $this->hasMany('App\Carnes','id');
	}

	public function cardapios(){
		return $this->hasMany('App\Cardapios','id');
	}
}
