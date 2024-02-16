<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $leaderBoardCount = \App\Models\LeaderBoard::count();
            $clubCount = \App\Models\Club::count();
            $memberCount = \App\Models\User::where('role', 'user')->count();
            return view('admin.home', compact(['leaderBoardCount', 'clubCount', 'memberCount']));
        } else if (auth()->user()->role == 'club') {
            return redirect()->route('club.home');
        }
        return view('user.home');
    }
}
