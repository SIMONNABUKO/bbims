<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use \Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Donation;
use App\Models\User;
use App\Notifications\Transfusion;
use App\Notifications\LowBlood;
use App\Notifications\Overstayed;
use App\Models\BloodBank;
use Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated(Request $request, User $user)
    {
        if (auth()->user()->is_donor) {
            $reminders =  auth()->user()->notifications->where('type', "App\Notifications\Transfusion")->where('read_at', null)->all();
            $user = auth()->user();
            $donation = Donation::where('donor_id', auth()->id())->latest()->first();
            $time = $donation->created_at->diffForHumans();
            if ($time = "2 months ago") {
                $user->notify(new Transfusion);
            }

            // dd($time);

            return \redirect('/dashboard/home');
        }




        if (auth()->user()->is_admin) {
            $donations = Donation::where('status', 0)->get();
            foreach ($donations as $donation) {
                $bb = BloodBank::where('user_id', $donation->user_id)->first();
                $bbName = $bb->name;
                $time = $donation->created_at->diffForHumans();
                if ($time = "2 days ago") {
                    $user->notify(new Overstayed($donation->blood_type, $bbName, $donation->id));
                }
    
                // dd($time);
            }
       

            return \redirect('/dashboard/home');
        }




        if (auth()->user()->is_blood_bank) {
            $bb =BloodBank::where('user_id', auth()->id())->first();
            $user = auth()->user();

            if ($bb->A_plus<5) {
                $user->notify(new LowBlood($blood_type="A Positive"));
            }
            if ($bb->A_minus<5) {
                $user->notify(new LowBlood($blood_type="A Negative"));
            }
            if ($bb->B_plus<5) {
                $user->notify(new LowBlood($blood_type="B Positive"));
            }
            if ($bb->B_minus<5) {
                $user->notify(new LowBlood($blood_type="B Negative"));
            }
            if ($bb->AB_plus<5) {
                $user->notify(new LowBlood($blood_type="AB Positive"));
            }
            if ($bb->AB_minus<5) {
                $user->notify(new LowBlood($blood_type="AB Negative"));
            }
            if ($bb->O_plus<5) {
                $user->notify(new LowBlood($blood_type="O Positive"));
            }
            if ($bb->O_minus<5) {
                $user->notify(new LowBlood($blood_type="O Negative"));
            }

            
            

            return \redirect('/dashboard/home');
        }
        return \redirect('/dashboard/home');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
