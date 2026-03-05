<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.dashboard');
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'speaker' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'total_seats' => 'required|integer|min:1',
            'is_active' => 'boolean',
        ]);

        $data = $validated;
        $data['is_active'] = $request->input('is_active', true);

        Event::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'สร้างกิจกรรมใหม่สำเร็จแล้ว!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'speaker' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'total_seats' => 'required|integer|min:1',
            'is_active' => 'boolean',
        ]);

        $data = $validated;
        $data['is_active'] = $request->input('is_active');

        $event->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'อัปเดตข้อมูลกิจกรรมสำเร็จแล้ว!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.dashboard')->with('success', 'ลบกิจกรรมสำเร็จแล้ว!');
    }

    public function show(Event $event)
    {
        $event->load('registrations.user');
        return view('admin.events.show', compact('event'));
    }
}
