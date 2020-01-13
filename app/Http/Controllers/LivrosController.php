<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livros;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Foundation\Validation;
//use \Validator;
//use Illuminate\Support\Facades\Validator;


class LivrosController extends Controller
{


	public function __construct()
	{
		$this->middleware('auth');
	}

	public function mostrarFormulario () {
		return view('cadastrar');
	}

	public function cadastrar (Request $dados) {

		//return view('cadastrar')->with('mensagemSucesso','Neste momento você iria salvar algo no banco de dados.');

		//um método muito estranho abaixo que só permite rodar a validação nesta variavel primitiva $dados
		$validatedData = $dados->validate([
			'titulo' => 'required|unique:livros',
			'escritor' => 'required',
			'status' => 'required',
			'descricao' => 'required',
		]);

		$dados = $dados->all();

		$livro = new Livros;
		
		$livro->titulo = $dados['titulo'];
		$livro->escritor = $dados['escritor'];
		$livro->status = $dados['status'];
		$livro->descricao = $dados['descricao'];
		$livro->user_id = Auth::id();

		$livro->save();

		return view('cadastrar')->with('mensagemSucesso','O livro "'.$livro->titulo.'" foi registrado com sucesso no banco de dados.');

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
