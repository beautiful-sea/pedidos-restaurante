<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{	
	protected $fillable = ['logradouro','numero','referencia','complemento','bairros_id'];
    protected $with = ['bairro'];


    public function bairro(){
    	return $this->belongsTo('App\Bairros','bairros_id');
    }
}
