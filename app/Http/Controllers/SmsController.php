<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;



class SmsController extends Controller
{
  public function test()
  {
    $otp = rand(1000, 9999);
    $response = Http::post('https://api.ng.termii.com/api/sms/send', [
        'api_key' => 'TL3TDtmoeBPD1PzWAZ8IcLdvNZNEXUqRAI349BCNxfJCsjVtXBWwzCbGYKe29X',
        'to' => '23409034583300',
        'from' => 'Cudo Ride',
        'sms' =>  $otp,
        'type' => 'plain',
        'channel' => 'generic',
    ]);
    dd ($response->json());
  }


}
