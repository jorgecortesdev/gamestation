<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\EventWizardStep1;
use App\Http\Requests\EventWizardStep2;

class EventsController extends Controller
{
    public function index()
    {
        return view('events.index');
    }

    public function step1(EventWizardStep1 $request)
    {
        $request->session()->put('wizard.step1', $request->except(['_token']));

        return redirect('/event#step-2');
    }

    public function step2(EventWizardStep2 $request)
    {
        $request->session()->put('wizard.step2', $request->except(['_token']));

        return redirect('/event#step-3');
    }

    public function step3(Request $request)
    {
        dd($request->session()->get('wizard'));
    }
}
