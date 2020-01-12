<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroController extends Controller
{
	public function cadastrar () {
		return view('cadastrar');
	}

	public function verCadastros () {
		return view('verCadastros');
	}

}
