<?php

namespace App\Http\Controllers;

use App\Models\Culiner;
use App\Models\Resto;
use App\Models\Review;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function detail(Request $request, $id)
    {
        $culiners = Culiner::with(['culiner_galleries', 'user'])
            ->where('slug', $id)
            ->firstOrFail();
        $restos = Resto::with(['resto_galleries', 'culiner'])
            ->where('culiner_id', $culiners->id) 
            ->take(4)
            ->get();
        
        return view('pages.detail-kuliner', [
            'culiners' => $culiners,
            'restos' => $restos
        ]);

    }
}
