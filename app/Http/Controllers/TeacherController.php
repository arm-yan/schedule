<?php

namespace App\Http\Controllers;

use App\Weekday;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('teacher');
    }

    public function schedule()
    {
        $weekdays = Weekday::query()->get();
        $user = Auth::user();

        return view('teacher.schedule', ['weekdays' => $weekdays, 'teacher' => $user]);
    }
}
