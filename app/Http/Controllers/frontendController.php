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

class frontendController extends masterController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function search(){
        $q = $_GET['q'];
        $data = peneliti::with('pakar_spesifik','pakar_spesifik.pakar_digit3','pakar_spesifik.pakar_digit3.pakar_digit2','detail_pangkat','detail_jabatan');
        $data = $data->where('nama','like','%'.$q.'%')->get();
        // print_r($data);
        return view('peneliti',compact('data'));
        
    }
    public function peneliti(){
    
        $digit2 = (isset($_GET['digit2'])?$_GET['digit2']:0);
        $digit3 = (isset($_GET['digit3'])?$_GET['digit3']:0);
        $spesifik = (isset($_GET['spesifik'])?$_GET['spesifik']:0);
        $jabatan = (isset($_GET['jabatan'])?$_GET['jabatan']:0);
        $pangkat = (isset($_GET['pangkat'])?$_GET['pangkat']:0);
        $data = peneliti::with('pakar_spesifik','pakar_spesifik.pakar_digit3','pakar_spesifik.pakar_digit3.pakar_digit2','detail_pangkat','detail_jabatan');
        if($spesifik) $data = $data->where('spesifik',$spesifik);
        if($jabatan) $data = $data->where('jabatan',$jabatan);
        if($pangkat) $data = $data->where('pangkat',$pangkat);
        if($digit3){
            $data = $data->whereHas('pakar_spesifik',function($q) use ($digit3){
                $q->where('spesifik.digit3',$digit3);
            });
        }
        if($digit2){
            $data = $data->whereHas('pakar_spesifik',function($q) use ($digit2){
                $q->whereHas('pakar_digit3',function($r) use ($digit2){
                    $r->where('digit3.digit2',$digit2);
                });
            });
        }
        $data = $data->get();

        return view('peneliti',compact('data'));
    }

    public function pangkat(){
        $data = pangkat::all();
        

        return view('pangkat',compact('data'));
    }

    public function jabatan(){
        
        $data = jabatan::all();

        return view('jabatan',compact('data'));
    }

    public function digit2(){
        $data = digit2::all();
        

        return view('digit2',compact('data'));
    }

    public function digit3(){
        $data = digit3::with('pakar_digit2')->get();
        
        return view('digit3',compact('data'));
    }

    public function spesifik(){
        $data = spesifik::with('pakar_digit3','pakar_digit3.pakar_digit2')->get();

        return view('spesifik',compact('data'));
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
