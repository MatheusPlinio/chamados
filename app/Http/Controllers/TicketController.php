<?php

namespace App\Http\Controllers;

use App\Models\Call;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $date = new DateTime();
        $date->format('d/m/Y');
        return view('tickets.index', ['date' => $date]);
    }

    public function store(Request $request)
    {
            $rules =
                [
                    'titulo' => 'required|min:1|max:25',
                    'solicitacao' => 'required|min:1|max:150',
                    'prioridade' => 'required',
                    'solicitante' => 'required|min:3|max:50',
                    'setor' => 'required|min:1|max:50',
                ];
            $feedback =
                [
                    'titulo' => 'O campo :attribute deve ser preenchido',
                    'solicitação' => 'O campo :attribute deve ser preenchido',
                    'prioridade' => 'O campo :attribute deve ser preenchido',
                    'solicitante' => 'O campo :attribute deve ser preenchido',
                    'setor' => 'O campo :attribute deve ser preenchido',
                    
                ];

            $request->validate($rules, $feedback);

            $call = new Call();
            $call->titulo = $request->input('titulo');
            $call->solicitacao = $request->input('solicitacao');
            $call->solicitante = $request->input('solicitante');
            $call->setor = $request->input('setor');
            $call->prioridade = $request->input('prioridade');
            $call->status = $request->input('status') === 1;
            $call->save();
            // dd($call);

            return redirect()->route('home');
    }

    public function destroy($id) {
        $call = Call::find($id);
        $call->delete();

        return redirect()->route('home');
    }
}
