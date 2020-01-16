<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class livros extends Model {

	use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'user_id', 'escritor', 'status', 'descricao',
    ];

	//protected $fillable = ['user_id', 'titulo', 'detalhe', 'escolha', 'descricaocompleta'];

	public function saveLivros() {

	}

}
