<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $testando1 = Auth::id();

        $numberx = DB::table('livros')->where('deleted_at', '=', NULL)->count();
        $numbery = DB::table('livros')->where('deleted_at', '=', NULL)->where('user_id', '=', Auth::id())->count();

        return view('home')->with('numberx', $numberx)->with('numbery', $numbery)->with('testando1', $testando1);
        
    }

}
