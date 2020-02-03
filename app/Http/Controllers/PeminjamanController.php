<?php

namespace App\Http\Controllers;
use App\ModelPeminjaman;
use App\ModelDetail_peminjaman;
use Illuminate\Http\Request;
use Validator;
use Auth;
//use DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        //
        if(Auth::user()->level=="petugas") {
        $peminjaman = ModelPeminjaman::join('anggota', 'peminjaman.id_anggota',
                      'anggota.id')->where('peminjaman.id', $id)->get();

        $detail_buku="data";
        $data=array();
        foreach ($peminjaman as $pinjam) {
          $ok = ModelDetail_peminjaman::where('id_peminjaman', $pinjam->id)->get();

          $arr_detail = array();
          foreach ($ok as $ok) {
            $arr_detail[]=array(
              'id_peminjaman' => $ok->id_peminjaman,
              'id_buku' => $ok->id_buku,
              'qty' => $ok->qty
            );
          }

          $data[]=array(
            'id' => $pinjam->id,
            'id_anggota' => $pinjam->id_anggota,
            'nama_anggota' => $pinjam->nama_anggota,
            'id_petugas' => $pinjam->id_petugas,
            'tgl_pinjam' => $pinjam->tgl_pinjam,
            'deadline' => $pinjam->deadline,
            'tgl_kembali' => $pinjam->tgl_kembali,
            'denda' => $pinjam->denda,
            'detail_buku' => $arr_detail
          );
        }
        return response()->json(compact("data"));
      }
      else {
        echo "Hanya petugas yang bisa mengakses halaman ini";
      }
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
        if(Auth::user()->level=="admin") {
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
          $insert=ModelPeminjaman::insert([
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
      else {
        echo "Mohon maaf, data hanya bisa diakses oleh admin";
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function insert(Request $request)
     {
       if(Auth::user()->level=="petugas") {
       $validator=Validator::make($request->all(),[
         'id_peminjaman'=>'required',
         'id_buku'=>'required',
         'qty'=>'required'
       ]);
       if($validator->fails()){
         return response()->json($validator->errors()->toJson(),400);
       }
       else {
         $insert=ModelDetail_peminjaman::insert([
           'id_peminjaman'=>$request->id_peminjaman,
           'id_buku'=>$request->id_buku,
           'qty'=>$request->qty
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
     else {
       echo "Hanya petugas yang bisa mengakses halaman ini";
     }
     }

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
    public function edit(Request $request, $id)
    {
        //
        if(Auth::user()->level=="petugas") {
        $validator=Validator::make($request->all(),
        [
          'id_peminjaman'=>'required',
          'id_buku'=>'required',
          'qty'=>'required'
        ]
      );
      if($validator->fails()) {
        return response()->json($validator->errors());
      }
      $ubah=ModelDetail_peminjaman::where('id', $id)->update([
        'id_peminjaman'=>$request->id_peminjaman,
        'id_buku'=>$request->id_buku,
        'qty'=>$request->qty
      ]);
      if($ubah){
        return response()->json(['status'=>1]);
      }
      else {
        return response()->json(['status'=>0]);
      }
    }
    else {
      echo "Hanya petugas yang bisa mengakses halaman ini";
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
        //
        if(Auth::user()->level=="admin") {
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
    else {
      echo "Mohon maaf, data hanya bisa diakses oleh admin";
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
        if(Auth::user()->level=="admin") {
        $hapus=ModelPeminjaman::where('id',$id)->delete();
        if($hapus){
          return response()->json(['status'=>1]);
        }
        else {
          return response()->json(['status'=>0]);
        }
      }
      else {
        echo "Mohon maaf, data hanya bisa diakses oleh admin";
      }
    }

    public function delete($id)
    {
        //
        if(Auth::user()->level=="petugas") {
        $hapus=ModelDetail_peminjaman::where('id',$id)->delete();
        if($hapus){
          return response()->json(['status'=>1]);
        }
        else {
          return response()->json(['status'=>0]);
        }
      }
      else {
        echo "Hanya petugas yang bisa mengakses halaman ini";
      }
    }
}
