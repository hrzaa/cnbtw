<?php

namespace App\Http\Controllers;

use App\Models\Culiner;
use App\Models\Category;
use Illuminate\Http\Request;

class CulinerController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $culiners = Culiner::with('culiner_galleries')
            ->Paginate(6);

        return view('pages.culinary',[
            'culiners' => $culiners,
            'categories' => $categories
        ]);
    }

    public function detail(Request $request, $slug)
    {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $culiners = Culiner::with('culiner_galleries')
            ->where('categories_id', $category->id)
            ->Paginate(32);

        return view('pages.culinary', [
            'categories' => $categories,
            'culiners' => $culiners 
        ]);
    }

    public function search(Request $request){
        $keyword = $request->keyword;
        $categories = Category::all();
        $culiners = Culiner::where('culiner_name','like',"%".$keyword."%")
            ->paginate(2);
    
        return view('pages.culinary',compact('culiners', 'categories'));
    }

}
