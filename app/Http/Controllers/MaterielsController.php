<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MaterielsController extends Controller
{


    public function index()
    {
        $materiels = Materiel::latest()->paginate(4);
        return view('materiel.index', [
            'materiels' => $materiels,
        ]);
    }


    public function show($id)
    {
        //$this->authorize('view', Post::class);
        $materiel = Materiel::where('id', $id)->first();
        return view('materiel.show', [
            'materiel' => $materiel,
        ]);
    }


    public function create()
    {
        if (auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 4) {
            return view('materiel.create');
        } else {
            redirect()->back();
        }
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'designation'=>'required|min:3|max:50',
            'marque' => 'required|min:3|max:50',
            'modell' => 'required|min:3|max:50',
            'serialnumber' => 'required|min:3|max:50',
            'status' => 'required|min:3|max:50',
            'etat' => 'required|min:3|max:50',
            'commentaire' => 'required|min:3|max:50',
        ]);


        Materiel::create([
            'designation' => $request->designation,
            'marque' => $request->marque,
            'modell' => $request->modell,
            'serialnumber' => $request->serialnumber,
            'status' => $request->status,
            'etat' => $request->etat,
            'commentaire' => $request->commentaire,

        ]);

        return redirect()->route('materiel.index')->with(['success' => 'Terminer avec success']);
    }



    public function edit($id)
    {
        $materiel = Materiel::where('id', $id)->first();
        return view('materiel.edit', [
            'materiel' => $materiel,
        ]);
    }


    public function update($id, Request $request)
    {
        $materiel = Materiel::where('id', $id)->first();
        $materiel->update([
            'designation' => $request->designation,
            'marque' => $request->marque,
            'modell' => $request->modell,
            'serialnumber' => $request->serialnumber,
            'status' => $request->status,
            'etat' => $request->etat,
            'commentaire' => $request->commentaire,
        ]);
        return redirect()->route('materiel.index')->with(['success' => 'Modifier avec success']);
    }


    public function delete($id)
    {
        $materiel = Materiel::where('id', $id)->first();
        $materiel->delete();
        return redirect()->route('materiel.index')->with(['success' => 'Supprimer avec success']);
    }

}
