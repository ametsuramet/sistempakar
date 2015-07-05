<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\jabatan;
use App\pangkat;
use App\digit3;
use App\digit2;
use App\spesifik;
use App\peneliti;


use Input;
use Redirect;
use Response;
class backendController extends masterController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function tambahpeneliti(){
        $jabatan = jabatan::all();
        $pangkat = pangkat::all();
        $digit2 = digit2::with('pakar_digit3')->get();
        return view('admin.peneliti',compact('jabatan','pangkat','digit2'));
    }
    public function tambahpenelitiproses(){
        $data = new peneliti;
        $data->nama = Input::get('nama');
        $data->nip = Input::get('nip');
        $data->pangkat = Input::get('pangkat');
        $data->jabatan = Input::get('jabatan');
        $data->pendidikan = Input::get('pendidikan');
        $data->spesifik = Input::get('spesifik');

        $data->save();
        return Redirect::to('/peneliti');

    }
    public function tambahjabatanproses(){
        $data = new jabatan;
        $data->nama = Input::get('nama');
        $data->save();
        return Redirect::to('/jabatan');
    }
    public function tambahjabatan(){
        return view('admin.jabatan');
    }
    public function tambahpangkatproses(){
        $data = new pangkat;
        $data->nama = Input::get('nama');
        $data->save();
        return Redirect::to('/pangkat');
    }
    public function tambahpangkat(){
        return view('admin.pangkat');
    }

    public function tambahdigit2proses(){
        $data = new digit2;
        $data->nama = Input::get('nama');
        $data->save();
        return Redirect::to('/digit2');
    }
    public function tambahdigit2(){
        return view('admin.digit2');
    }
    public function tambahdigit3proses(){
        $data = new digit3;
        $data->nama = Input::get('nama');
        $data->digit2 = Input::get('digit2');
        $data->save();
        return Redirect::to('/digit3');
    }
    public function tambahdigit3(){
        $digit2 = digit2::all();
        return view('admin.digit3',compact('digit2'));
    }
    public function tambahspesifikproses(){
        $data = new spesifik;
        $data->nama = Input::get('nama');
        $data->digit3 = Input::get('digit3');
        $data->save();
        return Redirect::to('/spesifik');
    }
    public function tambahspesifik(){
        $digit2 = digit2::with('pakar_digit3')->get();
        return view('admin.spesifik',compact('digit2'));
    }
    public function ajaxSpesifik()
    {
        $data = spesifik::where('digit3',$_GET['digit3'])->get();

        return Response::json($data,200);
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
