<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Culiner;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CulinerGallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\CulinerRequest;
use App\Http\Requests\Admin\CulinerGalleryRequest;

class CulinerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Culiner::with(['user', 'category']);
            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" 
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown" 
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                        Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('culiner.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('culiner.destroy', $item->id) . '" method="POST">
                                        ' . method_field('delete') . csrf_field() . '
                                        <button type="submit" class="dropdown-item text-danger">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                    </div>';
                })
                // ->editColumn('photo', function ($item) {
                //     return $item->photo ? '<img src="' . Storage::url($item->photo) . '" style="max-height: 40px;"/>' : '';
                // })
                // ->rawColumns(['action', 'photo'])
                ->rawColumns(['action'])
                ->make();
        }
        return view('pages.admin.culiner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('pages.admin.culiner.create',[
            'users' =>$users,
            'categories' => $categories
         ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CulinerRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->culiner_name);
        Culiner::create($data);

        return redirect()->route('culiner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Culiner::with('culiner_galleries')->findOrFail($id);
        $users = User::all();
        $categories = Category::all();

        return view('pages.admin.culiner.edit', [
            'item' => $item,
            'users' => $users,
            'categories' => $categories
        ]);
    }

    public function uploadGallery(CulinerGalleryRequest $request)
    {
        $data = $request->all();
        $data['photos'] = $request->file('photos')->store('assets/culiner', 'public');
        CulinerGallery::create($data);
        return redirect()->route('culiner.edit', $request->culiner_id);
    }

    public function deleteGallery(Request $request, $id)
    {
        $item =  CulinerGallery::findOrFail($id);
        $item->delete();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CulinerRequest $request, $id)
    {
        $data = $request->all();
        $item = Culiner::findOrFail($id);
        $data['slug'] = Str::slug($request->culiner_name);
        $item->update($data);

        return redirect()->route('culiner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Culiner::findOrFail($id);
        $item->culiner_galleries()->delete();
        $item->delete();

        return redirect()->route('culiner.index');
    }
}
