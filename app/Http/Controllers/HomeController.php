<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->input('title');


        $events = Event::when(
            $title,
            fn ($query, $title) => $query->title($title)
        )->with("category")->paginate(6);
        return view('welcome', ['events' => $events]);
    }
}
