<?php

namespace App\Http\Controllers;

use App\Models\Accessoire;
use Illuminate\Http\Request;
// use DataTables;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;



class AccessoiresController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Accessoire::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Edit" class="edit material-icons editAccessoire"><i class="fas fa-pen text-warning"></i></a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip" data-id="' . $row->id . '" data-original-title="Delete" class="material-icons deleteAccessoire"><i class="far fa-trash-alt text-danger" data-feather="delete"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('accessoire.data');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Accessoire::updateOrCreate($input);

        return response()->json(['success' => 'Accessoire saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accessoire  $Accessoire
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Accessoire = Accessoire::find($id);
        return response()->json($Accessoire);
    }

    /**
     * Update a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$accessoire = Accessoire::where('id', $id)->first();
        $Accessoire = Accessoire::find($id);
        $input = $request->all();
        $Accessoire->update($input);

        return response()->json(['success' => 'Accessoire updated successfully.']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accessoire  $Accessoire
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Accessoire::find($id)->delete();

        return response()->json(['success' => 'Accessoire deleted successfully.']);
    }
}
