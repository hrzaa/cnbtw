<?php

namespace App\Http\Controllers\Admin;

use App\Models\Culiner;
use App\Models\User;
use App\Models\Resto;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Admin\RestoRequest;

class RestoController extends Controller
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
            $query = Resto::with(['user', 'culiner']);
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
                                    <a class="dropdown-item" href="' . route('resto.edit', $item->id) . '">
                                        Sunting
                                    </a>
                                    <form action="' . route('resto.destroy', $item->id) . '" method="POST">
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
        return view('pages.admin.resto.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $culiners = Culiner::all();
        return view('pages.admin.resto.create',[
            'users' => $users,
            'culiners' => $culiners
         ]);
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestoRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->resto_name);
        
        $resto = Resto::create($data);

        $culinerId = $request->input('culiner_id', []); // Ambil array id makanan dari form

        // $resto->culiners()->attach($culinerId);
        // $resto->culiners()->attach($culinerId);

        return redirect()->route('resto.index');
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
        $item = Resto::findOrFail($id);
        $users = User::all();
        $culiners = Culiner::all();

        return view('pages.admin.resto.edit', [
            'item' => $item,
            'users' => $users,
            'culiners' => $culiners
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestoRequest $request, $id)
    {
        $data = $request->all();

        $item = Resto::findOrFail($id);

        $data['slug'] = Str::slug($request->resto_name);

        $item->update($data);

        return redirect()->route('resto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Resto::findOrFail($id);
        $item->delete();

        return redirect()->route('resto.index');
    }
}
