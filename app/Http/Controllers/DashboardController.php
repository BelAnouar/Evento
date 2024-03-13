<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Client;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $events = Event::with('image')->get();
        $users = User::all();
        $clients = Client::all();
        $categorie = Categories::count();
        $organizers = Organizer::all();

        return view('dashboard', ['events' => $events, 'users' => $users, 'categorie' => $categorie, 'clients' => $clients, "organizers" => $organizers]);
    }

    public function Update($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json(['message' => 'Event not found'], 404);
        }

        $event->update(['is_approved' => !$event->is_approved]);

        return back();
    }


    public function Access(Request $request)
    {
        $user = User::find($request->user_id);
        $user->update(['access' => "Blocked"]);


        return back();
    }
}
