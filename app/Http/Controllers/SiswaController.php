<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Http\Requests\Siswa\StoreRequest;
use App\Http\Requests\Siswa\UpdateRequest;
use App\Http\Resources\SiswaResource;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Siswa::all();
        return response()->json([
            'message' => 'Success',
            'data' => SiswaResource::collection($data)
        ], 200); 
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = Siswa::create($request->all());
        return response()->json([
            'message' => 'Success',
            'data' => new SiswaResource($data)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::findOrFail($id);
        if ($data) {
            return response()->json([
                'message' => 'Success',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateRequest $request, $id)
    {
        $data = Siswa::findOrFail($id);
        if ($data) {
            $data->update($request->all());
            return response()->json([
                'message' => 'Success',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswa::findOrFail($id);
        if ($data) {
            $data->delete();
            return response()->json([
                'message' => 'Success',
                'data' => new SiswaResource($data)
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }
    }
}
