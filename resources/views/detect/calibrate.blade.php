<x-layout>
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-6 space-y-6">
        <h1 class="text-2xl font-semibold text-blue-950 border-b pb-2">Kalibrasi Perangkat</h1>

        @if(session('error'))
            <div class="bg-red-100 border border-red-300 text-red-800 px-4 py-2 rounded-md">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('detect.calibrate') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Device ID</label>
                <input type="text" name="device_id" placeholder="contoh: esp32-1"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tinggi tanaman saat ini (cm)</label>
                <input type="number" step="0.1" name="total_cm" placeholder="misal: 25.3"
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Gambar tanaman</label>
                <input type="file" name="image"
                       class="p-1 mt-1 block w-full text-sm text-gray-600 file:bg-blue-50 file:border-0 file:rounded-md file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <button type="submit"
                    class="w-full bg-blue-950 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
                Kalibrasi Sekarang
            </button>
        </form>
    </div>
</x-layout>
