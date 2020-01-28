<?php

namespace App\Http\Controllers;
use App\ModelPeminjaman;
use Illuminate\Http\Request;
use Validator;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $validator=Validator::make($request->all(),[
          'id_anggota'=>'required',
          'id_petugas'=>'required',
          'tgl_pinjam'=>'required',
          'deadline'=>'required',
          'tgl_kembali'=>'required',
          'denda'=>'required'
        ]);
        if($validator->fails()){
          return response()->json($validator->errors()->toJson(),400);
        }
        else {
          $insert=PeminjamModel::insert([
            'id_anggota'=>$request->id_anggota,
            'id_petugas'=>$request->id_petugas,
            'tgl_pinjam'=>$request->tgl_pinjam,
            'deadline'=>$request->deadline,
            'tgl_kembali'=>$request->tgl_kembali,
            'denda'=>$request->denda
          ]);
          if($insert){
            $status="sukses";
          }
          else {
            $status="gagal";
          }
          return response()->json(compact('status'));
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
        //
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
        $validator=Validator::make($request->all(),
        [
          'id_anggota'=>'required',
          'id_petugas'=>'required',
          'tgl_pinjam'=>'required',
          'deadline'=>'required',
          'tgl_kembali'=>'required',
          'denda'=>'required'

        ]
      );
      if($validator->fails()) {
        return response()->json($validator->errors());
      }
      $ubah=ModelPeminjaman::where('id', $id)->update([
        'id_anggota'=>$request->id_anggota,
        'id_petugas'=>$request->id_petugas,
        'tgl_pinjam'=>$request->tgl_pinjam,
        'deadline'=>$request->deadline,
        'tgl_kembali'=>$request->tgl_kembali,
        'denda'=>$request->denda
      ]);
      if($ubah){
        return response()->json(['status'=>1]);
      }
      else {
        return response()->json(['status'=>0]);
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
        //
        $hapus=ModelPeminjaman::where('id',$id)->delete();
        if($hapus){
          return response()->json(['status'=>1]);
        }
        else {
          return response()->json(['status'=>0]);
        }
    }
}
