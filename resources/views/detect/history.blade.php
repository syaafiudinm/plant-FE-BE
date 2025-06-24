<x-layout>
    <div class="max-w-5xl mx-auto bg-white shadow-md rounded-xl p-6 space-y-6">
        <h1 class="text-2xl font-semibold text-blue-950 border-b pb-2">Riwayat Deteksi Tanaman</h1>

        @if($results->isEmpty())
            <p class="text-gray-500">Belum ada data deteksi.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border border-gray-200 text-sm text-left text-gray-700">
                    <thead class="bg-blue-950 text-white">
                    <tr>
                        <th class="px-4 py-2">Waktu</th>
                        <th class="px-4 py-2">Device</th>
                        <th class="px-4 py-2">Tinggi (cm)</th>
                        <th class="px-4 py-2">Scale</th>
                        <th class="px-4 py-2">BBox</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                    @foreach($results as $row)
                        <tr class="hover:bg-blue-50">
                            <td class="px-4 py-2">{{ $row->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-4 py-2">{{ $row->device_id }}</td>
                            <td class="px-4 py-2">{{ $row->plant_cm_today }} cm</td>
                            <td class="px-4 py-2">{{ $row->scale_cm_px }}</td>
                            <td class="px-4 py-2 text-xs text-gray-500">{{ json_encode($row->bbox_xyxy) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-layout>
