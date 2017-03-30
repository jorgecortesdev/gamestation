<?php

namespace App\Http\Controllers;

use Validator;
use App\Kid;
use Illuminate\Http\Request;

class KidsController extends Controller
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
        $kids = Kid::latest('id')->paginate(20);
        return view('kids.index', compact('kids'));
    }

    public function create()
    {
        return view('kids.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $repo = new \App\Repositories\Kids();
        $repo->save($request->all());

        flash('Niño agregado con éxito', 'success');

        return redirect(route('kid.index'));
    }

    public function edit(Kid $kid)
    {
        return view('kids.edit', compact('kid'));
    }

    public function update(Request $request, Kid $kid)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $repo = new \App\Repositories\Kids();
        $repo->save($request->all(), $kid);

        flash('Niño actualizado con éxito', 'success');

        return redirect(route('kid.index'));
    }

    public function destroy($id)
    {
        $kid = Kid::find($id);
        $kid->delete();

        flash('Niño borrado con éxito', 'success');

        return back();
    }

    protected function validator(array $data)
    {
        $rules = [
            'client_id' => 'required',
            'name' => 'required',
            'sex' => 'required|digits_between:1,2',
            'birthday_at' => 'required|date|before:1 year ago',
        ];

        $messages = [
            'client_id.required' => 'El campo es requerido',
            'name.required' => 'El campo es requerido.',
            'sex.required' => 'El campo es requerido.',
            'birthday_at.required' => 'El campo es requerido.',
            'birthday_at.before' => 'Debe ser mayor a 1 año.'
        ];

        return Validator::make($data, $rules, $messages);
    }
}
