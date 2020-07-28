<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use App\Http\Controllers\Controller;
use App\Schedule;
use App\User;
use App\Weekday;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     */
    public function schedule()
    {
        $classes = Classes::query()->get();
        $weekdays = Weekday::query()->get();
        $teachers = User::query()->where('role', 'teacher')->get();

        return view('admin.dashboard', ['classes' => $classes, 'weekdays' => $weekdays, 'teachers' => $teachers]);
    }

    public function addSchedule(Request $request)
    {

        if($request->has('user_id') && $request->get('user_id') != '') {
            if(!$this->isTeacherAvailable($request->all())) {
                return back()->withInput()->withErrors(['user_id' => 'Teacher not available at that time.']);
            }
        }

        $schedule = new Schedule();
        $schedule->title = $request->get('title');
        $schedule->from = $request->get('from');
        $schedule->to = $request->get('to');
        $schedule->user_id = $request->get('user_id');
        $schedule->weekday_id = $request->get('week_id');
        $schedule->class_id = $request->get('class_id');
        $schedule->save();

        return back()->with(['message' => 'Success!']);
    }


    protected function isTeacherAvailable(array $data) : bool
    {
        $from = (int) str_replace(':', '', $data['from']);
        $to = (int) str_replace(':', '', $data['to']);
        $teacher = User::query()->find($data['user_id']);
        $lessons = $teacher->schedule()->where('weekday_id' , $data['week_id'])->get();

        $valid = false;

        if(count($lessons) == 0) {
            $valid = true;
        }

        foreach ($lessons as $lesson) {
            $toCheck = (int) str_replace(':', '', $lesson->to);
            $fromCheck = (int) str_replace(':', '', $lesson->from);

            if (
                (($from < $toCheck && $from < $fromCheck) && ( $to < $toCheck && $to < $fromCheck)) ||
                (($from > $toCheck && $from > $fromCheck) && ( $to > $toCheck && $to > $fromCheck))
            ) {
               $valid = true;
            }
        }

        return $valid;
    }
}
