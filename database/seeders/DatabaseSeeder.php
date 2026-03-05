<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Regualr User
        User::create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Create Sample Events
        $events = [
            [
                'title' => 'Web Development with Laravel 12',
                'speaker' => 'Dr. Laravel',
                'location' => 'Room 401',
                'total_seats' => 2, // Small for testing full state
            ],
            [
                'title' => 'แนะนำพื้นฐาน Laravel สำหรับมือใหม่',
                'speaker' => 'อาจารย์สมชาย ใจดี',
                'location' => 'ห้องประชุม 101 คณะวิศวกรรมศาสตร์',
                'total_seats' => 20
            ],
            [
                'title' => 'เทคนิคการออกแบบ Database ขั้นสูง',
                'speaker' => 'อาจารย์สิริ กิตติวัฒน์',
                'location' => 'ห้อง Lab 304 ตึกกิจกรรม',
                'total_seats' => 15
            ],
            [
                'title' => 'Workshop: สร้าง API ด้วย PHP 8.4',
                'speaker' => 'อาจารย์มานะ ขยันหมั่นเพียร',
                'location' => 'ห้อง Multi-purpose 02',
                'total_seats' => 2
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
