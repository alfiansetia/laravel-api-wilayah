<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = 10;
        $data = Kelurahan::query();
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
        if ($request->filled('pos_code')) {
            $data->where('pos_code', $request->pos_code);
        }
        if ($request->filled('kecamatan_id')) {
            $data->where('kecamatan_id', $request->kecamatan_id);
        }
        if ($request->filled('code_kecamatan')) {
            $data->whereRelation('kecamatan', 'code', $request->code_kecamatan);
        }
        if ($request->filled('kabupaten_id')) {
            $data->whereRelation('kecamatan', 'kabupaten_id', $request->kabupaten_id);
        }
        if ($request->filled('code_kabupaten')) {
            $data->whereRelation('kecamatan.kabupaten', 'code', $request->code_kabupaten);
        }
        if ($request->filled('provinsi_id')) {
            $data->whereRelation('kecamatan.kabupaten', 'provinsi_id', $request->provinsi_id);
        }
        if ($request->filled('code_provinsi')) {
            $data->whereRelation('kecamatan.kabupaten.provinsi', 'code', $request->code_provinsi);
        }
        $result = $data->with('kecamatan.kabupaten.provinsi')->paginate($limit);
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
        $kelurahan = Kelurahan::find($id);
        if (!$kelurahan) {
            return response()->json(['data' => null, 'message' => 'Not Found!'], 404);
        }
        $kelurahan->load('kecamatan.kabupaten.provinsi');
        return response()->json(['data' => $kelurahan, 'message' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelurahan $kelurahan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelurahan $kelurahan)
    {
        //
    }
}
