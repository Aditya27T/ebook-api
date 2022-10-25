<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Http\Resources\BooksResource;
use App\Http\Requests\Books\StoreRequest;
use App\Http\Requests\Books\UpdateRequest;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = book::get();
        return response()->json([
            'message' => 'Sukses Get Data',
            'data' => $data
        ], 201);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = book::create($request->all());
        if ($data) {
            return response()->json([
                'message' => 'Sukses Tambah Data',
                'data' => $data
            ], 201);
        } else {
            return response()->json([
                'message' => 'Gagal Tambah Data',
                'data' => null
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = book::findOrFail($id);
        if ($data) {
            return response()->json([
                'message' => 'Sukses Get Data',
                'data' => $data
            ], 201);
        } elseif(!$data) {
            return response()->json([
                'message' => 'Gagal Get Data',
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
    public function update(Request $request, $id)
    {
        $table = Book::findOrFail($id);
        $table->title = $request->title ? $request->title : $table->title;
        $table->description = $request->description ? $request->description : $table->description;
        $table->author = $request->author ? $request->author : $table->author;
        $table->publisher = $request->publisher ? $request->publisher : $table->publisher;
        $table->date_of_issue = $request->date_of_issue ? $request->date_of_issue : $table->date_of_issue;
        $table->save();
        return response()->json([
            'message' => 'Sukses Update Data',
            'data' => $table
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = book::findOrFail($id);
        $data->destroy();
        return response()->json([
            'message' => 'Sukses Hapus Data',
            'data' => $data
        ], 201);
    }
}
