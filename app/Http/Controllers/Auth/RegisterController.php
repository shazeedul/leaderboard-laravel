<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Badge;
use App\Models\Country;
use App\Models\Affiliation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $badges = Badge::all();
        $affiliations = Affiliation::all();
        $countries = Country::all();
        return view('auth.register', compact('badges', 'affiliations', 'countries'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:255'],
            'full_number' => ['required', 'string', 'max:255', 'unique:users,phone_number'],
            'password' => ['required', 'string', 'max:5', 'confirmed'],
            'badge_id' => ['required', 'integer', 'exists:badges,id'],
            'affiliation_id' => ['required', 'integer', 'exists:affiliations,id'],
            'club_status' => ['required', 'string', 'in:Coach,Player,Supporter'],
            'gender' => ['required', 'string',  'in:Male,Female,Others'],
            'country_of_origin' => ['required', 'integer', 'exists:countries,id'],
            'nationality' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone_number' => $data['full_number'],
            'password' => Hash::make($data['password']),
            'badge_id' => $data['badge_id'],
            'affiliation_id' => $data['affiliation_id'],
            'club_status' => $data['club_status'],
            'gender' => $data['gender'],
            'country_id' => $data['country_of_origin'],
            'nationality' => $data['nationality'],
        ]);
    }
}
