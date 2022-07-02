<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChamadoRequest;
use App\Models\Chamado;
use DateTime;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('tickets.create');
    }

    public function store(StoreChamadoRequest $request)
    {
            $validated = $request->validated();

            $chamado = new Chamado();
            $chamado->fill($validated);
            $chamado->save();

            return redirect()->route('home');
    }

    public function destroy($id) {
        $call = Chamado::find($id);
        $call->delete();

        return redirect()->route('home');
    }
}
