<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bookings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingsController extends Controller
{
    public function bookings(Request $request)
    {
        $request->validate([
            'pick_up_lat' =>  'required',
            'drop_off_lat' => 'required',
            'pick_up_lng' => 'required',
            'drop_off_lng' => 'required',
            'status' => 'required',
            'amount' => 'required',
            'pick_up' =>  'required',
            'drop_off' => 'required',

        ]);

        $booking = new Bookings();
        if (Auth::user()->Bookings != null) {
            $booking = Auth::user()->Bookings;
        }
        $booking->user_id = Auth::user()->id;
        $booking->pick_up_lat = $request->pick_up_lat;
        $booking->drop_off_lat = $request->drop_off_lat;
        $booking->pick_up_lng = $request->pick_up_lng;
        $booking->drop_off_lng = $request->drop_off_lng;
        $booking->status = $request->status;
        $booking->amount = $request->amount;
        $booking->pick_up = $request->pick_up;
        $booking->drop_off = $request->drop_off;
        $booking->save();

        return response()->json(['success' => true]);
    }
}
