<?php

namespace App\Http\Controllers;

use App\Event;
use App\Statement;
use Illuminate\Http\Request;

class StatementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'event_id' => 'required',
            'amount' => 'required|numeric'
        ]);

        $statement = Statement::create([
            'amount' => (int) request('amount'),
            'description' => 'Abono',
            'event_id' => (int) request('event_id'),
            'charge' => false,
            'quantity' => 1
        ]);

        return $statement;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Statement  $statement
     * @return \Illuminate\Http\Response
     */
    public function show($statement)
    {
        $event = Event::with('statements')->findOrFail($statement);
        return $event->statements;
    }

}
