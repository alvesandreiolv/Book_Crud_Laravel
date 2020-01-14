<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class livros extends Model {

	use SoftDeletes;

	//protected $fillable = ['user_id', 'titulo', 'detalhe', 'escolha', 'descricaocompleta'];

	public function saveLivros() {

	}

}
