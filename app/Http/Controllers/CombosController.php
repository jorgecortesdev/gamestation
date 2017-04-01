<?php

namespace App\Http\Controllers;

use Validator;
use App\Combo;
use Illuminate\Http\Request;

class CombosController extends Controller
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

    public function index()
    {
        $combos = Combo::latest('id')->paginate(20);
        return view('combos.index', compact('combos'));
    }

    public function show(Combo $combo)
    {
        return view('combos.show', compact('combo'));
    }

    public function create()
    {
        return view('combos.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $combo = new Combo();
        $combo->name = $request->name;
        $combo->hours = $request->hours;
        $combo->kids = $request->kids;
        $combo->adults = $request->adults;
        $combo->price = $request->price;
        if (!empty($request->google_color_id)) {
            $combo->google_color_id = $request->google_color_id;
        }

        $combo->save();

        flash('Paquete agregado con éxito', 'success');

        return redirect(route('combo.index'));
    }

    public function edit(Combo $combo)
    {
        return view('combos.edit', compact('combo'));
    }

   public function update(Request $request, Combo $combo)
    {
        $data = array_merge($request->all(), ['id' => $combo->id]);

        $validator = $this->validator($data);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $combo->update($request->all());

        flash('Paquete actualizado con éxito', 'success');

        return redirect(route('combo.index'));
    }

    public function destroy($id)
    {
        $combo = Combo::find($id);
        $combo->delete();

        flash('Paquete borrado con éxito', 'success');

        return back();
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required|unique:combos|min:3',
            'hours' => 'required|numeric',
            'kids' => 'required|numeric',
            'adults' => 'required|numeric',
            'price' => 'required|numeric',
            'google_color_id' => 'required|digits_between:1,11'
        ];

        if (isset($data['id'])) {
            $rules['name'] = 'required|min:3|unique:combos,id,' . $data['id'];
        }

        $messages = [
            'name.required' => 'El campo es requerido.',
        ];

        return Validator::make($data, $rules, $messages);
    }
}
