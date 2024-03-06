<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkoutController extends Controller
{
    public function checkout(Request $request)
    {
        Reservation::create([
            'user_id' => Auth::user()->id,
            'event_id' => $request->idEvent

        ]);
        return back();
    }
}
