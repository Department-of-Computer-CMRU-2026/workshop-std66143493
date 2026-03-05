<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Workshop CMS - ประสบการณ์การเรียนรู้ระดับพรีเมียมaaaaaaaa</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anuphan:wght@300;400;500;600;700&family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #ec4899;
            --accent: #f59e0b;
            --surface: rgba(255, 255, 255, 0.7);
        }

        body {
            font-family: 'Anuphan', 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            overflow-x: hidden;
            line-height: 1.6;
        }

        .font-outfit { font-family: 'Outfit', sans-serif; }

        /* Animated Mesh Background */
        .mesh-bg {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: -1;
            background-color: #f8fafc;
            background-image: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.15) 0, transparent 50%), 
                radial-gradient(at 50% 0%, rgba(236, 72, 153, 0.1) 0, transparent 50%),
                radial-gradient(at 100% 0%, rgba(245, 158, 11, 0.1) 0, transparent 50%);
            animation: mesh-flow 20s ease-in-out infinite alternate;
        }

        @keyframes mesh-flow {
            0% { transform: scale(1); }
            100% { transform: scale(1.1); }
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.05);
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .glass-card:hover {
            transform: translateY(-8px) scale(1.01);
            background: rgba(255, 255, 255, 0.8);
            border-color: var(--primary);
            box-shadow: 0 25px 50px -12px rgba(99, 102, 241, 0.15);
        }

        .nav-blur {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.01), 0 2px 4px -1px rgba(0, 0, 0, 0.006);
        }

        .btn-gradient {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(99, 102, 241, 0.5);
            filter: brightness(1.1);
        }

        /* Premium Progress Bar */
        .progress-bar-container {
            height: 6px;
            background: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            border-radius: 999px;
            transition: width 1.5s cubic-bezier(0.65, 0, 0.35, 1);
        }

        /* Entrance Animations */
        .stagger-item {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 0.6s ease forwards;
        }

        @keyframes fadeUp {
            to { opacity: 1; transform: translateY(0); }
        }

        .hero-title {
            background: linear-gradient(to right, #1e293b, #4338ca, #1e293b);
            background-size: 200% auto;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            animation: shine 8s linear infinite;
        }

        @keyframes shine {
            to { background-position: 200% center; }
        }
    </style>
</head>
<body class="antialiased flex flex-col min-h-screen">
    <div class="mesh-bg"></div>

    <!-- Navigation -->
    <nav class="sticky top-0 z-[100] nav-blur">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 rounded-2xl bg-indigo-600 flex items-center justify-center shadow-xl shadow-indigo-200 rotate-3 transform transition hover:rotate-0">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <span class="text-2xl font-extrabold font-outfit tracking-tighter text-slate-900 leading-none">Workshop<span class="text-indigo-600">Pro</span></span>
            </div>

            <div class="flex items-center gap-6">
                @if (Route::has('login'))
                    @auth
                        <div class="flex items-center gap-6">
                            <a href="{{ route('dashboard') }}" class="font-bold text-xs uppercase tracking-widest text-slate-500 hover:text-indigo-600 transition-colors">แผงควบคุม</a>
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button type="submit" class="font-bold text-xs uppercase tracking-widest text-rose-500 hover:text-rose-600 transition-colors">ออกจากระบบ</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="font-bold text-xs uppercase tracking-widest text-slate-500 hover:text-indigo-600 transition-colors">เข้าสู่ระบบ</a>
                        <a href="{{ route('register') }}" class="btn-gradient text-white px-6 py-2.5 rounded-2xl font-bold text-xs shadow-lg shadow-indigo-100 uppercase tracking-widest">เริ่มใช้งาน</a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="relative pt-32 pb-24 px-6 overflow-hidden">
        <div class="max-w-7xl mx-auto text-center stagger-item">
            <span class="inline-block px-4 py-1.5 rounded-full bg-indigo-50 text-indigo-600 text-xs font-black uppercase tracking-[0.2em] mb-8 animate-pulse italic">ปฏิวัติการเรียนรู้ของคุณ</span>
            <h1 class="font-black hero-title mb-8 leading-[1.2] tracking-tight" style="font-size: clamp(2.5rem, 6vw, 4.5rem);">
                ปลดล็อกศักยภาพ <br>สู่ความเป็นเลิศ
            </h1>
            <p class="text-xl text-slate-500 max-w-2xl mx-auto mb-12 font-medium leading-relaxed">
                เวิร์กช็อปคุณภาพสูงโดยผู้เชี่ยวชาญระดับแนวหน้า ยกระดับทักษะของคุณด้วยแพลตฟอร์มการเรียนรู้ที่ทันสมัยที่สุด
            </p>
            <div class="flex justify-center gap-6">
                <a href="#explore" class="btn-gradient text-white px-10 py-5 rounded-2xl font-bold text-lg shadow-2xl flex items-center gap-3">
                    เลือกดูเวิร์กช็อป
                    <svg class="w-6 h-6 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7-7-7m14-8l-7 7-7-7"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Workshops -->
    <section id="explore" class="py-32 px-6 scroll-mt-20">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-20 gap-8 stagger-item">
                <div class="max-w-3xl text-left">
                    <h2 class="font-black text-slate-900 mb-4 leading-tight lowercase" style="font-size: clamp(1.8rem, 4vw, 3rem);"><span class="text-indigo-600">#</span> เวิร์กช็อปที่เปิดสอน</h2>
                    <p class="text-lg text-slate-500 font-medium leading-relaxed">ที่นั่งมีจำนวนจำกัดในแต่ละรอบ แนะนำให้ลงทะเบียนล่วงหน้าเพื่อรักษาสิทธิ์ของคุณ</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="flex -space-x-3 overflow-hidden">
                        @for($i=0; $i<5; $i++)
                        <img class="inline-block h-10 w-10 rounded-full ring-4 ring-white shadow-sm" src="https://api.dicebear.com/7.x/avataaars/svg?seed={{ $i }}" alt="">
                        @endfor
                    </div>
                    <span class="text-sm font-bold text-slate-400">นักศึกษาร่วมเรียนแล้วกว่า 2,000+ คน</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($events as $index => $event)
                @php
                    $percent = ($event->total_seats > 0) ? (min(100, round(($event->registrations_count / $event->total_seats) * 100))) : 100;
                    $isClosed = !$event->is_active || ($event->remaining_seats <= 0);
                @endphp
                <div class="glass-card rounded-[2.5rem] p-4 flex flex-col h-full stagger-item" style="animation-delay: {{ $index * 0.1 }}s">
                    <!-- Image Area -->
                    <div class="h-64 rounded-[2rem] bg-slate-900 mb-8 relative overflow-hidden group">
                        <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500/30 to-rose-500/30 group-hover:scale-110 transition-transform duration-700"></div>
                        <div class="absolute inset-0 flex items-center justify-center opacity-30 group-hover:opacity-50 transition-opacity">
                             <svg class="w-24 h-24 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <div class="absolute top-6 right-6">
                            @if($event->is_active && $event->remaining_seats > 0)
                                <span class="bg-indigo-600 text-white px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest shadow-xl">เปิดรับสมัคร</span>
                            @else
                                <span class="bg-rose-600 text-white px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest shadow-xl">ปิดรับสมัคร</span>
                            @endif
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="px-6 pb-6 flex flex-col grow">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="bg-slate-100 text-slate-500 text-[10px] font-black px-3 py-1 rounded-lg uppercase tracking-wider">วิทยากร</span>
                            <span class="text-xs font-bold text-slate-400 capitalize">{{ $event->speaker }}</span>
                        </div>
                        <h3 class="text-2xl font-extrabold text-slate-900 mb-6 leading-tight h-16 line-clamp-2">{{ $event->title }}</h3>
                        
                        <!-- Seat Logic -->
                        <div class="space-y-4 mb-8">
                            <div class="flex justify-between items-end">
                                <span class="text-xs font-black text-slate-400 uppercase tracking-widest leading-none">ความคืบหน้าการจอง</span>
                                <span class="text-sm font-black text-indigo-600 leading-none">{{ $event->registrations_count }} / {{ $event->total_seats }}</span>
                            </div>
                            <div class="progress-bar-container">
                                <div class="progress-bar-fill" style="width: {{ $percent }}%"></div>
                            </div>
                        </div>

                        <!-- CTA -->
                        <div class="mt-auto pt-6 border-t border-slate-100/50 flex items-center justify-between">
                            @auth
                                @if($event->is_registered)
                                    <button disabled class="w-full bg-slate-100 text-slate-400 py-2 rounded-xl font-black text-[10px] uppercase tracking-widest cursor-not-allowed">ลงทะเบียนสำเร็จแล้ว</button>
                                @elseif($isClosed)
                                    <button disabled class="w-full bg-slate-50 text-slate-300 py-2 rounded-xl font-black text-[10px] uppercase tracking-widest cursor-not-allowed">ปิดรับลงทะเบียน</button>
                                @else
                                    <form action="{{ route('events.register') }}" method="POST" class="w-full">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <button type="submit" class="w-full btn-gradient text-white py-2 rounded-xl font-bold text-xs shadow-lg shadow-indigo-100 flex items-center justify-center gap-2">
                                            <span>ลงทะเบียนเข้าเรียน</span>
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                        </button>
                                    </form>
                                @endif
@else
                                <a href="{{ route('login') }}" class="w-full border-2 border-slate-900 text-slate-900 py-2 rounded-xl font-bold text-xs hover:bg-slate-900 hover:text-white transition-all text-center">เข้าสู่ระบบเพื่อสมัคร</a>
@endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-20 px-6 border-t border-slate-100 mt-auto bg-white/30 backdrop-blur-md">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-10">
            <div class="flex items-center gap-3 opacity-50">
                <div class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <span class="text-xl font-bold font-outfit text-slate-900">WorkshopPro</span>
            </div>
            <p class="text-sm font-bold text-slate-400 uppercase tracking-widest italic text-center">Engineered for Creative Excellence</p>
            <div class="flex gap-8">
                <a href="#" class="text-xs font-black text-slate-400 hover:text-indigo-600 transition-colors uppercase tracking-widest">Twitter</a>
                <a href="#" class="text-xs font-black text-slate-400 hover:text-indigo-600 transition-colors uppercase tracking-widest">Discord</a>
            </div>
        </div>
    </footer>
</body>
</html>
