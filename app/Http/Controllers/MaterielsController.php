<?php

namespace App\Http\Controllers;

use App\Models\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MaterielsController extends Controller
{

    //if (auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 4)


    //materiels LIST
    public function index()
    {
        if (auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 2) {
        return view('materiels.materiels-list');
        }
        else {
            return view('dashboard');
        }
    }

    //ADD NEW Materiel
    public function addMateriel(Request $request)
    {
        $validator = \Validator::make($request->all(), [
        'designation'=>'required|min:3|max:50',
        'marque' => 'required|min:3|max:50',
        'modell' => 'required|min:3|max:50',
        'serialnumber' => 'required|min:3|max:50',
        'status' => 'required|min:2|max:50',
        'etat' => 'required|min:3|max:50',
        'commentaire' => 'required|min:3|max:50',
        'entity' => 'required|min:3|max:10',
        'business' => 'required|min:2|max:10',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $materiel = new Materiel();
            $materiel->designation = $request->designation;
            $materiel->marque = $request->marque;
            $materiel->modell = $request->modell;
            $materiel->serialnumber = $request->serialnumber;
            $materiel->status = $request->status;
            $materiel->etat = $request->etat;
            $materiel->commentaire = $request->commentaire;
            $materiel->entity = $request->entity;
            $materiel->business = $request->business;
            $query = $materiel->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Le nouveau matériel a été enregistré avec succès']);
            }
        }
    }

    // GET ALL Materiels
    public function getMaterielsList(Request $request)
    {
        if (auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 2) {

            $materiels = Materiel::all();
            return DataTables::of($materiels)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<div class="btn-group">
        <button class="btn btn-sm btn-primary" data-id="' . $row['id'] . '" id="editMaterielBtn"><span class="material-icons">construction</span></button>
        <button class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteMaterielBtn"><span class="material-icons">delete_sweep</span></button>
        </div>';
            })
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" name="materiel_checkbox" data-id="' . $row['id'] . '"><label></label>';
            })

            ->rawColumns(['actions', 'checkbox'])
            ->make(true);
        
        }  // end check
        else {
            return view('dashboard');
        }
    }

    //GET Materiel DETAILS
    public function getmaterielDetails(Request $request)
    {
        if (auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 2) {

        $materiel_id = $request->materiel_id;
        $materielDetails = Materiel::find($materiel_id);
        return response()->json(['details' => $materielDetails]);
        
        }  // end check
        else {
            return view('dashboard');
        }
    }

    //UPDATE Materiel DETAILS
    public function updatematerielDetails(Request $request)
    {
        $materiel_id = $request->cid;

        $validator = \Validator::make($request->all(), [
            'designation' => 'required|min:3|max:50',
            'marque' => 'required|min:3|max:50',
            'modell' => 'required|min:3|max:50',
            'serialnumber' => 'required|min:3|max:50',
            'status' => 'required|min:2|max:50',
            'etat' => 'required|min:3|max:50',
            'commentaire' => 'required|min:3|max:50',
            'entity' => 'required|min:3|max:10',
            'business' => 'required|min:2|max:10',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $materiel = Materiel::find($materiel_id);
            $materiel->designation = $request->designation;
            $materiel->marque = $request->marque;
            $materiel->modell = $request->modell;
            $materiel->serialnumber = $request->serialnumber;
            $materiel->status = $request->status;
            $materiel->etat = $request->etat;
            $materiel->commentaire = $request->commentaire;
            $materiel->entity = $request->entity;
            $materiel->business = $request->business;
            $query = $materiel->save();

            if ($query) {
                return response()->json(['code' => 1, 'msg' => 'Les détails du matériel ont été mis à jour']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);
            }
        }
    }

    // DELETE Materiel RECORD
    public function deleteMateriel(Request $request)
    {
        $materiel_id = $request->materiel_id;
        $query = Materiel::find($materiel_id)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Le matériel a été supprimé de la base de données']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);
        }
    }


    public function deleteSelectedMateriels(Request $request)
    {
        $materiels_ids = $request->materiels_ids;
        Materiel::whereIn('id', $materiels_ids)->delete();
        return response()->json(['code' => 1, 'msg' => 'Les matériaux ont été supprimés de la base de données']);
    }


}
