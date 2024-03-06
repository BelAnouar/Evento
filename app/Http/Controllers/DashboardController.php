<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::with('image')->get();
        $users = User::all();

        return view('dashboard', ['events' => $events, 'users' => $users]);
    }

    public function Update($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $event->update(['is_approved' => true]);


        return back();
    }
}
