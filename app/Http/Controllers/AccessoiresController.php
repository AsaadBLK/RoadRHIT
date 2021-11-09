<?php

namespace App\Http\Controllers;

use App\Models\Accessoire;
use Illuminate\Http\Request;
// use DataTables;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class AccessoiresController extends Controller
{

    //accessoires LIST
    public function index()
    {
        return view('accessoires.accessoires-list');
    }

    //ADD NEW Accessoire
    public function addAccessoire(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'access_name' => 'required',
            'access_etat' => 'required',
            'access_commentaire' => 'required'
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $accessoire = new Accessoire();
            $accessoire->access_name = $request->access_name;
            $accessoire->access_etat = $request->access_etat;
            $accessoire->access_commentaire = $request->access_commentaire;
            $query = $accessoire->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Le nouvel accessoire a été enregistré avec succès']);
            }
        }
    }

    // GET ALL Accessoires
    public function getAccessoiresList(Request $request)
    {
        $accessoires = Accessoire::all();
        return DataTables::of($accessoires)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
        return '<div class="btn-group">
        <button class="btn btn-sm btn-primary" data-id="' . $row['id'] . '" id="editAccessoireBtn"><span class="material-icons">construction</span></button>
        <button class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteAccessoireBtn"><span class="material-icons">delete_sweep</span></button>
        </div>';
            })
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" name="accessoire_checkbox" data-id="' . $row['id'] . '"><label></label>';
            })

            ->rawColumns(['actions', 'checkbox'])
            ->make(true);
    }

    //GET Accessoire DETAILS
    public function getaccessoireDetails(Request $request)
    {
        $accessoire_id = $request->accessoire_id;
        $accessoireDetails = Accessoire::find($accessoire_id);
        return response()->json(['details' => $accessoireDetails]);
    }

    //UPDATE Accessoire DETAILS
    public function updateaccessoireDetails(Request $request)
    {
        $accessoire_id = $request->cid;

        $validator = \Validator::make($request->all(), [
            'access_name' => 'required',
            'access_etat' => 'required',
            'access_commentaire' => 'required'
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $accessoire = Accessoire::find($accessoire_id);
            $accessoire->access_name = $request->access_name;
            $accessoire->access_etat = $request->access_etat;
            $accessoire->access_commentaire = $request->access_commentaire;
            $query = $accessoire->save();

            if ($query) {
                return response()->json(['code' => 1, 'msg' => 'Les détails de l accessoire ont été mis à jour']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);
            }
        }
    }

    // DELETE Accessoire RECORD
    public function deleteAccessoire(Request $request)
    {
        $accessoire_id = $request->accessoire_id;
        $query = Accessoire::find($accessoire_id)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'L accessoire a été supprimé de la base de données']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);
        }
    }


    public function deleteSelectedAccessoires(Request $request)
    {
        $accessoires_ids = $request->accessoires_ids;
        Accessoire::whereIn('id', $accessoires_ids)->delete();
        return response()->json(['code' => 1, 'msg' => 'Les accessoires ont été supprimés de la base de données']);
    }


}











