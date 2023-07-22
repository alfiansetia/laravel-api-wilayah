<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = 10;
        $data = Kecamatan::query();
        if ($request->filled('limit') && is_numeric($request->limit)) {
            $limit = intval($request->limit);
        }
        if ($request->filled('name')) {
            $data->where('name', 'like', "%$request->name%");
        }
        if ($request->filled('code')) {
            $data->where('code', $request->code);
        }
        if ($request->filled('full_code')) {
            $data->where('full_code', $request->full_code);
        }
        if ($request->filled('kabupaten_id')) {
            $data->where('kabupaten_id', $request->kabupaten_id);
        }
        if ($request->filled('code_kabupaten')) {
            $data->whereRelation('kabupaten', 'code', $request->code_kabupaten);
        }
        if ($request->filled('provinsi_id')) {
            $data->whereRelation('kabupaten', 'provinsi_id', $request->provinsi_id);
        }
        if ($request->filled('code_provinsi')) {
            $data->whereRelation('kabupaten.provinsi', 'code', $request->code_provinsi);
        }
        $result = $data->with('kabupaten.provinsi')->paginate($limit);
        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kecamatan = Kecamatan::find($id);
        if (!$kecamatan) {
            return response()->json(['data' => null, 'message' => 'Not Found!'], 404);
        }
        $kecamatan->load('kabupaten.provinsi');
        return response()->json(['data' => $kecamatan, 'message' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kecamatan $kecamatan)
    {
        //
    }
}
