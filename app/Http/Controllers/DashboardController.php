<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvents = Event::count();
        $totalRegistrations = Registration::count();
        
        $events = Event::withCount('registrations')->get();
        
        $fullEventsCount = $events->filter(function ($event) {
            return ($event->total_seats - $event->registrations_count) <= 0;
        })->count();
        
        $totalRemainingSeats = $events->sum(function ($event) {
            return max(0, $event->total_seats - $event->registrations_count);
        });

        return view('admin.dashboard', compact(
            'totalEvents', 
            'totalRegistrations', 
            'fullEventsCount', 
            'totalRemainingSeats',
            'events'
        ));
    }
}
