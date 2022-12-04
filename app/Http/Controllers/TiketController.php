<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Tiket::all();
        return response()->json([
            "myT" => "Tiket yang tersedia",
            "data" => $table
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Tiket();
        $table->nama_konser = $request->nama_konser;
        $table->tgl_konser = $request-> tgl_konser;
        $table->harga = $request->harga;
        $table->save();

        return response()->json([
            "message" => "Load data success",
            "data" => $table
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Tiket::find($id);
        if($table){
            return $table;
        }else {
            return ["message" => "Data not found"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $table = Tiket::find($id);
        if($table){
            $table->nama_konser = $request->nama_konser ? $request->nama_konser : $table->nama_konser;
            $table->tgl_konser = $request->tgl_konser ? $request->tgl_konser : $table->tgl_konser;
            $table->harga = $request->harga ? $request->harga : $table->harga;
            $table->save();

            return $table;
        }else{
            return["message" => "Data not found"];
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
        $table = Tiket::find($id);
        if($table){
            $table->delete();
            return ["message" => "Berhasil dihapus"];
        } else{
            return ["message" => "Data tidak ditemukan"];
        }
    }
}
