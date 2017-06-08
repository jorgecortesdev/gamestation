<?php

namespace App\Http\Controllers;

use App\Event;
use App\Configuration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use GameStation\Transformers\ConfigurationTransformer;

class EventConfigurationsController extends Controller
{
    /** @var ConfigurationTransformer */
    protected $configurationTransformer;

    public function __construct(ConfigurationTransformer $transformer)
    {
        $this->middleware('auth');

        $this->configurationTransformer = $transformer;
    }

    public function index($event)
    {
        $event = Event::with('configurations.productType')->findOrFail($event);

        return response()->json([
            'data' => $this->configurationTransformer->transformCollection($event->configurations)
        ], $httpCode = 200);
    }

    public function show(Request $request, $event, $configuration)
    {
        $configuration = Configuration::with('productType')
            ->findOrFail($configuration);

        if ( ! $configuration) {
            return 'Not Found';
        }

        return response()->json([
            'customizable' => (boolean) $configuration->productType->customizable,
            'options' => $configuration->options()
        ], 200);
    }

    public function update(Request $request, $event, $configuration)
    {
        $configuration = Configuration::findOrFail($configuration);

        if ( ! $configuration) {
            return 'Not Found';
        }

        $configuration->product_id = $request->get('product_id');
        $configuration->custom = $request->get('custom', '');
        $configuration->save();

        return response()->json([
            'message' => 'Configuración guardada con éxito.',
            'data' => $this->configurationTransformer->transform($configuration),
        ], 200);
    }
}
