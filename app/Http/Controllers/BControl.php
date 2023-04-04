<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Validator;
use Illuminate\Support\facades\DB;
use App\Models\BModel;

class BControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getbuku()
    {
        $dt_buku=buku::get();
        return response()->json ($dt_buku);
    }

    public function getbukuid($id)
    {
        $dt_buku=buku::where('idbuku','=',$id)->get();
        return response()->json($dt_buku);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $validate = Validator::make($req->all(),[
            'judulbuku'=>'required',
            'jenisbuku'=>'required',
            'pengarang'=>'required',
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $create = BModel::create([
            'judulbuku'=>$req->judulbuku,
            'jenisbuku'=>$req->jenisbuku,
            'pengarang'=>$req->pengarang,
        ]);
        if($create){
            return response()->json(['status'=>true, 'message'=>'Sukses menambah data buku.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal menambah data buku.']);
        }
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
    public function update(Request $req, $id)
    {
        $validate = Validator::make($req->all(),[
            'judulbuku'=>'required',
            'jenisbuku'=>'required',
            'pengarang'=>'required',
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $update = BModel::where('idbuku', $id)->update([
            'judulbuku'=>$req->get('judulbuku'),
            'jenisbuku'=>$req->get('jenisbuku'),
            'pengarang'=>$req->get('pengarang'),

        ]);
        if($update){
            return response()->json(['status'=>true, 'message'=>'Sukses mengupdate data buku.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal mengupdate data buku.']);
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
        $destroy = BModel::where('idbuku', $id)->delete();
            if($destroy){
                return response()->json(['status'=>true, 'message' => 'Sukses delete data buku.']);
            }else{
                return response()->json(['status'=>false, 'message' => 'Gagal data buku.']);
            }
    }
}
