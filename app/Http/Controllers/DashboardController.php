<?php

namespace App\Http\Controllers;


use App\Models\Employe;
use App\Models\Materiel;
use App\Models\Accessoire;
use App\Models\Attribution;
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
            $countempls = Employe::where('status_leave', '=', 'Actif')->count();
            $maters = Materiel::where('deleted_at', '=', null)->count();
            $acces = Accessoire::where('deleted_at', '=', null)->count();
            $attr = Attribution::where('deleted_at', '=', null)->count();
            return view('home', compact('countempls', 'maters', 'acces', 'attr'));
        } else {
            return view('employes.employes-list');
        }
        }


    public function display()
    {
        if (auth()->user()->current_team_id == 1 || auth()->user()->current_team_id == 2) {
            $countempls = Employe::where('status_leave', '=', 'Actif')->count();
            $maters = Materiel::where('deleted_at', '=', null)->count();
            $acces = Accessoire::where('deleted_at', '=', null)->count();
            $attr = Attribution::where('deleted_at', '=', null)->count();
            return view('dashboard', compact('countempls', 'maters', 'acces', 'attr'));
        } else {
            return view('employes.employes-list');
        }
    }

}
