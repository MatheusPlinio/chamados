<?php

namespace App\Http\Controllers;

use App\Models\Chamado;


class HomeController extends Controller
{
    public function index()
    {
        $chamados = Chamado::orderBy('created_at', 'desc')->paginate(10);
        
        return view('home', ['chamados' => $chamados]);
    }
}
