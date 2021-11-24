<?php

namespace App\Http\Controllers;

use App\Models\Attribution;
use App\Models\Employe;
use App\Models\Materiel;
use App\Models\Accessoire;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AttributionsController extends Controller
{
    //attributions LIST
    public function index()
    {
        //$empls = Employe::where('deleted_at', null)->orderBy('nomprenom')->lists('nomprenom', 'id');

        if (auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 2) {

            $empls = Employe::all();
            $selectedempl = Employe::first()->emp_id;
            $maters = Materiel::all();
            $selectedmater = Materiel::first()->mater_id;
            $acces = Accessoire::all();
            $selectedacces = Accessoire::first()->acce_id;

            return view('attributions.attributions-list', compact('empls', 'selectedempl', 'maters', 'selectedmater', 'acces', 'selectedacces'));

        } else {
            return view('dashboard');
        }




   }

    //ADD NEW employe
    public function addAttribution(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'id_materiel' => 'required|min:1|max:50',
            'id_accessoire' => 'required|min:1|max:50',
            'id_employe' => 'required|min:1|max:50',
            'commentaire' => 'required|min:1|max:50',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $attribution = new Attribution();
            $attribution->id_materiel = $request->id_materiel;
            $attribution->id_accessoire = $request->id_accessoire;
            $attribution->id_employe = $request->id_employe;
            $attribution->commentaire = $request->commentaire;
            $attribution->attribute_at = date('Y-m-d H:i:s');
            $query = $attribution->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Le nouveau attribution a été enregistré avec succès']);
            }
        }
    }

    // GET ALL employes
    public function getAttributionsList(Request $request)
    {

        if (auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 2) {

        $attributions = DB::select(DB::raw("
            SELECT att.id , businessEmp, nomprenom , designation, access_name, attribute_at, att.commentaire
            FROM attributions AS att
            INNER JOIN
            employes AS emp
            ON att.id_employe = emp.id
            INNER JOIN
            accessoires AS acc
            ON att.id_accessoire = acc.id
            INNER JOIN
            materiels mater
            ON att.id_materiel=mater.id"));

        //Attribution::all();
        //return DataTables::of($attributions)
        return DataTables::of(json_decode(json_encode($attributions), true))
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
                return '<div class="btn-group">
        <button class="btn btn-sm btn-primary" data-id="' . $row['id'] . '" id="editAttributionBtn"><span class="material-icons">construction</span></button>
        <button class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteAttributionBtn"><span class="material-icons">delete_sweep</span></button>
       <button class="btn btn-sm btn-secondary" data-id="' . $row['id'] . '" id="showAttributionBtn"><span class="material-icons">file_present</span></button>
         </div>';
            })
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" name="attribution_checkbox" data-id="' . $row['id'] . '"><label></label>';
            })

            ->rawColumns(['actions', 'checkbox'])
            //->rawColumns(['id'])
            ->make(true);

              }  // end check
        else {
            return view('dashboard');
        }
    }

    //GET attribution DETAILS
    public function getattributionDetails(Request $request)
    {
        if (auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 2) {

        $attribution_id = $request->attribution_id;
        $attributionDetails = Attribution::find($attribution_id);
        return response()->json(['details' => $attributionDetails]);

        }  // end check
        else {
            return view('dashboard');
        }
    }



    //UPDATE attribution DETAILS
    public function updateattributionDetails(Request $request)
    {
        $attribution_id = $request->cid;

        $validator = \Validator::make($request->all(), [
            'id_materiel' => 'required|min:1|max:50',
            'id_accessoire' => 'required|min:1|max:50',
            'id_employe' => 'required|min:1|max:50',
            'commentaire' => 'required|min:1|max:50',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $attribution = Attribution::find($attribution_id);
                $attribution->id_materiel = $request->id_materiel;
                $attribution->id_accessoire = $request->id_accessoire;
                $attribution->id_employe = $request->id_employe;
                $attribution->commentaire = $request->commentaire;
                $attribution->created_at = date('Y-m-d H:i:s');
                $query = $attribution->save();
                if ($query) {
                    return response()->json(['code' => 1, 'msg' => 'Les détails ont été mis à jour']);
                } else {
                    return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);
                }

        } // end else validator
    }

    // DELETE attribution RECORD
    public function deleteAttribution(Request $request)
    {
        $attribution_id = $request->attribution_id;
        $query = Attribution::find($attribution_id)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'L attribution a été supprimé de la base de données']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);
        }
    }

    //delete selected attributions
    public function deleteSelectedAttributions(Request $request)
    {
        $attributions_ids = $request->attributions_ids;
        Attribution::whereIn('id', $attributions_ids)->delete();
        return response()->json(['code' => 1, 'msg' => 'Les attributions ont été supprimés de la base de données']);
    }
}
