<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('event_galleries')->simplePaginate(8);
        return view('pages.event', [
            'events' => $events
        ]);
    }

    public function detail(Request $request, $id)
    {
        $event = Event::with(['event_galleries', 'user'])->where('slug', $id)->firstOrFail();
        return view('pages.detail-event',[
            'event' => $event
        ]);
    }
}
