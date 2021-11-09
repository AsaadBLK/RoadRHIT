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
                return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
            } else {
                return response()->json(['code' => 1, 'msg' => 'New Accessoire has been successfully saved']);
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
        <button class="btn btn-sm btn-primary" data-id="' . $row['id'] . '" id="editAccessoireBtn">Update</button>
        <button class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteAccessoireBtn">Delete</button>
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
                return response()->json(['code' => 1, 'msg' => 'Accessoire Details have Been updated']);
            } else {
                return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
            }
        }
    }

    // DELETE Accessoire RECORD
    public function deleteAccessoire(Request $request)
    {
        $accessoire_id = $request->accessoire_id;
        $query = Accessoire::find($accessoire_id)->delete();

        if ($query) {
            return response()->json(['code' => 1, 'msg' => 'Accessoire has been deleted from database']);
        } else {
            return response()->json(['code' => 0, 'msg' => 'Something went wrong']);
        }
    }


    public function deleteSelectedAccessoires(Request $request)
    {
        $accessoires_ids = $request->accessoires_ids;
        Accessoire::whereIn('id', $accessoires_ids)->delete();
        return response()->json(['code' => 1, 'msg' => 'Accessoires have been deleted from database']);
    }


}











