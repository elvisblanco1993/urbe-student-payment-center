<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    /**
     * Show Front Page
     */
    public function site()
    {
        $next_start = DB::table('start_date')->where('is_past', false)->first() ?? null;

        if (isset($next_start)) {

            $start_date = Carbon::now()->diffInDays($next_start->semester_starts);

            /**
             * Automatically change the semester
             */
            if ( Carbon::parse($next_start->semester_starts)->isPast() === TRUE ) {
                DB::table('start_date')->where('semester_starts', $next_start->semester_starts)->where('is_past', false)->update(['is_past' => true]);
            }

            return view('welcome', [
                'next_start' => $next_start,
                'start_date' => $start_date,
                'semester_name' => $next_start->semester_name,
                ]);
        }

        return view('welcome', [
            'next_start' => $next_start
        ]);
    }
}
