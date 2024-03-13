<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Event;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->input('title');
        $filter = $request->filter;
        $categories = Categories::all();
        $events = Event::when(
            $title,
            fn ($query, $title) => $query->title($title)
        )->with("category", 'Organizer');
        if ($filter) {
            $events = $events->where('category_id', $filter);
        }

        $events = $events->where("is_approved", true)->paginate(1);
        return view('welcome', ['events' => $events, 'categories' => $categories]);
    }
}
