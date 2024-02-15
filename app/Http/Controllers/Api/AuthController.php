<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\NullableType;

class AuthController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|min:11',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if ($user != null) {
            return response()->json([
                'success' => false,
                'message' => 'Number already exist'
            ]);
        }
        \Log::info($request->phone);
        $otp_code = rand(1000, 9999); //generates random number for the otp

        $user = new User();
        $user->phone = $request->phone;
        $user->otp = $otp_code;
        $user->save();
        $response = Http::post('https://api.ng.termii.com/api/sms/send', [
            'api_key' => 'TL3TDtmoeBPD1PzWAZ8IcLdvNZNEXUqRAI349BCNxfJCsjVtXBWwzCbGYKe29X',
            'to' => $request->phone,
            'from' => 'Cudo Ride',
            'sms' =>  $otp_code,
            'type' => 'plain',
            'channel' => 'generic',
        ]);

        return response()->json([
            'success' => true,
            'message' => $response->json()
        ]);
    }



    public function otpVerify(Request $request)
    {
        $request->validate([
            'otp_code' => 'required',
            'phone' => 'required'
        ]);

        $user = User::where('otp', $request->otp_code)->where('phone', $request->phone)->first();

        if ($user == null) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid OTP code'
            ]);
        }

        $user->phone_verified_at = now();
        $token = $user->createToken('authToken')->plainTextToken;


        return response()->json([
            'success' => true,
            'token' => $token
        ]);
    }



    public function userTypes(Request $request)
    {
        $request->validate(['type' => 'required',]);


        $type = new User();
        $type->type = $request->type;
        $type->save();

        $token = $type->createToken('mobile');


        return response()->json([
            'success' => true,
            'token' => $token->plainTextToken,
        ]);
    }




    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'nullable|min:10',
            'gender' => 'required',
            'state' => 'required',
            'age' => 'required',
            'address' => 'required',

        ]);

        $user = User::where('phone', $request->phone)->first();
        if ($user->phone_verified_at != null) {
            return response()->json([
                'success' => false,
                'message' => 'Phone not verified'
            ]);
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->state = $request->state;
        $user->age = $request->age;
        $user->address = $request->address;
        $user->save();


        // if ($request->has('image')) {

        //   $image = $request->image;  // your base64 encoded
        // $extension = explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];   // .jpg .png .pdf
        // $replace = substr($image, 0, strpos($image, ',') + 1);
        // $image = str_replace($replace, '', $image);
        // $image = str_replace(' ', '+', $image);
        // $filename = \Str::random(10) . '.' . $extension;
        // Storage::put('/public/vendor_images' . '/' . $filename, base64_decode($image));
        // };


        //create token and send back in the response
        $token = $user->createToken('mobile');


        return response()->json([
            'success' => true,
            'token' => $token->plainTextToken,
        ]);
    }



    public function loginOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|exists:users,phone'
        ]);

        //check if there is a user with phone number
        $user = User::where('phone', $request->phone);
        if ($user == null) {
            return response()->json([
                'success' => false,
                'message' => 'No user found'
            ]);
        }

        $otp_code = rand(1000, 9999);

        $otp = new Otp();
        $otp->phone = $request->phone;
        $otp->otp = $otp_code;

        $otp->update();


        $response = Http::post('https://api.ng.termii.com/api/sms/send', [
            'api_key' => 'TL3TDtmoeBPD1PzWAZ8IcLdvNZNEXUqRAI349BCNxfJCsjVtXBWwzCbGYKe29X',
            'to' => $request->phone,
            'from' => 'Cudo Ride',
            'sms' =>  $otp_code,
            'type' => 'plain',
            'channel' => 'generic',
        ]);

        return response()->json([
            'success' => true,
        ]);
    }
}
