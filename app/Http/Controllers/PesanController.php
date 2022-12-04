<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pesan;
use Illuminate\Support\Facades\Auth;


class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = Pesan::all();
        return response()->json([
            "myT" => "Daftar pesanan tiket",
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
        $store = Validator::make($request->all(), [
            'nama_konser' => 'required',
            'jumlah' => 'required',
            'harga' => 'required'
        ]);

        if ($store->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Pesan gagal',
                'data' => $store->errors()
            ], 400);
        } 

        $validated = $store->validated();

        $table = Pesan::create($validated);

        return response()->json([
            "message" => "Pesanan berhasil",
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
        $table = Pesan::find($id);
        if($table){
            return $table;
        }else {
            return ["message" => "Pesanan tidak ditemukan"];
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
