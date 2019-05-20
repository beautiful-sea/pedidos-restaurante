<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{	
	protected $fillable = ['nome','telefone','celular'];
    protected $with = ['endereco'];
    protected $primaryKey = 'id';

    public function endereco(){
    	return $this->hasOne('App\Enderecos','id');
    }
}
