<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
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
            $query = Review::with(['resto', 'user']);
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
                                    <a class="dropdown-item btn btn-success" href="' . route('review.approve', $item->id) . '">
                                        Approve
                                    </a>
                                    <form action="' . route('review.destroy', $item->id) . '" method="POST">
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
        return view('pages.admin.review.index');
    }

    public function approve($id)
    {
        $review = Review::findOrFail($id);
        $review->is_aktif = true;
        $review->save();
        return redirect()->route('review.index');
        
    }

    public function destroy($id)
    {
        $item = Review::findOrFail($id);
        $item->delete();

        return redirect()->route('review.index');
    }
}
