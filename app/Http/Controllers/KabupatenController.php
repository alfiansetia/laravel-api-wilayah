<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $limit = 10;
        $data = Kabupaten::query();
        if ($request->filled('limit') && is_numeric($request->limit)) {
            $limit = intval($request->limit);
        }
        if ($request->filled('type')) {
            $data->where('type', $request->type);
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
        if ($request->filled('provinsi_id')) {
            $data->where('provinsi_id', $request->provinsi_id);
        }
        if ($request->filled('code_provinsi')) {
            $data->whereRelation('provinsi', 'code', $request->code_provinsi);
        }
        $result = $data->with('provinsi')->withCount('kecamatan')->paginate($limit);
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
    public function show(int $id)
    {
        $kabupaten = Kabupaten::find($id);
        if (!$kabupaten) {
            return response()->json(['data' => null, 'message' => 'Not Found!'], 404);
        }
        $kabupaten->load('provinsi');
        return response()->json(['data' => $kabupaten, 'message' => 'success']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kabupaten $kabupaten)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kabupaten $kabupaten)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kabupaten $kabupaten)
    {
        //
    }
}
