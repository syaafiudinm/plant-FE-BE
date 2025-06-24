<?php

namespace App\Http\Controllers;

use App\Models\InferenceResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DetectionController extends Controller
{
    public function form() {
        $deviceIds = \App\Models\InferenceResult::select('device_id')
            ->distinct()
            ->orderBy('device_id')
            ->pluck('device_id');

        return view('detect.form', compact('deviceIds'));
    }

    public function infer(Request $request)
    {
        $request->validate([
            'device_id' => 'required',
            'image' => 'required|image',
        ]);

        $response = Http::attach(
            'image', file_get_contents($request->file('image')), $request->file('image')->getClientOriginalName()
        )->asMultipart()->post('http://localhost:8080/infer', [
            ['name' => 'device_id', 'contents' => $request->device_id],
        ]);

        if (!$response->successful()) {
            return back()->with('error', $response->json()['error'] ?? 'Gagal terhubung ke model.');
        }

        $data = $response->json();
        InferenceResult::create([
            'device_id' => $data['device_id'],
            'scale_cm_px' => $data['scale_cm_px'],
            'total_cm_today' => $data['total_cm_today'],
            'plant_cm_today' => $data['plant_cm_today'],
            'h_bbox_px_today' => $data['h_bbox_px_today'],
            'bbox_xyxy' => $data['bbox_xyxy'],
            'timestamp' => $data['timestamp'],
        ]);

        return redirect()->route('detect.history')->with('success', 'Berhasil menyimpan hasil inferensi.');
    }

    public function history()
    {
        $results = InferenceResult::latest()->get();
        return view('detect.history', compact('results'));
    }

    public function calibrationForm()
    {
        return view('detect.calibrate');
    }

    public function calibrate(Request $request)
    {
        $request->validate([
            'device_id' => 'required|string',
            'total_cm' => 'required|numeric|min:1',
            'image' => 'required|image',
        ]);

        $response = Http::attach(
            'image', file_get_contents($request->file('image')), $request->file('image')->getClientOriginalName()
        )->asMultipart()->post('http://localhost:8080/calibrate', [
            ['name' => 'device_id', 'contents' => $request->device_id],
            ['name' => 'total_cm', 'contents' => $request->total_cm],
        ]);

        if (!$response->successful()) {
            return back()->with('error', $response->json()['error'] ?? 'Gagal mengkalibrasi perangkat.');
        }

        return redirect()->route('detect.form')->with('success', 'Kalibrasi berhasil disimpan untuk device: ' . $request->device_id);
    }
}
