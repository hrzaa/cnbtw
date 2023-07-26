<?php

namespace App\Http\Controllers;

use App\Models\Resto;
use App\Models\Review;
use Illuminate\Http\Request;

class RestoController extends Controller
{
    public function detail(Request $request, $id)
    {
        $restos = Resto::with(['resto_galleries'])
            ->where('slug', $id)->firstOrFail();

        $reviews = Review::with(['user', 'resto'])
            ->where('resto_id', $restos->id)
            ->where('is_aktif', true)
            ->orderBy('created_at', 'desc')
            ->get();

            return view('pages.detail-resto', [
                'restos' => $restos,
                'reviews' => $reviews
            ]);
        }
}
