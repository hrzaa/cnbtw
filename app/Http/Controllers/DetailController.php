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
            ->where('culiner_id', $culiners->id) // Menambahkan kondisi where untuk memfilter berdasarkan ID makanan
            ->take(4)
            ->get();
        // $reviews = Review::with(['user', 'culiner'])
        //     ->where('is_aktif', true)
        //     ->orderBy('created_at', 'desc') // Sorting by 'created_at' column in descending order
        //     ->get();
        return view('pages.detail-kuliner', [
            'culiners' => $culiners,
            // 'reviews' => $reviews,
            'restos' => $restos
        ]);

    }
}
