<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workshop CMS - Explore & Learn</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #4F46E5;
            --primary-dark: #4338CA;
            --accent: #F59E0B;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        .font-outfit {
            font-family: 'Outfit', sans-serif;
        }

        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-gradient {
            background: radial-gradient(circle at top right, #eef2ff 0%, #f8fafc 50%);
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .btn-premium {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            transition: all 0.3s ease;
        }

        .btn-premium:hover {
            opacity: 0.9;
            transform: scale(1.02);
            box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.4);
        }
    </style>
</head>
<body class="antialiased hero-gradient flex flex-col min-h-screen">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 glass-nav">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center gap-2">
                        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-200">
                           <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <span class="text-2xl font-bold font-outfit tracking-tight text-slate-800">Workshop<span class="text-indigo-600">Hub</span></span>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">แผงควบคุม</a>
                        @else
                            <a href="{{ route('login') }}" class="text-slate-600 hover:text-indigo-600 font-medium transition-colors">เข้าสู่ระบบ</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn-premium text-white px-6 py-2.5 rounded-full font-semibold shadow-md">สมัครสมาชิก</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-20 pb-16 px-4">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-5xl md:text-7xl font-bold font-outfit text-slate-900 mb-6 tracking-tight leading-tight">
                ยกระดับทักษะของคุณ <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-violet-600">ด้วย Workshop ระดับพรีเมียม</span>
            </h1>
            <p class="text-xl text-slate-600 max-w-2xl mx-auto mb-10 leading-relaxed font-light">
                ค้นพบกิจกรรมที่น่าสนใจจากผู้เชี่ยวชาญ พร้อมลงทะเบียนเรียนรู้ได้ทันที ระบบของเราช่วยให้คุณจัดการการเรียนรู้ได้อย่างมีประสิทธิภาพ
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#workshops" class="btn-premium text-white px-8 py-4 rounded-full font-bold text-lg shadow-xl shadow-indigo-100 flex items-center gap-2">
                    ดู Workshop ทั้งหมด
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Workshop List Section -->
    <section id="workshops" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-end justify-between mb-12 border-b border-slate-100 pb-8">
                <div>
                    <h2 class="text-3xl font-bold font-outfit text-slate-800 mb-2">กิจกรรมที่เปิดรับสมัคร</h2>
                    <p class="text-slate-500">เลือก Workshop ที่คุณสนใจและสำรองที่นั่งได้เลย</p>
                </div>
                <div class="hidden md:block">
                    <span class="bg-indigo-50 text-indigo-700 px-4 py-2 rounded-full text-sm font-semibold">พบ {{ $events->count() }} รายการ</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($events as $event)
                <div class="bg-white rounded-3xl border border-slate-100 shadow-sm card-hover overflow-hidden flex flex-col h-full">
                    <div class="h-48 bg-slate-100 relative overflow-hidden group">
                        <!-- Simplified dynamic pattern instead of real image -->
                        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-violet-500/10 flex items-center justify-center">
                            <svg class="w-16 h-16 text-indigo-200 group-hover:scale-110 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="absolute top-4 right-4">
                            @if($event->is_active && $event->remaining_seats > 0)
                                <span class="bg-emerald-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">เปิดรับสมัคร</span>
                            @elseif(!$event->is_active)
                                <span class="bg-rose-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">ปิดโดยแอดมิน</span>
                            @else
                                <span class="bg-amber-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">ที่นั่งเต็ม</span>
                            @endif
                        </div>
                    </div>
                    <div class="p-8 flex flex-col grow">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <span class="text-sm font-medium text-slate-600">{{ $event->speaker }}</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-3 line-clamp-2 h-14">{{ $event->title }}</h3>
                        
                        <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-xs text-slate-400 uppercase font-bold tracking-widest">ที่นั่งว่าง</span>
                                <span class="text-lg font-bold text-indigo-600">{{ $event->remaining_seats }} / {{ $event->total_seats }}</span>
                            </div>
                            
                            @auth
                                @if($event->is_registered)
                                    <button disabled class="bg-slate-100 text-slate-400 px-6 py-2.5 rounded-xl font-bold cursor-not-allowed">ลงทะเบียนแล้ว</button>
                                @elseif(!$event->is_active || $event->remaining_seats <= 0)
                                    <button disabled class="bg-slate-50 text-slate-300 px-6 py-2.5 rounded-xl font-bold cursor-not-allowed">ปิดรับ</button>
                                @else
                                    <form action="{{ route('events.register') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <button type="submit" class="btn-premium text-white px-6 py-2.5 rounded-xl font-bold shadow-lg shadow-indigo-100">ลงทะเบียน</button>
                                    </form>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-bold border-2 border-indigo-600 px-5 py-2 rounded-xl transition-all">ลงชื่อเข้าใช้</a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-12 mt-auto">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="mb-4">© {{ date('Y') }} WorkshopHub. Created with Laravel and Passion.</p>
            <div class="flex justify-center gap-6 text-sm">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
                <a href="#" class="hover:text-white transition-colors">Contact Us</a>
            </div>
        </div>
    </footer>
</body>
</html>
