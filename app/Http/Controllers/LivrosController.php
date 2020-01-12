<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objetos;

class LivrosController extends Controller
{
	public function cadastrar () {
		return view('cadastrar');
	}

	public function ver () {
		return view('verlivros');
	}

	public function store(Request $request) {

		/*
		
		//vai instanciar o 
		$Objetos = new Objetos();
		
		//para validar abaixo
		$data = $this->validate($request, [
			'description'=>'required',
			'title'=> 'required'
		]);
		
		//tudo isso que foi feito acima serve apenas para colocar as informações corretas dentro da função pública saveObjetos que pertence ao modelo Objetos
		$Objetos->saveObjetos($data);
		*/

		return redirect('objetos/cadastrar')->with('success', 'New support ticket has been created! Wait sometime to get resolved');
	}

}
