<?php

namespace App\Http\Controllers;

use App\Models\Culiner;
use App\Models\Event;
use App\Models\Resto;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $restosCount = Resto::count();

        $culinersCount = Culiner::count();

        $categories = Category::take(6)->get();
        
        $culiners = Culiner::with(['culiner_galleries'])
            ->take(4)
            ->get();
        
        $restos = Resto::with(['resto_galleries', 'culiner'])
            ->take(4)
            ->get();

        $events = Event::with(['event_galleries'])
            ->take(4)
            ->get();

        $reviews = Review::with(['user', 'culiner'])
            ->where('is_aktif', true)
            ->orderBy('created_at', 'desc') // Sorting by 'created_at' column in descending order
            ->get();
        
        return view('pages.home', [
            'culinersCount' => $culinersCount,
            'restosCount' => $restosCount,
            'categories' => $categories, 
            'restos' => $restos,
            'events' => $events,
            'culiners' => $culiners,  
            'reviews' => $reviews,  
        ]);
    }
}
