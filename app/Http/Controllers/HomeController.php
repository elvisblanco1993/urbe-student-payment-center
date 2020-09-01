<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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
        $user = User::find(Auth::user()->id);

        $next_start = DB::table('start_date')->where('is_past', false)->first();

        if ( ! isset($user->stripe_id) ) {

            return view('stripe-prompt');

        } else {

            return view('home', [
                'user' => $user,
                'next_start' => $next_start,
            ]);
        }


    }

    /**
     * Save the user's Stripe Id
     */
    public function saveStripeId(Request $request)
    {
        $request->validate([
            'strid' => 'required|starts_with:cus_',
        ]);

        $user = User::find(Auth::user()->id);
        $user->stripe_id = $request->get('strid');
        $user->save();

        // Send welcome email to student
        Mail::to($request->user())->send(new WelcomeEmail($user->email));

        return redirect()->route('home');
    }

    /**
     * Launch Billing Portal
     */
    public function billingPortal(Request $request)
    {
        return $request->user()->redirectToBillingPortal(
            route('home')
        );
    }
}
