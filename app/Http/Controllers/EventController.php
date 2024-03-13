<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Categories;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::with('image')->paginate(6);

        return view('event.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::all();
        return view('event.create', ["categories" => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {

        if ($request->file('imageEvent')) {
            $uploadedImage = $request->file('imageEvent');

            $filename = date('YmdHi') . $uploadedImage->getClientOriginalName();
            $uploadedImage->storeAs('images', $filename, 'public');





            $event = Event::create([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'location' => $request->location,
                'category_id' => $request->category,
                'available_seats' => $request->available_seats,
                "start_time" => $request->startTime,
                "end_time" => $request->endTime,
                "user_id" => Auth::user()->id
            ]);


            $event->image()->create([
                'image' => $filename
            ]);
            $event->save();
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::with("category", "image")->findOrfail($id);

        return  view("event.show", ["event" => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::findOrfail($id);
        $categories = Categories::all();
        return  view("event.edit", ["event" => $event, "categories" => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);


        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'category_id' => $request->category,
            'available_seats' => $request->available_seats,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::destroy($id);
        return back();
    }
}
