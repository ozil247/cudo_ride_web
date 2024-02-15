<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }





    public function sendOtp(Request $request)
    {
        $request->validate([
            'phone' => 'required|min:11',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if ($user != null) {
            return back()->with([
                'success' => false,
                'message' => 'Number already exist'
            ]);
        }
        \Log::info($request->phone);
        $otp_code = rand(1000, 9999);

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

        return view('auth.otp_page');
    }


    
    public function otpPage(){
        return view('auth.otp_page');
    }







    public function verifyRegisterOtp(Request $request)
    {
       // dd($request);
        $request->validate([
            'otp_code' => 'required',
        ]);
        $user = Auth::user();
        $user = User::where('otp', $request->otp_code)->first();


        dd($user);
        if ($user == null) {
            return back()->with([
                'success' => false,
                'message' => 'Invalid OTP code'
            ]);
        }
        $user->phone_verified_at = now();
        $token = $user->createToken('authToken')->plainTextToken;


      return view('admin');
    }
}
