<?php

namespace App\Http\Controllers;

use App\Event;
use App\Configuration;
use Illuminate\Http\Request;

class ConfigurationsController extends Controller
{
    public function index(Request $request, Configuration $configuration)
    {
        return ['options' => $configuration->options()];
    }

    public function update(Request $request, Configuration $configuration)
    {
        $configuration->product_id = $request->product_id;
        $configuration->save();

        return back();
    }
}
