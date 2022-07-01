<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chamados = Call::orderBy('created_at', 'desc')->paginate(5);
        
        return view(
            'home',
            [
                'chamados' => $chamados,
            ]
        );
    }
}
