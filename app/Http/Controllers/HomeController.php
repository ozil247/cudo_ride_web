<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function welcome()
    {
        return view('welcome');
    }



    public function index()
    {
        if (Auth::user()->type == 'user') {
            return redirect()->route('welcome');
        } else if (Auth::user()->type == 'driver') {
            return redirect()->route('dashboard');
        } else if (Auth::user()->type == 'admin') {
            return redirect()->route('admin');               //to redirect to different user type dashboard
        }
    }
}
