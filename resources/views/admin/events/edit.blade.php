<x-layouts::app title="Edit Event">
    <div class="py-12">
        <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 bg-white p-8 border rounded shadow-md">
            <h1 class="text-2xl font-bold mb-6">แก้ไขกิจกรรม: {{ $event->title }}</h1>

            <form action="{{ route('admin.events.update', $event) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-black text-sm font-bold mb-2">ชื่อหัวข้อกิจกรรม</label>
                    <input type="text" name="title" value="{{ $event->title }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-black font-semibold leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label class="block text-black text-sm font-bold mb-2">วิทยากร</label>
                    <input type="text" name="speaker" value="{{ $event->speaker }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label class="block text-black text-sm font-bold mb-2">สถานที่</label>
                    <input type="text" name="location" value="{{ $event->location }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-2">จำนวนที่นั่งทั้งหมด</label>
                    <input type="number" name="total_seats" value="{{ $event->total_seats }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-6">
                    <label class="block text-black text-sm font-bold mb-2">สถานะการเปิดรับสมัคร</label>
                    <div class="flex items-center space-x-6 bg-gray-50 p-3 rounded border">
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="is_active" value="1" {{ $event->is_active ? 'checked' : '' }} class="w-4 h-4 text-blue-600">
                            <span class="ml-2 text-black font-bold">เปิดรับสมัคร (Open)</span>
                        </label>
                        <label class="inline-flex items-center cursor-pointer">
                            <input type="radio" name="is_active" value="0" {{ !$event->is_active ? 'checked' : '' }} class="w-4 h-4 text-red-600">
                            <span class="ml-2 text-black font-bold">ปิดรับสมัคร (Closed)</span>
                        </label>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        อัปเดตข้อมูล
                    </button>
                    <a href="{{ route('admin.dashboard') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        ยกเลิก
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>
