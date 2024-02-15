<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{


        public function aboutUs()
        {
            return view('about_us');
        }



}
