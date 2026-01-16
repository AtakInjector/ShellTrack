<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Owner;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    //
     public function index()
    {
          $data = [
            'total_properties' => Property::count(),
            'total_owners' => Owner::count(),
            'user' => Auth::user()
        ];
        return view('dashboard', $data);
    }
}
