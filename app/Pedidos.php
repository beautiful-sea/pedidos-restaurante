<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
	protected $with = ['cliente','marmitex'];
	protected $primaryKey = 'id';

	public function cliente(){
		return $this->hasOne('App\Clientes','id');
	}

	public function marmitex(){
		return $this->hasMany('App\Marmitex','id')->with(['carnes','cardapios']);
	}
}
