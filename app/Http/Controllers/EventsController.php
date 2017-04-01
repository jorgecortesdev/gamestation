<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\SaveKid;
use App\Http\Requests\SaveClient;
use App\Http\Requests\EventWizardStep1;
use App\Http\Requests\EventWizardStep2;

class EventsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $wizard = $request->session()->get('wizard');

        return view('events.index', compact('wizard'));
    }

    public function step1(SaveClient $request)
    {
        $request->session()->put('wizard.client', $request->except(['_token']));

        return redirect('/event#step-2');
    }

    public function step2(SaveKid $request)
    {
        $request->session()->put('wizard.kid', $request->except(['_token']));

        return redirect('/event#step-3');
    }

    public function step3(Request $request)
    {
        $request->session()->put('wizard.schedule', $request->except(['_token']));

        return redirect('/event#step-4');
    }

}
