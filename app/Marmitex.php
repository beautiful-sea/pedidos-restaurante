<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marmitex extends Model
{
	protected $table = 'marmitex';

	protected $fillable = ['material','nome','tamanho','marca','valor_unitario'];

	public function carnes(){
		return $this->belongsToMany('App\Carnes', 'marmitex_has_carnes', 'marmitex_id', 'carnes_id');
	}

	public function cardapios(){
		return $this->belongsToMany('App\Cardapios', 'marmitex_has_cardapios', 'marmitex_id', 'cardapios_id');
	}
}
