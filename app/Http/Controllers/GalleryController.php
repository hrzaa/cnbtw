<?php

namespace App\Http\Controllers;

use App\Models\Resto;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $restos = Resto::query()
            ->select('restos.resto_name', 'restos.price', 'resto_galleries.photos')
            ->join('resto_galleries', 'restos.id', '=', 'resto_galleries.resto_id')
            ->Paginate(12);

        return view('pages.gallery', [
            'restos' => $restos
        ]);
    }
}
