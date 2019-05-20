<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $with = ['endereco'];

    public function endereco(){
    	return $this->hasOne('App\Enderecos','clientes_id');
    }
}
