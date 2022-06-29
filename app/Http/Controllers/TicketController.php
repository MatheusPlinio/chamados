<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('tickets.index');
    }

    public function store(Request $request)
    {
            $rules =
                [
                    'title' => 'required|min:4|max:25',
                    'request' => 'required|min:4|max:50',
                    'solicitor' => 'required|min:4|max:50',
                    'sector' => 'required|min:4|max:50',
                    'priority' => 'required',
                ];
            $feedback =
                [
                    'title' => 'O campo :attribute deve ser preenchido',
                    'request' => 'O campo :attribute deve ser preenchido',
                    'solicitor' => 'O campo :attribute deve ser preenchido',
                    'sector' => 'O campo :attribute deve ser preenchido',
                    'priority' => 'O campo :select deve ser preenchido'
                ];

            $request->validate($rules, $feedback);

            $call = new Call();
            $call->create($request->all());
            // dd($call);

            return redirect()->route('home');
    }
}
