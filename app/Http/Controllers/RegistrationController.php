<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        $events = Event::withCount('registrations')->get();
        // Calculate remaining seats and check if user is already registered
        foreach ($events as $event) {
            $event->remaining_seats = $event->total_seats - $event->registrations_count;
            $event->is_registered = Auth::check() 
                ? Registration::where('user_id', Auth::id())->where('event_id', $event->id)->exists()
                : false;
        }

        return view('events.index', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
        ]);

        $user = Auth::user();
        $event = Event::withCount('registrations')->findOrFail($request->event_id);

        // 1. Check if already registered (Double registration prevention)
        if (Registration::where('user_id', $user->id)->where('event_id', $event->id)->exists()) {
            return back()->with('error', 'คุณได้ลงทะเบียนกิจกรรมนี้ไปแล้ว');
        }

        // 2. Check maximum 3 workshops limit
        if ($user->registrations()->count() >= 3) {
            return back()->with('error', 'ขออภัย คุณสามารถลงทะเบียนได้สูงสุด 3 กิจกรรมเท่านั้น');
        }

        // 3. Check remaining seats and manual status
        $remainingSeats = $event->total_seats - $event->registrations_count;
        if ($remainingSeats <= 0 || !$event->is_active) {
            return back()->with('error', 'ขออภัย กิจกรรมนี้ปิดรับลงทะเบียนแล้ว (ที่นั่งเต็ม หรือ ถูกปิดโดยผู้ดูแล)');
        }

        // 4. Create registration
        try {
            Registration::create([
                'user_id' => $user->id,
                'event_id' => $event->id,
            ]);

            return back()->with('success', 'ลงทะเบียนสำเร็จแล้ว!');
        } catch (\Exception $e) {
            // This catch block would typically handle database unique constraint violations
            // if the initial 'exists()' check somehow failed or was raced.
            return back()->with('error', 'เกิดข้อผิดพลาดในการลงทะเบียน กรุณาลองใหม่อีกครั้ง');
        }
    }
}
