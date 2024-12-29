<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use App\Models\Funcionario;

class FucionarioController extends Controller
{
 
    public function index(){



        $funcionarios=Funcionario::all();

        return view('Funcionario',compact('funcionarios'));
    }
    



}
