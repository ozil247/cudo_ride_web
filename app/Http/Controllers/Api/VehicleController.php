<?php

namespace App\Http\Controllers\Api;
use App\Models\VehicleReg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class VehicleController extends Controller
{
    public function vehicleReg(Request $request)
    {
        $request -> validate([
            'manufacturer' => 'required',
            'model' => 'required',
            'year' => 'required',
            'plate_number' => 'required',
            'colour' => 'required',
        ]);
        //add validation here
        if (Auth::user()->vehicle != null) {
            return response()->json(['success' => false,  'message' => 'Vehicle already added']);
        }
        $vechile_reg = new VehicleReg();
        $vechile_reg->user_id = Auth::user()->id;
        $vechile_reg->manufacturer = $request->manufacturer;
        $vechile_reg->model = $request ->model;
        $vechile_reg->year = $request->year;
        $vechile_reg->plate_number = $request->plate_number;
        $vechile_reg->colour = $request->colour;
        $vechile_reg->save();



        return response()->json([
            'success' => true
        ]);

    }
}
