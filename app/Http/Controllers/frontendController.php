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

    public function peneliti(){
        $data = peneliti::with('pakar_spesifik','pakar_spesifik.pakar_digit3','pakar_spesifik.pakar_digit3.pakar_digit2','detail_pangkat','detail_jabatan')->get();

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
