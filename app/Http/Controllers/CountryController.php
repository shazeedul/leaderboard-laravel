<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    public function countrySearch(Request $request)
    {
        $country = $request->input('term');
        $countries = Country::where('name', 'like', '%' . $country . '%')->get();
        return response()->json($countries);
    }
}
