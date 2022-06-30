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
        $calls = Call::orderBy('updated_at', 'desc')->get();

        return view('home', ['calls' => $calls]);
    }
}
