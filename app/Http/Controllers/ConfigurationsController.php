<?php

namespace App\Http\Controllers;

use App\Event;
use App\Configuration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ConfigurationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request, $configuration)
    {
        $configuration = Configuration::findOrFail($configuration);

        if ( ! $configuration) {
            return 'Not Found';
        }

        return response()->json([
            'options' => $configuration->options()
        ], 200);
    }

    public function update(Request $request, $configuration)
    {
        $configuration = Configuration::findOrFail($configuration);

        if ( ! $configuration) {
            return 'Not Found';
        }

        $configuration->product_id = $request->get('product_id');
        $configuration->save();

        return back();
    }
}
