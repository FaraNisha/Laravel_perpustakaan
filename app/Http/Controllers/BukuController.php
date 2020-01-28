<?php

namespace App\Http\Controllers;
use App\ModelBuku;
use Illuminate\Http\Request;
use Validator;
use JWTAuth;
use Auth;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::user()->level="admin") {
        $data=ModelBuku::all();
        return response()->json($data);
        }
        else {
          echo "Mohon maaf, data hanya bisa diakses oleh Admin";
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
          'judul'=>'required',
          'penerbit'=>'required',
          'pengarang'=>'required',
          'foto'=>'required'
        ]);
        if($validator->fails()){
          return response()->json($validator->errors()->toJson(),400);
        }
        else {
          $insert=ModelBuku::insert([
            'judul'=>$request->judul,
            'penerbit'=>$request->penerbit,
            'pengarang'=>$request->pengarang,
            'foto'=>$request->foto
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
        echo "Mohon maaf, data hanya bisa diakses oleh Admin";
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
        if(Auth::user()->level=="admin") {
        $validator=Validator::make($request->all(),
        [
          'judul'=>'required',
          'penerbit'=>'required',
          'pengarang'=>'required',
          'foto'=>'required'

        ]
      );
      if($validator->fails()) {
        return response()->json($validator->errors());
      }
      $ubah=ModelBuku::where('id', $id)->update([
        'judul'=>$request->judul,
        'penerbit'=>$request->penerbit,
        'pengarang'=>$request->pengarang,
        'foto'=>$request->foto
      ]);
      if($ubah){
        return response()->json(['status'=>1]);
      }
      else {
        return response()->json(['status'=>0]);
      }
    }
    else {
      echo "Mohon maaf, data hanya bisa diakses oleh Admin";
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
        $hapus=ModelBuku::where('id',$id)->delete();
        if($hapus){
          return response()->json(['status'=>1]);
        }
        else {
          return response()->json(['status'=>0]);
        }
      }
      else {
        echo "Mohon maaf, data hanya bisa diakses oleh Admin";
      }
    }
}
