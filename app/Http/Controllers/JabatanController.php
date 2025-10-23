<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jabatan = Jabatan::with('karyawan')->get();
        return response()->json([
            'success' => true,
            'data' => $jabatan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gaji_pokok' => 'nullable|numeric|min:0',
            'level_jabatan' => 'nullable|string|max:100',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $jabatan = Jabatan::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Jabatan created successfully',
            'data' => $jabatan
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jabatan = Jabatan::with('karyawan')->find($id);
        
        if (!$jabatan) {
            return response()->json([
                'success' => false,
                'message' => 'Jabatan not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $jabatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jabatan = Jabatan::find($id);
        
        if (!$jabatan) {
            return response()->json([
                'success' => false,
                'message' => 'Jabatan not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_jabatan' => 'sometimes|required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gaji_pokok' => 'nullable|numeric|min:0',
            'level_jabatan' => 'nullable|string|max:100',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $jabatan->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Jabatan updated successfully',
            'data' => $jabatan
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jabatan = Jabatan::find($id);
        
        if (!$jabatan) {
            return response()->json([
                'success' => false,
                'message' => 'Jabatan not found'
            ], 404);
        }

        $jabatan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Jabatan deleted successfully'
        ]);
    }
}
