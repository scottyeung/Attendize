<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Organiser;
use App\Models\Users;
use Carbon\Carbon;

class OrganiserDashboardController extends MyBaseController
{
    /**
     * Show the organiser dashboard
     *
     * @param $organiser_id
     * @return mixed
     */
    public function showDashboard($organiser_id)
    {
        
        $organiser = Organiser::scope()->findOrFail($organiser_id);
        $upcoming_events = $organiser->events()->where('end_date', '>=', Carbon::now())->get();
        $calendar_events = [];

        if(Auth::user()->organiser_id !== $organiser->id && !Auth::user()->is_parent ) {
            return redirect()->action(
                'OrganiserDashboardController@showDashboard', Auth::user()->organiser_id 
             );
        }
        
        /* Prepare JSON array for events for use in the dashboard calendar */
        foreach ($organiser->events as $event) {
            $calendar_events[] = [
                'title' => $event->title,
                'start' => $event->start_date->toIso8601String(),
                'end'   => $event->end_date->toIso8601String(),
                'url'   => route('showEventDashboard', [
                    'event_id' => $event->id
                ]),
                'color' => '#4E558F'
            ];
        }

        $data = [
            'organiser'       => $organiser,
            'upcoming_events' => $upcoming_events,
            'calendar_events' => json_encode($calendar_events),
        ];

        return view('ManageOrganiser.Dashboard', $data);
    }
}
