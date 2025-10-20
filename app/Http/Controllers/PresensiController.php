<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Presensi::with('karyawan');
        
        // Filter by karyawan_id if provided
        if ($request->has('karyawan_id')) {
            $query->where('karyawan_id', $request->karyawan_id);
        }
        
        // Filter by date range if provided
        if ($request->has('tanggal_awal')) {
            $query->where('tanggal_presensi', '>=', $request->tanggal_awal);
        }
        
        if ($request->has('tanggal_akhir')) {
            $query->where('tanggal_presensi', '<=', $request->tanggal_akhir);
        }
        
        $presensi = $query->orderBy('tanggal_presensi', 'desc')->get();
        
        return response()->json([
            'success' => true,
            'data' => $presensi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'karyawan_id' => 'required|exists:karyawan,id',
            'tanggal_presensi' => 'required|date',
            'jam_masuk' => 'nullable|date_format:H:i:s',
            'jam_keluar' => 'nullable|date_format:H:i:s',
            'foto_masuk' => 'nullable|string',
            'foto_keluar' => 'nullable|string',
            'latitude_masuk' => 'nullable|numeric',
            'longitude_masuk' => 'nullable|numeric',
            'latitude_keluar' => 'nullable|numeric',
            'longitude_keluar' => 'nullable|numeric',
            'status' => 'required|in:hadir,terlambat,tidak_hadir,cuti,sakit',
            'keterangan' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Check if presensi already exists for this karyawan on this date
        $existingPresensi = Presensi::where('karyawan_id', $request->karyawan_id)
            ->where('tanggal_presensi', $request->tanggal_presensi)
            ->first();

        if ($existingPresensi) {
            return response()->json([
                'success' => false,
                'message' => 'Presensi already exists for this date'
            ], 409);
        }

        $presensi = Presensi::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Presensi created successfully',
            'data' => $presensi->load('karyawan')
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $presensi = Presensi::with('karyawan')->find($id);
        
        if (!$presensi) {
            return response()->json([
                'success' => false,
                'message' => 'Presensi not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $presensi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $presensi = Presensi::find($id);
        
        if (!$presensi) {
            return response()->json([
                'success' => false,
                'message' => 'Presensi not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'jam_masuk' => 'nullable|date_format:H:i:s',
            'jam_keluar' => 'nullable|date_format:H:i:s',
            'foto_masuk' => 'nullable|string',
            'foto_keluar' => 'nullable|string',
            'latitude_masuk' => 'nullable|numeric',
            'longitude_masuk' => 'nullable|numeric',
            'latitude_keluar' => 'nullable|numeric',
            'longitude_keluar' => 'nullable|numeric',
            'status' => 'sometimes|required|in:hadir,terlambat,tidak_hadir,cuti,sakit',
            'keterangan' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $presensi->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Presensi updated successfully',
            'data' => $presensi->load('karyawan')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $presensi = Presensi::find($id);
        
        if (!$presensi) {
            return response()->json([
                'success' => false,
                'message' => 'Presensi not found'
            ], 404);
        }

        $presensi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Presensi deleted successfully'
        ]);
    }

    /**
     * Check in for attendance
     */
    public function checkIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'karyawan_id' => 'required|exists:karyawan,id',
            'foto_masuk' => 'nullable|string',
            'latitude_masuk' => 'nullable|numeric',
            'longitude_masuk' => 'nullable|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $today = now()->toDateString();
        
        // Check if presensi already exists for today
        $presensi = Presensi::where('karyawan_id', $request->karyawan_id)
            ->where('tanggal_presensi', $today)
            ->first();

        if ($presensi) {
            if ($presensi->jam_masuk) {
                return response()->json([
                    'success' => false,
                    'message' => 'Already checked in today'
                ], 409);
            }
            
            // Update existing presensi
            $presensi->update([
                'jam_masuk' => now()->format('H:i:s'),
                'foto_masuk' => $request->foto_masuk,
                'latitude_masuk' => $request->latitude_masuk,
                'longitude_masuk' => $request->longitude_masuk,
                'status' => 'hadir'
            ]);
        } else {
            // Create new presensi
            $presensi = Presensi::create([
                'karyawan_id' => $request->karyawan_id,
                'tanggal_presensi' => $today,
                'jam_masuk' => now()->format('H:i:s'),
                'foto_masuk' => $request->foto_masuk,
                'latitude_masuk' => $request->latitude_masuk,
                'longitude_masuk' => $request->longitude_masuk,
                'status' => 'hadir'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Check in successful',
            'data' => $presensi->load('karyawan')
        ]);
    }

    /**
     * Check out for attendance
     */
    public function checkOut(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'karyawan_id' => 'required|exists:karyawan,id',
            'foto_keluar' => 'nullable|string',
            'latitude_keluar' => 'nullable|numeric',
            'longitude_keluar' => 'nullable|numeric'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $today = now()->toDateString();
        
        $presensi = Presensi::where('karyawan_id', $request->karyawan_id)
            ->where('tanggal_presensi', $today)
            ->first();

        if (!$presensi) {
            return response()->json([
                'success' => false,
                'message' => 'No check in found for today'
            ], 404);
        }

        if ($presensi->jam_keluar) {
            return response()->json([
                'success' => false,
                'message' => 'Already checked out today'
            ], 409);
        }

        $presensi->update([
            'jam_keluar' => now()->format('H:i:s'),
            'foto_keluar' => $request->foto_keluar,
            'latitude_keluar' => $request->latitude_keluar,
            'longitude_keluar' => $request->longitude_keluar
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Check out successful',
            'data' => $presensi->load('karyawan')
        ]);
    }
}
