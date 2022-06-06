<?php

namespace App\Http\Controllers;

use App\Models\Marker;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class MapsController extends Controller
{
    public function index()
    {
        $data = Marker::all();
        return Inertia::render('Map', [
            'maps' => Marker::Paginate(30)
        ]);
    }

    public function store(Request $request)
    {
        Marker::create([
            'name' => $request->name,
            'longitude' => $request->lng,
            'latitude' => $request->lat,
            'description' => $request->description,
        ]);
        return redirect()->back();
    }

    public function show($id)
    {
        $marker = Marker::find($id);
        return Inertia::render('MarkerEdit', ['marker' => $marker]);
    }

    public function update(Request $request, $id)
    {
        $marker = Marker::findOrFail($id);

        $marker->update($request->all());

        return redirect('/Map');
    }

    public function destroy(Marker $marker)
    {
        $marker = Marker::find($id);
        $marker->delete();
        return redirect()->back();
    }
}
