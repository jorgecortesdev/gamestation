<?php

namespace App\Http\Controllers;

use Validator;
use App\Extra;
use Illuminate\Http\Request;

class ExtrasController extends Controller
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
        $extras = Extra::latest('id')->paginate(20);
        return view('extras.index', compact('extras'));
    }

    public function create()
    {
        return view('extras.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $extra = new Extra($request->all());

        $extra->save();

        flash('El extra fue agregado con éxito', 'success');

        return redirect(route('extra.index'));
    }

    public function edit(Extra $extra)
    {
        return view('extras.edit', compact('extra'));
    }

   public function update(Request $request, Extra $extra)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $extra->update($request->all());

        flash('El extra fue actualizado con éxito', 'success');

        return redirect(route('extra.index'));
    }

    public function destroy($id)
    {
        $extra = Extra::find($id);
        $extra->delete();

        flash('El extra fue borrado con éxito', 'success');

        return back();
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'El campo es requerido.',
        ];

        return Validator::make($data, $rules, $messages);
    }
}
