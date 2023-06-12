<?php

namespace App\Http\Controllers\Admin;

use App\Models\Culiner;
use App\Models\User;
use App\Models\Event;
use App\Models\Resto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user  = User::count();
        $culiner = Culiner::count();
        $resto = Resto::count();
        $event = Event::count();
        return view('pages.admin.dashboard',[
            'user' => $user,
            'culiner' => $culiner,
            'resto' => $resto,
            'event' => $event
        ]);
    }

}
