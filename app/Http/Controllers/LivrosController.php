<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livros;
use Illuminate\Support\Facades\Auth;
use DB;
//use Illuminate\Foundation\Validation;
//use \Validator;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Validator;

use Session;

class LivrosController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function mostrarFormulario () {

		//$maxid1 = 'EAEEEEEE';

		return view('cadastrar')->with('maxid', Livros::max('id')+1);
	}

	public function ver () {

		$livro = new Livros;
		$livro = $livro->all()->sortByDesc('id');
		$livro = DB::table('livros')->orderBy('id', 'desc')->whereNull('deleted_at')->paginate(5);

		return view('verlivros', compact('livro'));

	}

	public function vereditar ($id) {

		$livro['nome']=DB::table('livros')->where('id', $id)->value('titulo');
		$livro['escritor']=DB::table('livros')->where('id', $id)->value('escritor');
		$livro['status']=DB::table('livros')->where('id', $id)->value('status');
		$livro['descricao']=DB::table('livros')->where('id', $id)->value('descricao');

		return view('editar')->with('id', $id)->with('livro', $livro);

	}

	public function apagar ($id) {

		//para soft deletar o id do banco de dados
		$idmessage = $id;
		$id = Livros::find($id);

		if (!empty($id)){
			$id->delete();
		}
		
		//para mostrar as informações na view de verlivros novamente
		$livro = new Livros;
		$livro = $livro->all()->sortByDesc('id');
		$livro = DB::table('livros')->orderBy('id', 'desc')->whereNull('deleted_at')->paginate(5);

		//return view('verlivros', compact('livro'))->with('mensagemDeletadoSucesso','O livro ID #'.$idmessage.' foi deletado com sucesso.');

		return redirect()->route('verlivros')->with('mensagemDeletadoSucesso','O livro ID #'.$idmessage.' foi deletado com sucesso.');

	}

	public function cadastrar (Request $dados) {

		//return view('cadastrar')->with('mensagemSucesso','Neste momento você iria salvar algo no banco de dados.');

		//um método muito estranho abaixo que só permite rodar a validação nesta variavel primitiva $dados
		$validatedData = $dados->validate([
			//'titulo' => 'required|unique:livros,titulo,NULL,id,deleted_at,NULL',
			'titulo' => 'required|unique:livros,titulo,NULL,id,deleted_at,NULL',
			'escritor' => 'required',
			'status' => 'required',
			'descricao' => 'required',
		]);

		$dados = $dados->all();

		/*$livro = new Livros;
		
		$livro->titulo = $dados['titulo'];
		$livro->escritor = $dados['escritor'];
		$livro->status = $dados['status'];
		$livro->descricao = $dados['descricao'];
		$livro->user_id = Auth::id();

		$livro->save();*/

		Livros::save(['user_id' => Auth::id()]);

		Livros::save(['titulo' => $dados['titulo']]);
		Livros::save(['escritor' => $dados['escritor']]);
		Livros::save(['status' => $dados['status']]);
		Livros::save(['descricao' => $dados['descricao']]);

		return view('cadastrar')->with('mensagemSucesso','O livro "'.$livro->titulo.'" foi registrado com sucesso.')->with('maxid', Livros::max('id')+1);

	}

	public function editar ($id, Request $dados) {

		//unique:table,column,except,idColumn
		//o primeiro é a tabela
		//o segundo é a coluna que você deseja que tenha o valor único
		//o terceiro é o id que você quer que seja ignorado
		//o quarto é para caso a sua coluna que guarda o ID não se chame 'ID', você pode informar qual é o outro nome

		$validatedData = $dados->validate([
			'titulo' => 'required|unique:livros,titulo,'.$id.',id,deleted_at,NULL',
			'escritor' => 'required',
			'status' => 'required',
			'descricao' => 'required',
		]);

		$dados = $dados->all();

		Livros::where('id', $id)->update(['titulo' => $dados['titulo']]);
		Livros::where('id', $id)->update(['escritor' => $dados['escritor']]);
		Livros::where('id', $id)->update(['status' => $dados['status']]);
		Livros::where('id', $id)->update(['descricao' => $dados['descricao']]);

		return back()->with('mensagemSucesso', $dados['titulo'].' '.$id);

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
