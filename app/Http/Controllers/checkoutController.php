<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkoutController extends Controller
{
    public function checkout(Request $request)
    {
        $idEvent = $request->idEvent;
        $event = Event::find($idEvent);
        $status = "";
        if ($event->reservationApproval == "automatic" && $event->available_seats > 0) {
            $status = "accepted";
        } else if ($event->reservationApproval == "manual" && $event->available_seats > 0) {
            $status = "pending";
        } else {
            $status = "rejected";
        }


        Reservation::create([
            'user_id' => Auth::user()->id,
            'event_id' => $idEvent,
            'status' => $status
        ]);

        $event->update([
            "available_seats" => $event->available_seats - 1
        ]);
        return back();
    }


    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        $reservation->update([
            "status" => $request->status
        ]);
        return back();
    }
}
