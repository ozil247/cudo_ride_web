<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VehicleReg;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin');
    }

    public function users()
    {
        $users = User::all();
        return view('all_users', compact('users'));
    }

    public function vehicleTable()
    {

        $vehicle = VehicleReg::all();
        return view('vehicle', compact('vehicle'));
    }
}
