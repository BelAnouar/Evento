<?php

namespace App\Http\Controllers;

use App\Mail\SendTicket;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class checkoutController extends Controller
{
    public function checkout(Request $request)
    {
        $idEvent = $request->idEvent;
        $event = Event::with('image')->find($idEvent);

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

        if ($status == "accepted") {

            $event->update([
                "available_seats" => $event->available_seats - 1
            ]);

            Mail::to("anwarbelhassan34@gmail.com")->send(new SendTicket($event));
        }
        return back();
    }


    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        $status = $request->status;


        $reservation->update([
            "status" => $status
        ]);
        if ($status == "accepted") {
            $idEvent = $reservation->event_id;
            $event = Event::with('image')->find($idEvent);
            Mail::to("anwarbelhassan34@gmail.com")->send(new SendTicket($event));
            return back();
        }
        return back();
    }
}
