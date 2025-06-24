<x-layout>
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-6 space-y-6">
        <h1 class="text-2xl font-semibold text-blue-950 border-b pb-2">Deteksi Tinggi Tanaman</h1>

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

        <form action="{{ route('detect.infer') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium">Device ID</label>
                <select name="device_id" class="border mt-2 p-2 w-full rounded border-gray-200" required>
                    @forelse($device_id as $id)
                        <option value="{{ $id }}">{{ $id }}</option>
                    @empty
                        <option disabled>Belum ada perangkat terkalibrasi</option>
                    @endforelse
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Gambar tanaman</label>
                <input type="file" name="image"
                       class="p-1 mt-1 block w-full text-sm text-gray-600 file:bg-blue-50 file:border-0 file:rounded-md file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <button type="submit"
                    class="w-full bg-blue-950 hover:bg-blue-800 text-white font-semibold py-2 px-4 rounded-md transition duration-200">
                Deteksi Sekarang
            </button>
        </form>
    </div>
</x-layout>
