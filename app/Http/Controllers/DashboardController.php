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
class DashboardController extends Controller
{

    public function index()
    {
    if (auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 2) {
    $countempls = "asaad";//Employe::where('status_leave', '=', 'Actif')->count();
    // $maters = Materiel::all();
    // $acces = Accessoire::all();

        return view('dashboard', compact("countempls"));
        //view('dashboard')->with('countempls', $countempls);
    } else {
        return view('employes.employes-list');
    }

}

}
