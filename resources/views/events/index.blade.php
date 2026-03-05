<x-layouts::app title="Workshops">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold mb-8">กิจกรรม Senior-to-Junior Workshops</h1>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($events as $event)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                        <div class="p-6">
                            <h2 class="text-xl font-extrabold mb-2 border-b pb-1" style="color: black !important;">{{ $event->title }}</h2>
                            <p class="mb-2 mt-2" style="color: black !important;"><span class="font-bold">วิทยากร:</span> {{ $event->speaker }}</p>
                            <p class="mb-4" style="color: black !important;"><span class="font-bold">สถานที่:</span> {{ $event->location }}</p>
                            
                            <div class="flex justify-between items-center mt-4">
                                <span class="text-sm font-bold {{ ($event->remaining_seats > 0 && $event->is_active) ? 'text-green-600' : 'text-red-600' }}" style="color: {{ ($event->remaining_seats > 0 && $event->is_active) ? '#166534' : '#991b1b' }} !important;">
                                    @if(!$event->is_active)
                                        สถานะ: ปิดโดยแอดมิน
                                    @elseif($event->remaining_seats > 0)
                                        ว่าง: {{ $event->remaining_seats }} / {{ $event->total_seats }}
                                    @else
                                        สถานะ: เต็มแล้ว
                                    @endif
                                </span>
                                
                                <div class="flex items-center space-x-2">
                                    @auth
                                        @if($event->is_registered)
                                            <span class="bg-green-100 text-green-800 text-xs font-bold px-2.5 py-0.5 rounded">ลงทะเบียนแล้ว</span>
                                        @elseif($event->remaining_seats > 0 && $event->is_active)
                                            <form action="{{ route('events.register') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm font-bold">ลงทะเบียน</button>
                                            </form>
                                        @else
                                            <button disabled class="bg-gray-300 text-gray-600 px-4 py-2 rounded text-sm font-bold cursor-not-allowed">
                                                {{ !$event->is_active ? 'ปิดรับสมัคร' : 'ที่นั่งเต็ม' }}
                                            </button>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-bold">เข้าสู่ระบบ</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts::app>
