<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\User;
use App\Models\Affiliation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ClubRegisterRequest;

class ClubController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('club.registered')->except(['create', 'store']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // club information and logo
        $club = Club::where('user_id', Auth::user()->id)->first();

        return view('club.home')->with('club', $club);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // if club is already registered then redirect to club home page with error message
        if (Auth::user()->role === 'club') {
            return redirect()->route('club.index')->with('error', __('You are already registered as a club'));
        } else {
            $affiliations = Affiliation::all();
            return view('club.details', compact('affiliations'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClubRegisterRequest $request)
    {
        $user = auth()->user();
        // logo save
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            // save by storage facade and link to public/club/logo folder
            Storage::disk('public')->putFileAs('club/logo', $file, $filename);
            $imagePath = '/storage/club/logo/' . $filename;
        } else {
            $imagePath = null;
        }

        // club data insert into database
        $user->club()->create([
            'name' => $request->name,
            'affiliation_id' => $request->affiliation_id,
            'logo' => $imagePath,
            'user_id' => $user->id,
            'address' => $request->address,
            'trading_as' => $request->trading_as,
            'registration_number' => $request->registration_number,
            'number_of_players' => $request->number_of_players,
        ]);

        // redirect with success message after saving data
        return redirect()->route('club.index')->with('success', __('Club registered successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Club $club)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        //
    }
}
