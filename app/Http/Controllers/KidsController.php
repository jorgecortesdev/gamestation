<?php

namespace App\Http\Controllers;

use App\Kid;
use App\Repositories\Kids;
use App\Http\Requests\SaveKid;

class KidsController extends Controller
{
    /** @var Kids Kid repository */
    protected $kids;

    public function __construct(Kids $kids)
    {
        $this->middleware('auth');

        $this->kids = $kids;
    }

    public function index()
    {
        $kids = $this->kids->latest();
        $kids->load('clients');
        return view('pages.kids.index', compact('kids'));
    }

    public function create()
    {
        return view('pages.kids.create');
    }

    public function store(SaveKid $request)
    {
        $this->kids->save($request->all());

        flash('Niño agregado con éxito', 'success');

        return redirect(route('kids.index'));
    }

    public function edit(Kid $kid)
    {
        return view('pages.kids.edit', compact('kid'));
    }

    public function update(SaveKid $request, Kid $kid)
    {
        $this->kids->save($request->all(), $kid);

        flash('Niño actualizado con éxito', 'success');

        return redirect(route('kids.index'));
    }

    public function destroy($id)
    {
        $this->kids->delete($id);

        flash('Niño borrado con éxito', 'success');

        return back();
    }

    public function find($kid_id)
    {
        $data['kid'] = false;

        $kid = Kid::find($kid_id);

        if ($kid) {
            $data['kid'] = $kid;
        }

        return $data;
    }
}
