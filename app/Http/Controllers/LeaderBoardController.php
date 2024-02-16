<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\LeaderBoard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\AdminLeaderBoardDataTable;

class LeaderBoardController extends Controller
{
    /**
     * Construct method
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(AdminLeaderBoardDataTable $dataTable)
    {
        return $dataTable->render('admin.leaderboard.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clubs = Club::all();
        return view('admin.leaderboard.create', compact('clubs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $leaderBoard = LeaderBoard::create([
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        $leaderBoard->clubs()->attach($request->clubs);
        return redirect()->route('leaderboard.index');

        return redirect()->route('admin.leaderboard.show', ['id' => $leaderBoard->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaderBoard $leaderBoard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaderBoard $leaderBoard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeaderBoard $leaderBoard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LeaderBoard $leaderBoard)
    {
        //
    }
}
