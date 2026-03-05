<x-layouts::app title="Admin Dashboard">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold mb-8">แผงควบคุมแอดมิน - ภาพรวมกิจกรรม</h1>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-blue-500">
                    <p class="text-sm uppercase font-bold" style="color: black !important;">จำนวนกิจกรรมทั้งหมด</p>
                    <p class="text-3xl font-extrabold" style="color: black !important;">{{ $totalEvents }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-green-500">
                    <p class="text-sm uppercase font-bold" style="color: black !important;">จำนวนการลงทะเบียน</p>
                    <p class="text-3xl font-extrabold" style="color: black !important;">{{ $totalRegistrations }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-red-500">
                    <p class="text-sm uppercase font-bold" style="color: black !important;">กิจกรรมที่เต็มแล้ว</p>
                    <p class="text-3xl font-extrabold" style="color: black !important;">{{ $fullEventsCount }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow border-l-4 border-yellow-500">
                    <p class="text-sm uppercase font-bold" style="color: black !important;">ที่นั่งว่างทั้งหมด (รวม)</p>
                    <p class="text-3xl font-extrabold" style="color: black !important;">{{ $totalRemainingSeats }}</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-bold text-zinc-900">จัดการกิจกรรม</h2>
                        <a href="{{ route('admin.events.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-bold">+ เพิ่มกิจกรรมใหม่</a>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider" style="color: black !important;">ชื่อหัวข้อ</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider" style="color: black !important;">วิทยากร</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider" style="color: black !important;">ลงทะเบียนแล้ว</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider" style="color: black !important;">สถานะ</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider" style="color: black !important;">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($events as $event)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap font-bold border-b border-gray-100" style="color: black !important;">{{ $event->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap border-b border-gray-100" style="color: black !important;">{{ $event->speaker }}</td>
                                <td class="px-6 py-4 whitespace-nowrap font-bold border-b border-gray-100" style="color: black !important;">{{ $event->registrations_count }} / {{ $event->total_seats }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php $rem = $event->total_seats - $event->registrations_count; @endphp
                                    @if(!$event->is_active)
                                        <span class="px-2 py-1 bg-gray-200 text-gray-800 text-xs rounded-full font-bold">ปิดโดยแอดมิน</span>
                                    @elseif($rem <= 0)
                                        <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full font-semibold">เต็มแล้ว</span>
                                    @else
                                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full font-semibold">เปิดอยู่</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap space-x-2">
                                    <a href="{{ route('admin.events.show', $event) }}" class="text-blue-600 hover:text-blue-900">ดูรายชื่อ</a>
                                    <a href="{{ route('admin.events.edit', $event) }}" class="text-indigo-600 hover:text-indigo-900">แก้ไข</a>
                                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบกิจกรรมนี้?')">ลบ</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layouts::app>
