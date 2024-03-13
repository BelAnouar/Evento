<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $events = Event::with('image')->get();

        return view('Setting', ['events' => $events]);
    }

    public function  update(Request $request)
    {

        $typeReservation = $request->isChecked ? "automatic" : "manual";

        $event = Event::find($request->idEvent);



        try {
            $event->update([
                'reservationApproval' => $typeReservation,
            ]);

            return response()->json(['message' => $typeReservation]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function show($id)
    {
        $event = Event::with("category", "image", "reservations", "reservations.user")->findOrfail($id);
        return view('settingsEdit', ["event" => $event]);
    }
}
