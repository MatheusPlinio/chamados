<?php

namespace App\Http\Controllers;

use App\Models\Call;
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
                    'sector' => 'O campo deve ser preenchido',
                    'priority' => 'O campo deve ser preenchido'
                ];

            $request->validate($rules, $feedback);

            $call = new Call();
            $call->title = $request->input('title');
            $call->request = $request->input('request');
            $call->solicitor = $request->input('solicitor');
            $call->sector = $request->input('sector');
            $call->priority = $request->input('priority');
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
