<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = [];

        $events[] = \Calendar::event(
            'Event One', //event title
            false, //full day event?
            '2016-09-11T0800', //start time (you can also use Carbon instead of DateTime)
            '2016-09-12T0800', //end time (you can also use Carbon instead of DateTime)
            0 //optionally, you can specify an event ID
        );

        $events[] = \Calendar::event(
            "Valentine's Day", //event title
            true, //full day event?
            new \DateTime('2016-09-24'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2016-09-30'), //end time (you can also use Carbon instead of DateTime)
            'stringEventId' //optionally, you can specify an event ID
        );

        
        $calendar = \Calendar::addEvents($events) //add an array with addEvents
            ->setOptions([ //set fullcalendar options
                'firstDay' => 1,
                'eventStartEditable' => 'true',
                'durationEditable' => 'true',

            ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
                'eventDrop' => 'function(event, delta, revertFunc) {
                
                        alert(event.title + " was rescheduled to: " + event.start.format() + " to " + event.end.format());
                
                        if (!confirm("Are you sure about this change?")) {
                            revertFunc();
                        }
                
                    }'
            ]); 

        return view('schedule', compact('calendar'));
    }
}
