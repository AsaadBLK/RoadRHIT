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
            $employe->status_reqtoIT = "Non envoyé";
            $employe->status_crebyIT = "Non Créée";
            $employe->email = "----";
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
        if(auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 2) {
        $employes = Employe::all();
        return DataTables::of($employes)
        //(json_decode(json_encode($employes), true))
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
        return '<div class="btn-group">
        <button class="btn btn-sm btn-primary" data-id="' . $row['id'] . '" id="editEmployeBtn"><span class="material-icons">construction</span></button>
        <button class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteEmployeBtn"><span class="material-icons">delete_sweep</span></button>
        <button class="btn btn-sm btn-secondary" data-id="' . $row['id'] . '" id="editEmployeEmailBtn"><span class="material-icons">email</span></button>
         </div>';
            })
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" name="employe_checkbox" data-id="' . $row['id'] . '"><label></label>';
            })

            ->rawColumns(['actions', 'checkbox'])
            ->make(true);
            }

            else if(auth()->user()->current_team_id == 3) {
        $employes = Employe::all();
        return DataTables::of($employes)
        //(json_decode(json_encode($employes), true))
            ->addIndexColumn()
            ->addColumn('actions', function ($row) {
        return '<div class="btn-group">
        <button class="btn btn-sm btn-primary" data-id="' . $row['id'] . '" id="editEmployeBtn"><span class="material-icons">construction</span></button>
        <button class="btn btn-sm btn-secondary" data-id="' . $row['id'] . '" id="editEmployeEmailBtn"><span class="material-icons">email</span></button>
         </div>';
            })
            ->addColumn('checkbox', function ($row) {
                return '<input type="checkbox" name="employe_checkbox" data-id="' . $row['id'] . '"><label></label>';
            })

            ->rawColumns(['actions', 'checkbox'])
            ->make(true);
            }

    }

    //GET employe DETAILS
    public function getemployeDetails(Request $request)
    {
        $employe_id = $request->employe_id;
        $employeDetails = Employe::find($employe_id);
        return response()->json(['details' => $employeDetails]);
    }





    //sendEmailRH employe 
    public function updateemployeEmails(Request $request)
    {
            $employe_id = $request->cid;
            $employe = Employe::find($employe_id);

        if (Str::of($request->status_reqtoIT)->exactly('Envoyé') && (Str::of($employe->status_reqtoIT)->exactly('Non envoyé') )) {

            $employe->status_reqtoIT = $request->status_reqtoIT;
            $employe->email_request_at = date('Y-m-d H:i:s'); 
            $employe->action_by = Auth::user()->name;
            $query = $employe->save();

            if ($query) {
                return response()->json(['code' => 1, 'msg' => 'La demande a été envoyé.']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);
            }
        } else if(Str::of($request->status_reqtoIT)->exactly('Non envoyé')) {
            return response()->json(['code' => 0, 'msg' => 'Priére de revérifier le statut !']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'La demande a été déja envoyé !']);
        }
 
        
       
         
    }




    //UPDATE employe DETAILS
    public function updateemployeDetails(Request $request)
    {
        $employe_id = $request->cid;

        $validator = \Validator::make($request->all(), [
            'nomprenom' => 'required|min:3|max:50',
            'matricule' => 'required|min:3|max:50',
            'respH' => 'required|min:3|max:50',
            'ville' => 'required|min:2|max:50', 
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $employe = Employe::find($employe_id);
            if (Str::of($request->email)->contains('@sgs.com') && Str::of($request->status_leave)->exactly('Actif')
                && Str::of($request->leave_at)->isEmpty()) {

            $employe->nomprenom = $request->nomprenom;
            $employe->matricule = $request->matricule;
            $employe->respH = $request->respH;
            $employe->ville = $request->ville;
            $employe->entityEmp = $request->entityEmp;
            $employe->businessEmp = $request->businessEmp;
            $employe->status_crebyIT = "Créée";
            $employe->email_create_at = date('Y-m-d H:i:s'); 
            $employe->email = $request->email;
            $employe->status_leave = $request->status_leave;
            //$employe->action_by = Auth::user()->name;
            $query = $employe->save();
            if ($query) { return response()->json(['code' => 1, 'msg' => 'Les détails ont été mis à jour']);
            } else {  return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']); }
        } // end if str 

            else if (Str::of($request->email)->contains('@sgs.com') && Str::of($request->status_leave)->exactly('Inactif')
                 && Str::of($request->leave_at)->isEmpty()) {
            
                    $employe->nomprenom = $request->nomprenom;
                    $employe->matricule = $request->matricule;
                    $employe->respH = $request->respH;
                    $employe->ville = $request->ville;
                    $employe->entityEmp = $request->entityEmp;
                    $employe->businessEmp = $request->businessEmp;
                    $employe->status_crebyIT = "Créée";
                    $employe->email_create_at = date('Y-m-d H:i:s');
                    $employe->email = $request->email;
                    $employe->status_leave = $request->status_leave;
                    $employe->leave_at = date('Y-m-d H:i:s');
                    $query = $employe->save();
                    if ($query) { return response()->json(['code' => 1, 'msg' => 'Les détails ont été mis à jour']);
                    } else { return response()->json(['code' => 0, 'msg' => 'Priére de revérifier !']);}

            } // end else if str

            // else if (Str::of($request->status_leave)->exactly('Inactif') && Str::of($request->leave_at)->isNotEmpty) {
            //     return response()->json(['code' => 0, 'msg' => 'Il est déja Inactif !']);
            // }// end else if str
        
        else {
                return response()->json(['code' => 0, 'msg' => 'Priére de revérifier votre email & Statut départ !']);
            } // end else str
    } // end else validator
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
