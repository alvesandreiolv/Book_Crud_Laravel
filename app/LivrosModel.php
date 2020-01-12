<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class objetos extends Model
{

	protected $fillable = ['user_id', 'titulo', 'detalhe', 'escolha', 'descricaocompleta'];

	public function saveObjetos($data)
	{

	}

}
