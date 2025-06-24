<x-layout title="Hasil Deteksi Tanaman">
    <div class="space-y-2 text-sm">
        <p><strong>🕒 Waktu:</strong> {{ $result['timestamp'] }}</p>
        <p><strong>📱 Device:</strong> {{ $result['device_id'] }}</p>
        <p><strong>🟩 Bounding Box:</strong> [{{ implode(', ', $result['bbox_xyxy']) }}]</p>
        <p><strong>📏 Tinggi Box (px):</strong> {{ $result['h_bbox_px'] }}</p>
        <p><strong>📐 Skala:</strong> {{ $result['scale_cm_px'] }} cm/pixel</p>
        <p><strong>🪴 Pot (px):</strong> {{ $result['pot_px'] }}</p>
        <p><strong>🌱 Tanaman (px):</strong> {{ $result['plant_px'] }}</p>
        <p class="text-lg font-semibold text-green-700">
            🌿 Tinggi Tanaman (cm): {{ $result['plant_cm_pred'] }}
        </p>
    </div>

    <a href="/inference/history" class="font-semibold inline-block mt-6 text-blue-600 hover:underline">
        → Lihat Riwayat Deteksi
    </a>
</x-layout>
