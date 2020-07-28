<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Weekday;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function schedule()
    {
        $classes = Classes::query()->get();
        $weekdays = Weekday::query()->get();

        return view('schedule', ['classes' => $classes, 'weekdays' => $weekdays]);
    }
}
