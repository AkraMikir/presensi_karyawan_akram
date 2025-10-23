<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $divisi = Divisi::with(['perusahaan', 'kepalaDivisi', 'karyawan'])->get();
        return response()->json([
            'success' => true,
            'data' => $divisi
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_divisi' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kode_divisi' => 'required|string|max:50|unique:divisi',
            'perusahaan_id' => 'required|exists:perusahaan,id',
            'kepala_divisi_id' => 'nullable|exists:karyawan,id',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $divisi = Divisi::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Divisi created successfully',
            'data' => $divisi->load(['perusahaan', 'kepalaDivisi'])
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $divisi = Divisi::with(['perusahaan', 'kepalaDivisi', 'karyawan'])->find($id);
        
        if (!$divisi) {
            return response()->json([
                'success' => false,
                'message' => 'Divisi not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $divisi
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $divisi = Divisi::find($id);
        
        if (!$divisi) {
            return response()->json([
                'success' => false,
                'message' => 'Divisi not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_divisi' => 'sometimes|required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kode_divisi' => 'sometimes|required|string|max:50|unique:divisi,kode_divisi,' . $id,
            'perusahaan_id' => 'sometimes|required|exists:perusahaan,id',
            'kepala_divisi_id' => 'nullable|exists:karyawan,id',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $divisi->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Divisi updated successfully',
            'data' => $divisi->load(['perusahaan', 'kepalaDivisi'])
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $divisi = Divisi::find($id);
        
        if (!$divisi) {
            return response()->json([
                'success' => false,
                'message' => 'Divisi not found'
            ], 404);
        }

        $divisi->delete();

        return response()->json([
            'success' => true,
            'message' => 'Divisi deleted successfully'
        ]);
    }
}
