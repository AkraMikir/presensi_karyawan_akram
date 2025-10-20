<?php

namespace App\Http\Controllers;

use App\Models\perusahaanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perusahaan = perusahaanModel::all();
        return response()->json([
            'success' => true,
            'data' => $perusahaan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $perusahaan = perusahaanModel::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Perusahaan created successfully',
            'data' => $perusahaan
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $perusahaan = perusahaanModel::with('karyawan')->find($id);
        
        if (!$perusahaan) {
            return response()->json([
                'success' => false,
                'message' => 'Perusahaan not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $perusahaan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $perusahaan = perusahaanModel::find($id);
        
        if (!$perusahaan) {
            return response()->json([
                'success' => false,
                'message' => 'Perusahaan not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $perusahaan->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Perusahaan updated successfully',
            'data' => $perusahaan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $perusahaan = perusahaanModel::find($id);
        
        if (!$perusahaan) {
            return response()->json([
                'success' => false,
                'message' => 'Perusahaan not found'
            ], 404);
        }

        $perusahaan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Perusahaan deleted successfully'
        ]);
    }
}
