<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployesController extends Controller
{
    //employes LIST
    public function index()
    {
        return view('employes.employes-list');
    }

    //ADD NEW employe
    public function addEmploye(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'nomprenom' => 'required|min:3|max:50',
            'matricule' => 'required|min:3|max:50',
            'respH' => 'required|min:3|max:50',
            'ville' => 'required|min:2|max:50',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $employe = new Employe();
            $employe->nomprenom = $request->nomprenom;
            $employe->matricule = $request->matricule;
            $employe->respH = $request->respH;
            $employe->ville = $request->ville;
            $employe->entityEmp = $request->entityEmp;
            $employe->businessEmp = $request->businessEmp;
            $employe->status_reqtoIT = $request->status_reqtoIT;
            $employe->status_crebyIT = $request->status_crebyIT;
            $employe->email = $request->email;
            $employe->status_leave = "Active";
            $employe->action_by = Auth::user()->name;
            $query = $employe->save();

            if (!$query) {
                return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'Le nouveau employé a été enregistré avec succès']);
            }
        }
    }

    // GET ALL employes
    public function getEmployesList(Request $request)
    {
        $employes = Employe::all();
        return DataTables::of($employes)
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
        return '<div class="btn-group">
        <button class="btn btn-sm btn-primary" data-id="' . $row['id'] . '" id="editEmployeBtn"><span class="material-icons">construction</span></button>
        <button class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteEmployeBtn"><span class="material-icons">delete_sweep</span></button>
        </div>';
            })
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" name="employe_checkbox" data-id="' . $row['id'] . '"><label></label>';
            })

            ->rawColumns(['actions', 'checkbox'])
            ->make(true);
    }

    //GET employe DETAILS
    public function getemployeDetails(Request $request)
    {
        $employe_id = $request->employe_id;
        $employeDetails = Employe::find($employe_id);
        return response()->json(['details' => $employeDetails]);
    }

    //UPDATE employe DETAILS
    public function updateemployeDetails(Request $request)
    {
        $employe_id = $request->cid;

        $validator = \Validator::make($request->all(), [
            'nomprenom' => 'required|min:3|max:50',
            'email' => 'required|min:3|max:50',
            'matricule' => 'required|min:3|max:50',
            'respH' => 'required|min:3|max:50',
            'ville' => 'required|min:2|max:50',
            'status_reqtoIT' => 'required|min:3|max:50',
            //'status_crebyIT' => 'required|min:3|max:50',
            //'action_by' => 'required|min:3|max:50',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $employe = Employe::find($employe_id);
            $employe->nomprenom = $request->nomprenom;
            $employe->email = $request->email;
            $employe->matricule = $request->matricule;
            $employe->respH = $request->respH;
            $employe->ville = $request->ville;
            $employe->status_reqtoIT = $request->status_reqtoIT;
            $employe->status_crebyIT = $request->status_crebyIT;
            $employe->action_by = Auth::user()->name;
            $query = $employe_id->save();

            if ($query) {
                return response()->json(['code' => 1, 'msg' => 'Les détails ont été mis à jour']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);
            }
        }
    }

    // DELETE employe RECORD
    public function deleteEmploye(Request $request)
    {
        $employe_id = $request->employe_id;
        $query = Employe::find($employe_id)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'L employé a été supprimé de la base de données']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);
        }
    }

    //delete selected employes
    public function deleteSelectedEmployes(Request $request)
    {
        $employes_ids = $request->employes_ids;
        Employe::whereIn('id', $employes_ids)->delete();
        return response()->json(['code' => 1, 'msg' => 'Les employés ont été supprimés de la base de données']);
    }
}
