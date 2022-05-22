<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $dates=User::orderBy('created_at','desc')->limit(10)->get();
        $daily_register = User::active()->select(DB::raw('created_at, count(id) as sayi'))
            ->groupBy(DB::raw('date(users.created_at)')) ->get();

        $superAdmin=User::where('role','super-admin')->count();
        $user=User::where('role','user')->count();

        return view('panel.pages.dashboard',compact('superAdmin','user','dates','daily_register'));
    }
}
