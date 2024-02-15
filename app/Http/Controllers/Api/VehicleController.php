<?php

namespace App\Http\Controllers\Api;
use App\Models\VehicleReg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HelperController;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\Help;

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

        $vechile_reg = new VehicleReg();
        if (Auth::user()->vehicle != null) {
            $vechile_reg = Auth::user()->vehicle;
        }

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

    function uploadPhoto(Request $request){
        $request -> validate(([
            'photo' => 'required',
            'license' => 'required',
        ]));

        $photo = HelperController::uploadImage($request ->photo,'photo');
        $license = HelperController::uploadImage($request -> license, 'license');
        $vechile_reg = Auth::user()->vehicle;
        $vechile_reg->photo = $photo;
        $vechile_reg->license = $license;

        $vechile_reg->save();

        return response()->json([
            'success' => true
        ]);
    }



    function uploadFiles(Request $request) {
        $request->validate([
            'ownership' => 'required',
            'interior' => 'required',
            'exterior' => 'required',

            // 'video' => 'required',
        ]);

        $ownership = HelperController::uploadImage($request->ownership, 'ownership');
        $interior = HelperController::uploadImage($request->interior, 'interior');
        $exterior = HelperController::uploadImage($request->exterior, 'exterior');
        $vechile_reg = Auth::user()->vehicle;
        $vechile_reg->ownership = $ownership;
        $vechile_reg->interior = $interior;
        $vechile_reg->exterior = $exterior;
        $vechile_reg->save();

        return response()->json([
            'success' => true
        ]);
    }

    

}
