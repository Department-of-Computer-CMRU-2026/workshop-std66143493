<x-layouts::app title="{{ $event->title }}">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-extrabold text-zinc-900">รายละเอียดกิจกรรม: {{ $event->title }}</h2>
                        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline font-bold">← กลับไปยังแดชบอร์ด</a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-gray-50 p-4 rounded-lg"><p class="text-sm font-bold uppercase" style="color: black !important;">วิทยากร</p><p class="text-lg font-bold" style="color: black !important;">{{ $event->speaker }}</p></div>
                        <div class="bg-gray-50 p-4 rounded-lg"><p class="text-sm font-bold uppercase" style="color: black !important;">สถานที่</p><p class="text-lg font-bold" style="color: black !important;">{{ $event->location }}</p></div>
                        <div class="bg-gray-50 p-4 rounded-lg"><p class="text-sm font-bold uppercase" style="color: black !important;">จำนวนที่นั่งว่าง</p><p class="text-lg font-bold" style="color: black !important;">{{ $event->total_seats - $event->registrations->count() }} / {{ $event->total_seats }}</p></div>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-extrabold mb-4 text-zinc-900 border-b pb-2">รายชื่อผู้ลงทะเบียน</h3>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-extrabold uppercase tracking-wider" style="color: black !important; border-bottom: 2px solid #e5e7eb;">ชื่อ-นามสกุล</th>
                                <th class="px-6 py-3 text-left text-xs font-extrabold uppercase tracking-wider" style="color: black !important; border-bottom: 2px solid #e5e7eb;">อีเมล</th>
                                <th class="px-6 py-3 text-left text-xs font-extrabold uppercase tracking-wider" style="color: black !important; border-bottom: 2px solid #e5e7eb;">วันที่ลงทะเบียน</th>
                            </tr>
                        </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($event->registrations as $reg)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap font-bold" style="color: black !important; border-bottom: 1px solid #f3f4f6;">{{ $reg->user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-bold" style="color: black !important; border-bottom: 1px solid #f3f4f6;">{{ $reg->user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-extrabold" style="color: black !important; border-bottom: 1px solid #f3f4f6;">{{ $reg->created_at->format('d/m/Y H:i') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center font-bold" style="color: black !important;">ยังไม่มีใครลงทะเบียนสำหรับกิจกรรมนี้</td>
                                </tr>
                            @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts::app>
